@extends('layouts.mainlayout')

@section('title', 'List Barang')

@section('content')

    <form action="" method="get">
    <div class="row">
        {{-- <div class="col-12 col-sm-6">
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="col-12 col-sm-6">
            <div class="input-group mb-3">
                <input type="text" name="nama_barang" class="form-control" placeholder="Cari Nama Barang">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </div>
    </form>

    <div class="my-5">
        <div class="row">

            @foreach ($barang as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <img src="{{ $item->gambar != null ? asset('storage/gambar/'.$item->gambar) : asset('images/gambar-not-found.png') }}" class="card-img-top" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->barang_code }}</h5>
                        <p class="card-text">{{ $item->nama_barang }}</p>
                        <p class="card-text text-end fw-bold {{ $item->status == 'tersedia' ? 'text-success' : 'text-danger' }}">
                            {{ $item->status }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection