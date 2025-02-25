<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h1>Tambah User</h1>
    <a href="{{ route('admin.dashboard') }}">Kembali</a><br><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('akun.store') }}" method="POST">
        @csrf
        <label>Nama Lengkap</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email Address</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <label for="password_confirmation">Confirm Password</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <label>Hak Akses</label><br>
        <select name="usertype" required>
            <option value="">Pilih Hak Akses</option>
            <option value="admin">Admin</option>
            <option value="ptk">PTK</option>
        </select><br><br>

        <input type="submit" value="Tambah User">
    </form>
</body>
</html>
