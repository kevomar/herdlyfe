<x-farmer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Medical Records') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                @if($medicals)
                <x-data-table buttonName="medical record" resource="medical">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Cattle Name</th>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                    <th scope="col" class="px-4 py-3">Disease</th>
                                    <th scope="col" class="px-4 py-3">Treatment</th>
                                    <th scope="col" class="px-4 py-3">type</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span>Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($medicals->count() > 0)
                                @foreach($medicals as $medical)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $medical->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"></td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $medical->id }} </th>
                                    <td class="px-4 py-3">{{ $medical->cattle->cattle_name }}</td>
                                    <td class="px-4 py-3">{{ $medical->date }}</td>
                                    <td class="px-4 py-3">{{ $medical->disease }}</td>
                                    <td class="px-4 py-3">{{ $medical->treatment }}</td>
                                    <td class="px-4 py-3">{{ $medical->medicine_type }}</td>
                                    @if($medical->cattle->herd->user->is(Auth::user()))
                                        <td class="px-4 py-3 flex items-center">
                                            <x-dropdown class="relative z-50">
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 text-center" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('medical.edit', $medical)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                        {{-- <form method="POST" action="{{ route('medical.destroy', $medical) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <x-dropdown-link :href="route('medical.destroy', $medical)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                                                {{ __('Delete') }}
                                                            </x-dropdown-link>
                                                        </form> --}}
                                                </x-slot>
                                            </x-dropdown>
                                        </td>
                                    @endif
                                </tr>





                                </div>



                                @endforeach
                                @else
                                    <tr class="font-bold text-3xl block items-center">
                                        <td></td>
                                        <td></td>
                                        <td>
                                            No Medical records Available
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div class="bg-transparent">
                    <nav class="p-4 mt-10" aria-label="Table navigation">
                        {{ $medicals->links() }}
                    </nav>
                </x-data-table>
                @else
                <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow w-full hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('No Medical records yet') }}
                    </h1>

                </div>
                @endif
            </div>
        </section>
    </div>
</x-farmer-layout>
