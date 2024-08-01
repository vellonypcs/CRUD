@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('page-name', 'dashboard')

@section('content')
    <h1>Add Barang</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="barang-deleted" class="btn btn-secondary me-3">View Deleted Barang</a>
        <a href="barang-add" class="btn btn-primary">Add Barang</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang_code }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/barang-edit/{{$item->slug}}" class="btn btn-primary">Edit</a>
                        <a href="/barang-delete/{{$item->slug}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection