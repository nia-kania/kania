<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Akun</title>
</head>

<body>
  <h1>Tambah User</h1>
  <br><br>

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
    <label for="name">Nama Lengkap</label><br>
    <input type="text" id="name" name="name" value="{{ old('name') }}"><br><br>

    <label for="email">Email Address</label><br>
    <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>

    <label for="password">Password</label><br>
    <input type="password" id="password" name="password"><br><br>

    <label for="password_confirmation">Confirm Password</label><br>
    <input type="password" id="password_confirmation" name="password_confirmation"><br><br>

    <label for="usertype">Hak Akses</label><br>
    <select name="usertype" id="usertype" required>
      <option value="">Pilih Hak Akses</option>
      <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
      <option value="ptk" {{ old('usertype') == 'ptk' ? 'selected' : '' }}>PTK</option>
    </select><br><br>

    <input type="submit" value="Register">
  </form>
</body>
</html>
