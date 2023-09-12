@extends('layouts.admin')

@section('content')
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalCreateSubPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sub Process</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sub_processes.store') }}" method="post" id="formInsert">
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="textHelp">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="insertSubProcess()">Add Sub Process</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalEditSubPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Process</h4>
                </div>
                <div class="modal-body">
                    Update Data 1
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updateSubProcess()">Update Sub Process</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
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
        <h5 class="card-title fw-semibold mb-4">Sub Process List</h5>
        <button class="btn btn-success" onclick="modalCreateSubPro()">Add Sub Process</button>
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
                        @foreach ($subProcess as $sp)
                            <tr id="tr_{{ $sp->id }}">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $sp->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $sp->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success rounded-3 fw-semibold">{{ $sp->created_at }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-secondary rounded-3 fw-semibold">{{ $sp->updated_at }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-success"
                                        onclick="modalEditSubPro({{ $sp->id }})">Edit</button>
                                    <button class="btn btn-danger" onclick="modalDeleteSubPro({{ $sp->id }})"><i
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

        function modalCreateSubPro() {
            $('#modalCreateSubPro').modal('show');
        }

        function modalEditSubPro(id) {
            updateId = id
            $.get("{{ url('/admin/edit_subprocess') }}/" + id, function(data) {
                $("#modalEditSubPro .modal-body").html(data)
                $("#modalEditSubPro").modal("show");
            });
        }

        function modalDeleteSubPro(id) {
            // $('#modalDeleteSubPro').modal('show');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus sub-proses ini?',
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
                        url: '{{ route('sub_processes.deleteData') }}',
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
                        'Kategori berhasil terhapus.',
                        'success'
                    )
                }
            })
        }

        function insertSubProcess() {
            $('#formInsert').submit();
        }

        function updateSubProcess() {
            $('#form-update').submit();
        }

        new DataTable('#table');
    </script>
@endsection
