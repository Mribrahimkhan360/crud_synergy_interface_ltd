<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<div class="max-w-3xl mx-auto px-6 py-10">

    <h1 class="text-2xl font-semibold mb-6">Add Product</h1>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" placeholder="Name..." name="name" class="w-full border-gray-500 bg-gray-50 rounded px-3 py-2 focus:border-blue-500 outline-none" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Model</label>
            <input type="text" name="model" placeholder="Model" class="w-full border-gray-200 bg-gray-50 focus:border-blue-100 outline-none rounded px-3 py-2" value="{{ old('model') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Price</label>
            <input type="number" step="0.01" name="price" class="focus:border-blue-500 outline-none w-full border-gray-200 bg-gray-50 border-1 rounded px-3 py-2" placeholder="Enter Price" value="{{ old('price') }}">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('products.index') }}" class="px-4 py-2 mr-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Save</button>
        </div>
    </form>

</div>
</body>
</html>
