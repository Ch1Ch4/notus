<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Product: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image"
                                   class="mt-1 block w-full text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600">

                            @if($product->featuredImage)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $product->featuredImage->image_path) }}" alt="Featured Image" class="w-32 h-32 object-cover">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Images</label>
                            <input type="file" name="images[]" id="images" multiple
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600">
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-wrap space-x-2">
                @foreach($product->images as $image)
                    <div class="mt-2 w-1/4 p-2 relative">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="w-full max-h-24 object-cover rounded-lg">

                        @if($image->is_featured)
                            <span class="absolute top-0 left-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-br-lg">Featured</span>
                        @endif

                        <form action="{{ route('product-images.destroy', $image->id) }}" method="POST" class="mt-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</x-app-layout>
