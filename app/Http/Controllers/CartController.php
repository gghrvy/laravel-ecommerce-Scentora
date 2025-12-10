<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('user.cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $subtotal, // Shipping can be added later
        ]);
    }

    public function store(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($request->product_id);
        
        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => $userId,
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => $request->quantity ?? 1,
            ]
        );

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $cartItem = Cart::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated!');
    }

    public function destroy($id, Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $cartItem = Cart::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart!');
    }
}
