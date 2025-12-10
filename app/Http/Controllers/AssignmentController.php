<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AssignmentController extends Controller
{
    // Show assignment detail (description, files, grade for student or teacher view with submissions)
   public function show(Assignment $assignment)
{
    $user = Auth::user();

    // Check access: student must be enrolled or teacher owner
    $subject = $assignment->subject;
    $enrolled = $subject->students()->where('users.id', $user->id)->exists();
    $isTeacher = $assignment->teacher_id === $user->id;

    if (! $enrolled && ! $isTeacher) {
        abort(403, 'Unauthorized access to this assignment.');
    }

    // Debug: Load files with assignment
    $files = $assignment->files()->with('user')->get();
    
    \Log::info('Showing assignment:', [
        'assignment_id' => $assignment->id,
        'total_files' => $files->count(),
        'files' => $files->pluck('original_name'),
        'user_id' => $user->id,
        'isTeacher' => $isTeacher,
    ]);

    // If teacher: get student submissions and all enrolled students
    if ($isTeacher) {
        $students = $subject->students()->with(['grades' => function($q) use ($assignment) {
            $q->where('assignment_id', $assignment->id);
        }])->get();

        return view('assignments.teacher-show', compact('assignment', 'files', 'students', 'subject'));
    }

    return view('assignments.show', compact('assignment', 'files', 'isTeacher'));
}
    // Upload a file for the assignment (student submission or teacher resource)
   public function upload(Request $request, Assignment $assignment)
{
    $user = Auth::user();

    // Check access as above
    $subject = $assignment->subject;
    $enrolled = $subject->students()->where('users.id', $user->id)->exists();
    $isTeacher = $assignment->teacher_id === $user->id;

    if (! $enrolled && ! $isTeacher) {
        abort(403, 'Unauthorized.');
    }

    $request->validate([
        'file' => 'nullable|file|max:10240',
        'note' => 'nullable|string|max:1000',
    ]);

    // DEBUG: Log what we're receiving
    \Log::info('UPLOAD - Starting:', [
        'assignment_id' => $assignment->id,
        'user_id' => $user->id,
        'has_file' => $request->hasFile('file'),
        'has_note' => $request->filled('note'),
    ]);

    // Prepare data array with REQUIRED fields first
    $data = [
        'assignment_id' => $assignment->id,
        'user_id' => $user->id,
        'original_name' => 'No file uploaded', // Default value for NOT NULL
        'path' => null,
        'mime' => null,
        'size' => null,
        'note' => $request->input('note'),
    ];

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        $path = $file->storeAs(
            'assignments', 
            Str::random(12) . '_' . $file->getClientOriginalName(), 
            'public'
        );
        
        $data['path'] = $path;
        $data['original_name'] = $file->getClientOriginalName();
        $data['mime'] = $file->getClientMimeType();
        $data['size'] = $file->getSize();
    }

    // DEBUG: Log the data before creation
    \Log::info('UPLOAD - Data to save:', $data);

    // Check if we have something to save
    if ($request->hasFile('file') || $request->filled('note')) {
        try {
            // Manual creation to debug
            $assignmentFile = new AssignmentFile();
            $assignmentFile->assignment_id = $data['assignment_id'];
            $assignmentFile->user_id = $data['user_id'];
            $assignmentFile->original_name = $data['original_name'];
            $assignmentFile->path = $data['path'];
            $assignmentFile->mime = $data['mime'];
            $assignmentFile->size = $data['size'];
            $assignmentFile->note = $data['note'];
            
            $assignmentFile->save();
            
            \Log::info('UPLOAD - Success! File ID:', ['id' => $assignmentFile->id]);
            
            return back()->with('success', 'Iesniegums veiksmīgi saglabāts!');
            
        } catch (\Exception $e) {
            \Log::error('UPLOAD - Error:', [
                'error' => $e->getMessage(),
                'data' => $data,
                'trace' => $e->getTraceAsString(),
            ]);
            
            return back()->with('error', 'Kļūda saglabājot: ' . $e->getMessage());
        }
    } else {
        return back()->with('error', 'Lūdzu augšuplādējiet failu vai rakstiet piezīmi.');
    }
}

    // Download a file
    public function download(AssignmentFile $file)
    {
        $user = Auth::user();
        $assignment = $file->assignment;
        $subject = $assignment->subject;

        // Check access: student must be enrolled or teacher owner
        $enrolled = $subject->students()->where('users.id', $user->id)->exists();
        $isTeacher = $assignment->teacher_id === $user->id;

        if (! $enrolled && ! $isTeacher) {
            abort(403, 'Unauthorized.');
        }

        if (! Storage::disk('public')->exists($file->path)) {
            abort(404, 'File not found.');
        }

        return response()->download(Storage::disk('public')->path($file->path), $file->original_name);
    }
}
