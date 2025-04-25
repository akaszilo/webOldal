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
        $user = auth()->user();
        $addresses = auth()->user()->addresses ?? collect();
        $orders = auth()->user()->orders ?? collect(); // Rendelések lekérdezése
        return view('user_pages.profile', compact('addresses', 'user', 'orders')); // Add $orders
    }

    public function createAddress()
    {
        return view('user_pages.address_form');
    }
    public function storeAddress(Request $request)
    {
        $request->validate([
            'postCode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
        ]);
        $user = auth()->user(); // Lekérjük a felhasználót
        $user->addresses()->create($request->all()); // Helyes mentés
        return redirect()->route('profile');
    }
    public function editAddress(Address $address)
    {
        $this->authorize('update', $address);
        return view('user_pages.address_form', compact('address'));
    }

    public function updateAddress(Request $request, Address $address)
    {
        $this->authorize('update', $address);
        $request->validate([
            'postCode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
        ]);
        $address->update($request->all());
        return redirect()->route('profile');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function deleteAddress(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return redirect()->route('profile');
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
