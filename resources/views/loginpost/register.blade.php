<!DOCTYPE html>
<html lang="en">
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    @include('Layouttemp.header')
  </head>
    <div class="card-header text-center">
      <a href="#" class="h1">TOKO Tanaman<b>Digital</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="/registerpost" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" 
          value="{{old('nama')}}" name="nama" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
          value="{{old('email')}}" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="input-group mb-3">
          <input type="telpon" class="form-control @error('telpon') is-invalid @enderror" id="telpon" 
          value="{{old('telpon')}}" name="telpon" placeholder="Telpon">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('telpon')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
          value="{{old('password')}}" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="input-group mb-3">
          <input type="password"  class="form-control @error('retype_password') is-invalid @enderror" id="retype_password" 
          name="retype_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('retype_password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('Layouttemp.script') 

</body>
</html>
