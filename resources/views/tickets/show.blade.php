<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Viewing Ticket: {{$bug->title}}
        </h2>
    </x-slot>

    <form>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" @disabled(true) value={{$bug->title}}/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Ticket Information</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea type="text" name="description" id="description"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 px-2 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled>{{$bug->description}}</textarea>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="assigned" class="block text-sm font-medium leading-6 text-gray-900">Assigned To</label>
                    <div class="mt-2">
                        <select id="assigned" name="assigned" autocomplete="country-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" disabled>
                            <option value="{{$bug->AssignedTo}}" selected>{{$user->name}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

   <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center">
        <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
    </div>
    <div>
        <x-button href="/tickets/{{$bug->id}}/edit">Edit Ticket</x-button>
    </div>

</div>

   <form method="POST" action="/tickets/{{$bug->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>
