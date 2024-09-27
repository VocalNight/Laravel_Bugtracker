@php
    $tableTitles = ['Title', 'Tickets'];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Projects
        </h2>
    </x-slot>

    <x-customTable :tableTitles="$tableTitles" :tickets="$bugs">
    </x-customTable>

    <div class="m-2">
        {{$bugs->links()}}
    </div>

</x-app-layout>
