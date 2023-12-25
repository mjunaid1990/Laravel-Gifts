<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('e-gifts-fav.jpg') }}">
    <style>
        .form-control {
            border: 1px solid #222;
            box-shadow: unset;
            outline: none;
        }
        .form-control:hover, .form-control:focus {
            border-color: #222;
            box-shadow: unset;
            outline: none;
        }
        .btn-primary {
            background-color: #222 !important;
            border-color: #222 !important;
        }
        .btn-primary:hover {
            background-color: #222 !important;
            border-color: #222 !important;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-12 col-md-4 offset-md-4 col-lg-4 offset-lg-4 ">
                <div id="auth-left">
                    <div class="auth-logo d-flex justify-content-center">
                        <a href="/">
                            <img src="/assets/images/logo_transparent_background_red.png" alt="" style="height: 70px;" />
                        </a>
                    </div>
                    <h2 class="text-center" style="color: #222;">Log in.</h2>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert" style="position:relative; top-22px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            

                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert" style="position:relative; top-22px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                        
                        @if (Route::has('password.request'))
                        <a class="d-block mt-3 text-center" href="{{ route('password.request') }}" style="color: #222;">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                        <a class="d-block mt-3 text-center" href="/" style="color: #222;">
                            Back to homepage
                        </a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>