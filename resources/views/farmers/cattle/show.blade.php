<x-farmer-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                {{-- insert a div to display the number of cattle --}}
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __($cattle->cattle_name.'\'s records') }}
                    </h2>
                </x-slot>
                <div class="grid grid-cols-3 grid-rows-4 overflow-auto h-auto gap-4">
                    <div class="col-span-1 row-span-1">
                        <img src="https://placehold.co/400x400.png" alt="{{ $cattle->cattle_name.' image' }}">
                    </div>
                    <div class="col-span-2 row-span-1 gap-4 ml-2">
                        
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow w-full hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">                            
                                <div class="flex">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Name:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">{{ $cattle->cattle_name }}</p>
                                </div>

                                @php
                                    // Assuming $cattle is the Cattle model instance with the date_of_birth attribute
                                    $dateOfBirth = $cattle->date_of_birth;
                                    $currentDate = date('Y-m-d');
                                    $age = date_diff(date_create($dateOfBirth), date_create($currentDate))->y;
                                @endphp

                                <div class="flex my-2 py-1">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Age:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">{{ $age.' Years'}}</p>
                                </div>

                                <div class="flex my-2 py-1">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gender:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">{{ $cattle->gender }}</p>
                                </div>

                                <div class="flex my-2 py-1">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Breed:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">{{ $cattle->breed->breed_name }}</p>
                                </div>

                                <div class="flex my-2 py-1">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Children:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">
                                        {{ __($children) }}
                                    </p>
                                </div>

                                <div class="flex my-2 py-3">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Milk Produced:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">
                                    @php
                                        $amount = 0;
                                    @endphp
                                    @foreach($cattle->milk as $milk)
                                        @php
                                        $amount += $milk->quantity
                                        @endphp
                                    @endforeach
                                    {{  __($amount)
                                    }}</p>
                                </div>



                        </div>
                    </div>

                    <div class="row-span-2 col-span-3">
                        {{-- Shows the milk records of the cattle --}}
                        <div class=" relative p-6 bg-white border border-gray-200 rounded-lg shadow w-full dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <x-data-table>
                                
                            </x-data-table>                            
                        </div>

                    </div>
                </div>
            </div>
            </section>
     </div>
     @if(session()->has('success'))
     <div class="fixed top-0 left-1/2 transform -translate-x-1/2 fade show bg-green-500 text-white p-6"
     role="alert" x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
        <strong>Success!</strong> {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif

</x-farmer-layout>