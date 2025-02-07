<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Comments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-medium">Comment List</h3>
                    </div>

                    <table class="min-w-full bg-white dark:bg-gray-700 w-full">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-700">
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Author</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Content</th>
                            <th class="px-4 py-2 text-left">Rating</th>
                            <th class="px-4 py-2 text-left">Approved</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr class="border-t dark:border-gray-600">
                                <td class="px-4 py-2">{{ $comment->id }}</td>
                                <td class="px-4 py-2">{{ $comment->author }}</td>
                                <td class="px-4 py-2">{{ $comment->email }}</td>
                                <td class="px-4 py-2">{{ $comment->content }}</td>
                                <td class="px-4 py-2">
                                    {{ str_repeat('⭐', $comment->rating) }}
                                </td>
                                <td class="px-4 py-2">
                                    @if($comment->is_approved)
                                        <span class="text-green-500">✔️</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </td>
                                <td class="flex gap-3 w-full px-4 py-2">
                                    <a href="{{ route('comments.show', $comment) }}" class="hover:underline">View</a>
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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

                    @if ($comments->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400 mt-4">No comments found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
