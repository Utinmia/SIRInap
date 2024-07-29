@extends('admin.template.base')

@section('title', 'Sirehap - Administrator')

@section('content')
    <style>
        .btn-icon-left {
            margin-right: .5rem !important;
        }
    </style>

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Administrator</h4>
                    {{-- <span class="ml-1">Data akun administrator</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active"><a href="#">Administrator</a></li>
                </ol> --}}
                <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#createAdminModal">
                    <span class="btn-icon-left text-primary">
                        <i class="fa fa-plus"></i>
                    </span>Tambah Data
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Data Administrator</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 8%">No</th>
                                        <th style="width: 30%">Nama</th>
                                        <th style="width: 30%">Email</th>
                                        <th style="width: 5%">Role</th>
                                        <th style="width: 5%">Status</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_admin as $admin)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $admin->nama }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td class="text-center">
                                                {{-- <span class="badge badge-primary badge-pill">{{ $admin->role }}</span> --}}
                                                <span
                                                    class="badge badge-pill {{ $admin->getRoleBadgeClass() }}">{{ $admin->role }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge badge-pill {{ $admin->getStatusBadgeClass() }}">{{ $admin->status }}</span>
                                            </td>
                                            <td>
                                                <div class="tooltip-container">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs"
                                                        data-toggle="modal" data-target="#editAdminModal"
                                                        data-id="{{ $admin->id }}" data-nama="{{ $admin->nama }}"
                                                        data-email="{{ $admin->email }}" data-role="{{ $admin->role }}"
                                                        data-status="{{ $admin->status }}"><i class="fas fa-edit"></i>
                                                    </button>
                                                    <div class="tooltip-text">Edit Data</div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-danger btn-xs"
                                                        data-toggle="modal" data-target="#deleteAdminModal"
                                                        data-id="{{ $admin->id }}"><i class="fas fa-trash"></i>
                                                    </button>
                                                    <div class="tooltip-text">Hapus Data</div>
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
    </div>

    @include('admin.users.administrator.modalCreate')
    @include('admin.users.administrator.modalEdit')
    @include('admin.users.administrator.modalDelete')
@endsection

@section('scripts')
    @include('admin.users.administrator.scripts')
@endsection