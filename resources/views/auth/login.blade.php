@extends('layouts.app')

@section('login')

<div id="masuk">
    <div id="login">
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <h3 class="text-center text-info">Dashboard Login Admin</h3>
                            <div
                                class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <label for="email" class="text-info">Email:</label><br>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autofocus
                                    placeholder="Email Address">
                            </div>
                            <div
                                class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="text-info">Password:</label><br>
                                <input id="password" type="password" class="form-control" name="password" required
                                    placeholder="Password ">

                                @if($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <a href="{{ route('register') }}">Register</a>
                                <div>
                                    <input type="submit" name="submit" class="btn btn-success btn-lg btn-block"
                                        value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
