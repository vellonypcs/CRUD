@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')


    <h1>Welcome, {{Auth::user()->username}}</h1>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data barang">
                <div class="row">
                    <div class="col-6"><i class="bi bi-box2-heart"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Barang</div>
                        <div class="card-count">{{$barang_count}}</div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-card-list"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Category</div>
                        <div class="card-count">{{$category_count}}</div> 
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-4">
                <div class="card-data user">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-people-fill"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Users</div>
                            <div class="card-count">{{$user_count}}</div> 
                        </div>
                    </div>
                </div>
            </div>
    </div>

        <div class="mt-5">
            <h2>Rent-Log</h2>

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Barang</th>
                            <th>Rent Date</th>
                            <th>Return Date</th>
                            <th>Actual Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rent_logs as $log)
                            <tr class="{{ $log->actual_return_date == null ? '' : ($log->return_date < $log->actual_return_date ? 'text-bg-danger' : 'text-bg-success') }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user->username }}</td>
                                <td>{{ $log->barang->nama_barang }}</td>
                                <td>{{ $log->rent_date }}</td>
                                <td>{{ $log->return_date }}</td>
                                <td>{{ $log->actual_return_date }}</td>
                                <td>{{ $log->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User</th>
                        <th>Nama Barang</th>
                        <th>Rent Date</th>
                        <th>Return Date</th>
                        <th>Actual Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <x-rent-log-table :rentlog='$rent_logs' />
                    <tr>
                        <td colspan="7" style="text-align: center">No Data</td>
                    </tr>
            </table>
        </div> --}}

@endsection