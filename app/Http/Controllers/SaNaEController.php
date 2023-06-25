<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaNaEController extends Controller
{
    
        public function index()
        {
            $employers = Employer::with('attachments')->get();
            
            return view('super-admin-related/employer_applications', ['employers' => $employers]);
        }

        public function edit($id)
        {
            try {
                $employer = Employer::with('attachments')->findOrFail($id);
                
                return view('super-admin-related.new_app_e.edit', ['employer' => $employer]);
            } catch (ModelNotFoundException $e) {
                return abort(404, 'User not found');
            }
        }
        
        public function show($attachmentPath)
        {
            $storagePath = storage_path('app/public/' . $attachmentPath);
            
            if (!file_exists($storagePath)) {
                abort(404);
            }
            
            return response()->file($storagePath);
        }
    
        public function showVideo($videoPath)
        {
            $videoStoragePath = storage_path('app/public/' . $videoPath);
    
            if (!file_exists($videoStoragePath)) {
                abort(404);
            }
    
            return response()->file($videoStoragePath);
        }

        public function update(Request $request, Employer $employer)
        {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:employers,email,' . $employer->id,
                'phone_number' => 'required',
                'linkedin_profile' => 'nullable|url',
                'location' => 'required',
                'is_remote' => 'required',
                'website' => 'nullable|url',
                'additional_info' => 'nullable',
                'company' => 'required',
                'is_approved' => 'boolean',
                // Add other validation rules for additional fields here
            ]);
        
          
        
            $employer->update($request->all());
        
            return redirect()->route('employer-applications')->with('success', 'Update successful!');
        }
        
        
}
