@extends('layout.master')
@section('head')

    <title>login here</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="content h-align-middle">
        <div class="row">
            <div class="panel col-sm-12">
                <div class="box simple">
                    <div class="box-title no-border">
                        <h3>Reset your <span class="semi-bold">Password</span></h3>

                        <p>Enter password and confirm password to continue</p>
                        <br>
                    </div>
                    <div class="box-body no-border">
                        <div class="row-fluid">
                            <form method="POST" action="{{{ URL::to('/reset_password') }}}" accept-charset="UTF-8">
                                <input type="hidden" name="token" value="{{{ $token }}}">
                                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                                <div class="form-group">
                                    <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                                </div>

                                @if (Session::get('error'))
                                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                                @endif

                                @if (Session::get('notice'))
                                    <div class="alert">{{{ Session::get('notice') }}}</div>
                                @endif

                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop



