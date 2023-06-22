<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobSeekerController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
        
     public function store(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
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
        $existingJobSeeker = JobSeeker::where('email', $email)->first();
        if ($existingJobSeeker) {
            return back()->with('error', 'That email already exists.');
        }
    
        // Create a new job seeker record
        $jobSeeker = new JobSeeker();
        $jobSeeker->first_name = $request->input('first_name');
        $jobSeeker->last_name = $request->input('last_name');
        $jobSeeker->gender = $request->input('gender');
        $jobSeeker->email = $request->input('email');
        $jobSeeker->phone_number = $request->input('phone_number');
        $jobSeeker->linkedin_profile = $request->input('linkedin_profile');
        $jobSeeker->github_profile = $request->input('github_profile');
        $jobSeeker->location = $request->input('location');
        $jobSeeker->is_remote = $request->input('is_remote');
        $jobSeeker->is_working = $request->input('is_working');
        $jobSeeker->job_type = $request->input('job_type');
        $jobSeeker->field = $request->input('field');
        $jobSeeker->website = $request->input('website');
        $jobSeeker->additional_info = $request->input('additional_info');
        $jobSeeker->save();
     
         // Handle video file upload if provided
         if ($request->hasFile('file_path_video')) {
            $videoFile = $request->file('file_path_video');
            if ($videoFile->isValid()) {
                $videoPath = $videoFile->store('public/videos');
    
                // Store the video in the attachments table
                $attachment = new Attachment();
                $attachment->file_path = $videoPath;
                $attachment->file_type = 'video';
                $attachment->job_seeker_id = $jobSeeker->id;
                $attachment->save();
            } else {
                return back()->with('error', 'Failed to upload video file.');
            }
        }
    
        // Handle attachments file uploads if provided
        if ($request->hasFile('file_path_attachment')) {
            foreach ($request->file('file_path_attachment') as $attachmentFile) {
                if ($attachmentFile->isValid()) {
                    $attachmentPath = $attachmentFile->store('public/attachments');
    
                    // Store each attachment in the attachments table
                    $attachment = new Attachment();
                    $attachment->file_path = $attachmentPath;
                    $attachment->file_type = 'attachment';
                    $attachment->job_seeker_id = $jobSeeker->id;
                    $attachment->save();
                } else {
                    return back()->with('error', 'Failed to upload attachment file.');
                }
            }
        }

         return redirect('/');
     }
     
     
        
        

    /**
     * Display the specified resource.
     */
    public function show(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobSeeker $jobSeeker)
    {
        //
    }
}
