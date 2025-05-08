<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
        $sort = $request->query('sort', 'newest');
        $products = $category->products();
        $products = $this->applySort($products, $sort)->get();
        return view('categories.show', compact('category', 'products', 'sort'));
    }

    public function show_sub_category(Request $request, $subcategoryId)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::where('category_id', $subcategoryId);
        $products = $this->applySort($products, $sort)->get();
        $subcategory = Category::find($subcategoryId);
        return view('categories.subcategory', compact('products', 'sort', 'subcategory'));
    }
    
    public function all_products(Request $request)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::query();
        $products = $this->applySort($products, $sort)->get();
        return view('categories.all', compact('products', 'sort'));
    }

    public function show_eyes(Request $request)
    {
        $eyeCategories = [11, 12, 13, 14];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $eyeCategories);
        $products = $this->applySort($products, $sort)->get();
        return view('categories.eyes', compact('products', 'sort'));
    }
    
    public function show_lips(Request $request)
    {
        $lipCategories = [7, 8, 9, 10];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $lipCategories);
        $products = $this->applySort($products, $sort)->get();
        return view('categories.lips', compact('products', 'sort'));
    }
    
    public function show_face(Request $request)
    {
        $faceCategories = [1, 2, 3, 4, 5, 6];
        $sort = $request->query('sort', 'newest');
        $products = Product::whereIn('category_id', $faceCategories);
        $products = $this->applySort($products, $sort)->get();
        return view('categories.face', compact('products', 'sort'));
    }

    private function apply_sort($query, $sort)
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
}
