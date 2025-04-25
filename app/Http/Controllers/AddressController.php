<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Show the form for creating a new address.
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created address in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'postCode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
            'country' => 'required',
        ]);

        Auth::user()->addresses()->create($request->all());

        return redirect()->route('profile', ['tab' => 'addresses']);
    }

    /**
     * Show the form for editing the specified address.
     */
    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified address in storage.
     */
    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $request->validate([
            'postCode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
            'country' => 'required',
        ]);

        $address->update($request->all());

        return redirect()->route('profile', ['tab' => 'addresses']);
    }

    /**
     * Remove the specified address from storage.
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return redirect()->route('profile', ['tab' => 'addresses']);
    }
}
