<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors />
                    <x-success-message />

                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div class="mb-4">
                                    <x-label for="company" :value="__('Company')" />
                                    <x-input id="company" class="block mt-1 w-full" type="text" name="company" autofocus />
                                </div>
                                <div class="mb-4">
                                    <x-label for="vat" :value="__('VAT')" />
                                    <x-input id="vat" class="block mt-1 w-full" type="number" name="vat" autofocus />
                                </div>
                                <div class="mb-4">
                                    <x-label for="address" :value="__('Address')"></x-label>
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Add Client') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
