
<x-admin-layout>
   
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{$employer->first_name}} {{$employer->last_name}}'s Profile
    </h2>

<h1 class="p-4 text-4xl font-extrabold text-gray-700">Redigera</h1>

    <div class=" flex justify-end p-6">
        <a href="{{ route('employer-applications')}}" class=" right-0 flex items-center
        text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center 
        mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
            Tillbaka
        </a> 
    </div>
    


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex flex-col ">
                <div class="container">

                    <form action="{{ route('employer.update', ['employer' => $employer->id]) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex flex-col gap-5">

                            <div>

                                <label>First Name:</label>
                                <input name="first_name" placeholder="Name" value="{{ $employer->first_name }}" class="border" >
                            </div>
                            
                            <div>
                                <label>Last Name:</label>
                                <input name="last_name" placeholder="Name" value="{{ $employer->last_name }}" class="border" >
                            </div>

                            <div>
                                <label>Email:</label>
                                <input name="email" placeholder="Name" value="{{ $employer->email }}" class="border" >
                            </div>

                          

                            <div>
                                <label>Tel:</label>
                                <input name="phone_number" placeholder="Name" value="{{ $employer->phone_number }}" class="border" >
                            </div>

                            <div>
                                <label>Company:</label>
                                <input name="company" placeholder="None" value="{{ $employer->company }}" class="border" >
                            </div>


                            <div>
                                <label>Location:</label>
                                <input name="location" placeholder="Name" value="{{ $employer->location }}" class="border" >
                            </div>

                            <div class="flex gap-6">

                                <div>
                                    <label>LinkedIn:</label>
                                    <input name="linkedin_profile" placeholder="None" value="{{ $employer->linkedin_profile }}" class="border">
                                </div>

                               <div>
                                    <label>Website:</label>
                                    <input name="website" placeholder="None" value="{{ $employer->website }}" class="border" >
                                </div> 
                            </div>
                            
                            <div>
                                <label>Remote:</label>
                                <input name="is_remote" placeholder="Name" value="{{ $employer->is_remote }}" class="border" >
                            </div>
                            
           
                            <div>
                                <label>Additional Information:</label>
                                <input name="additional_info" placeholder="None" value="{{ $employer->additional_info }}" class="border w-full" >
                            </div>
                                         
                          
                                     

                            <div>
                                <label>Approve:</label>
                                <input name="is_approved" placeholder="None" value="{{ $employer->is_approved }}" class="border " >
                            </div>

                            <input type="submit"  class="w-24 inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">

                        </div>
                            

                    </form>

                    @if ($employer->attachments->count() > 0)
                    <ul>
                        @foreach ($employer->attachments as $attachment)
                            <li>
                                @php
                                    $attachmentPath = str_replace('public/', '', $attachment->file_path_attachment);
                                    $videoPath = str_replace('public/', '', $attachment->file_path_video);
                                @endphp
                                
                                @if ($attachment->file_type === 'image')
                                    <img src="{{ url('attachments/' . $attachmentPath) }}" alt="Image">
                                @elseif ($attachment->file_type === 'video')
                                    <a href="{{ url($videoPath) }}" target="_blank">
                                        Open Video
                                    </a>
                                @else
                                    <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" target="_blank">
                                        Open in New Tab
                                    </a>
                                    @if ($attachment->file_type === 'pdf' || $attachment->file_type === 'jpeg')
                                        <a href="{{ route('attachments.show', ['attachmentPath' => $attachmentPath]) }}" download>
                                            Download
                                        </a>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No attachments found.</p>
                @endif
                
                
                
                
</x-admin-layout>