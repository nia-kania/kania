<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
</head>
<body>
  <!-- Navbar links for Data Siswa and Data Akun -->
  <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a>
  <a class="nav-link" href="{{ route('akun.index') }}">Data Akun</a>
<h1>Dashboard Admin</h1>

  <!-- Session message or default message -->
  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
      {{ $message }}
    </div>
  @else
    <p>You are logged in!</p>
  @endif

</body>
</html>
