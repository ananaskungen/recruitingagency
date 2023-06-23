<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
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
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'company' => 'required|string',
            'linkedin_profile' => 'nullable|url',
            'location' => 'required|string',
            'is_remote' => 'required|string',
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
        $existingEmployer = Employer::where('email', $email)->first();
        if ($existingEmployer) {
            return back()->with('error', 'That email already exists.');
        }
    
        // Create a new job seeker record
        $employer = new Employer();
        $employer->first_name = $request->input('first_name');
        $employer->last_name = $request->input('last_name');
        $employer->email = $request->input('email');
        $employer->phone_number = $request->input('phone_number');
        $employer->linkedin_profile = $request->input('linkedin_profile');
        $employer->company = $request->input('company');
        $employer->location = $request->input('location');
        $employer->is_remote = $request->input('is_remote');
        $employer->website = $request->input('website');
        $employer->additional_info = $request->input('additional_info');
        $employer->save();

    
        // Handle attachments file uploads if provided
        if ($request->hasFile('file_path_attachment')) {
            foreach ($request->file('file_path_attachment') as $attachmentFile) {
                if ($attachmentFile->isValid()) {
                    $attachmentPath = $attachmentFile->store('public/attachments');
    
                    // Store each attachment in the attachments table
                    $attachment = new Attachment();
                    $attachment->file_path_attachment = $attachmentPath;
                    $attachment->file_type = 'attachment';
                    $attachment->employer_id = $employer->id;
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
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
