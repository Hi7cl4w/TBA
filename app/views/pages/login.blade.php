@extends('layout.master')
@section('head')

    <title>Login</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="wrapper row-offcanvas row-offcanvas-left h-align-middle">
        <div class="row">
            <div class="panel col-sm-12 animated fadeInUp" id="login">

                    <div class="panel-title">
                        <h3>Login <span class="semi-bold">Here</span></h3>

                        <p>Enter your username and password to login</p>
                        <br>

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
                    </div>
                    <div class="box-body">

                            {{ Form::open(array('url' => 'login' )) }}
                            <!-- if there are login errors, show them here -->
                            <div class="form-group">
                                <div class="input-append col-md-10 col-sm-10 primary">
                                    {{ Form::text('username', Input::old('email'), array('placeholder' => 'Email or username' ,'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-user"></i> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-append col-md-10 col-sm-10 success">
                                    {{ Form::password('password',array('placeholder' => 'Password', 'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-lock"></i> </span>
                                </div>
                            </div>

                    <div class="form-group">
                        <div class="checkbox input-append">
                            <label>
                                <input type="checkbox" name="remember" id="remember"><span class="ripple"></span><span class="check"></span> Remember me
                            </label>
                        </div>

                    </div>



                <div class="form-group">
                    <p>{{ Form::button('Login',array('type' => 'submit' , 'class'=>'btn btn-danger btn-cons')) }}</p>
                </div>
                {{ Form::close() }}
                            <div class="form-actions">

                                <div class="pull-left">
                                    <a href="/forgot">Trouble login in?</a>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>


        </div>
@stop



