<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Akun</title>
  <style type ="text/css">
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0px;
    }

    table,
    th,
    td {
      border: 1px solid;
    }
  </style>
</head>

<body>
  <h1>Edit Akun</h1>
  <a href="{{ route('akun.index') }}">Kembali</a><br><br>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $erors)
      <li>{{  $errors }}</li>
      @endforeach
     </ul>
  </div>
  @endif

  @if(Session::has('succes'))
  <div class="alert alert-succes" role="alert">
    {{ Session::get('succes') }}
  </div>
  @endif

  <from action="{[ route( 'akun.update',$akun->id ) ]}" method ="POST" enctype="mulltipart/form-data">
    @csrf
    @method('PUT')
    <h2>Data Akun</h2>
    <label>Nama Lengkap</label><br>
    <input type="text" id="name" name="name" value="{{ $akun->name }}">
    <br><br>

    <label>Hak akses</label><br>
    <select name="usertype" required>
      <option {{ 'admin' == $akun->usertype ? 'selected' : '' }} value="admin">Admin</option> 
      <option {{ 'ptk' == $akun->usertype ? 'selected' : '' }} value="ptk">PTK</option> 
    </select>
    <br><br>

    <button type="submit">SIMPAN DATA</button>
    <br><br>
  </form>

  <from action="{{ route('updateEmail',$akun->id ) }}" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Email Address</label><br>
    <input type="email"id="email" name="email" value="{{  $akun->email }}">
    <br><br>

    <button type="submit">SIMPAN EMAIL</button>
    <br><br>
  </from>

  <form action="{{ route('updatePassword',$akun->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Password</label><br>
    <input type="pasword" id="password" name="password">
    <br><br>

    <label for="password_comfirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
    <div class="col-md-6">
      <input type="password" class="form-control" id="password-confirmation">
    </div>
    <br><br>

    <button type="sumbit">SIMPAN PASSWORD</button>
    <br><br>
  </form>
</body>
</html>