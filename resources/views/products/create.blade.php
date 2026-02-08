<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        :root {
            --bg-main:        #f8fafc;
            --sidebar-bg:     #0f172a;     /* slate-900 */
            --sidebar-text:   #e2e8f0;
            --sidebar-hover:  #1e293b;     /* slate-800 */
            --primary:        #3b82f6;     /* blue-500 */
            --primary-hover:  #2563eb;     /* blue-600 */
            --primary-dark:   #1d4ed8;     /* blue-700 */
            --text-primary:   #111827;     /* gray-900 */
            --text-secondary: #4b5563;     /* gray-600 */
            --text-muted:     #6b7280;     /* gray-500 */
            --card-bg:        #ffffff;
            --border:         #e2e8f0;     /* gray-200 */
            --shadow-sm:      0 1px 3px rgba(0,0,0,0.08);
            --shadow:         0 4px 16px rgba(0,0,0,0.06);
        }

        body {
            background: var(--bg-main);
            color: var(--text-primary);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }

        #wrapper {
            min-height: 100vh;
        }

        #sidebar-wrapper {
            background: var(--sidebar-bg);
            width: 240px;
            min-width: 240px;
            color: var(--sidebar-text);
            transition: transform 0.25s ease;
        }

        .sidebar-heading {
            color: white;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .list-group-item {
            color: var(--sidebar-text);
            background: transparent;
            border: none;
            padding: 0.75rem 1.5rem;
            transition: all 0.15s ease;
        }

        .list-group-item:hover,
        .list-group-item:focus {
            background: var(--sidebar-hover);
            color: white;
        }

        .list-group-item.active {
            background: var(--primary);
            color: white;
            font-weight: 500;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow);
            background: var(--card-bg);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-control:focus {
            border-radius: 8px;
            border-color: var(--border);
            box-shadow: none;
        }

        .form-control:focus {
            border-color: var(--primary);
        }

        .input-group-text {
            background: #f1f5f9;
            border-color: var(--border);
            border-radius: 8px 0 0 8px;
            color: var(--text-muted);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 500;
            padding: 0.65rem 1.75rem;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-outline-secondary {
            border-radius: 8px;
            font-weight: 500;
        }

        .alert-danger {
            border-radius: 8px;
        }

        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                position: fixed;
                z-index: 1030;
                height: 100vh;
                transform: translateX(-100%);
            }

            #wrapper.toggled #sidebar-wrapper {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="vh-100" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 fs-4">Dashboard</div>
        <div class="list-group list-group-flush px-2 mt-2">
            <a href="{{ url('/') }}"              class="list-group-item list-group-item-action">Home</a>
            <a href="#"                           class="list-group-item list-group-item-action">Users</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Products</a>
            <a href="{{ route('products.create') }}" class="list-group-item list-group-item-action active">Add Product</a>

            <div class="mt-5 px-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 py-2">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="flex-grow-1 d-flex flex-column" id="page-content-wrapper">

        <!-- Topbar -->
        <nav class="navbar topbar navbar-expand px-4">
            <button class="btn btn-link text-dark fs-4 p-0 me-3" id="menu-toggle">☰</button>
            <span class="fw-medium text-muted">
                Welcome, {{ auth()->user()->name ?? 'User' }}
            </span>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow-1 main-content py-4 px-4 px-md-5">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6">

                    <h4 class="mb-4 fw-semibold">Add New Product</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please correct the following:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body p-4 p-md-5">
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg"
                                           placeholder="e.g. Wireless Noise Cancelling Headphones"
                                           value="{{ old('name') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="model" class="form-label">Model / SKU</label>
                                    <input type="text" name="model" id="model" class="form-control form-control-lg"
                                           placeholder="e.g. WH-1000XM5 / SKU-45678"
                                           value="{{ old('model') }}">
                                </div>

                                <div class="mb-4">
                                    <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="price" id="price" step="0.01" min="0"
                                               class="form-control" placeholder="0.00"
                                               value="{{ old('price') }}" required>
                                    </div>
                                </div>

                                <div class="d-flex gap-3 justify-content-end mt-5 pt-4 border-top">
                                    <a href="{{ route('products.index') }}"
                                       class="btn btn-outline-secondary btn-lg px-5">Cancel</a>
                                    <button type="submit"
                                            class="btn btn-primary btn-lg px-5">Save Product</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');

        if (toggleBtn && wrapper) {
            toggleBtn.addEventListener('click', () => {
                wrapper.classList.toggle('toggled');
            });
        }
    });
</script>

</body>
</html>
