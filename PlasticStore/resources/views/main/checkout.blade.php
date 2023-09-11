@extends('layouts.shop')

@section('content')
<section class="wrapper bg-light">
    @if (session('success'))
    <div class="alert alert-success text-center" style="background-color: #dff0d8; border-color: #d6e9c6; color: #3c763d; padding: 15px;">
        {{ session('success') }}
    </div>
    @endif

    <div class="container my-8">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price Rp.</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                <tr>
                    <td><img src="{{ asset('/assets/img/products/' . $cartItem->product->image) }}" alt="Product Image" width="100" height="100"></td>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->product->price }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove-from-cart', $cartItem->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h6>Total Price (before tax): Rp.{{ $totalPrice }}</h6>
        <h6>Tax (11%): Rp.{{ $tax }}</h6>
        <h6>Total Price (after tax): Rp.{{ $totalPriceAfterTax }}</h6>

        @if ($user->street_address && $user->city && $user->postal_code)
        <!-- User has a default address -->
        <br>
        <h2>Shipping Address:</h2>
        <p>{{ $user->street_address }}, {{ $user->city }}, {{ $user->postal_code }}</p>
        <p><a href="{{ route('profile') }}">Change Address</a></p>
        @else
        <!-- User doesn't have an address -->
        <div class="alert alert-warning text-center">
            <p>You haven't set a shipping address yet. Please add your shipping address before proceeding with the checkout.</p>
            <a href="{{ route('profile') }}" class="btn btn-primary">Add Address</a>
        </div>
        @endif

        <form method="POST" action="{{ route('cart.checkout.process') }}">
            @csrf
            <button type="submit" class="btn btn-primary" @if (!$user->street_address || !$user->city || !$user->postal_code) disabled @endif>
                Checkout
            </button>
        </form>
    </div>
</section>
@endsection