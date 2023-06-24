<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class SaNaEController extends Controller
{
    
        public function index()
        {
            $employers = Employer::with('attachments')->get();
            
            return view('super-admin-related/employer_applications', ['employers' => $employers]);
        }
}
