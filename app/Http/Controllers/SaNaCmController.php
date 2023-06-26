<?php

namespace App\Http\Controllers;

use App\Models\CaseManager;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaNaCmController extends Controller
{
    public function index()
    {
        $caseManagers = CaseManager::with('attachments')->get();
        
        return view('super-admin-related/case_manager_applications', ['caseManagers' => $caseManagers]);
    }


    public function edit($id)
    {
        try {
            $caseManager = CaseManager::with('attachments')->findOrFail($id);
            
            return view('super-admin-related.new_app_cm.edit', ['caseManager' => $caseManager]);
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
    

    public function update(Request $request, CaseManager $caseManager)
    {
        
      /*   dd($employer);  */
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:employers,email,' . $caseManager->id,
            'phone_number' => 'required',
            'location' => 'required',
            'linkedin_profile' => 'nullable|url|max:255',
            'github_profile' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255', 
            'is_remote' => 'required|string',
            'is_working' => 'required|string',
            'past_experience' => 'required|string',
            'field' => 'required|string',
            'additional_info' => 'nullable',
            'is_approved' => 'boolean', 
        ]);
    
      
    
        $caseManager->update($request->all());



        return redirect()->route('case-manager-applications')->with('success', 'Update successful!');
    }


    public function destroy(CaseManager $caseManager)
    {
        //
        $caseManager->delete();

        return redirect()
            ->route('case-manager-applications')
            ->with('success', 'Succesfully DELETED!');
    } 



}
