@extends('layouts.admin')

@section('content')
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalCreateAdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Admin</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store') }}" method="post" id="formInsert">
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="textHelp">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="textHelp">
                            <div id="passwordHelp" class="form-text">Email harus memiliki @.</div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                aria-describedby="passwordHelp" minlength="8" required>
                            <div id="passwordHelp" class="form-text">Password harus memiliki setidaknya 8 karakter.</div>
                            <div id="passwordHelp" class="form-text text-danger">
                                {{-- @error('password')
                                    {{ $message }}
                                @enderror --}}
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="textHelp">
                            <div id="textHelp" class="form-text">Nomor Telepon minimal 10 dan maksimal 13</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="insertAdmin()">Add Admin</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="modalEditCust" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Customer</h4>
                </div>
                <div class="modal-body">
                    Update Data 1
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updateCustomer()">Update Customer</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modalEditAdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Admin</h4>
                </div>
                <div class="modal-body">
                    Update Data 1
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updateAdmin()">Update Admin</button>
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
        <h5 class="card-title fw-semibold mb-4">Customer List</h5>
        <div class="card">
            <div class="card-body p-4">
                <table class="table text-nowrap mb-0 align-middle" border=1 id="table1">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Phone Number</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Address</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">City</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Postal Code</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $c)
                            <tr id="tr_{{ $c->id }}">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->email }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->phone_number }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->street_address }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->city }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $c->postal_code }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-success"
                                        onclick="modalEditCust({{ $c->id }})">Edit</button>
                                    <button class="btn btn-danger" onclick="modalDeleteCust({{ $c->id }})"><i
                                            class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Admin List</h5>
        <button class="btn btn-success" onclick="modalCreateAdm()">Add Admin</button>
        <div class="card">
            <div class="card-body p-4">
                <table class="table text-nowrap mb-0 align-middle" border=1 id="table2">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Phone Number</h6>
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
                        @foreach ($admin as $a)
                            <tr id="tr_{{ $a->id }}">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->email }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->phone_number }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->created_at }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $a->updated_at }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-success"
                                        onclick="modalEditAdm({{ $a->id }})">Edit</button>
                                    <button class="btn btn-danger" onclick="modalDeleteAdm({{ $a->id }})"><i
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

        function modalCreateAdm() {
            $('#modalCreateAdm').modal('show');
        }

        function modalEditCust(id) {
            $.get("{{ url('admin/update_customer') }}/" + id, function(data) {
                $('#modalEditCust .modal-body').html(data);
                $('#modalEditCust').modal('show');
            });
        }

        function modalEditAdm(id) {
            $.get("{{ url('admin/update_admin') }}/" + id, function(data) {
                $('#modalEditAdm .modal-body').html(data);
                $('#modalEditAdm').modal('show');
            });
        }

        function modalDeleteCust(id) {
            // $('#modalDeleteCust').modal('show');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus pelanggan ini?',
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
                        url: '{{ route('user.deleteData') }}',
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
                        'Pelanggan berhasil terhapus.',
                        'success'
                    )
                }
            })
        }

        function modalDeleteAdm(id) {
            // $('#modalDeleteCust').modal('show');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus admin ini?',
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
                        url: '{{ route('user.deleteData') }}',
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
                        'Pelanggan berhasil terhapus.',
                        'success'
                    )
                }
            })
        }

        function insertAdmin() {
            $('#formInsert').submit();
        }

        function updateCustomer() {
            $('#form-update').submit();
        }

        function updateAdmin() {
            $('#form-update').submit();
        }

        // $("#admcust-table").DataTable();
        new DataTable('#table1');
        new DataTable('#table2');
    </script>
@endsection
