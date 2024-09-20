<div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">

<div class="table w-full table-fixed border-collapse border-b border-slate-500">
    <div class="table-header-group">
        <div class="table-row border-b border-slate-600">
            @foreach ($tableTitles as $title )
                <div class="table-cell text-left"><strong>{{$title}}</strong></div>
            @endforeach
        </div>
    </div>

    <div class="table-row-group border-b border-slate-600">
        @foreach ($tickets as $ticket )
        <a href="/tickets/{{$ticket->id}}" class="table-row border-b border-slate-600 hover:bg-slate-400">
                <div class="table-cell">
                    {{$ticket->title}}
                </div>
                <div class="table-cell">
                    {{$ticket->assignedTo->name}}
                </div>
            </a>
        @endforeach
    </div>
</div>
</div>
