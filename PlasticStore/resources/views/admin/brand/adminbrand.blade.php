@extends('layouts.admin')

@section('content')
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalCreateBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Brand</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('brands.store') }}" id="formInsert" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="textHelp">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Image Brand</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="insertBrand()">Add Brand</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalEditBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Brand</h4>
                </div>
                <div class="modal-body">
                    Update Data 1
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success" onclick="updateBrand()">Update Brand</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button> --}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Brand List</h5>
        <button class="btn btn-success" onclick="modalCreateBrand()">Add Brand</button>
        <div class="card">
            <div class="card-body p-4">
                <table class="table text-nowrap mb-0 align-middle" border=1 id="table">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Created At</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Updated At</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $b)
                            <tr id="tr_{{ $b->id }}">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $b->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $b->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success rounded-3 fw-semibold">{{ $b->created_at }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-secondary rounded-3 fw-semibold">{{ $b->updated_at }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-success"
                                        onclick="modalEditBrand({{ $b->id }})">Edit</button>
                                    <button class="btn btn-danger" onclick="modalDeleteCat({{ $b->id }})"><i
                                            class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // jQuery(document).ready(function() {
        //     App.init();
        //     $('#myModal').modal('show');
        // });

        function modalCreateBrand() {
            $('#modalCreateBrand').modal('show');
        }

        function modalEditBrand(id) {
            $.get("{{ url('admin/brand') }}/" + id, function(data) {
                $('#modalEditBrand .modal-body').html(data);
                $('#modalEditBrand').modal('show');
            });
        }

        function modalDeleteCat(id) {
            // $('#modalDeleteCat').modal('show');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus brand ini?',
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
                    url: '{{ route('brands.deleteData') }}',
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
                        'Brand berhasil terhapus.',
                        'success'
                    )
                }
            })
        }

        function insertBrand() {
            $('#formInsert').submit();
        }

        function updateBrand() {
            $('#form-update').submit();
        }

        new DataTable('#table');
    </script>
@endsection
