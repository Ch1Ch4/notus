<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-medium">Category List</h3>
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Add New Category
                        </a>
                    </div>

                    <table class="min-w-full bg-white dark:bg-gray-700 w-full">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-700">
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Parent</th>
                            <th class="px-4 py-2 text-left">Children</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-t dark:border-gray-600">
                                <td class="px-4 py-2">{{ $category->id }}</td>
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">
                                    {{ $category->parent ? $category->parent->name : 'None' }}
                                </td>
                                <td class="px-4 py-2">
                                    @if($category->children->isNotEmpty())
                                        <ul class="list-disc pl-5">
                                            @foreach($category->children as $child)
                                                <li>
                                                    <a href="{{ route('categories.edit', $child->id) }}" class="text-blue-500 hover:underline">
                                                        {{ $child->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>No children</span>
                                    @endif
                                </td>
                                <td class="flex gap-3 w-full px-4 py-2">
                                    <a href="{{ route('categories.show', $category) }}" class="hover:underline">View</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if ($categories->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400 mt-4">No categories found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
