@extends('layouts.shop')

@php
use App\Models\Brand; // Import the Brand model
@endphp

@section('content')
<section class="wrapper bg-light">
    <div class="container mt-3">
        <h1>Transaction Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionDetails as $transactionDetail)
                <tr>
                    <td>{{ $transactionDetail->product_id }}</td>
                    <td>{{ $transactionDetail->product->name }}</td>
                    <td>
                        @php
                        $brandId = $transactionDetail->product->brands_id;
                        $brand = Brand::where('id', $brandId)->value('name');
                        echo $brand;
                        @endphp
                    </td>
                    <td>{{ $transactionDetail->quantity }}</td>
                    <td>{{ $transactionDetail->price }}</td>
                    <td>
                        <img src="{{ asset('/assets/img/products/' . $transactionDetail->product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection