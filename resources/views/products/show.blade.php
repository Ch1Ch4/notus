<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Product Details: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between">
                        <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Back to Products
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            Edit Product
                        </a>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Product Information</h3>
                        <div class="mt-4">
                            <strong>Name:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $product->name }}</p>
                        </div>

                        <div class="mt-4">
                            <strong>Description:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                        </div>

                        <div class="mt-4">
                            <strong>Price:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $product->price }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
