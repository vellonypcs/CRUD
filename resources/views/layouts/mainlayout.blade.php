<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Barang RW 010 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href ="{{ asset('css/style.css') }}">
    <style>
        .navbar-brand img {
            width: 40px; /* Sesuaikan ukuran logo */
            height: auto;
            margin-right: 10px; /* Spasi antara logo dan teks */
        }
    </style>
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-info">
            <div class="container-fluid">
                <!-- Tambahkan elemen img di sini -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"> <!-- Path ke logo Anda -->
                    <span>Peminjaman Barang RW 010</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        
        {{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Barang RW 010 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href ="{{asset('css/style.css')}}">
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-info">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Peminjaman Barang RW 010</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </nav> --}}

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user())
                    @if (Auth::user()->role_id == 1)
                        <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif><i class="bi bi-speedometer2" style="margin-right: 8px;"></i>Dashboard</a>
                        <a href="/barang" @if(request()->route()->uri == 'barang' || request()->route()->uri == 'barang-add' || request()->route()->uri == 'barang-deleted' || request()->route()->uri == 'barang-edit/{slug}' || request()->route()->uri == 'barang-deleted/{slug}')  class='active' @endif><i class="bi bi-box" style="margin-right: 8px;"></i>Add Barang</a>
                        <a href="category" @if(request()->route()->uri == 'category' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted/{slug}') class='active' @endif><i class="bi bi-card-list" style="margin-right: 8px;"></i>Add Category</a>
                        <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri == 'registered-users' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-ban/{slug}' || request()->route()->uri == 'user-banned') class='active' @endif><i class="bi bi-people-fill" style="margin-right: 8px;"></i>Users</a>
                        <a href="/rent-logs" @if(request()->route()->uri == 'rent-logs') class='active' @endif><i class="bi bi-clipboard-data" style="margin-right: 8px;"></i>Data Peminjaman</a>
                        <a href="/" @if(request()->route()->uri == '/') class='active' @endif><i class="bi bi-box2-heart" style="margin-right: 8px;"></i>List Barang</a>
                        <a href="/barang-rent" @if(request()->route()->uri == 'barang-rent') class='active' @endif><i class="bi bi-box-arrow-down" style="margin-right: 8px;"></i>Form Peminjaman</a>
                        <a href="barang-return" @if(request()->route()->uri == 'barang-return') class='active' @endif><i class="bi bi-box-arrow-up" style="margin-right: 8px;"></i>Form Pengembalian</a>
                        <a href="/logout"><i class="bi bi-escape" style="margin-right: 8px;"></i>Logout</a>
                    @else
                        <a href="profile"@if(request()->route()->uri == 'profile') class='active' @endif><i class="bi bi-person-circle" style="margin-right: 8px;"></i>Profile Peminjaman</a>
                        <a href="/"@if(request()->route()->uri == '/') class='active' @endif><i class="bi bi-box2-heart" style="margin-right: 8px;"></i>List Barang</a>
                        <a href="logout"><i class="bi bi-escape" style="margin-right: 8px;"></i>Logout</a>
                        @endif
                    @else
                        <a href="logout"><i class="bi bi-person-square" style="margin-right: 8px;"></i>Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- <div>
        @yield('content')
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>