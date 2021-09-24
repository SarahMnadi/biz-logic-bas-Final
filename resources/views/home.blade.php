<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Biz-Logic BAS') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
     href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    Body{background-color: lavender;
        font-family: "Lato", sans-serif;
        
    /* opacity: 0.2; */
        
    }
    .jumbotron{
        margin-top: -20px;
        font-size: 20px;
        font-family: 'Times New Roman', Times, serif;
        /* background-image: url("paper.gif"); */
        background-image:url('{{url ('img/biz-logo.png') }}');
        /* background-image: url('{{ asset('images/job.jpg') }}'); */
        background-attachment: scroll;
    background-size: contain;
    width:100%;
    height:100%;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: contain;
    background-position: center;
  margin-top:50px;
    display: flex;
   
    justify-content: center;
   
    max-height: 48rem;
}

    }
    .login-box{
        margin-left: 500px

    }
    .login-box{
        font-family: "Lato", sans-serif;
    font-weight: normal;
    font-style: normal;
;
line-height: 1.5;

    }
    .card-body{
        min-height: 400px;
      
    
    }
    p, a{
        color: #041f5c;
    font-family: "Fjalla One", sans-serif;
    font-weight: normal;
    font-style: normal;
    font-size: 1.375rem;
    text-shadow: 1px 1px 2px rgb(11 84 147 / 63%);
    text-align: center;
    }

    
</style>
<body>
    <div class="jumbotron text-center">
            <div class="login-box" >
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body" >
                        <a href="#" >
                            <img src="{{ asset('img/logo.png') }}" alt="Bas Logo" style="height: 100px">
                        </a>
                        <p class="login-box-msg">Biometric Attendance System</p>
        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input class="form-check-input" name="remember" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <a href="{{ route('Match_Print') }}" class="nav-link " onclick="toggle_active_class()">
                                            Staff?, Click here</a>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer ">
                        <h6 class="mb-2">mnadisarah@gmail.com</h6>
                        <h6 class="mb-2">kilumawilliam@gmail.com</h6>
                        <h6 class="mb-2">hongokelvin@gmail.com</h6>
                        <h6 class="mb-2">mwaiselampoki@gmail.com</h6>
                        <h6 class="mb-2">rashidishabani@gmail.com</h6>
                    </div> --}}
          
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->
        
            <!-- jQuery -->
            <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>

        </p>
      </div>
    {{-- </div>
<div class="main-area">
            <div class="auth-box">
              <div class="card card-auth">
                <div class="card-body">
                  <div class="corp-logo">
                    <img src="./images/RCP-logo_medium_size.png" alt="">
                  </div>

                  <h1 class="system-title">Religious Contribution Portal</h1>

                  <div class="site-login">
                    <hr class="mt-0">
                    <!-- <form action="" method="POST" autocomplete="off"> -->
                      <div class="form-group">
                        <label class="font-w500 mb-1" for="username">Username</label>
                        <input type="text" class="form-control" id="txtuname" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label class="font-w500 mb-1" for="userpassword">Password</label>
                        <div id="password-box">
                          <input type="password" class="form-control" id="txtpwd" placeholder="Enter password">
                          <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="form-group d-flex justify-content-between auth-control mb-0">
                        <div class="col-auto d-flex align-items-center p-0">
                          <a href="/Forgot/Forgot" class="text-muted font-w700">
                            <i class="fa fa-lock" aria-hidden="true"></i> Forgot
                            your password?
                          </a>
                        </div>
                        <div class="col-auto text-right p-0">
                          <button class="btn btn-biz_logic" id="btnSubmit" type="submit">
                            Log In
                          </button>
                        </div>
                      </div>
                    <!-- </form> -->
                    <hr>
                  </div>
                  <p class="small mb-0 text-center">Powered by</p>
                  <p class="medium mb-0 text-center">
                    <a class="text-muted font-w500" href="http://bizlogicsolutions.com/">Biz-Logic Solutions Ltd.</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
       --}}
</body>

</html>

