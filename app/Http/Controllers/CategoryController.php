<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function showeyes(Request $request)
    {
        $eyeCategories = [11, 12, 13, 14];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $eyeCategories);
        $products = $this->applySort($products, $sort)->get();
    
        return view('categories.eyes', compact('products', 'sort'));
    }
    
    public function showlips(Request $request)
    {
        $lipCategories = [7, 8, 9, 10];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $lipCategories);
        $products = $this->applySort($products, $sort)->get();
    
        return view('categories.lips', compact('products', 'sort'));
    }
    
    public function showface(Request $request)
    {
        $faceCategories = [1, 2, 3, 4, 5, 6];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $faceCategories);
        $products = $this->applySort($products, $sort)->get();
    
        return view('categories.face', compact('products', 'sort'));
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }
    private function applySort($query, $sort)
    {
        if ($sort == 'oldest') {
            return $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'newest') {
            return $query->orderBy('created_at', 'desc');
        } elseif ($sort == 'cheapest') {
            return $query->orderBy('price', 'asc');
        } elseif ($sort == 'most_expensive') {
            return $query->orderBy('price', 'desc');
        } elseif ($sort == 'popular') {
            return $query->orderBy('sold_quantity', 'desc');
        } elseif ($sort == 'abc') {
            return $query->orderBy('name', 'asc');
        }
        return $query;
    }
    // app/Http/Controllers/ProductController.php
    public function showSubcategory(Request $request, $subcategoryId)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::where('category_id', $subcategoryId);
        $products = $this->applySort($products, $sort)->get();
        $subcategory = Category::find($subcategoryId);
    
        return view('categories.subcategory', compact('products', 'sort', 'subcategory'));
    }
    
    
    public function allProducts(Request $request)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::query();
        $products = $this->applySort($products, $sort)->get();
    
        return view('categories.all', compact('products', 'sort'));
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        $sort = $request->query('sort', 'newest');
        // A products() Eloquent relationship-et queryként használjuk!
        $products = $category->products();
        $products = $this->applySort($products, $sort)->get();
    
        return view('categories.show', compact('category', 'products', 'sort'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
