@extends('layouts.mainlayout')

@section('title', 'Delete Barang')

@section('content')
    <h2>Are you sure to delete this Barang {{$barang->nama_barang}}?</h2>
    <div class="mt-5">
        <a href="/barang-destroy/{{$barang->slug}}" class="btn btn-danger me-3">Sure</a>
        <a href="/barang" class="btn btn-primary">Cancel</a>
    </div>
@endsection