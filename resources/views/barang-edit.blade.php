@extends('layouts.mainlayout')

@section('title', 'Edit Barang')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Barang</h1>

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
        
        <form action="/barang-edit/{{$barang->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="barang_code" id="code" class="form-control" placeholder="Barang's Code" value="{{ $barang->barang_code }}">
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Barang's Name" value="{{ $barang->nama_barang }}">
            </div>

            <div class="mb-3">
                <label for="gambarbarang" class="form-label">Image</label>
                <input type="file" name="gambarbarang" class="form-control">
            </div>

            <div class="mb-3">
                <label for="currentGambarbarang" class="form-label" style="display: block">Current Image</label>
                @if ($barang->gambar!='')
                <img src="{{ asset('storage/gambar/'.$barang->gambar) }}" alt="" width="200px">
                @else
                <img src="{{ asset('images/gambar-not-found.png') }}" alt="" width="200px">
                @endif
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($barang->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
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