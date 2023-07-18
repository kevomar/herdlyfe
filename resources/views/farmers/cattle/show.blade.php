<x-app-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                {{-- insert a div to display the number of cattle --}}
                <x-slot name="header">
                    <a href="{{ url()->previous() }}" class="float-left mr-5 text-indigo-500 hover:text-indigo-700">back</a>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __($cattle->cattle_name.'\'s records') }}
                    </h2>
                </x-slot>
                <div class="grid grid-cols-3 overflow-auto gap-4">
                    <div class="col-span-1 row-span-1">
                        {{-- https://placehold.co/400x400.png --}}
                        <img src="{{ $cattle->image ? asset('storage/'.$cattle->image) : 'https://placehold.co/400x400.png' }}" alt="{{ $cattle->cattle_name.' image' }}">
                    </div>
                    <div class="col-span-2 row-span-1 gap-4 ml-2">
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow w-full hover:bg-gray-100">
                            <div class="flex">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Name:</h5>
                                <p class="font-normal text-xl text-gray-700 ml-4 pt-1">{{ $cattle->cattle_name }}</p>
                            </div>
                            @php
                                // Assuming $cattle is the Cattle model instance with the date_of_birth attribute
                                $dateOfBirth = $cattle->date_of_birth;
                                $currentDate = date('Y-m-d');
                                $age = date_diff(date_create($dateOfBirth), date_create($currentDate))->y;
                            @endphp
                            <div class="flex my-2 py-1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Age:</h5>
                                <p class="font-normal text-xl text-gray-700 ml-4 pt-1">{{ $age.' Years'}}</p>
                            </div>
                            <div class="flex my-2 py-1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Gender:</h5>
                                <p class="font-normal text-xl text-gray-700 ml-4 pt-1">{{ $cattle->gender }}</p>
                            </div>
                            <div class="flex my-2 py-1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Breed:</h5>
                                <p class="font-normal text-xl text-gray-700 ml-4 pt-1">{{ $cattle->breed->breed_name }}</p>
                            </div>

                            <div class="flex my-2 py-1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Milk Produced:</h5>
                                <p class="font-normal text-xl text-gray-700 ml-4 pt-1">
                                    {{  __($amount) }}
                                </p>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="row-span-1 col-span-3 overflow-y-visible h-auto mt-3">
                    {{-- Shows the milk records of the cattle --}}
                    @if($cattle->gender == "cow")
                    <div class="font-bold text-2xl">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                                <th scope="col" class="px-4 py-3">Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="min-h-full">
                            @if($milks->count() > 0)
                                @foreach($milks as $milk)
                                <!--Check if there are milk records-->
                                <tr class="border-b">
                                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $milk->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2"></td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $milk->id }} </th>
                                    <td class="px-4 py-3">{{ $milk->cattle->cattle_name }}</td>
                                    <td class="px-4 py-3">{{ $milk->date}}</td>
                                    <td class="px-4 py-3">{{ $milk->shift }}</td>
                                    <td class="px-4 py-3">{{ $milk->quantity }}</td>
                                    <td class="px-4 py-3">
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 text-center" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">

                                                <x-dropdown-link :href="route('milk.edit', $milk)">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>

                                                {{-- <form method="POST" action="{{ route('milk.destroy', $milk) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('milk.destroy', $milk)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form> --}}
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                                            {{ __('No milk records yet') }}
                                        </h1>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <nav class="mt-3 p-4">
                        {{ $milks->links() }}
                    </nav>


                    </x-data-table>

                    @endif

                </div>

                <div class="row-span-1 col-span-3 overflow-auto h-auto mt-3">
                    {{-- Shows the health records of the cattle --}}
                    @if($cattle->gender == "cow")
                    <div class="font-bold text-2xl">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                                <th scope="col" class="px-4 py-3">Type</th>
                            </tr>
                        </thead>
                        <tbody class="h-full">
                            @if($medicals->count() > 0)
                                @foreach($medicals as $medical)
                                <tr class="border-b">
                                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $medical->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2"></td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $medical->id }} </th>
                                    <td class="px-4 py-3">{{ $medical->cattle->cattle_name }}</td>
                                    <td class="px-4 py-3">{{ $medical->date }}</td>
                                    <td class="px-4 py-3">{{ $medical->disease }}</td>
                                    <td class="px-4 py-3">{{ $medical->treatment }}</td>
                                    <td class="px-4 py-3">{{ $medical->medicine_type }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                                            {{ __('No Health records yet') }}
                                        </h1>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <nav class="mt-3 p-4">
                        {{ $medicals->links() }}
                    </nav>

                    </x-data-table>
                    @endif

                </div>
            </div>
            </section>
     </div>
</x-app-layout>
