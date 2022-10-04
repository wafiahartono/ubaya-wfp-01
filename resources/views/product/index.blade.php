<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}"/>
</head>

<body>
<div class="container grid px-6 mx-auto">
    <div class="hidden w-full mt-6 mb-6 mx-auto max-w-xl overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3">Created at</th>
                    <th class="px-4 py-3">Updated at</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($products as $product)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{ $product->name }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ 'ID ' . $product->id . ' · Category ' . $product->category_id }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->created_at ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->updated_at ?? '-' }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="grid gap-6 mt-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($products as $product)
            <div>
                <div class="flex items-end bg-white rounded-lg shadow-xs dark:bg-gray-800"
                     style="height: 12rem; background: url('{{ asset('images/' . $product->picture) }}') center;background-size: cover">
                </div>
                <div class="mt-2">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $product->name }}</p>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ 'ID ' . $product->id . ' · Category ' . $product->category_id }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>

</html>
