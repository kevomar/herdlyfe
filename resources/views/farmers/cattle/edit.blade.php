<x-farmer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit '.$cattle->cattle_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form action="{{route('cattle.update', $cattle)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-input-label for="cattle_name" :value="__('Cattle Name')" />
                        <input type="text" name="cattle_name" id="cattle_name" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" value={{ $cattle->cattle_name }} required />
                        <x-input-error :messages="$errors->get('cattle_name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                        <input type="date" name="date_of_birth" id="date_of_birth" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" value={{ $cattle->date_of_birth }} required />
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="breed" :value="__('Breed')" />
                        <select name="breed" id="breed" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" value={{ $cattle->breed->breed_name }} required>
                            @foreach ($breeds as $breed)
                                @if($breed->id == $cattle->breed->id)
                                    <option value="{{ $breed->id }}" selected>{{ $breed->breed_name }}</option>
                                @else
                                    <option value="{{ $breed->id }}">{{ $breed->breed_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value={{ $cattle->gender }} required>
                            @if($cattle->gender == 'cow')
                                <option value="cow" selected>cow</option>
                                <option value="bull">bull</option>
                            @elseif($cattle->gender == 'bull')
                                <option value="cow">cow</option>
                                <option value="bull" selected>bull</option>
                            @else
                                <option value="cow">cow</option>
                                <option value="bull">bull</option>
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="image" :value="__('Upload Image')" />
                        <x-text-input  type="file" name="image" :value="old('image', $cattle->image)" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4 col-span-2 w-3/4 ml-10">

                        <a href="{{ url()->previous() }}" class="text-indigo-500 hover:text-indigo-700"> Back</a>
                        <x-primary-button class="mr-4 ">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-farmer-layout>
