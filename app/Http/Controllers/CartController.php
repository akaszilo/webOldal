<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\CreditCard;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function add($id)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        } else {
            $product = Product::findOrFail($id);

            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [ // $id is the product's ID
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image_link,
                    'session_id' => session()->getId()
                ];
            }

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart!');
        }
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        // Ha létezik az elem, töröljük
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // Átadjuk a cart változót a nézetnek
        return view('cart.index', compact('cart'));
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
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }
    public function orderSuccess()
    {
        return view('cart.order_success');
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session('cart');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function processOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }

        $user = Auth::user();

        // Átalakítjuk a kosár tartalmát objektumokká (vagy modellekből)
        $cartItems = [];
        $total = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;

            $quantity = $item['quantity'];
            $price = $product->price;

            $cartItems[] = (object) [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'quantity' => $quantity,
            ];

            $total += $price * $quantity;
        }

        // Átadjuk az adatokat a checkout nézetnek
        return view('order.checkout', compact('cartItems', 'total'));
    }

    /**
     * CVV megerősítés után a rendelés véglegesítése
     */
    public function confirmOrder(Request $request)
    {
        $request->validate([
            'cvv' => 'required|string|size:3',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }

        $user = Auth::user();

        // Itt például a checkout adatokat is sessionből vagy requestből kellene lekérni:
        // (Pl. szállítási cím, bankkártya id, stb. - ezt implementáld a saját logikád szerint)

        // Példa: CVV ellenőrzés (feltételezve, hogy van CreditCard modell)
        $creditCardId = session('checkout_data.credit_card_id') ?? null;
        if (!$creditCardId) {
            return redirect()->route('cart.index')->with('error', 'Hiányzó fizetési adatok.');
        }

        $creditCard = CreditCard::find($creditCardId);
        if (!$creditCard || $creditCard->cvv !== $request->input('cvv')) {
            return redirect()->back()->with('error', 'Hibás CVV kód.');
        }

        // Rendelés mentése adatbázisba - egyszerű példa
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = 0;
        $order->status = 'pending';
        $order->save();

        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;

            $quantity = $item['quantity'];
            $price = $product->price;

            // Ha van OrderItem modell, akkor ide jön a rendelés tételek mentése
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            $totalPrice += $price * $quantity;
        }

        $order->total = $totalPrice;
        $order->save();

        // Kosár ürítése
        session()->forget('cart');
        session()->forget('checkout_data');

        return redirect()->route('order.success')->with('success', 'Sikeres rendelés!');
    }
    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }

        $user = Auth::user();

        // Példa: rendelés mentése (testreszabható a saját modelled szerint)
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $order->status = 'pending';
        $order->save();

        // Ha van OrderItem modelled:
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Kosár ürítése
        session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Sikeres rendelés!');
    }

}
