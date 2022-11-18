@extends('layouts.app')

@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & SignUp Form </title>
    <link href="{{ asset('css/pages/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper container">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>

        <!-- Start Form Container -->
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slider" id="login" checked>
                <input type="radio" name="slider" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup"> Signup</label>
                <div class="slide-tab"></div>
            </div>

            <div class="form-inner">

            


                <!-- Start Login Form -->
                <form action="{{route('auth')}}" method = POST class="login">
                    @csrf {{ csrf_field() }} 
                    <div class="field input-group">

                        <input type="text" name = 'email' class="form-control" placeholder="Email" required>
                        
                    </div>
                    <div class="field input-group input-icons">
                        <input type="password" name = 'password' class="form-control" placeholder="Password" required></input>
                    </div>
                    <div class="pass-link">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>
                    <div class="field input-group">
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">
                        Not a member? <a href="#">Signup now</a>
                    </div>
                </form>

                <!-- Start Signup Form -->
                <form action="#" class="signup">
                    <div class="field input-group">
                        <input type="text" class="form-control" placeholder="User Name" required>
                    </div>
                    <div class="field input-group">
                        <input type="text" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="field input-group">
                        <input type="date" class="form-control" value="2023-11-16" min="1850-01-01" max="2022-11-16" required/>
                    </div>
                    <select class="form-select field input-group" aria-label="Default select example">
                        <option disabled="disabled" selected class="form-control">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                    <div class="field input-group">
                        <input type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="field input-group">
                        <input type="password" class="form-control" placeholder="Confirm password" required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="padding-top:7px;"> Profile Photo </label>
                        <input class="form-control input-group" type="file" id="formFile">
                    </div>

                    <div class="field input-group">
                        <input type="submit" value="Signup">
                    </div>



                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection