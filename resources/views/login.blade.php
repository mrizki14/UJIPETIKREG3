<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ujipetik Regional 3</title>
  <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>
<body>
  <div class="wrapper">
    <form action="{{route('login.submit')}}" method="POST">
      @csrf
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
        <div class="top">
            <img src="/assets/images/logo-telkom.png" width="130" alt="" srcset="">
            <h4>Dashboard Ujipetik</h4>
            <p>Telkom Regional 3 Jawa Barat</p>
        </div>
        <hr>
        <div class="input-field">
        <input name="username" type="text">
        <label>Username / NIK</label>
      </div>
      
      <div class="input-field">
        <input name="password" type="password">
        <label>Password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input name="remember_me" type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
      </div>
      <button type="submit">
        Login
    </button>
    </form>
  </div>
</body>
</html>