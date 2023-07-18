<x-farmer-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('market.place', $cattle->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <x-input-label for="cattle" :value="__('Cattle')" />
                            <x-text-input id="cattle" class="block mt-1 w-full" type="text" name="cattle" value="{{ $cattle->cattle_name }}" required disabled/>
                            <x-input-error :messages="$errors->get('cattle')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for='price' :value="__('Price')" />
                            <x-text-input id="price" name="price" class="block mt-1 w-full" type="text" required />
                        </div>
                        <div class="mt-1 flex justify-end">
                            <x-primary-button>
                                {{ __('Put up for Sale') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-farmer-layout>
