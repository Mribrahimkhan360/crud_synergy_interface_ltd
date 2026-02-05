<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Products</h1>
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Product</a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Model</th>
                <th class="px-6 py-3 text-left">Price</th>
                <th class="px-6 py-3 text-right">Action</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse($products as $product)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-800">{{ $product->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $product->model }}</td>
                <td class="px-6 py-4 text-gray-600">${{ $product->price }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 mr-4">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-6 text-center text-gray-500">No products found.</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
