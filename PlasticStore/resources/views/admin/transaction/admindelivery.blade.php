@extends('layouts.admin')

@section('content')
<div class="card-body">
    <div class="d-flex flex-row">
        <h5 class="card-title fw-semibold mb-4 p-2"><a class="nav-link" href="{{ url('admin/transaction') }}">Transaction
                List</a></h5>
        <h5 class="card-title fw-semibold mb-4 p-2">||</h5>
        <h5 class="card-title fw-semibold mb-4 p-2"><a class="nav-link" href="{{ url('admin/shipment') }}">Shipment</a>
        </h5>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title">Shipment List</h1>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliv as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->payment_method }}</td>
                                <td>{{ $d->payment_status }}</td>
                                <td>{{ $d->delivery_status }}</td>
                                <td>
                                    <a href="#" class="btn btn-success" onclick="updateDeliv({{ $d->id }})">Finish</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    @endsection

    @section('script')
    <script>
        function updateDeliv(id) {
            let idDeliv = id
            $.post({
                type: 'POST',
                url: '{{ route("admtransaction.delivery") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': idDeliv
                },
                success: function(data) {
                    if (data.status == 'oke') {
                        location.reload();
                    }
                }
            });
        }
    </script>
    @endsection