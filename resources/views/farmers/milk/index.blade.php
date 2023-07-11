<x-farmer-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <x-data-table buttonName="Milk" resource="milk">
                    <div class="overflow-x-auto h-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-4 py-3">Id</th>
                                    <th scope="col" class="px-4 py-3">Cattle</th>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                    <th scope="col" class="px-4 py-3">Shift</th>
                                    <th scope="col" class="px-4 py-3">Quantity</th>
                                    <th scope="col" class="px-4 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($milks as $milk)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $milk->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"></td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $milk->id }} </th>
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
                                                @if ($milk->cattle->herd->user->is(auth()->user()))
                                                <x-dropdown-link :href="route('milk.edit', $milk)">
                                                    {{ __('Edit') }}  
                                                </x-dropdown-link>
                                                
                                                <form method="POST" action="{{ route('milk.destroy', $milk) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('milk.destroy', $milk)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                                @endif
                                            </x-slot>
                                        </x-dropdown>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <nav class="p-4 mt-3" aria-label="Table navigation">
                        {{ $milks->links() }}
                    </nav>
                </x-data-table>
            </div>
            </section>
     </div>
</x-farmer-layout>