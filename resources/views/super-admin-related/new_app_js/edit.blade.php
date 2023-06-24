
<x-admin-layout>
   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                {{$jobSeeker->first_name}} {{$jobSeeker->last_name}}'s Profile
        </h2>
 
    <h1 class="p-4 text-4xl font-extrabold text-gray-700">Redigera</h1>

        <div class=" flex justify-end p-6">
            <a href="{{ route('job-seeker-applications')}}" class=" right-0 flex items-center
            text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center 
            mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
                Tillbaka
            </a> 
        </div>
        

    {{-- Here we want to show the current categories (a card) --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col ">
                    <div class="container">

                        <form {{-- action="{{ route('job_seeker.update', ['jobseeker' => $jobseeker]) }}" --}} method="POST">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-col gap-5">

                                <div>

                                    <label>First Name:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->first_name }}" class="border" >
                                </div>
                                
                                <div>
                                    <label>Last Name:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->last_name }}" class="border" >
                                </div>

                                <div>
                                    <label>Email:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->email }}" class="border" >
                                </div>

                                <div>
                                    <label>Tel:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->phone_number }}" class="border" >
                                </div>

                                <div>
                                    <label>Gender:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->gender }}" class="border" >
                                </div>

                                <div>
                                    <label>Location:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->location }}" class="border" >
                                </div>

                                <div class="flex gap-6">

                                    <div>
                                        <label>LinkedIn:</label>
                                        <input name="name" placeholder="None" value="{{ $jobSeeker->linekdin_profile }}" class="border" >
                                    </div>
                                
                                    <div>
                                        <label>Github:</label>
                                        <input name="name" placeholder="None" value="{{ $jobSeeker->github_profile }}" class="border" >
                                    </div>

                                    <div>
                                        <label>Website:</label>
                                        <input name="name" placeholder="None" value="{{ $jobSeeker->website }}" class="border" >
                                    </div>
                                </div>

                                <div>
                                    <label>Remote:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->is_remote }}" class="border" >
                                </div>

                                <div>
                                    <label>Is Working?:</label>
                                    <input name="name" placeholder="Name" value="{{ $jobSeeker->is_working }}" class="border" >
                                </div>

                                <div>
                                    <label>Fields:</label>
                                    <input name="name" placeholder="None" value="{{ $jobSeeker->field }}" class="border w-full" >
                                </div>

                                <div>
                                    <label>Job Type:</label>
                                    <input name="name" placeholder="None" value="{{ $jobSeeker->job_type }}" class="border w-full" >
                                </div>

                                <div>
                                    <label>Additional Information:</label>
                                    <input name="name" placeholder="None" value="{{ $jobSeeker->additional_info }}" class="border w-full" >
                                </div>

                                <div>
                                    <label>Approve:</label>
                                    <input name="name" placeholder="None" value="{{ $jobSeeker->is_approved }}" class="border w-full" >
                                </div>

                                <div class="flex gap-6">


                                
                                
                                </div>


                                <input type="submit"  class="w-24 inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">




                            </div>
                                

                        </form>
                        @if ($jobSeeker->attachments->count() > 0)
                        <ul>
                            @foreach ($jobSeeker->attachments as $attachment)
                                <li>
                                    @php
                                        $attachmentPath = str_replace('public/', '', $attachment->file_path_attachment);
                                    @endphp
                    
                                    @if ($attachment->file_type === 'image')
                                        <img src="{{ url('attachments/' . $attachmentPath) }}" alt="Image">
                                    @else
                                        <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" target="_blank">
                                            {{ $attachment->file_type }}
                                        </a>
                                    @endif
                    
                                    @if ($attachment->file_type === 'video')
                                        <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" target="_blank">
                                            Open Video
                                        </a>
                                    @elseif ($attachment->file_type === 'pdf' || $attachment->file_type === 'jpeg')
                                        <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" target="_blank">
                                            Open in New Tab
                                        </a>
                                        <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" download>
                                            Download
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No attachments found.</p>
                    @endif
                    
                    
                    
</x-admin-layout>