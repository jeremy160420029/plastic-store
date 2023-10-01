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
use App\Http\Controllers\Charge;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



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
        $transactionId = Str::uuid();
        // Retrieve the cart items from the cart_items table
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        // Calculate the total price
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        // Retrieve the authenticated user
        $user = User::find(auth()->id());

        $tax = $totalPrice * 0.11;
        $deliveryFee = $cartItems->sum('quantity') * 20000;
        $totalPriceAfterTax = $totalPrice + $tax + $deliveryFee;

        return view('main.checkout', compact('cartItems', 'totalPrice', 'user', 'tax', 'totalPriceAfterTax', 'deliveryFee', 'transactionId'));
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
        $request->validate([
            // Other validation rules for your form fields
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);
        // Get the transaction ID from the form
        $transactionId = $request->input('transaction_id');

        $paymentProof = $request->file('payment_proof');

        // Define the directory where you want to save the image
        $directory = 'assets/img/payment/';

        // Generate a unique name for the image based on the transaction ID
        $imageName = $transactionId . '.' . $paymentProof->getClientOriginalExtension();

        // Move the uploaded file to the specified directory with the custom name
        $paymentProof->move($directory, $imageName);

        $user = Auth::user();

        $cartItems = CartItem::where('user_id', $user->id)->get();

        // // Check if the cart is empty
        // if ($cartItems->isEmpty()) {
        //     return redirect()->back()->with('success', 'Your cart is empty. Please add items before checking out.');
        // }

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
        $tax = $totalPrice * 0.11;
        $ship_city = auth()->user()->city;
        $deliveryFee = $cartItems->sum('quantity') * 20000;
        $total_final = $totalPrice + $tax + $deliveryFee;

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->payment_method = 'BCA'; // Default payment method
        $transaction->ship_city = $ship_city; // Default ship city
        $transaction->delivery_fee = $deliveryFee;
        $transaction->total_price = $totalPrice;
        $transaction->tax = $tax;
        $transaction->total_final = $total_final;
        $transaction->delivery_status = 'Pending';
        $transaction->payment_status = 'Pending';
        $transaction->image = $imageName;
        $transaction->created_at = now();
        $transaction->save();

        // Store the product transactions in the transaction_details table
        foreach ($cartItems as $cartItem) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $cartItem->product_id;
            $transactionDetail->quantity = $cartItem->quantity;
            $transactionDetail->price = $cartItem->product->price;
            $transactionDetail->save();
            $product = $cartItem->product;
            $quantity = $cartItem->quantity;
            $product->stock -= $quantity;
            $product->save();
        }

        // Clear the cart items for the user
        CartItem::where('user_id', $user->id)->delete();

        // Update the cart count in the session
        $cart = Session::get('cart', []);
        if (array_key_exists($cartItem->product_id, $cart)) {
            unset($cart[$cartItem->product_id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.checkout')->with('success', 'Checkout successful! Please wait for admin confirmation!');
    }
}
