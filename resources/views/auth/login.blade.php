<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login -> {{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&amp;family=Open+Sans:wght@400;500;700&amp;display=swap" />

    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body::before{
            content: "";
            position: fixed;
            height: 100vh;
            width: 100%;
            background: url(/assets/img/bg/banner3-bg3.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            z-index: -1;
            -webkit-filter: blur(10px);
            font-family: 'Josefin';
        }

        .container{
            position: absolute;
            height: 500px;
            width: 360px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 1px solid white;
            border-radius: 4px;
            box-shadow: 0 0 5px white;
            background: rgba(255, 255, 255, 0.3);
        }

        .container h2{
            text-align: center;
            margin: 20px auto;
            letter-spacing: 2px;
            color: #f81781;
        }

        .container .avtar{
            height: 120px;
            width: 120px;
            margin-left: 33%;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .container form{
            display: flex;
            flex-direction: column;
            padding: 0 20px;
        }

        .container form label{
            font-family: sans-serif;
            margin: 10px 0;
            letter-spacing: 1px;
            color: rgba(0, 0, 0, 0.8);
            font-size: 18px;
        }

        .container form input[type=email],
        .container form input[type=password]{
            display: block;
            height: 35px;
            border-radius: 8px;
            outline: none;
            background: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            padding-left: 10px;
            color: #f81781;
            border: 2px solid #f81781;
        }

        .container form input[type=email]:focus,
        .container form input[type=password]:focus{
            background: rgba(0, 0, 0, .8);
        }

        .container form input[type=submit]{
            margin-top: 20px;
            height: 38px;
            border-radius: 8px;
            background: #f81781;
            font-family: 'Josefin';
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            border: 3px solid #f81781;
        }

        .container form input[type=submit]:hover{
            background: rgba(255, 255, 255, 0.6);
            transition: all .5s ease;
            color: #f81781;
        }
    </style>

</head>
<body>

    <div class="container">
        <h2>{{ config('app.name') }}</h2>
        <img class="avtar" src="{{ asset('images/defaults/user.png') }}" alt="">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="">E-Mail Address</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div style="display: flex; margin-top:15px; color:rgba(0, 0, 0, .8);">
                <span><input style="margin-top: 4px" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></span>&nbsp;<span>{{ __('Remember Me') }}</span>
            </div>

            <input type="submit" value="Login">

        </form>
    </div>
    
</body>
</html>

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
