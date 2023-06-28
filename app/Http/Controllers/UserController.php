<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    
        return view('super-admin-related.users.create', ['user' => $user]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'is_role' => 'required|string',
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
        // Redirect or perform additional actions after saving the record

        return redirect()->route('users');
    }
}
