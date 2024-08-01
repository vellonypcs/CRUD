@extends('layouts.mainlayout')

@section('title', 'Detail User')

@section('content')
    <h1>Detail User</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'inactive')
        <a href ="/registered-users" class="btn btn-primary me-3">Back</a>
        <a href="/user-approve/{{$user->slug}}" class="btn btn-info">Approve User</a>
        @endif
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="my-5 w-25">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{$user->username}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" readonly value="{{$user->nama}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telepon</label>
            <input type="text" class="form-control" readonly value="{{$user->telepon}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Alamat</label>
            <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize:none">{{ $user->adress }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{$user->status}}">
        </div>
    </div>

    <div class="mt-5">
        <h2>User's Rent Log</h2>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>

@endsection