<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\Application;
use App\Models\CaseManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('super-admin-related.users', ['users' => $users]);
    }

    public function create()
    {
        $user = new User();
        $jobSeekers = JobSeeker::all();
        $caseManagers = CaseManager::all();
        $employers = Employer::all();
      
    
        return view('super-admin-related.users.create', ['user' => $user, 'jobSeekers' => $jobSeekers, 'caseManagers' => $caseManagers, 'employers' => $employers]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string',
        'is_role' => 'required|string',
        'job_seeker_id' => 'nullable|integer|exists:job_seekers,id',
        'case_manager_id' => 'nullable|integer|exists:case_managers,id',
        'employer_id' => 'nullable|integer|exists:employers,id',
    ]);

    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password'];
    $user->is_role = $validatedData['is_role'];

   


    // Check if the email already exists
    $existingUser = User::where('email', $user->email)->first();
    if ($existingUser) {
        return back()->with('error', 'That email already exists.');
    }

    $user->save();


    // Assign the application to the appropriate role
    $role = $validatedData['is_role'];


    $application = new Application();
    $application->user_id = $user->id;
    $application->job_seeker_id = $validatedData['job_seeker_id'] ?? null;
    $application->case_manager_id = $validatedData['case_manager_id'] ?? null;
    $application->employer_id = $validatedData['employer_id'] ?? null;
    $application->save();

    return redirect()->route('users');
}

    
}
