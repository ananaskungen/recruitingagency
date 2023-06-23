<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\CaseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CaseManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'past_experience' => 'required|string',
            'linkedin_profile' => 'nullable|url',
            'github_profile' => 'nullable|url',
            'location' => 'required|string',
            'is_remote' => 'required|string',
            'job_type' => 'required|string',
            'is_working' => 'required|string',
            'field' => 'required|string',
            'file_path_video' => 'nullable|file|mimes:mp4|max:5000', 
            'file_path_attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5000',
            'website' => 'nullable|url',
            'additional_info' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
    
            if ($errors->has('email')) {
                if ($errors->has('email.required')) {
                    // Handle the "required" error
                    return back()->with('error', 'The email field is required.');
                } elseif ($errors->has('email.email')) {
                    // Handle the "invalid email" error
                    return back()->with('error', 'Please enter a valid email address.');
                }
            }
        }
    
        // Check if the email already exists
        $email = $request->input('email');
        $existingCaseManager = CaseManager::where('email', $email)->first();
        if ($existingCaseManager) {
            return back()->with('error', 'That email already exists.');
        }
    
        // Create a new job seeker record
        $caseManager = new CaseManager();
        $caseManager->first_name = $request->input('first_name');
        $caseManager->last_name = $request->input('last_name');
        $caseManager->gender = $request->input('gender');
        $caseManager->email = $request->input('email');
        $caseManager->phone_number = $request->input('phone_number');
        $caseManager->past_experience = $request->input('past_experience');
        $caseManager->linkedin_profile = $request->input('linkedin_profile');
        $caseManager->github_profile = $request->input('github_profile');
        $caseManager->location = $request->input('location');
        $caseManager->is_remote = $request->input('is_remote');
        $caseManager->is_working = $request->input('is_working');
        $caseManager->field = $request->input('field');
        $caseManager->website = $request->input('website');
        $caseManager->additional_info = $request->input('additional_info');
        $caseManager->save();

        if ($request->hasFile('file_path_video')) {
            foreach ($request->file('file_path_video') as $videoFile) {
                if ($videoFile->isValid()) {
                    $videoPath = $videoFile->store('public/videos');
    
                    // Store each attachment in the attachments table
                    $video = new Attachment();
                    $video->file_path_video = $videoPath;
                    $video->file_type = 'video';
                    $video->case_manager_id = $caseManager->id;
                    $video->save();
                } else {
                    // Log any error messages related to the attachment file upload
                    $error = $videoFile->getErrorMessage();
                    Log::error('Video file upload error: ' . $error);
                    return back()->with('error', 'Failed to upload video file.');
                }
            }
        }
    
        // Handle attachments file uploads if provided
        if ($request->hasFile('file_path_attachment')) {
            foreach ($request->file('file_path_attachment') as $attachmentFile) {
                if ($attachmentFile->isValid()) {
                    $attachmentPath = $attachmentFile->store('public/attachments');
    
                    // Store each attachment in the attachments table
                    $attachment = new Attachment();
                    $attachment->file_path_attachment = $attachmentPath;
                    $attachment->file_type = 'attachment';
                    $attachment->case_manager_id = $caseManager->id;
                    $attachment->save();
                } else {
                    // Log any error messages related to the attachment file upload
                    $error = $attachmentFile->getErrorMessage();
                    Log::error('Attachment file upload error: ' . $error);
                    return back()->with('error', 'Failed to upload attachment file.');
                }
            }
        }

         return redirect('/thank-you');
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseManager $caseManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseManager $caseManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseManager $caseManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseManager $caseManager)
    {
        //
    }
}
