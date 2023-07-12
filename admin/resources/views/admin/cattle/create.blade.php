<x-farmer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Cattle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cattle.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="cattle_name" :value="__('Cattle Name')" />
                            <x-text-input type="text" name="cattle_name" id="cattle_name" class="block mt-1 w-full" :value="old('cattle_name')" required />
                            <x-input-error :messages="$errors->get('cattle_name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                            <x-text-input type="date" name="date_of_birth" id="date_of_birth" class="block mt-1 w-full" :value="old('date_of_birth')" required />
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="breed" :value="__('Breed')" />
                            <select name="breed" id="breed" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                @foreach($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->breed_name }}</option>
                                @endforeach    
                            </select>
                            <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                        </div>

                        {{-- <div class="mb-4">
                            <x-input-label for="herd" :value="__('Herd')" />
                            <select name="herd" id="herd" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                @foreach($herds as $herd)
                                    <option value="{{ $herd->id }}">{{ $herd->herd_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('herd')" class="mt-2" />
                        </div> --}}

                        <div class="mb-4">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="bull">Bull</option>
                                <option value="cow">Cow</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="alive">Alive</option>
                                <option value="dead">Dead</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
