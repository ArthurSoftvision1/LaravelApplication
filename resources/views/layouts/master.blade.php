<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    <div class="container">
        @yield('content')
        @include('includes.message-block')
        <div class="row">
            <div class="col-md-6">
                <h3>Sign Up</h3>
                <form action="{{ route('signup') }}" method="post">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <label for="first_name">Your First Name</label>
                        <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Your Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Sign In</h3>
                <form action="{{ route('signin') }}" method="post">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Your Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>