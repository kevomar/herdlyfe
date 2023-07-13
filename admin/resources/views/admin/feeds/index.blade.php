<x-app-layout>

    <!-- Start coding here -->
    {{-- insert a div to display the number of cattle --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('feed records') }}
        </h2>
    </x-slot>
    
    <x-data-table buttonName="Feed" resource="feeds">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th></th>
                        <th scope="col" class="px-4 py-3">Id</th>
                        <th scope="col" class="px-4 py-3">Farmer</th>
                        <th scope="col" class="px-4 py-3">Date of Purchase</th>
                        <th scope="col" class="px-4 py-3">Quantity</th>
                        <th scope="col" class="px-4 py-3">Unit Price</th>
                        <th scope="col" class="px-4 py-3">Total Price</th>
                        <th scope="col" class="px-4 py-3">
                            <span>Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($feeds->count() > 0)
                        @foreach($feeds as $feed)
                    <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $feed->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500"></td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $feed->id }} </th>
                            <td class="px-4 py-3">{{ $feed->herd->user->first_name.' '.$feed->herd->user->last_name }}</td>
                            <td class="px-4 py-3">{{ $feed->purchase_date}}</td>
                            <td class="px-4 py-3">{{ $feed->quantity }}</td>
                            <td class="px-4 py-3">{{ $feed->unit_price }}</td>
                            <td class="px-4 py-3">{{ $feed->total_price }}</td>
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
                                            
                                            <x-dropdown-link :href="route('feeds.edit', $feed)">
                                                {{ __('Edit') }}  
                                            </x-dropdown-link>
                                            
                                            <form method="POST" action="{{ route('feeds.destroy', $feed) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('feeds.destroy', $feed)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="font-bold text-3xl block items-center">
                            <td></td>
                            <td></td>
                            <td>
                                No feed records Available
                            </td>
                        </tr>
                    @endif
                   
                </tbody>
            </table>
                <nav class="p-4 mt-10" aria-label="Table navigation">
                    {{ $feeds->links() }}
                </nav>
            </x-data-table>
    </div>
</div>
</section>
</div>


</x-app-layout>