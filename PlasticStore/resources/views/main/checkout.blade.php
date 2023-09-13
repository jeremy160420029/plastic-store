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
        <h6>Delivery Fee: Rp.{{ $deliveryFee }}</h6>
        <h6>Total Price: Rp.{{ $totalPriceAfterTax }}</h6>

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

        @if (!$cartItems->isEmpty())
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal" @if (!$user->street_address || !$user->city || !$user->postal_code) disabled @endif>
            Checkout
        </button>
        @else
        <div class="alert alert-warning text-center">
            <p>Your cart is empty. Please add items to your cart before proceeding with the payment.</p>
        </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="modal-title" id="paymentModalLabel">{{ __('Payment Confirmation BCA') }}</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Payment confirmation form -->
                    <form method="POST" action="{{ route('cart.checkout.process') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Add payment confirmation form fields here -->
                        <input type="hidden" name="transaction_id" value="{{ $transactionId }}">
                        <h4>Total Payment : Rp.{{ $totalPriceAfterTax }}</h4>
                        <div class="form-group">
                            <img src="{{ asset('assets/img/bca.jpg') }}" alt="Bank Account" width="200">
                        </div>
                        <div class="form-group">
                            <label for="payment_proof">Payment Proof (Image)</label>
                            <input type="file" class="form-control-file @error('payment_proof') is-invalid @enderror" id="payment_proof" name="payment_proof" accept="image/*" required>
                            @error('payment_proof')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Confirm Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    // Initialize the Bootstrap Modal component
    $(document).ready(function() {
        $('#paymentModal').modal();
    });
</script>
@endsection