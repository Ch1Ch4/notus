<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Category Details: {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between">
                        <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Back to Categories
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            Edit Category
                        </a>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Category Information</h3>
                        <div class="mt-4">
                            <strong>Name:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $category->name }}</p>
                        </div>

                        <div class="mt-4">
                            <strong>Parent:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">
                                {{ $category->parent ? $category->parent->name : 'None' }}
                            </p>
                        </div>

                        <div class="mt-4">
                            <strong>Children:</strong>
                            @if($category->children->isEmpty())
                                <p class="mt-2 text-gray-700 dark:text-gray-300">No children</p>
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ route('categories.show', $child->id) }}" class="text-blue-500 hover:text-blue-700">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
