@php
    $tableTitles = ['test1', 'test2'];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tickets
        </h2>
    </x-slot>

    <!--<table class="table-fixed border-collapse border-b border-slate-500 min-w-full">
        <thead>
            <tr>
                <th class="border-b border-slate-600">Title</th>
                <th class="border-b border-slate-600">Assigned To</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bugs as $bug )
                <tr class="border-b border-slate-600 hover:bg-slate-400">

                        <td class=""><strong>{{ $bug->title}}</strong></td>
                        <td><strong>{{$bug->assignedTo->name}}</strong></td>

                </tr>
            @endforeach
        </tbody>
    </table> -->
    <x-customTable :tableTitles="$tableTitles" :tickets="$bugs">
    </x-customTable>

    <div class="m-2">
        {{$bugs->links()}}
    </div>

</x-app-layout>
