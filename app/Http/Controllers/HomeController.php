<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{

public function index()
{
    $newArrivals = Product::latest()->take(10)->get(); // adjust limit as needed

        $newArrivalIds = $newArrivals->pluck('id');
    $editorsPicks = Product::take(10)
                            ->with('images')
                            ->get();
    

    return view('index',compact('newArrivals', 'editorsPicks'));
}

public function shop(Request $request)
{
    $query = Product::with('images');

    // Price Filter
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Sorting
    if ($request->sort === 'low') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort === 'high') {
        $query->orderBy('price', 'desc');
    } elseif ($request->sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    } else {
        $query->orderBy('created_at', 'desc'); // default: newest
    }

    $products = $query->paginate(12)->appends($request->query());

    return view('shop', compact('products'));
}

public function show($id)
{
    $product = Product::with('images')->findOrFail($id);
    $otherProducts = Product::where('id', '!=', $id)->take(4)->get();
    $allSizes = ['S', 'M', 'L', 'XL'];

    return view('product', compact('product', 'otherProducts','allSizes'));
}


public function contact()
{
    return view('contact');
}
}
