<x-visitor-layout>
   
  <div class="flex justify-center mt-10">
    <h1 class="bold text-xl"> APPLICATION FORM CASE MANAGER </h1>
  </div>
  
      <div class=" mx-auto max-w-6xl py-20 px-12 lg:px-24  mb-24">
        <form method="POST" action="{{route('case_manager-applicant.store')}}" enctype="multipart/form-data" class="form_dashboard">
          @csrf
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="-mx-3 md:flex flex-col mb-6">
              <div class="flex">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="first_name">
                    First Name
                  </label>
                  <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company" type="text" name="first_name" placeholder="First Name">
                  
                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="last_name">
                    Last Name
                  </label>
                  <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" name="last_name" placeholder="Last Name">
                </div>
              </div>
                
              <div class="flex">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="Email">
                    Email
                  </label>
                  <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company" type="text" name="email" placeholder="Email">
                  
                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="Tel">
                  Tel
                  </label>
                  <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="tel" type="text" name="phone_number" placeholder="Phone Number">
                </div>

              
            </div>

            <div class="flex">

              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="Gender">
                  Gender
                </label>
                <div>
                  <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="gender" name="gender">
                    <option></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="None of the above">None of the above</option>
                  </select>
                </div>

              </div>
              <div class="md:w-1/2 px-3">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="location">
                Location
                </label>
                <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="location" type="text" name="location" placeholder="Stockholm, Sweden">
              </div>
          
          </div>


          <div class="flex">

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="remote">
                Do you wish to work remotely?
              </label>
              <div>
                <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="is_remote" name="is_remote">
                  <option></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>

            </div>
            <div class="md:w-1/2 px-3">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="working">
              Are you currently working?
              </label>
              <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="is_remote" name="is_working">
                <option></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
        
        </div>

        <div class="flex">

          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="field">
              Fields you wish to work in
            </label>
            <div>
              <input required class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" name="field" placeholder="Real Estate">

            </div>

          </div>
          
      
        </div>


            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-6">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="linkedin">
                  LinkedIn Profile (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="linkedin" name="linkedin_profile" type="text" placeholder="">
              </div>

              <div class="md:w-full px-3">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="website">
                  Website (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="website" name="website" type="text" placeholder="">
              </div>

              <div class="md:w-full px-6">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="github">
                  Github profile (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="github" name="github_profile" type="text" placeholder="">
              </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
              <div class=" flex flex-col">
                
                <div class="px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="past_experience">
                    How many years of experience do you have?
                  </label>
                  <div>
                    <select required class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="past_experience" id="past-experience">
                      <option></option>
                      <option value="none">None</option>
                      <option value="one_year">+1 Year</option>
                      <option value="two_year">+2 Years</option>
                      <option value="three_year">+3 Years</option>
                      <option value="four_year">+4 Years</option>
                      <option value="five_year">+5 Years</option>
                    </select>
                  </div>
                </div>

                <div class="px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="attachments">
                    Attachments
                  </label>
                  <div>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="attachments" name="file_path_attachment[]" type="file" multiple>
                  </div>
                </div>
                
              <div class="px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="video">
                    Introduction Video
                  </label>
                  <div>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="video" name="file_path_video[]" type="file" multiple>
                  </div>
                </div> 

              <div class=" w-full">
                <div class="px-3 mb-6 md:mb-0">
                  <label class="uppercase h-full tracking-wide text-black text-xs font-bold mb-2" for="additional_info">
                    Additional Information (Optional)
                  </label>
                  <div>
                    <textarea rows="10" class="w-full bg-gray-200 h-48 text-black border border-gray-200 rounded py-3 px-4 mb-3 block mt-0" name="additional_info" >
        
                    </textarea>
                  </div>
                </div>
              </div>

            </div> 
            <div class="-mx-3 md:flex mt-2">
              <div class="md:w-full px-3">
                <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" >Submit Application </button>
             
              </div>
            </div>
          </div>
        </form>
      </div>
    

</x-visitor-layout>
