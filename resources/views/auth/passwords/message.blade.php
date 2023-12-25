
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('e-gifts-fav.jpg') }}">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-12 col-md-4 offset-md-4 col-lg-4 offset-lg-4">
                <div id="auth-left">
                    <div class="auth-logo d-flex justify-content-center">
                      <a href="/">
                            <img src="/assets/images/logo_transparent_background_red.png" alt="" style="height: 70px;" />
                        </a>
                    </div>
                    <h2 class="text-center" style="color: #222;">{{ __('Reset Password') }}</h2>

                    <p class="text-center">If you are a registered customer an email will be sent with a password reset link</p>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>


