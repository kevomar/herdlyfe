<x-app-layout>

                <!-- Start coding here -->
                {{-- insert a div to display the number of cattle --}}
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                        {{ __('My Cattle') }}
                    </h2>
                </x-slot>
            
                <div class="flex justify-around mb-3">
                    <div class="mb-3 w-1/3 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  text-center">Number of cattle</h5>
                        <p class="font-normal text-gray-700  text-center">{{ $cattles->total() }}</p>
                    </div>
                    <div class="mb-3 w-1/3 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  text-center">Males: </h5>
                        <p class="font-normal text-gray-700  text-center">{{ $maleCount }}</p>
                    </div>
                    <div class="mb-3 w-1/3 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">Average age:</h5>
                        <p class="font-normal text-gray-700 text-center">{{ $averageAge.' Years' }}</p>
                    </div>

                </div>
                
                <x-data-table buttonName="Cattle" resource="cattle">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Owner</th>
                                    <th scope="col" class="px-4 py-3">Breed</th>
                                    <th scope="col" class="px-4 py-3">Age</th>
                                    <th scope="col" class="px-4 py-3">Gender</th>
                                    <th scope="col" class="px-4 py-3">Status</th>
                                    <th scope="col" class="px-4 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cattles as $cattle)
                                <tr class="border-b">
                                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $cattle->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 "></td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $cattle->id }} </th>
                                    <td class="px-4 py-3">{{ $cattle->cattle_name }}</td>
                                    <td class="px-4 py-3">{{ $cattle->herd->user->first_name.''.$cattle->herd->user->last_name }}</td>
                                    <td class="px-4 py-3">{{ $cattle->breed->breed_name }}</td>
                                    @php
                                        // Assuming $cattle is the Cattle model instance with the date_of_birth attribute
                                        $dateOfBirth = $cattle->date_of_birth;
                                        $currentDate = date('Y-m-d');
                                        $age = date_diff(date_create($dateOfBirth), date_create($currentDate))->y;
                                    @endphp
                                    <td class="px-4 py-3">{{ $age }}</td>
                                    <td class="px-4 py-3">{{ $cattle->gender }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 font-semibold leading-tight {{ $cattle->status == 'alive' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} rounded-full">
                                            {{ $cattle->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 flex items-center">
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 text-center" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('cattle.show', $cattle)">
                                                    {{ __('Show '.$cattle->id) }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('cattle.edit', $cattle)">
                                                    {{ __('Edit') }}  
                                                </x-dropdown-link>

                                                <form method="POST" action="{{ route('cattle.destroy', $cattle) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('cattle.destroy', $cattle)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>

                                    </td>
                                </tr>

                                
                                
                                @endforeach
                               
                            </tbody>
                        </table>
                            <nav class="p-4 mt-10" aria-label="Table navigation">
                                {{ $cattles->links('vendor.pagination.simple-bootstrap-4') }}
                            </nav>
                        </x-data-table>
                </div>
            </div>
            </section>
     </div>
    

</x-app-layout>