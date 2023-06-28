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
            'applications' => 'required|integer',
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
    
        // Get the selected application ID
        $applicationId = $validatedData['applications'];
    
        // Assign the application to the appropriate role
        $role = $validatedData['is_role'];
    
        if ($role === 'job_seeker') {
            $jobSeeker = JobSeeker::find($applicationId);
    
            if ($jobSeeker) {
                $applicationData = [
                    'user_id' => $user->id,
                    'job_seeker_id' => $jobSeeker->id,
                    'case_manager_id' => null,
                    'employer_id' => null,
                ];
    
                $application = new Application($applicationData);
                $application->save();
                // Application created successfully
            } else {
                // Handle the case when job seeker record is not found
                // For example:
                return redirect()->back()->with('error', 'Job seeker not found');
            }
        } elseif ($role === 'case_manager') {
            $caseManager = CaseManager::find($applicationId);
    
            if ($caseManager) {
                $applicationData = [
                    'user_id' => $user->id,
                    'job_seeker_id' => null,
                    'case_manager_id' => $caseManager->id,
                    'employer_id' => null,
                ];
    
                $application = new Application($applicationData);
                $application->save();
                // Application created successfully
            } else {
                // Handle the case when case manager record is not found
                // For example:
                return redirect()->back()->with('error', 'Case manager not found');
            }
        } elseif ($role === 'employer') {
            $employer = Employer::find($applicationId);
    
            if ($employer) {
                $applicationData = [
                    'user_id' => $user->id,
                    'job_seeker_id' => null,
                    'case_manager_id' => null,
                    'employer_id' => $employer->id,
                ];
    
                $application = new Application($applicationData);
                $application->save();
                // Application created successfully
            } else {
                // Handle the case when employer record is not found
                // For example:
                return redirect()->back()->with('error', 'Employer not found');
            }
        } else {
            // Handle the case when role is not recognized
            // For example:
            return redirect()->back()->with('error', 'Invalid role');
        }
    
    
        // Redirect or perform additional actions after saving the record
        return redirect()->route('users');
    }
    
    
}
