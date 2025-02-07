<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Comment: {{ $comment->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="product_id" value="{{ $comment->product_id }}">

                        <div class="mb-4">
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment author</label>
                            <input type="text" name="author" id="author" value="{{ old('author', $comment->author) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $comment->email) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment content</label>
                            <input type="text" name="content" id="content" value="{{ old('name', $comment->content) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="is_approved" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Approved Status
                            </label>
                            <select name="is_approved" id="is_approved"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600">
                                <option value="1" {{ old('is_approved', $comment->is_approved) == 1 ? 'selected' : '' }}>Approved</option>
                                <option value="0" {{ old('is_approved', $comment->is_approved) == 0 ? 'selected' : '' }}>Not Approved</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rating (1-5)
                            </label>
                            <select name="rating" id="rating"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600">
                                <option value="" {{ is_null(old('rating', $comment->rating)) ? 'selected' : '' }}>No Rating</option>
                                <option value="1" {{ old('rating', $comment->rating) == 1 ? 'selected' : '' }}>1 - Poor</option>
                                <option value="2" {{ old('rating', $comment->rating) == 2 ? 'selected' : '' }}>2 - Fair</option>
                                <option value="3" {{ old('rating', $comment->rating) == 3 ? 'selected' : '' }}>3 - Good</option>
                                <option value="4" {{ old('rating', $comment->rating) == 4 ? 'selected' : '' }}>4 - Very Good</option>
                                <option value="5" {{ old('rating', $comment->rating) == 5 ? 'selected' : '' }}>5 - Excellent</option>
                            </select>
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('comments.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Update Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
