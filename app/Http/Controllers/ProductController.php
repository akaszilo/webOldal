<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /* public function showCategory(string $categorySlug): View
    {

        $category = Category::where('slug', $categorySlug)->firstOrFail(); 
        $products = Product::where('category_id', $category->id)->get();
        $categories = Category::all();

        return view('product.category', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
        ]);
    } */

    public function autocomplete(Request $request)
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


    public function index(): View
    {
        $user = Auth::user();
        
        $userName = Auth::check() ? Auth::user()->name : 'Vendég';

        $bestsellers = Product::orderBy('sold_quantity', 'desc')->take(15)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        $featuredBrands = Brand::take(5)->get();

        return view('welcome', [
            'bestsellers' => $bestsellers,
            'latestProducts' => $latestProducts,
            'featuredBrands' => $featuredBrands,
            'userName' => $userName,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function filterByBrand(Brand $brand)
    {
        $brands = Brand::all();
        $products = Product::where('brand_id', $brand->id)->get();

        return view('product.show', compact('products', 'brands', 'brand'));
    }

    public function showRecommended(Product $product)
    {
        $randomProducts = Product::inRandomOrder()->take(4)->get();
        return view('product.show', compact('product', 'randomProducts'));
    }

    public function show(Product $product)
    {
        $user = Auth::user();
        $brand = $product->brand;  
        $products = $brand->products()->with('brand')->get();

        return view('product.show', compact('product', 'brand'));

        if (!$product) {
            abort(404); 
        }
        $randomProducts = Product::inRandomOrder()->limit(4)->get();

        
        return view('product.show', compact('product', 'randomProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
