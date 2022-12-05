@extends('layouts.app')
@section('title', 'Users')
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
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Roles</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($users as $user)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">
                            {{ $user->id }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->created_at }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->updated_at }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-3">
                            @foreach($user->roles as $role)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $role->name }}
                                </span>
                                <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
