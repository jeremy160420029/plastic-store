<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $request->validate([
            'txtQty' => 'required|integer|min:1',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        $quantity = $request->input('txtQty');

        // Check if the user already has the product in the cart
        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Increment the quantity by the specified amount
            $cartItem->increment('quantity', $quantity);
        } else {
            // Create a new cart item if it doesn't exist
            $cartItem = new CartItem([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
            $cartItem->save();
        }

        // Update the session cart data
        $cart = Session::get('cart', []);
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id] += $quantity;
        } else {
            $cart[$product->id] = $quantity;
        }
        Session::put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function showCheckout()
    {
        // Retrieve the cart items from the cart_items table
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        // Calculate the total price
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        $customerPoints = 0;

        // Retrieve the authenticated user
        $user = User::find(auth()->id());

        $tax = $totalPrice * 0.11;
        $totalPriceAfterTax = $totalPrice + $tax;

        return view('main.checkout', compact('cartItems', 'totalPrice', 'user', 'tax', 'totalPriceAfterTax'));
    }

    public function removeFromCart(Request $request, CartItem $cartItem)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user owns the cart item
        if ($cartItem->user_id === $user->id) {
            // Delete the cart item
            $cartItem->delete();

            // Update the cart count in the session
            $cart = Session::get('cart', []);
            if (array_key_exists($cartItem->product_id, $cart)) {
                unset($cart[$cartItem->product_id]);
                Session::put('cart', $cart);
            }
        }

        // Redirect
        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();

        $cartItems = CartItem::where('user_id', $user->id)->get();

        // Check if the cart is empty
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('success', 'Your cart is empty. Please add items before checking out.');
        }

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->unitprice * $cartItem->quantity;
        });

        // Calculate the tax
        $tax = $totalPrice * 0.11;

        // Calculate the total price after tax
        $totalPriceAfterTax = $totalPrice + $tax;

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->payment_method = 'Gopay'; // Default payment method
        $transaction->shipment_id = 1; // Default shipment ID
        $transaction->ship_city = 'Surabaya'; // Default ship city
        $transaction->total_price = $totalPrice;
        $transaction->tax = $tax;
        $transaction->total_price_after_tax = $totalPriceAfterTax;
        $transaction->created_at = now();
        $transaction->point_use = 0; // No points used
        $transaction->point_gain = 0; // No points earned
        $transaction->save();

        // Store the product transactions in the transaction_details table
        foreach ($cartItems as $cartItem) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $cartItem->product_id;
            $transactionDetail->quantity = $cartItem->quantity;
            $transactionDetail->price = $cartItem->product->unitprice;
            $transactionDetail->save();
            $product = $cartItem->product;
            $quantity = $cartItem->quantity;
            $product->total_sales += $quantity;
            $product->save();
        }

        // Clear the cart items for the user
        CartItem::where('user_id', $user->id)->delete();

        return redirect()->route('products.index')->with('success', 'Checkout successful!');
    }
}