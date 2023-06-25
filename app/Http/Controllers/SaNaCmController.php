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
    


}
