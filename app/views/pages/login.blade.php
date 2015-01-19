@extends('layout.master')
@section('head')

    <title>login here</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')

    <section class="wrapper h-align-middle">

        <div class="content">
            <div class="row">
                <div class="panel col-sm-12 no-padding">


        <div class="box simple">
            <div class="box-title no-border">
                <h4>Ace <span class="semi-bold">Concepts</span></h4>
                <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
            </div>
            <div class="box-body no-border">
                <div class="row-fluid">
                    <h3>Login <span class="semi-bold">Here</span></h3>
                    <p>Enter your username and password to login</p>
                    <br>
                    <div class="row form-row">
                        <div class="input-append col-md-10 col-sm-10 primary">
                            <input type="text" id="appendedInput" class="form-control" placeholder="someone@example.com">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-align-justify"></i> </span> </div>
                    </div>
                    <div class="row form-row">
                        <div class="input-append col-md-10 col-sm-10 primary">
                            <input type="password" id="appendedInput2" class="form-control" placeholder="your password">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span> </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-cons-md"> Login</button>
                        <button type="button" class="btn btn-white btn-cons-md">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

      </div></div>
































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

            <p>{{ Form::button('Login',array('type' => 'submit' , 'class'=>'btn btn-danger btn-cons')) }}</p>
            {{ Form::close() }}
        </div>
    </div>

@stop



