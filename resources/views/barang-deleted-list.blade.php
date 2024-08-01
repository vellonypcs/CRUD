@extends('layouts.mainlayout')

@section('title', 'Deleted Barang')

@section('content')
    <h1>Deleted Barang List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href ="/barang" class="btn btn-primary">Back</a>
    </div>
    
    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Barang</th>
                    <th>Action<th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedBarang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang_code }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        <a href="/barang-restore/{{$item->slug}}" class="btn btn-secondary">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection