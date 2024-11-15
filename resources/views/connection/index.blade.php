<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex items-center justify-center mt-4">
                    <a class="px-3 py-2" href="{{ route('login') }}">
                        <img src="{{ asset('img/accounts/facebook.png') }}" alt="Facebook" class="h-6 rounded">
                    </a>
                    <a class="px-3 py-2" href="{{ route('login') }}">
                        <img src="{{ asset('img/accounts/linkedIn.png') }}" alt="LinkedIn" class="h-6 rounded">
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

