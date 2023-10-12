<style>
    .custom-btn {
        margin: 0 5px;
        /* You can adjust the margin value to control spacing */
    }
</style>

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
                        <h1 class="card-title">Transaction List</h1>
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Tax Price</th>
                                    <th>Total Price</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->created_at }}</td>
                                        <td>{{ $t->user->name }}</td>
                                        <td>{{ $t->tax }}</td>
                                        <td>{{ $t->total_final }}</td>
                                        <td>{{ $t->payment_status }}</td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="#" class="btn btn-success custom-btn" data-bs-toggle="modal"
                                                    onclick="accept({{ $t->id }})">Accept</a>

                                                <a href="#" class="btn btn-danger custom-btn" data-bs-toggle="modal"
                                                    onclick="decline({{ $t->id }})">Decline</a>

                                                <a href="#" class="btn btn-success custom-btn" data-bs-toggle="modal"
                                                    onclick="showTransaction({{ $t->id }})"
                                                    data-bs-target="#modal-transaction">Detail</a>

                                                <a class="btn btn-danger custom-btn"
                                                    onclick="modalDeleteTrans({{ $t->id }})"><i
                                                        class="ti ti-trash"></i></a>
                                            </div>
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

    <div class="modal fade" id="modal-transaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Transaction Detail</h1>

                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Ubah Profile</h1>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="card">
    @endsection
    @section('script')
        <script>
            function showTransaction(id) {
                let idtransaction = id
                $.get("{{ url('/admin/transaction/detail') }}/" + idtransaction, function(data) {
                    $("#modal-transaction .modal-body").html(data);
                    $("#modal-transaction").show();
                });
            }

            function accept(id) {
                // Lakukan logika untuk menerima tindakan di sini

                // Periksa payment_status
                if ("{{ $t->payment_status }}" === "Paid" || "{{ $t->payment_status }}" === "Declined") {
                    Swal.fire({
                        title: 'Tidak dapat menerima transaksi ini',
                        text: 'Payment status sudah "Paid" atau "Declined"',
                        icon: 'error',
                    });
                } else {
                    Swal.fire({
                        title: 'Apakah Anda yakin ingin menerima transaksi ini?',
                        text: "Anda tidak bisa mengembalikan perubahan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya, saya yakin',
                        cancelButtonText: 'Batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post({
                                type: 'POST',
                                url: '{{ route('transaksi.accept') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': id
                                },
                                success: function(data) {
                                    if (data.status == 'oke') {
                                        location.reload();
                                    }
                                }
                            });
                            Swal.fire(
                                'Berhasil Diterima!',
                                'Transaksi berhasil diterima.',
                                'success'
                            )
                        }
                    })
                }
            }

            function decline(id) {
                // Lakukan logika untuk menolak tindakan di sini

                // Periksa payment_status
                if ("{{ $t->payment_status }}" === "Paid" || "{{ $t->payment_status }}" === "Declined") {
                    Swal.fire({
                        title: 'Tidak dapat menolak transaksi ini',
                        text: 'Payment status sudah "Paid" atau "Declined"',
                        icon: 'error',
                    });
                } else {
                    Swal.fire({
                        title: 'Apakah Anda yakin ingin menolak transaksi ini?',
                        text: "Anda tidak bisa mengembalikan perubahan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya, saya yakin',
                        cancelButtonText: 'Batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post({
                                type: 'POST',
                                url: '{{ route('transaksi.decline') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': id
                                },
                                success: function(data) {
                                    if (data.status == 'oke') {
                                        location.reload();
                                    }
                                }
                            });
                            Swal.fire(
                                'Berhasil Ditolak!',
                                'Transaksi berhasil ditolak.',
                                'success'
                            )
                        }
                    })
                }
            }

            function modalDeleteTrans(id) {
                // $('#modalDeleteCust').modal('show');
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus transaksi ini?',
                    text: "Anda tidak bisa mengembalikan perubahan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, saya yakin',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post({
                            type: 'POST',
                            url: '{{ route('transaksi.deleteData') }}',
                            data: {
                                '_token': '<?php echo csrf_token(); ?>',
                                'id': id
                            },
                            success: function(data) {
                                if (data.status == 'oke') {
                                    $('#tr_' + id).remove();
                                }
                            }
                        });
                        Swal.fire(
                            'Berhasil Terhapus!',
                            'Transaksi berhasil terhapus.',
                            'success'
                        )
                    }
                })
            }
        </script>
    @endsection
