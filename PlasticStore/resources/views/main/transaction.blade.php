@extends('layouts.shop')

@section('content')
<section class="wrapper bg-light">
    <div class="container mt-3">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Transaction ID</th>
                    <th>Ship City</th>
                    <th>Total</th>
                    <th>Transaction date</th>
                    <th>Delivery Status</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->ship_city }}</td>
                    <td>{{ $transaction->total_final }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->delivery_status }}</td>
                    <td>{{ $transaction->payment_status }}</td>
                    <td>
                        <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-primary">
                            Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection