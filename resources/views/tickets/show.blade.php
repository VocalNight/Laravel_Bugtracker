<x-layout>
    <x-slot:heading>
        Create Ticket
    </x-slot:heading>

    <form>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" autocomplete="title" value={{$bug->title}}
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 px-3 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" disabled>
                            </div>
                        </div>
                    </div>
                </div>
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
</x-layout>
