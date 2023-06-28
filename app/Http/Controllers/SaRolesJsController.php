<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaRolesJsController extends Controller
{
    public function index()
    {
       /*  $rolesE = User::with('employer')->get(); */
        
        return view('super-admin-related/roles/roles_job_seeker',/*  ['jobSeekers' => $jobSeekers] */);
    }
}
