@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Login Page</h1>
            <hr>
            @include('messages')
        </div>
        <div class="col-md-12">
            <form action="" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="username">Username:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('username')}}
                        </a>
                    </label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('password')}}
                        </a>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
