<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

public function create()
{
    return view('admin.products.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'available_sizes' => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'available_sizes' => $request->available_sizes,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $product->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}


public function index()
{
    $products = Product::with('images')->latest()->get();
    return view('admin.products.index', compact('products'));
}

public function edit(Product $product)
{
    $product->load('images');
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'available_sizes' => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'available_sizes' => $request->available_sizes,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $product->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

public function destroy(Product $product)
{
    foreach ($product->images as $image) {
Storage::delete('public/' . $image->image_path);
    }

    $product->delete();
    return back()->with('success', 'Product deleted successfully!');
}

public function deleteImage($id)
{
    $image = ProductImage::findOrFail($id);
    Storage::delete('public/' . $image->image_path);
    $image->delete();

    return response()->json(['message' => 'Image deleted']);
}


}