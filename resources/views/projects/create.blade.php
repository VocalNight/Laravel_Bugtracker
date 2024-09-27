<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Project
        </h2>
    </x-slot>

    <form method="POST" action="/projects">
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

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/tickets/" type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-red-400 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-red-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-red-500 dark:focus:border-blue-700 dark:active:bg-gray-700">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
