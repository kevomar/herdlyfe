<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('milk.update', $milk) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="cattle_id" :value="__('Cattle')" />
                            <select name="cattle_id" id="cattle_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                                @foreach ($cattles as $cattle)
                                    @if($cattle->id == $milk->cattle_id)
                                        <option value="{{ $cattle->id }}" selected>{{ $cattle->cattle_name }}</option>
                                    @else
                                        <option value="{{ $cattle->id }}">{{ $cattle->cattle_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('cattle_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="quantity" :value="__('Milk amount')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{ $milk->quantity }}" required />
                            <p class="flex text-gray-500 text-sm font-medium p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                {{ __(' Amount should be provided in liters') }}
                            </p>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="date" :value="__('Date')" />
                            <input id="date" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="date" name="date" value={{ $milk->date }} required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="shift" :value="__('Time')" />
                            <select name="shift" id="shift" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                                <option value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select>
                            <x-input-error :messages="$errors->get('shift')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ url()->previous() }}" class="text-indigo-500 hover:text-indigo-700"> Back</a>
                            <x-primary-button class="ml-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
