@extends('layouts.admin')

@section('content')
@if ($transaction)
<div class="card">
    <div class="card-header">
        <h1 class="mb-9 fw-semibold"> Pelanggan dengan transaksi terbanyak </h1>
    </div>
    <div class="card-body">
        <div class="row alig n-items-start">
            <div class="col-8">
                <h2 class="mb-9 fw-semibold">{{ Str::ucfirst($transaction[0]->name) }} </h2>
                <h4 class="fw-semibold mb-3">{{ $transaction[0]->total_pembelian }} Transaksi</h4>
                <div class="d-flex align-items-center pb-1">
                    <p class="fs-3 mb-0">{{ Str::ucfirst($transaction[0]->name) }} melakukan transaksi paling banyak</p>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end">
                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <button href="" onclick="transaksi()"> <i class="ti ti-currency-dollar fs-6"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h1 class="mb-9 fw-semibold">Transaksi Terbaru</h1>
    </div>
    <div class="card-body">
        @if ($transactionnow)
        @foreach ($transactionnow as $tn)
        <ul class="timeline-widget mb-0 position-relative mb-n5">
            <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">{{$tn->tanggal}} {{ $tn->jam }} :
                    {{ $tn->menit }}
                </div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">
                    {{ Str::ucfirst($tn->name) }} membeli produk <strong>{{ Str::ucfirst($tn->name) }}</strong>
                </div>
            </li>
        </ul>
        @endforeach
        @else
        <p>Tidak ada transaksi terbaru.</p>
        @endif
    </div>
</div>


<div class="modal fade" id="modalTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Data total transaksi tiap pelanggan</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-4">
                        <table class="table text-nowrap mb-0 align-middle" id="table">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Username</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Pembelian</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $t)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $t->name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1" style="text-align: center">
                                            {{ $t->total_pembelian }}
                                        </h6>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    function transaksi() {
        $("#modalTransaksi").modal("show");
    }
</script>
@endsection