<?php

namespace App\Http\Controllers;

use App\Models\CaseManager;
use Illuminate\Http\Request;

class SaNaCmController extends Controller
{
    public function index()
    {
        $caseManagers = CaseManager::with('attachments')->get();
        
        return view('super-admin-related/case_manager_applications', ['caseManagers' => $caseManagers]);
    }
}
