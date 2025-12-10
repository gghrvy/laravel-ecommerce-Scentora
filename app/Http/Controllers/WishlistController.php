<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $wishlistItems = Wishlist::with('product')
            ->where('user_id', $userId)
            ->get();

        return view('user.wishlist', ['wishlistItems' => $wishlistItems]);
    }

    public function store(Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        Wishlist::firstOrCreate([
            'user_id' => $userId,
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Product added to wishlist!');
    }

    public function destroy($id, Request $request)
    {
        $userId = $request->session()->get('user.id');
        if (!$userId) {
            return redirect('/login');
        }

        $wishlistItem = Wishlist::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $wishlistItem->delete();

        return back()->with('success', 'Item removed from wishlist!');
    }
}
