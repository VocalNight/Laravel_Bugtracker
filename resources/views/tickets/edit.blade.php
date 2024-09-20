<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Ticket
        </h2>
    </x-slot>

    <form method="POST" action="/tickets/{{ $bug->id}}">
        @csrf
        @method('PATCH')

        <div class="bg-white dark:bg-gray-800 shadow-md overflow-hidden p-5">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <div class="mt-2">
                            <x-input-label for="title" :value="__('Title')" />
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" autocomplete="title" value="{{$bug->title}}""
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 px-2 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </div>

                            @error('title')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-700 dark:text-gray-300">Ticket Information</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <x-input-label for="description" :value="__('Description')" />
                    <div class="mt-2">
                        <textarea type="text" name="description" id="description"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 px-2 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{$bug->description}}</textarea>
                    </div>
                    @error('description')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <x-input-label for="assigned" :value="__('Assigned To')" />
                    <div class="mt-2">
                        <select id="assigned" name="assigned" value="{{$bug->AssignedTo}}"

                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach ($users as $user)

                                @if ($bug->AssignedTo == $user->id)
                                    <option value="{{$user->id}}" selected>
                                        {{$user['name']}}
                                    </option>
                                @else
                                    <option value="{{$user->id}}">
                                        {{$user['name']}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <a href="/tickets/{{$bug->id}}" type="button" class="text-sm mr-2 font-semibold leading-6 text-gray-900">Cancel</a>

                <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>

        </div>
    </form>

</x-app-layout>
