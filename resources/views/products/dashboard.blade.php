<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products • Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Playfair Display', 'serif'],
                        body: ['Lora', 'serif'],
                    },
                    colors: {
                        primary: '#1e3a8a',
                        primarylight: '#dbeafe',
                        accent: '#92400e',
                        stone: '#78716c',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Lora', serif;
            background-color: #faf8f6;
            color: #44403c;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: #1e1b19;
        }

        .page-header {
            border-bottom: 2px solid #d4c5b9;
            padding-bottom: 2rem;
            margin-bottom: 2rem;
        }

        .btn-classic {
            background-color: #1e3a8a;
            color: white;
            border: 2px solid #1e3a8a;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .btn-classic:hover {
            background-color: transparent;
            color: #1e3a8a;
        }

        .btn-classic:active {
            transform: scale(0.98);
        }

        .table-container {
            background: white;
            border: 1px solid #d4c5b9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .table-row {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #ede9e4;
        }

        .table-row:last-child {
            border-bottom: none;
        }

        .table-row:hover {
            background-color: #f5f3f0;
        }

        table {
            border-collapse: collapse;
        }

        th {
            background-color: #faf8f6;
            border-bottom: 2px solid #d4c5b9;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            letter-spacing: 0.8px;
            color: #1e1b19;
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        td {
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .product-name {
            font-weight: 600;
            color: #1e1b19;
        }

        .product-model {
            color: #78716c;
            font-size: 0.95rem;
        }

        .product-price {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #92400e;
        }

        .action-link {
            position: relative;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-decoration: none;
            color: #1e3a8a;
            transition: color 0.3s ease;
            padding-bottom: 2px;
            border-bottom: 1px solid transparent;
        }

        .action-link:hover {
            color: #0f172a;
            border-bottom-color: #1e3a8a;
        }

        .action-link.delete {
            color: #b91c1c;
        }

        .action-link.delete:hover {
            color: #7f1d1d;
            border-bottom-color: #b91c1c;
        }

        .success-message {
            background-color: #f0fdf4;
            border: 1px solid #86efac;
            border-left: 4px solid #22c55e;
            color: #166534;
        }

        .success-message p {
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .empty-state {
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .empty-state-icon {
            width: 4rem;
            height: 4rem;
            color: #a8a29e;
            margin-bottom: 1rem;
        }

        .empty-state-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e1b19;
            margin-bottom: 0.5rem;
        }

        .empty-state-subtext {
            color: #78716c;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .btn-secondary {
            background-color: transparent;
            color: #1e3a8a;
            border: 2px solid #1e3a8a;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-secondary:hover {
            background-color: #1e3a8a;
            color: white;
        }

        .page-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        @media (min-width: 640px) {
            .page-container {
                padding: 3rem 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .page-container {
                padding: 4rem 2rem;
            }
        }
    </style>
</head>
<body>

<div class="page-container">

    <!-- Header -->
    <div class="page-header mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <h1 class="text-4xl sm:text-5xl font-bold tracking-tight mb-3">
                    Products
                </h1>
                <p class="text-stone text-base leading-relaxed">
                    Manage and organize your product inventory with ease
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               class="btn-classic px-6 py-3 rounded-sm text-sm font-medium
                      focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-white
                      self-start sm:self-center">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    New Product
                </span>
            </a>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="success-message rounded-sm p-5 mb-8 flex items-start gap-4">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <p>{{ session('success') }}</p>
        </div>
@endif

<!-- Table -->
    <div class="table-container rounded-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                    <tr class="table-row">
                        <td>
                            <div class="product-name">
                                {{ $product->name }}
                            </div>
                        </td>
                        <td>
                            <span class="product-model">
                                {{ $product->model ?? '—' }}
                            </span>
                        </td>
                        <td>
                            <span class="product-price">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-6">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="action-link">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Delete this product?\nThis action cannot be undone.')"
                                            class="action-link delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            <svg class="empty-state-icon mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-4a2 2 0 00-2 2v3m-4-5H4" />
                            </svg>
                            <p class="empty-state-text">No Products Yet</p>
                            <p class="empty-state-subtext">
                                Your product catalog is empty. Create your first product to get started.
                            </p>
                            <a href="{{ route('products.create') }}"
                               class="btn-secondary rounded-sm">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add First Product
                            </a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
