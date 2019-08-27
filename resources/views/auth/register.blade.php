

<!DOCTYPE html>
<html lang="en">
<head>
    <title>sing up</title>
    @php
        $applogo=DB::table('settings')->get();
    @endphp
    @foreach($applogo as $row)
        <link rel="icon" href="{{URL::to('images/'.$row->favicon)}}" type="image/x-icon">
    @endforeach
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
						EasyAdmin
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input id="name" type="text" class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('name') }}</strong>
                 </span>
                    @endif
                </div>
                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
                    <input class="input100" type="text" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="text-right p-t-13 p-b-23">
                <div class="wrap-input100 validate-input" data-validate = "Please Confirm password">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required placeholder="Confirm Password">
                </div>



                <div class="text-right p-t-13 p-b-23">

                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign Up
                    </button>
                </div>

                <div class="flex-col-c p-t-30 p-b-40">

                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
</body>
</html>
