<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
                <!-- Start coding here -->
                <x-data-table resource="user">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th></th>
                            <th scope="col" class="px-4 py-3">Id</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">email</th>
                            <th scope="col" class="px-4 py-3">phone number</th>
                            <th scope="col" class="px-4 py-3">date of birth</th>
                            <th scope="col" class="px-4 py-3">gender</th>
                            <th scope="col" class="px-4 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b ">
                            <td class="px-4 py-3"><input id="check" type="checkbox" value="{{ $user->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 "></td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $user->id }} </th>
                            <td class="px-4 py-3">{{ $user->first_name.' '.$user->last_name }}</td>
                            <td class="px-4 py-3">{{ $user->email}}</td>
                            <td class="px-4 py-3">{{ $user->phone_number }}</td>
                            <td class="px-4 py-3">{{ $user->date_of_birth }}</td>
                            <td class="px-4 py-3">{{ $user->gender }}</td>
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
                                            
                                            <x-dropdown-link :href="route('milk.edit', $user)">
                                                {{ __('Edit') }}  
                                            </x-dropdown-link>
                                            
                                            <form method="POST" action="{{ route('milk.destroy', $user) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('milk.destroy', $user)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
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
                    <nav class="p-4 mt-3">
                        {{ $users->links() }}
                    </nav>
                </x-data-table>
                
            </div>
            </section>
     </div>
</x-app-layout>