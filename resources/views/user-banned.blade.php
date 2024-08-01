@extends('layouts.mainlayout')

@section('title', 'Banned Users')

@section('content')
    <h1>Banned User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href ="/users" class="btn btn-primary">Back</a>
    </div>
    
        <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUsers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @if ($item->phone)
                        {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-restore/{{$item->slug}}" class="btn btn-primary">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection