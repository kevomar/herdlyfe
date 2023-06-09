<x-farmer-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Cattle') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('feeds.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <x-input-label for="feed_name" :value="__('Name')"/>
                            <x-text-input id="feed_name" class="block mt-1 w-full" type="text" name="feed_name" value="{{ $feed->feed_name }}" required />
                            <x-input-error :messages="$errors->get('feed_name')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{ $feed->quantity }}" required />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="purchase_date" :value="__('Date')" />
                            <input id="purchase_date" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" type="date" name="date" value="{{ $feed->purchase_date }}" required />
                            <x-input-error :messages="$errors->get('purchase_date')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="unit_price" :value="__('Unit Price')" />
                            <x-text-input id="unit_price" class="block mt-1 w-full" type="number" name="unit_price" value="{{ $feed->unit_price }}" required />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
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
