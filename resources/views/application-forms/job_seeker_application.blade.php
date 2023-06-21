<x-visitor-layout>
   
  <div class="flex justify-center mt-10">
    <h1 class="bold text-xl"> APPLICATION FORM JOB SEEKER </h1>
  </div>
  
      <div class=" mx-auto max-w-6xl py-20 px-12 lg:px-24  mb-24">
        <form>
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="-mx-3 md:flex flex-col mb-6">
              <div class="flex">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                    First Name
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company" type="text" placeholder="First Name">
                  
                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                    Last Name
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Last Name">
                </div>
              </div>
                
              <div class="flex">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                    Email
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company" type="text" placeholder="Email">
                  
                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                  Tel
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Tel">
                </div>

              
            </div>

            <div class="flex">

              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                  Gender
                </label>
                <div>
                  <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="location">
                    <option>Male</option>
                    <option>Female</option>
                    <option>None of the above</option>
                  </select>
                </div>

              </div>
              <div class="md:w-1/2 px-3">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                Location
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Stockholm, Sweden">
              </div>
          
          </div>


          <div class="flex">

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                Do you wish to work remotely?
              </label>
              <div>
                <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="location">
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>

            </div>
            <div class="md:w-1/2 px-3">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
              Are you currently working?
              </label>
              <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="location">
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>
        
        </div>

        <div class="flex">

          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              Fields you wish to work in
            </label>
            <div>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="text" placeholder="Real Estate">

            </div>

          </div>
          
      
        </div>


            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-6">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                  LinkedIn Profile (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="text" placeholder="">
              </div>

              <div class="md:w-full px-3">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                  Website (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="text" placeholder="">
              </div>

              <div class="md:w-full px-6">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                  Github profile (Optional)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="text" placeholder="">
              </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
              <div class=" flex flex-col">
                
                <div class="px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="job-type">
                    Job Type*
                  </label>
                  <div>
                    <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="job-type">
                      <option>Full-Time</option>
                      <option>Part-Time</option>
                      <option>Internship</option>
                    </select>
                  </div>
                </div>

                <div class="px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="job-type">
                    Attachments
                  </label>
                  <div>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="file" multiple>
                  </div>
                </div>
                
                <div class=" px-6">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="job-type">
                    Introduction Video
                  </label>
                  <div>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="file" multiple>
                  </div>
                </div>
              </div>

              <div class=" w-full">
                <div class="px-3 mb-6 md:mb-0">
                  <label class="uppercase h-full tracking-wide text-black text-xs font-bold mb-2" for="company">
                    Additional Information (Optional)
                  </label>
                  <div>
                    <textarea rows="10" class="w-full bg-gray-200 h-48 text-black border border-gray-200 rounded py-3 px-4 mb-3 block mt-0" >
        
                    </textarea>
                  </div>
                </div>
                
            
              </div>
            </div>
            <div class="-mx-3 md:flex mt-2">
              <div class="md:w-full px-3">
                <button class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                  Submit Application
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    

</x-visitor-layout>
