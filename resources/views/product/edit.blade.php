@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="w-full md:w-1/2">
        <form method="POST" action="{{ route('products.update', $product->id)  }}">
            @method('PUT')
            @csrf
            <label class=" block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="name"
                    value="{{ $product->name }}"/>
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Category</span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="category">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" @selected($category->id == $product->category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </label>
            <button type="submit"
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </form>
    </div>
@endsection
