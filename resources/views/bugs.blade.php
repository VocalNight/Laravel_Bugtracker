<x-layout>
    <x-slot:heading>
        Bugs
    </x-slot:heading>

    <ul>
        @foreach ($bugs as $bug )
            <li>
                <strong>{{ $bug['title']}} - {{$bug['AssignedTo']}}</strong>
            </li>

        @endforeach
    </ul>

</x-layout>
