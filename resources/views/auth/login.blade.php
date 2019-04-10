<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset ('cooladmin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset ('cooladmin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset ('cooladmin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset ('cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset ('cooladmin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h2><b style="font-family: cursive; color: blue;">Kripcok</b></h2><br>
                            <h6>Login dulu mas</h6>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" class="au-input au-input--full{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" class="au-input au-input--full{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">        {{ __('Login') }}
                                </button>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit"><a href="{{route('register')}}" style="color: white;">Register</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset ('cooladmin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset ('cooladmin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset ('cooladmin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset ('cooladmin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset ('cooladmin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset ('cooladmin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset ('cooladmin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset ('cooladmin/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->