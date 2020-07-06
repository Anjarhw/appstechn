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
                    <form class="form-auth-small" action="/postlogin" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                        </div>
                        <div class="form-group clearfix">

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        <div class="bottom">
                            <span class="helper-text"><a href="/register">Register</a></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="overlay"></div>
                <div class="content text">
                    <h1 class="heading">Login</h1>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@stop