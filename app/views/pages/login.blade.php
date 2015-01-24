@extends('layout.master')
@section('head')

    <title>Login</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="wrapper row-offcanvas row-offcanvas-left h-align-middle">
        <div class="row">
            <div class="panel col-sm-12 animated fadeInUp">
                <div class="box simple">
                    <div class="box-title no-border">
                        <h3>Login <span class="semi-bold">Here</span></h3>

                        <p>Enter your username and password to login</p>
                        <br>
                    </div>
                    <div class="box-body no-border">
                        <div class="row-fluid">
                            {{ Form::open(array('url' => 'login')) }}
                            <!-- if there are login errors, show them here -->
                            {{ $errors->first('email') }}
                            {{ $errors->first('password') }}
                            <div class="row form-row">
                                <div class="input-append col-md-11 col-sm-11 primary">
                                    {{ Form::text('username', Input::old('email'), array('placeholder' => 'your email or username' ,'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-user"></i> </span>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="input-append col-md-11 col-sm-11 success">
                                    {{ Form::password('password',array('placeholder' => 'your password', 'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-lock"></i> </span>
                                </div>
                            </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" value="1">
                                        <label id="cblabel" for="checkbox1">Keep me reminded </label>
                                    </div>

                            @if (Session::get('error'))
                                <div class="row form-row">
                                <div class="alert alert-error alert-danger col-sm-11 alert-dismissable">{{{ Session::get('error') }}}</div>
                                    </div>
                            @endif

                            @if (Session::get('notice'))
                                <div class="row form-row">
                                <div class="alert alert-info col-sm-11">{{{ Session::get('notice') }}}</div>
                                    </div>
                            @endif

                            <div class="form-actions">
                                <div class="pull-left">
                                    <a href="/forgot">Trouble login in?</a>
                                    </div>
                                <div class="pull-right">
                                    <p>{{ Form::button('Login',array('type' => 'submit' , 'class'=>'btn btn-danger btn-cons')) }}</p>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop



