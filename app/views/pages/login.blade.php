@extends('layout.master')
@section('head')

    <title>login here</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')

    <div class="jumbotron">
        <div class="container">

            <h2>Login</h2>



            {{ Form::open(array('url' => 'login')) }}
            <!-- if there are login errors, show them here -->




            {{ $errors->first('email') }}
            {{ $errors->first('password') }}


            <div class="form-group form-group-default required">
                <label>Username or email</label>




                {{ Form::text('username', Input::old('email'), array('placeholder' => '' ,'class' => 'form-control')) }}
            </div>
            <div class="form-group form-group-default required">
                <label>Password</label>
                {{ Form::password('password',array('placeholder' => '', 'class' => 'form-control')) }}
            </div>

            <p>{{ Form::button('<span class="glyphicon glyphicon-ok"></span>',array('type' => 'submit' , 'class'=>'btn btn-default full-width')) }}</p>
            {{ Form::close() }}
        </div>
    </div>

@stop



