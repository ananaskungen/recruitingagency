<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaNaJsController extends Controller
{
    /**
     * Display the index page for Super Admin - New Applicants (Job Seekers).
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jobSeekers = JobSeeker::with('attachments')->get();
        
        return view('super-admin-related/job_seeker_applications', ['jobSeekers' => $jobSeekers]);
    }

    public function edit($id)
    {
        try {
            $jobSeeker = JobSeeker::with('attachments')->findOrFail($id);
            
            return view('super-admin-related.new_app_js.edit', ['jobSeeker' => $jobSeeker]);
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
        
        $publicPath = 'storage/' . $attachmentPath;
        
        return response()->file(asset($publicPath));
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