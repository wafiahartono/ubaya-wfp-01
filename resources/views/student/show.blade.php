@extends('layouts.app')
@section('title', 'Student Detail')
@section('content')
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="md:h-auto">
            <img aria-hidden="true" class="object-cover w-full h-full" src="https://my.ubaya.ac.id/img/mhs/{{ $student->nrp }}_l.jpg" />
        </div>
        <div class="flex p-6">
            <div class="w-full">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">NRP</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $student->nrp }}" readonly />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $student->name }}" readonly />
                </label>
            </div>
        </div>
    </div>
@endsection
