<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\DB;
use App\Models\CreditCard;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function checkout()
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }
    
        $user = Auth::user();
        $addresses = $user->addresses;
        $creditCards = $user->creditCards;
    
        if ($addresses->isEmpty() || $creditCards->isEmpty()) {
            // Ez az átirányítás okozza, hogy profilra kerülsz:
            return redirect()->route('profile')->with('error', 'Adj meg szállítási címet és bankkártyát a rendeléshez.');
        }
    
        return view('order.select_payment', compact('addresses', 'creditCards', 'cart'));
    }
    
    public function process_order(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'credit_card_id' => 'required|exists:credit_cards,id',
        ]);

        $addressId = $request->input('address_id');
        $creditCardId = $request->input('credit_card_id');

        session([
            'checkout_data' => [
                'address_id' => $addressId,
                'credit_card_id' => $creditCardId,
            ]
        ]);

        return view('checkout.cvv_verification');
    }
    public function confirm_order(Request $request)
    {
        $request->validate([
            'cvv' => 'required|string|size:3',
        ]);

        $checkoutData = session('checkout_data');
        if (!$checkoutData) {
            return redirect()->route('cart.index')->with('error', 'A fizetési adatok hiányoznak.');
        }

        $creditCard = CreditCard::find($checkoutData['credit_card_id']);
        if (!$creditCard || $creditCard->cvv !== $request->input('cvv')) {
            return redirect()->back()->with('error', 'Hibás CVV kód.');
        }

        // Rendelés létrehozása itt (adatbázisba mentés stb.)
        session()->forget('cart');

        return redirect()->route('order.success');
    }
    public function orderSuccess()
    {
        return view('order.success');
    }
}
