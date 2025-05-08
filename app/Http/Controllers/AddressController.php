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

        return redirect()->route('profile', ['#tab-addresses'])->with('success', 'Address saved successfully!');
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
        $validated = $request->validate([
            'postCode' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'houseNumber' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
        ]);
    
        $address->update($validated);
    
        return redirect()->to(route('profile') . '#tab-addresses')->with('success', 'Address updated successfully!');
    }
    

    /**
     * Remove the specified address from storage.
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return redirect()->to(route('profile') . '#tab-addresses')->with('success', 'Address deleted successfully!');
    }
}
