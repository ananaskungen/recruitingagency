
<x-admin-layout>
   
  

<h1 class="p-4 text-4xl font-extrabold text-gray-700">New User</h1>

    <div class=" flex justify-end p-6">
        <a href="{{ route('users')}}" class=" right-0 flex items-center
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

                    <form action=" {{ route('users.store', ['user' => $user]) }}  " method="POST" enctype="multipart/form-data">
                       @csrf 

                        <div class="flex flex-col gap-5">

                            <div>

                            <label>Name:</label>
                             <input name="name" placeholder="Name" value="{{ $user->name }}" class="border" >
                          </div>
                            
                            <div>
                                <label>Email:</label>
                               <input name="email" placeholder="Name" value="{{ $user->email }}" class="border" >
                             </div>

                            <div>
                                <label>Temporary Password:</label>
                              <input name="password" placeholder="Name" value="{{ $user->password }}" class="border" >
                             </div>

                            <div>
                                <label>Role:</label>
                             {{--    <input name="is_role" placeholder="Name" value="{{ $user->is_role }}" class="border" >
                                 --}}
                                <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="is_role" name="is_role">
                                    <option></option>
                                    <option value="job_seeker">Job Seeker</option>
                                    <option value="case_manager">Case Manager</option>
                                    <option value="employer">Employer</option>
                                    <option value="super_admin">Super Admin</option>
                                  </select>

                                  <label>Applications:</label>
                                  <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="applications" name="applications">
                                    <option></option>
                                      @foreach ($jobSeekers as $jobSeeker)
                                          <option value="{{ $jobSeeker->id }}">{{ $jobSeeker->id }} {{ $jobSeeker->email }} {{ $jobSeeker->first_name }} {{ $jobSeeker->last_name }}</option>
                                      @endforeach
                                      
                                      @foreach ($caseManagers as $caseManager)
                                      <option value="{{ $caseManager->id }}">{{ $caseManager->id }} {{ $caseManager->email }} {{ $caseManager->first_name }} {{ $caseManager->last_name }}</option>                                      
                                      @endforeach
                                     

                                      @foreach ($employers as $employer)
                                        <option value="{{ $employer->id }}">{{ $employer->id }} {{ $employer->email }} {{ $employer->first_name }} {{ $employer->last_name }}</option>                                      
                                        @endforeach
                                     
                                  </select>
                           
                            </div>

                          

                            <input type="submit"  class="w-24 inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">




                        </div>
                            

                    </form>
            
                
</x-admin-layout>