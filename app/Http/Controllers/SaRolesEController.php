<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SaRolesEController extends Controller
{
    public function index()
    {
       /*  $rolesE = User::with('employer')->get(); */
        
        return view('super-admin-related/roles/roles_employer',/*  ['jobSeekers' => $jobSeekers] */);
    }
}
