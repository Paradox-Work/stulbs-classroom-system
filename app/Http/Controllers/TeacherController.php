<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\AssignmentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = Auth::user();
        $subjects = $teacher->subjects()->withCount(['students', 'assignments'])->get();
        
        $totalStudents = $subjects->isNotEmpty() 
            ? $subjects->flatMap->students->unique('id')->count() 
            : 0;
        
        $totalAssignments = $subjects->isNotEmpty()
            ? Assignment::whereIn('subject_id', $subjects->pluck('id'))->count()
            : 0;
        
        $pendingSubmissions = $subjects->isNotEmpty()
            ? AssignmentFile::whereIn('assignment_id', 
                Assignment::whereIn('subject_id', $subjects->pluck('id'))->pluck('id')
              )->whereNull('grade')->count()
            : 0;

        return view('dashboards.teacher', compact(
            'teacher', 
            'subjects',
            'totalStudents',
            'totalAssignments',
            'pendingSubmissions'
        ));
    }

    public function storeAssignment(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:now',
            'subject_id' => 'required|exists:subjects,id'
        ]);

        $subject = Subject::findOrFail($validated['subject_id']);
        
        if ($subject->teacher_id !== Auth::id()) {
            return back()->withErrors(['error' => 'Jums nav piekļuves šim kursam!']);
        }

        Assignment::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'subject_id' => $validated['subject_id'],
            'teacher_id' => Auth::id(),
        ]);

        return back()->with('success', 'Uzdevums veiksmīgi izveidots!');
    }

    public function updateAssignment(Request $request, Assignment $assignment)
    {
        if ($assignment->teacher_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $assignment->update($validated);

        return back()->with('success', 'Assignment updated successfully!');
    }

    public function destroyAssignment(Assignment $assignment)
    {
        if ($assignment->teacher_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized.');
        }

        $assignment->delete();

        return back()->with('success', 'Uzdevums dzēsts veiksmīgi!');
    }

    public function setSubject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = Subject::create([
            'name' => $validated['name'],
            'teacher_id' => Auth::id(),
            'code' => $this->generateUniqueCode(),
        ]);

        return back()->with('success', 'Kurss izveidots veiksmīgi! Kods: ' . $subject->code);
    }

    public function regenerateCode(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id'
        ]);
        
        $subject = Subject::findOrFail($request->subject_id);

        if ($subject->teacher_id !== Auth::id()) {
            return back()->with('error', 'Jums nav piekļuves šim kursam!');
        }

        $subject->code = $this->generateUniqueCode();
        $subject->save();

        return back()->with('success', 'Jaunais kuršu kods: ' . $subject->code);
    }

    public function gradeAssignment(Request $request, $assignmentId)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:users,id',
            'grade' => 'required|numeric|min:0|max:100',
            'feedback' => 'nullable|string|max:1000',
        ]);

        $assignment = Assignment::findOrFail($assignmentId);

        if ($assignment->teacher_id !== Auth::id()) {
            return back()->withErrors(['error' => 'Jums nav piekļuves šim uzdevumam!']);
        }

        $subject = $assignment->subject;
        if (!$subject->students()->where('users.id', $validated['student_id'])->exists()) {
            return back()->withErrors(['error' => 'Šis students nav ierakstīts šajā kursā!']);
        }

        Grade::updateOrCreate(
            [
                'assignment_id' => $assignmentId,
                'student_id' => $validated['student_id'],
            ],
            [
                'grade' => $validated['grade'],
                'feedback' => $validated['feedback'],
            ]
        );

        $assignmentFile = AssignmentFile::where('assignment_id', $assignmentId)
            ->where('user_id', $validated['student_id'])
            ->first();
        
        if ($assignmentFile) {
            $assignmentFile->update([
                'grade' => $validated['grade'],
                'feedback' => $validated['feedback'],
            ]);
        }

        return back()->with('success', 'Atzīme piešķirta veiksmīgi!');
    }

    private function generateUniqueCode()
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $letters[random_int(0, strlen($letters) - 1)];
            }
        } while (Subject::where('code', $code)->exists());

        return $code;
    }
}