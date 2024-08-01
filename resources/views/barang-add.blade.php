@extends('layouts.mainlayout')

@section('title', 'Add Barang')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Add New Barang</h1>

    <div class="mt-5 w-50">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="barang-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Kode Barang</label>
                <input type="text" name="barang_code" id="code" class="form-control" placeholder="Kode Barang" value="{{ old('barang_code')}}">
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ old('nama_barang')}}">
            </div>

            <div class="mb-3">
                <label for="gambarbarang" class="form-label">Gambar Barang</label>
                <input type="file" name="gambarbarang" class="form-control">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[] " id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
</script>
@endsection