@extends('layouts.app')
@section('title', 'User Detail')
@section('content')
    <div class="w-full">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ $user->name }}" readonly/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Email</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ $user->email }}" readonly/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Roles</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ implode(', ', $user->roles->pluck('name')->toArray()) }}" readonly/>
        </label>
    </div>
@endsection
