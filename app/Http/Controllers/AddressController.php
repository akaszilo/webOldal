<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.create');
    }

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

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('addresses.edit', compact('address'));
    }
    
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
    
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return redirect()->to(route('profile') . '#tab-addresses')->with('success', 'Address deleted successfully!');
    }
}
