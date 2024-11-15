<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen">

                <div class="flex flex-cols-4 gap-4 p-6">
                    @foreach ($accounts as $account)
                    <div class="flex flex-col items-center">
                        <img src="{{ asset("img/accounts/$account->slug.png") }}" alt="{{ $account->name }}" class="h-12 w-12 rounded">
                        <a href="{{ route('account.redirect', $account->slug) }}" class="px-3 py-2 bg-sky-500/100 text-center rounded-md">Connect</a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

