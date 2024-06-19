@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100 bg-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">
                            <i class="ti ti-plus fs-6"></i>
                            Tambah Pegawai</button>
                    </div>
                    <table class="table table-striped table-dark" id="tableEmployee">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Aksi</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>No HP</td>
                                <td>Alamat</td>
                                <td>Jabatan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7"> Masih dalam proses Pengambilan data, Loading...</td>
                            </tr>

                            {{-- <td>1</td>
                            <td>
                                <button type="button" class="btn btn-warning">
                                    Ubah
                                </button>
                                <button type="button" class="btn btn-danger">
                                    Hapus
                                </button>
                            </td>
                            <td>Mohammad Ibnu</td>
                            <td>siibnu99@gmail.com</td>
                            <td>0851567823</td>
                            <td>Malang</td>
                            <td>Karyawan</td> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('api.employee.store') }}" id="formAddEmployee">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeLabel">Tambah Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editEmployee" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('api.employee.update', 'employeeId') }}" id="formEditEmployee">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editEmployeeLabel">Edit Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="previewEmployee" tabindex="-1" aria-labelledby="previewEmployeeLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="previewEmployeeLabel">Detail Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#addEmployee').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            });

            $('#formAddEmployee').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success"
                        });
                        $('#addEmployee').modal('hide');
                        getEmployee();
                    }
                });
            });

            $('#formEditEmployee').submit(function(e) {
                e.preventDefault();
                let url = $(this).attr('action');
                let id = $(this).find('input[name="id"]').val();
                url = url.replace('employeeId', id);
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success"
                        });
                        $('#editEmployee').modal('hide');
                        getEmployee();
                    }
                });
            });

            $(document).on('click', '.btn-hapus', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ route('api.employee.destroy', 'id') }}";
                        url = url.replace('id', id);
                        console.log(url);
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: response.message,
                                    icon: "success"
                                });
                                getEmployee();
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-ubah', function() {
                let id = $(this).data('id');
                let url = "{{ route('api.employee.destroy', 'employeeId') }}";
                url = url.replace('employeeId', id);
                var form = $('#editEmployee form');
                form.trigger('reset');
                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        form.find('input[name="id"]').val(response.employee.id);
                        form.find('input[name="name"]').val(response.employee.name);
                        form.find('input[name="email"]').val(response.employee.email);
                        form.find('input[name="phone"]').val(response.employee.phone);
                        form.find('input[name="address"]').val(response.employee.address);
                        form.find('input[name="position"]').val(response.employee.position);
                        $('#editEmployee').modal('show');
                    }
                });

            });

            $(document).on('click', '.btn-preview', function() {
                let id = $(this).data('id');
                let url = "{{ route('api.employee.show', 'employeeId') }}";
                url = url.replace('employeeId', id);
                var modal = $('#previewEmployee');
                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        modal.find('input[name="name"]').val(response.employee.name);
                        modal.find('input[name="email"]').val(response.employee.email);
                        modal.find('input[name="phone"]').val(response.employee.phone);
                        modal.find('input[name="address"]').val(response.employee.address);
                        modal.find('input[name="position"]').val(response.employee.position);
                        $('#previewEmployee').modal('show');
                    }
                });

            });

            function getEmployee() {
                $.ajax({
                    url: "{{ route('api.employee.index') }}",
                    method: 'GET',
                    success: function(response) {
                        var tbody = $('#tableEmployee tbody');
                        tbody.html('');
                        response.employees.forEach(function(employee, index) {
                            var tr = $('<tr>');
                            tr.append('<td>' + (index + 1) + '</td>');
                            tr.append(
                                `<td>
                                    <button type="button" class="btn btn-warning btn-ubah" data-id="${employee.id}">Ubah</button>
                                    <button type="button" class="btn btn-danger btn-hapus" data-id="${employee.id}">Hapus</button>
                                </td>`
                            );
                            tr.append(
                                `<td>
                                    <a href="#" class="text-info btn-preview" data-id="${employee.id}">${employee.name}</a>
                                </td>`
                            )
                            tr.append('<td>' + employee.email + '</td>');
                            tr.append('<td>' + employee.phone + '</td>');
                            tr.append('<td>' + employee.address + '</td>');
                            tr.append('<td>' + employee.position + '</td>');
                            tbody.append(tr);
                        });
                    }
                });
            }
            getEmployee();
        });
    </script>
@endpush
