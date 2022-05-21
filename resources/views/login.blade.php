@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                @if ($error == 1)
                    <div class="alert alert-danger">
                        <p style="text-align: center"><strong>Login Failed.  Please Try Again</strong> </p>
                    </div><br />
                @endif
                <div class="card-body">
                    <form action="login" method="POST">
                        @csrf
                        <div class="mb-3"><label class="form-label" for="username">Username</label><input class="form-control item" type="username" name="username" maxlength="30" required="" minlength="1"></div>
                        <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password" required="" minlength="6" maxlength="15" autocomplete="off"></div>
                        <button class="btn btn-primary" type="submit">Login</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-primary" role="button" href="/register" type="submit">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
