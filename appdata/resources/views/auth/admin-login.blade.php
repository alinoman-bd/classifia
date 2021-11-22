<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <title>Admin | Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="#">
  <meta name="keywords" content="flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">
  <!-- <link rel="stylesheet" href="{{ asset('assets/admin-assets/css/bootstrap.min.css') }}"> -->

  <link rel="icon" href="{{ asset('assets/admin-assets/assets/images/favicon.ico')}}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Mada:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-assets/bower_components/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-assets/assets/icon/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-assets/assets/css/style.css')}}">
</head>



<body class="fix-menu">
  <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="login-card card-block auth-body m-auto">
            <form class="md-float-material" method="POST" action="{{ route('admin.login.submit') }}">
             @csrf
             <div class="text-center">
              <img src="{{ asset('assets/admin-assets/assets/images/logo.png')}}" alt="logo.png">
            </div>
            <div class="auth-box">
              <div class="row m-b-20">
                <div class="col-md-12">
                  <h3 class="text-left txt-primary">Sign In</h3>
                </div>
              </div>
              <hr/>
              <div class="input-group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Your Email Address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="md-line"></span>
              </div>
              <div class="input-group">
                <input type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="md-line"></span>
              </div>
             <!--  <div class="row m-t-25 text-left">
                <div class="col-sm-7 col-xs-12">
                  <div class="checkbox-fade fade-in-primary">
                    <label>
                      <input type="checkbox" value="">
                      <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                      <span class="text-inverse">Remember me</span>
                    </label>
                  </div>
                </div>
                <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                  <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                </div>
              </div> -->
              <div class="row m-t-30">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-9">
                  <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                  <p class="text-inverse text-left"><b>Your Autentification Team</b></p>
                </div>
                <div class="col-3">
                  <img src="{{ asset('assets/admin-assets/assets/images/auth/Logo-small-bottom.png')}}" alt="small-logo.png">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
