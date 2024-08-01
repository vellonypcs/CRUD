<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Barang RW 010 | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        </nav>
    </body>

<style>
    .main {
        height: 100vh;
    }

    .login-logo {
        width: 150px; /* Atur lebar logo */
        height: auto; /* Pertahankan rasio aspek gambar */
        display: block; /* Membuat gambar sebagai elemen blok untuk pengaturan margin */
        margin: 0 auto 20px auto; /* Mengatur margin: atas 0, kiri dan kanan auto (untuk memusatkan), bawah 20px */
    }

    .navbar {
        margin-bottom: 20px;
    }

    .register-box {
        margin-top: 20px;
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }

    form div {
        margin-bottom: 10px;
    }
    
</style>

<body>

    <div class="main d-flex flex-column justify-content-right align-items-center">
        @if ($errors->any())
        <div class="alert alert-danger" style="width: 500px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success" style="width: 500px">
        {{ session('message') }}
    </div>
    @endif 

    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="login-logo"> <!-- Path ke logo Anda -->
        <div class="register-box">
        <form action="" method="post">
            @csrf
            <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div>
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" pattern="[0-9]+" title="Please enter a valid phone number (numbers only)" required>
            </div>
            <div>
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
            <div class="text-center">
                Have account? <a href="login">Login</a>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>