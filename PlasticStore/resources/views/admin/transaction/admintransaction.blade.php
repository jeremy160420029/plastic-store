@extends('layouts.admin')

@section('content')
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Daftar Transaksi</h5>

        <div class="col-lg-12">
            <div class="row">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="card-title">Riwayat Belanja</h1>
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Waktu Pembelian</th>
                                    <th>Total Belanja</th>
                                    <th>Poin yang Diperoleh</th>
                                    <th>Pajak</th>
                                    <th>Detail Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $t)
                                    <tr>
                                        <td>{{ $t->created_at }}</td>
                                        <td>@currency($t->total)</td>
                                        <td>{{ $t->received_point }} poin</td>
                                        <td>@currency($t->pajak)</td>
                                        <td>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                                onclick="showTransaction({{ $t->id }})"
                                                data-bs-target="#modal-transaction">Detail</a>

                                            <a class="btn btn-danger" onclick="modalDeleteTrans({{ $t->id }})"><i
                                                    class="ti ti-trash"></i></a>
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
                    <h1 class="modal-title" id="exampleModalLabel">Detail Transaksi</h1>

                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>


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
