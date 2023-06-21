<x-visitor-layout>

    

    <div class="h-screen w-full flex justify-center items-center">
        <div class=" justify-center w-full sm:w-1/2 md:w-9/12 lg:w-1/2  flex flex-col md:flex-row items-center mx-5 sm:m-0 rounded">
            <div class="w-full gap-4 md:w-1/2 hidden md:flex flex-col justify-center items-center text-white">
                <h1 class="text-3xl">I want to</h1>
                
                <a href="{{ route('login') }}" class="bg-gray-600 text-center font-bold w-1/2 text-white focus:outline-none rounded p-3">
                    LOGIN
                </a>
                
                <a href="{{ route('application-form-job-seeker') }}" class="bg-gray-600 w-1/2 text-center font-bold text-white focus:outline-none rounded p-3 ">
                    APPLY
                </a>
                
            </div>
        </div>
    </div>
</x-visitor-layout>
    