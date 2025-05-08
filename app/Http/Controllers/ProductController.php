<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;


class ProductController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $userName = Auth::check() ? Auth::user()->name : 'Vendég';
        $bestsellers = Product::orderBy('sold_quantity', 'desc')->take(15)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        $topBrandIds = Product::selectRaw('brand_id, SUM(sold_quantity) as total_sold')
            ->groupBy('brand_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->pluck('brand_id');
        $brands = Brand::whereIn('id', $topBrandIds)->get()
            ->sortBy(function($brand) use ($topBrandIds) {
                return array_search($brand->id, $topBrandIds->toArray());
            });
        return view('welcome', [
            'bestsellers' => $bestsellers,
            'latestProducts' => $latestProducts,
            'brands' => $brands, 
            'userName' => $userName,
            'user' => $user,
        ]);
    }

    public function show(Product $product)
    {
        $product = Product::with('brand')->findOrFail($product->id);
        $brand = $product->brand;
        $randomProducts = Product::inRandomOrder()->limit(4)->get();
        return view('product.show', compact('product', 'brand', 'randomProducts'));
    }
    public function auto_complete(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhereHas('brand', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->take(5)
            ->get(['id', 'name', 'price', 'instock', 'sold_quantity', 'image_link']);
        return response()->json($products);
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhereHas('brand', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();
        return view('product.search', ['products' => $products, 'query' => $query]);
    }

    public function filter_by_brand(Brand $brand)
    {
        $brands = Brand::all();
        $products = Product::where('brand_id', $brand->id)->get();
        return view('product.show', compact('products', 'brands', 'brand'));
    }

    public function show_recommended(Product $product)
    {
        $randomProducts = Product::inRandomOrder()->take(4)->get();
        return view('product.show', compact('product', 'randomProducts'));
    }
}
