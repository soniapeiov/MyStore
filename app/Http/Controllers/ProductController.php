<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', ['products' => Product::with(['category','color','size','brand'])->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'colors'     => Color::all(),
            'sizes'      => Size::all(),
            'brands'     => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'sku'         => ['required', 'string', 'max:20'],
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'barcode'     => ['nullable', 'string', 'max:20'],
            'category_id' => ['required', 'exists:categories,id'],
            'price'       => ['required', 'numeric', 'min:0'],
            'sale_price'  => ['nullable', 'numeric', 'min:0'],
            'sale'        => ['boolean'],
            'stock'       => ['required', 'numeric', 'min:0'],
            'weight'      => ['nullable', 'numeric'],
            'color_id'    => ['required', 'exists:colors,id'],
            'size_id'     => ['required', 'exists:sizes,id'],
            'width'       => ['nullable', 'numeric'],
            'height'      => ['nullable', 'numeric'],
            'length'      => ['nullable', 'numeric'],
            'vat'         => ['nullable', 'numeric', 'min:0'],
            'brand_id'    => ['required', 'exists:brands,id'],
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product'    => $product,
            'categories' => Category::all(),
            'colors'     => Color::all(),
            'sizes'      => Size::all(),
            'brands'     => Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'sku'         => ['required', 'string', 'max:20'],
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'barcode'     => ['nullable', 'string', 'max:20'],
            'category_id' => ['required', 'exists:categories,id'],
            'price'       => ['required', 'numeric', 'min:0'],
            'sale_price'  => ['nullable', 'numeric', 'min:0'],
            'sale'        => ['boolean'],
            'stock'       => ['required', 'numeric', 'min:0'],
            'weight'      => ['nullable', 'numeric'],
            'color_id'    => ['required', 'exists:colors,id'],
            'size_id'     => ['required', 'exists:sizes,id'],
            'width'       => ['nullable', 'numeric'],
            'height'      => ['nullable', 'numeric'],
            'length'      => ['nullable', 'numeric'],
            'vat'         => ['nullable', 'numeric', 'min:0'],
            'brand_id'    => ['required', 'exists:brands,id'],
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
