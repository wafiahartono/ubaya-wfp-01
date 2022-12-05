@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="flex space-x-4">
        <button
            @click="showCreateProductModal"
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            New Product
        </button>
        <a
            href="{{ route('products.create') }}"
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            New Product Page
        </a>
    </div>
    @if ($view === 'grid')
        <div class="mt-4 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($products as $product)
                <div>
                    <div class="flex items-end bg-white rounded-lg shadow-xs dark:bg-gray-800"
                         style="height: 12rem; background: url('https://picsum.photos/seed/{{ $product->name }}/200/300') center; background-size: cover">
                    </div>
                    <div class="mt-2">
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $product->name }}</p>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ 'ID ' . $product->id . ' · ' . $product->category->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="mt-4 w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table id="table-products" class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Created at</th>
                        <th class="px-4 py-3">Updated at</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($products as $product)
                        <tr data-id="{{ $product->id  }}" class="text-gray-700 dark:text-gray-400 text-sm">
                            <td class="px-4 py-3">
                                {{ $product->id }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->created_at }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->updated_at }}
                            </td>
                            <td @click="showAddToCartModal"
                                class="px-4 py-3 font-semibold cursor-pointer hover:underline">
                                {{ $product->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->category->name }}
                            </td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        @click="showEditProductModal"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                    <button
                                        @click="showDeleteProductModal"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <a
                                        href="{{ route('products.edit', $product)  }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                        Edit Page
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
