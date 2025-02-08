<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-medium">Product List</h3>
                        <a href="{{ route('products.create') }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Add New Product
                        </a>
                    </div>

                    <table class="min-w-full bg-white dark:bg-gray-700 w-full">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-700">
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Description</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Categories</th>
                            <th class="px-4 py-2 text-left">Images</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr class="border-t dark:border-gray-600">
                                <td class="px-4 py-2">{{ $product->id }}</td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->description }}</td>
                                <td class="px-4 py-2">{{ $product->price }}</td>
                                <td class="px-4 py-2">
                                    @foreach($product->categories as $category)
                                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $category->name }}</span>@if(!$loop->last), @endif
                                    @endforeach
                                </td>
                                @if($product->featuredImage)
                                    <td class="px-4 py-2">
                                        <img src="{{ asset('storage/' . $product->featuredImage->image_path) }}" alt="Featured Image" class="w-12 h-12 object-cover">
                                    </td>
                                @else
                                    <td class="px-4 py-2">
                                    </td>
                                @endif

                                <td class="flex gap-3 w-full px-4 py-2">
                                    <a href="{{ route('products.show', $products) }}" class="hover:underline">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');">
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

                    @if ($products->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400 mt-4">No products found.</p>
                    @endif

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
