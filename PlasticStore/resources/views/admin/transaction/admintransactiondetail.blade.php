<table class="table table-sm">
    <thead>
        <tr>
            <td>Product Name</td>
            <td>Image Product</td>
            <td>Product Price</td>
            <td>Quantity</td>
            <td>Manufacture</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($transactionDetails as $td)
            <tr>
                <td>{{ $td->product->name }}</td>
                <td><img src="{{ asset('/assets/img/products/' . $td->product->image) }}" alt=""
                        style="width:150px" /></td>
                <td>{{ $td->price }}</td>
                <td>{{ $td->quantity }}</td>
                <td>{{ $td->product->manufacturer }}</td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        @foreach ($transaction as $t)
            <tr>
                <td colspan="4">Shipment Address</td>
                <td>{{ $t->user->street_address }}, {{ $t->user->city }} {{ $t->user->postal_code }}</td>
            </tr>
            <tr>
                <td colspan="4">Delivery Fee</td>
                <td>{{ $t->delivery_fee }}</td>
            </tr>
            <tr>
                <td colspan="4">Tax</td>
                <td>{{ $t->tax }}</td>
            </tr>
            <tr>
                <td colspan="4">Total After Tax</td>
                <td>{{ $t->total_final }}</td>
            </tr>
        @endforeach
    </tfoot>
</table>
<table class="table table-sm">
    <thead>
        <tr>
            <td>Customer Name</td>
            <td>Payment</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($transaction as $t)
            <tr>
                <td>{{ $t->user->name }}</td>
                <td><img src="{{ asset('/assets/img/payment/' . $t->image) }}" alt="" style="width:150px" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
