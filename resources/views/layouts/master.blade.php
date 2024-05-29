<x-app-layout>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <x-sidebar :name="$attributes['name']"></x-sidebar>
        <div class="flex flex-col flex-1 w-full">
            <x-header :headerName="$attributes['headerName']">
            </x-header>
            {{ $slot }}
        </div>
</x-app-layout>
