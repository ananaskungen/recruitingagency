<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaRolesCmController extends Controller
{
    //
    public function index()
    {
       /*  $rolesE = User::with('employer')->get(); */
        
        return view('super-admin-related/roles/roles_case_manager',/*  ['jobSeekers' => $jobSeekers] */);
    }
}
