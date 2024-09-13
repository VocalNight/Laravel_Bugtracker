<x-layout>
    <x-slot:heading>
        Tickets
    </x-slot:heading>

    <table class="table-fixed border-collapse border-b border-slate-500 min-w-full">
        <thead>
            <tr>
                <th class="border-b border-slate-600">Title</th>
                <th class="border-b border-slate-600">Assigned To</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bugs as $bug )
                <tr class="border-b border-slate-600">
                    <td class=""><strong>{{ $bug['title']}}</strong></td>
                    <td><strong>{{$bug->assignedTo['name']}}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="m-2">
        {{$bugs->links()}}
    </div>
</x-layout>
