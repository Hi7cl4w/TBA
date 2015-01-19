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
                                <div class="input-append col-md-10 col-sm-10 primary">
                                    {{ Form::text('username', Input::old('email'), array('placeholder' => 'your email or username' ,'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-align-justify"></i> </span>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="input-append col-md-10 col-sm-10 primary">
                                    {{ Form::password('password',array('placeholder' => 'your password', 'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-lock"></i> </span>
                                </div>
                            </div>

                            <div class="form-actions">
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



