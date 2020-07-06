@extends('Layouts.AuthMaster.master')

@section('content')
<div class="vertical-align-wrap">
    <div class="vertical-align-middle">
        <div class="auth-box ">
            <div class="left">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center">
                            <img src="{{asset('admin/assets/img/logo.png')}}" alt="Klorofil Logo">
                        </div>
                        <p class="lead">Login</p>
                    </div>
                    <form class="form-auth-small" action="/postregister" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Name</label>
                            <input name="name" type="text" class="form-control" id="signup-name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Username</label>
                            <input name="username" type="text" class="form-control" id="signup-username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input name="email" type="email" class="form-control" id="signup-email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input name="password" type="password" class="form-control" id="signup-password" placeholder="Password">
                        </div>
                        <div class="form-group clearfix">

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                        <div class="bottom">
                            <span class="helper-text"><a href="/login">Login </a></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="overlay"></div>
                <div class="content text">
                    <h1 class="heading">Registrasi</h1>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop