<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->get();
        $creditCards = $user->creditCards;
        $addresses = $user->addresses;
        $cart = session('cart', []); // vagy ha userhez kötöd, akkor onnan
    
        return view('user_pages.profile', compact('user', 'orders', 'creditCards', 'addresses', 'cart'));
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
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
