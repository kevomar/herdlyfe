<x-farmer-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('medical.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <x-input-label for="cattle_id" :value="__('Cattle')" />
                            <select name="cattle_id" id="cattle_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach ($cattles as $cattle)
                                    <option value="{{ $cattle->id }}">{{ $cattle->cattle_name }}</option>
                                    
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('cattle_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="disease" :value="__('Disease')" />
                            <x-text-input id="disease" class="block mt-1 w-full" type="text" name="disease" :value="old('disease')" required />
                            <x-input-error :messages="$errors->get('disease')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="treatment" :value="__('Treatment')" />
                            <x-text-input id="treatment" class="block mt-1 w-full" type="text" name="treatment" :value="old('treatment')" required />
                            <x-input-error :messages="$errors->get('treatment')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="medicine_type" :value="__('Type')" />
                            <select name="medicine_type" id="type" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="vaccination">vaccination</option>
                                <option value="medication">medication</option>
                            </select>
                            <x-input-error :messages="$errors->get('medicine_type')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ url()->previous() }}" class="text-indigo-500 hover:text-indigo-700"> Back</a>
                            <x-primary-button class="ml-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-farmer-layout>