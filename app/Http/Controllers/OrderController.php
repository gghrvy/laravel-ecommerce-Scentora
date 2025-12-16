<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $orders = Order::with('items.product')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.orders', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => $userId,
            'status' => 'pending',
            'subtotal' => $subtotal,
            'shipping' => 0,
            'total' => $subtotal,
            'shipping_address' => $request->shipping_address ?? '',
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->route('orders')->with('success', 'Order placed successfully!');
    }

    public function show(string $id, Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $order = Order::with('items.product')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('user.order-show', ['order' => $order]);
    }
}
