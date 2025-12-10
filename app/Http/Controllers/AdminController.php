<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\AssignmentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Activity;

class AdminController extends Controller
{
    // Display admin dashboard
  public function dashboard()
{
    $users = User::orderBy('created_at', 'desc')->get();
    $activities = Activity::with('user')
        ->orderBy('created_at', 'desc')
        ->paginate(15); // This returns a Paginator
        
    return view('dashboards.admin', compact('users', 'activities'));
}

    // Create a new user (from admin panel)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:12',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/',
            ],
            'role' => 'required|in:admin,teacher,student',
        ], [
            'password.regex' => 'Parolei jāsatur vismaz: 12 rakstzīmes, 1 lielais burts, 1 mazais burts, 1 cipars un 1 simbols (@$!%*?&).',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // Log the activity
        Activity::log(
            'user.created',
            'Izveidoja jaunu lietotāju: "' . $user->name . '"',
            ['user_id' => $user->id, 'email' => $user->email, 'role' => $user->role]
        );

        return back()->with('success', 'Lietotājs veiksmīgi izveidots!');
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $oldUser = clone $user;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,teacher,student',
        ]);

        $user->update($validated);

        // Log role change
        if ($oldUser->role !== $user->role) {
            Activity::log(
                'user.role_changed',
                'Mainīja lietotāja "' . $user->name . '" lomu no "' . $oldUser->role . '" uz "' . $user->role . '"',
                ['user_id' => $user->id, 'old_role' => $oldUser->role, 'new_role' => $user->role]
            );
        }

        return back()->with('success', 'Lietotājs veiksmīgi atjaunināts!');
    }

    // Reset user password
    public function resetPassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => [
                'required',
                'string',
                'min:12',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/',
            ],
        ], [
            'password.regex' => 'Parolei jāsatur vismaz: 12 rakstzīmes, 1 lielais burts, 1 mazais burts, 1 cipars un 1 simbols (@$!%*?&).',
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Log password reset
        Activity::log(
            'user.password_reset',
            'Atiestatīja paroli lietotājam: "' . $user->name . '"',
            ['user_id' => $user->id]
        );

        return back()->with('success', 'Parole veiksmīgi atiestatīta!');
    }

    // Delete user
    public function destroy(User $user)
    {
        // Don't allow self-deletion
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Jūs nevarat dzēst savu kontu!');
        }

        $userName = $user->name;
        $userEmail = $user->email;
        $userRole = $user->role;
        
        $user->delete();

        // Log deletion
        Activity::log(
            'user.deleted',
            'Dzēsa lietotāju: "' . $userName . '"',
            ['user_id' => $user->id, 'email' => $userEmail, 'role' => $userRole]
        );

        return back()->with('success', 'Lietotājs veiksmīgi dzēsts!');
    }
}