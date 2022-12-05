@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Created at</th>
                    <th class="px-4 py-3">Updated at</th>
                    <th class="px-4 py-3">Name</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($roles as $role)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">
                            {{ $role->id }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $role->created_at }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $role->updated_at }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $role->name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
