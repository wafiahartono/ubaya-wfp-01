@extends('layouts.app')
@section('title', 'Products')
@section('content')
    @if ($view === 'grid')
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($products as $product)
            <div>
                <div class="flex items-end bg-white rounded-lg shadow-xs dark:bg-gray-800" style="height: 12rem; background: url('https://picsum.photos/seed/{{ $product->name }}/200/300') center; background-size: cover">
                </div>
                <div class="mt-2">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $product->name }}</p>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ 'ID ' . $product->id . ' · ' . $product->category->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Created at</th>
                            <th class="px-4 py-3">Updated at</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Name</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $product)
                        <tr class="text-gray-700 dark:text-gray-400 text-sm">
                            <td class="px-4 py-3">
                                {{ $product->id }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->created_at }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->updated_at }}
                            </td>
                            <td class="px-4 py-3 font-semibold">
                                {{ $product->category->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->name }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
