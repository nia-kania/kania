@extendes('auth.layouts')

@section('content')

  <h1>Login</h1>
  <a href="{{ routes('register') }}">Daftar</a>
  <br></br>
  <form action="{{ route('authenticate') }}" method ="post">
    @csrf
    <label>EmailAddress</label><br>
    <input type="emai" id ="email" name="email" value ="{{ old('email') }}"><br><br>
    <label>Password</label><br>
    <input type ="Password" id ="Password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

@endsection

