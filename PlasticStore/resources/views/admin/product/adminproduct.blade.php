@extends('layouts.admin')

@section('content')
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Product List</h5>
        <div class="mb-2">
            @if (session('messege') == 'produk dengan nama yang sama sudah ada!')
                <div class="alert alert-danger">
                    <strong>{{ session('messege') }}</strong>
                </div>
            @elseif (session('messege') == 'Berhasil menambahkan')
                <div class="alert alert-success">
                    <strong>{{ session('messege') }}</strong>
                </div>
            @endif
            <button class="btn btn-success" onclick="create()">Add Product</button>
        </div>
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Daftar Produk</h5>
                <table class="table text-nowrap mb-0 align-middle" id="table">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Category</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Brand</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Sub Process</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Sub Category</h6>
                            </th>
                            {{-- <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Price</h6>
                            </th> --}}
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Manufacture</h6>
                            </th>
                            {{-- <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Description</h6>
                            </th> --}}
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p)
                            <tr id="tr_{{ $p->id }}">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $p->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->category }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->brand }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->subpro }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->subcat }}</h6>
                                </td>
                                {{-- <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->price }}</h6>
                                </td> --}}
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->manufacturer }}</h6>
                                </td>
                                {{-- <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $p->description }}</h6>
                                </td> --}}
                                <td class="border-bottom-0">
                                    <button type="button" id="btn-edit" onclick="edit({{ $p->id }})"
                                        class="btn btn-success m-1">Edit</button>
                                    <button type="button" onclick="modalDeleteprod({{ $p->id }})"
                                        class="btn btn-danger m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal edit-->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Edit Product</h5>



                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>

                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        new DataTable('#table');

        $(document).ready(function() {

        });

        function create() {
            $.get("{{ url('admin/product/show/create_product') }}", {}, function(data, status) {
                $("#modalTitle").html('Add Product');
                $("#modalEdit .modal-body").html(data)
                $("#modalEdit").modal("show");

            });
        }

        function store() {
            $("#form-store").submit();
        }

        function modalDeleteprod(id) {
            // $('#modalDeleteprod').modal('show');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus produk ini?',
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
                        url: '{{ route('products.delete') }}',
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
                        'Produk berhasil terhapus.',
                        'success'
                    )
                }
            })
        }


        function edit(id) {
            updateId = id
            $.get("{{ url('/admin/product/edit') }}/" + id, function(data) {
                $("#modalTitle").html('Edit Product');
                $("#modalEdit .modal-body").html(data)
                $("#modalEdit").modal("show");
            });
        }

        function update() {
            $("#form-update").submit();
        }
    </script>
@endsection
