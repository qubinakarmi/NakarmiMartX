<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;

class CartController extends Controller
{
   

    public function removeFromCart($id)
    {
        // Delete only the cart item for the logged-in user
        $cartItem = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }
}
