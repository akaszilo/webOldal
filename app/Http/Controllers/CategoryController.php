<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function showeyes()
    {
        $eyeCategories = [11, 12, 13, 14];
        $products = Product::whereIn('category_id', $eyeCategories)->get();

        return view('categories.eyes', compact('products'));
    }
    public function showlips()
    {
        $lipCategories = [7, 8, 9, 10];
        $products = Product::whereIn('category_id', $lipCategories)->get();

        return view('categories.lips', compact('products'));
    }

    public function showface()
    {
        $faceCategories = [1, 2, 3, 4, 5, 6];
        $products = Product::whereIn('category_id', $faceCategories)->get();

        return view('categories.face', compact('products'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'newest'); // alapértelmezett: newest

        $products = Product::query();

        if ($sort == 'oldest') {
            $products = $products->orderBy('created_at', 'asc');
        } else if ($sort == 'newest') {
            $products = $products->orderBy('created_at', 'desc');
        } else if ($sort == 'cheapest') {
            $products = $products->orderBy('price', 'asc');
        } else if ($sort == 'most_expensive') {
            $products = $products->orderBy('price', 'desc');
        } else if ($sort == 'popular') {
            $products = $products->orderBy('sold_quantity', 'desc');
        } else if ($sort == 'abc') {
            $products = $products->orderBy('name', 'asc');
        }

        $products = $products->get();

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
    public function show(Category $category)
    {
        $categories = Category::all();
        return view('categories.show', compact('category'));
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
