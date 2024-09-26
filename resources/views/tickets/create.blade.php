<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Ticket
        </h2>
    </x-slot>

    <form method="POST" action="/tickets">
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="title" />
                    </div>

                    @error('title')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <h2 class="text-base font-semibold leading-7 text-gray-50">Ticket Information</h2>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="mt-1 flex-col gap-x-6">
                        <div class="max-w-xl">
                            <x-input-label for="description" :value="__('Description')" />
                            <div class="pt-2">
                                <textarea type="text" name="description" id="description" rows="10" cols="50"
                                    class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                            </div>
                            @error('description')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="max-w-xl pt-3">
                            <x-input-label for="assigned" :value="__('Assigned To')" />

                            <div class="mt-2">
                                <select id="assigned" name="assigned" autocomplete="country-name"
                                    class="block w-full px-3 py-1.5 text-gray-900 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:max-w-xs sm:text-sm sm:leading-6 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300  dark:focus:border-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @foreach ($users as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/tickets/" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-red-400 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-red-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-red-500 dark:focus:border-blue-700 dark:active:bg-gray-700">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </div>




    </form>

</x-app-layout>
