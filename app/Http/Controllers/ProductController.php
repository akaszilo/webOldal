<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        
        $userName = Auth::check() ? Auth::user()->name : 'Vendég';

        $bestsellers = Product::orderBy('sold_quantity', 'desc')->take(15)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        $featuredBrands = Brand::take(5)->get();

        return view('welcome', [
            'bestsellers' => $bestsellers,
            'latestProducts' => $latestProducts,
            'featuredBrands' => $featuredBrands,
            'userName' => $userName
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

    return view('products.index', compact('products', 'brands', 'brand'));
}
    public function show(Product $product)
    {
        $brand = $product->brand;  // A Product modelben definiált kapcsolatot használjuk

        return view('product.show', compact('product', 'brand'));

        if (!$product) {
            abort(404); // Ha nincs ilyen termék, 404-es hibát adunk vissza
        }
    
        return view('product.show', compact('product'));
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
