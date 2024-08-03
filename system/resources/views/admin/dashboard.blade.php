@extends('admin.template.base')

@section('title', 'SIRInap - Sistem Informasi Reserfasi Penginapan')

@section('content')

    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Kamar</div>
                            <div class="stat-digit"> <i class="fas fa-hotel"></i>{{$total_kamar}}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Reservasi</div>
                            <div class="stat-digit"> <i class="fas fa-calendar-check"></i>{{$total_reservasi}}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Admin</div>
                            <div class="stat-digit"> <i class="fas fa-users"></i> {{$total_admin}}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Konsumen</div>
                            <div class="stat-digit"> <i class="fas fa-users"></i>{{$total_user}}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reservasi Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Konsumen</th>
                                        <th>Kamar</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_reservasi as $reservasi)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>@if($reservasi->user)
                                                {{$reservasi->user->nama}}
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($reservasi->kamars as $kamar)
                                                        <li>{{ $kamar->tipe_kamar }} {{ $kamar->nomor_kamar }} -
                                                            Rp {{ number_format($kamar->harga, 0) }} / malam</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>Rp {{ number_format($reservasi->total_biaya, 0) }}</td>
                                            <td><span
                                                class="badge {{ $reservasi->getStatusBadgeClass() }}">{{ $reservasi->status }}</span></td>
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

@endsection
