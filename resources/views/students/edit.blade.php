<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('students.update', $student->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ $student->name }}"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email"
                               value="{{ $student->email }}"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="course" class="block text-sm font-medium text-white">Course</label>
                        <input type="text" name="course" id="course"
                               value="{{ $student->course }}"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Update
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

