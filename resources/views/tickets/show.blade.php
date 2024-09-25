<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Viewing Ticket: {{ $bug->title }}
        </h2>
    </x-slot>

    <form>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="title" :disabled="true" :value="old('title', $bug->title)" />

                    </div>
                </div>

                <h2 class="text-base font-semibold leading-7 text-gray-50">Ticket Information</h2>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="mt-1 flex-col gap-x-6">
                        <div class="max-w-xl">
                            <x-input-label for="description" :value="__('Description')" />
                            <div class="pt-2">
                                <textarea type="text" name="description" id="description" rows="10" cols="50"
                                    class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" disabled>{{ $bug->description }}</textarea>
                            </div>
                        </div>

                        <div class="max-w-xl pt-3">
                            <x-input-label for="assigned" :value="__('Assigned To')" />

                            <div class="mt-2">
                                <select id="assigned" name="assigned" autocomplete="country-name"
                                    class="block w-full px-3 py-1.5 text-gray-900 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:max-w-xs sm:text-sm sm:leading-6 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300  dark:focus:border-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    disabled>
                                    <option value="{{ $bug->AssignedTo }}" selected>{{ $user->name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" flex items-center gap-x-6">
                    <div class="flex items-center">
                        <x-deleteButton form="delete-form">Delete</x-deleteButton>
                    </div>
                    <div>
                        <x-button href="/tickets/{{ $bug->id }}/edit">Edit Ticket</x-button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/tickets/{{ $bug->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>
