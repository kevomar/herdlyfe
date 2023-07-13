<x-farmer-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                {{-- insert a div to display the number of cattle --}}
                @if($cattle)
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __($cattle->cattle_name.'\'s records') }}
                    </h2>
                </x-slot>
                <div class="grid grid-cols-3 grid-rows-4 overflow-auto gap-4">
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
                                @if($cattle->gender == 'cow')
                                <div class="flex my-2 py-3">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Milk Produced:</h5>
                                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400 ml-4 pt-1">
                                    {{  __($amount)
                                    }}</p>
                                </div>
                                @endif



                        </div>
                    </div>

                    <div class="row-span-1 col-span-3 overflow-y-visible h-auto">
                        {{-- Shows the milk records of the cattle --}}
                        @if($cattle->gender == "cow")
                        <div class="font-bold text-2xl">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Milk Records') }}
                            </h2>
                        </div>
                        <x-data-table class="h-full">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Cattle</th>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                    <th scope="col" class="px-4 py-3">Shift</th>
                                    <th scope="col" class="px-4 py-3">Quantity</th>
                                </tr>
                            </thead>
                            <tbody class="min-h-full">
                                @if($milks->count() > 0)
                                    @foreach($milks as $milk)
                                    <!--Check if there are milk reecords-->
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $milk->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"></td>
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $milk->id }} </th>
                                        <td class="px-4 py-3">{{ $milk->cattle->cattle_name }}</td>
                                        <td class="px-4 py-3">{{ $milk->date}}</td>
                                        <td class="px-4 py-3">{{ $milk->shift }}</td>
                                        <td class="px-4 py-3">{{ $milk->quantity }}</td>s
                                    </tr>
                                    @endforeach
                                    @for($i = 0; $i < 5; $i++)
                                    <!--Add empty rows to fill the table-->
                                    <tr></tr>
                                    @endfor
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ __('No milk records yet') }}
                                            </h1>
                                        </td>
                                    </tr>
                                @endif
                                
                            </tbody>
                            
                        </x-data-table>                            
                        @endif

                    </div>

                    <div class="row-span-1 col-span-3 overflow-auto h-auto">
                        {{-- Shows the health records of the cattle --}}
                        @if($cattle->gender == "cow")
                        <div class="font-bold text-2xl">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Health Records') }}
                            </h2>
                        </div>
                        <x-data-table class="h-full">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Cattle Name</th>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                    <th scope="col" class="px-4 py-3">Disease</th>
                                    <th scope="col" class="px-4 py-3">Treatment</th>
                                    <th scope="col" class="px-4 py-3">type</th>
                                </tr>
                            </thead>
                            <tbody class="h-full">
                                @if($medicals->count() > 0)
                                    @foreach($medicals as $medical)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $medical->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"></td>
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $medical->id }} </th>
                                        <td class="px-4 py-3">{{ $medical->cattle->cattle_name }}</td>
                                        <td class="px-4 py-3">{{ $medical->date }}</td>
                                        <td class="px-4 py-3">{{ $medical->disease }}</td>
                                        <td class="px-4 py-3">{{ $medical->treatment }}</td>
                                        <td class="px-4 py-3">{{ $medical->type }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ __('No Health records yet') }}
                                            </h1>
                                        </td>
                                    </tr>
                                @endif
                                
                            </tbody>
                            
                        </x-data-table>                            
                        @endif

                    </div>

                    <div class="row-span-1 col-span-3 overflow-auto h-auto">
                        {{-- Shows the breeding records of the cattle --}}
                        @if($cattle->gender == "cow")
                        <div class="font-bold text-2xl">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Breeding Records') }}
                            </h2>
                        </div>
                        <x-data-table>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Cow</th>
                                    <th scope="col" class="px-4 py-3">Sire</th>
                                    <th scope="col" class="px-4 py-3">Breeding Date</th>
                                    <th scope="col" class="px-4 py-3">Expected date of delivery</th>
                                    <th scope="col" class="px-4 py-3">Actual date of delivery</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($breedings->count() > 0)
                                    @foreach($breedings as $breeding)

                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $breeding->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"></td>
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $breeding->id }} </th>
                                        <td class="px-4 py-3">{{ $breeding->cattle->cattle_name }}</td>
                                        <td class="px-4 py-3">{{ $breeding->sire->cattle_name }}</td>
                                        <td class="px-4 py-3">{{ $breeding->date_of_breeding }}</td>
                                        <td class="px-4 py-3">{{ $breeding->expected_date_of_delivery }}</td>
                                        <td class="px-4 py-3">{{ $breeding->actual_date_of_delivery }}</td>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ __('No Breeding records yet') }}
                                            </h1>
                                        </td>
                                    </tr>
                                @endif
                                
                            </tbody>
                            
                        </x-data-table>                            
                        @endif

                    </div>
                </div>
                @else
                <div class="flex justify-center">
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow w-full hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('No cattle records yet') }}
                        </h1>
                    </div>
                @endif
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