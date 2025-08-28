<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <input type="text" name="name" id="name"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="course" class="block text-sm font-medium text-white">Course</label>
                        <input type="text" name="course" id="course"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Save
                    </button>
                    <a href="{{ route('students.index') }}"
                       class="ml-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

