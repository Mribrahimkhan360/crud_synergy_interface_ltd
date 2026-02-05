<?php

namespace App\Http\Controllers;

use App\Http\Requests\StroeProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ProductService;
use App\Services\UserService;

class ProductController extends Controller
{
    protected $productService,$authService;


    public function __construct(ProductService $productService,UserService $authService)
    {
        $this->productService = $productService;
        $this->authService = $authService;
    }

    public function index()
    {
        if ($this->authService->isAuthenticated())
        {
            $products = $this->productService->getAllProducts();
            return view('products.index', compact('products'));
        }
        return view('auth.login');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StroeProductRequest $request)
    {
        $this->productService->createProduct($request->validated());
        return redirect()->route('products.index')->with('success','Product Created Successfully.');
    }

    // Show form to edit product
    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.edit',compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->updateProduct($id,$request->validated());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
