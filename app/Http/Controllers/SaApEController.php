<?php

namespace App\Http\Controllers;


use App\Models\Employer;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class SaApEController extends Controller
{
    
        public function index()
        {
            $employers = Employer::with('attachments')->get();
            
            return view('super-admin-related/approved_employer', ['employers' => $employers]);
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
            
          /*   dd($employer);  */
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:employers,email,' . $employer->id,
                'phone_number' => 'required',
                'location' => 'required',
                'linkedin_profile' => 'nullable|url|max:255',
                'website' => 'nullable|url|max:255', 
                'is_remote' => 'required|string',
               
                'additional_info' => 'nullable',
                
                'company' => 'required',
                'is_approved' => 'boolean', 
            ]);
        
          
        
            $employer->update($request->all());



            return redirect()->route('employer-applications')->with('success', 'Update successful!');
        }


        public function destroy(Employer $employer)
        {
            //
            $employer->delete();
    
            return redirect()
                ->route('employer-applications')
                ->with('success', 'Succesfully DELETED!');
        } 
    

        
        
        
}

