@extends('layout.master')
@section('head_last')

    <title>Product</title>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-59072123-1', 'auto');
        ga('send', 'pageview');

    </script>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="wrapper row-offcanvas  row-offcanvas-left"  >
            <div class="col-md-3 col-xs-11 col-sm-5 center-block" id="login" >
                <div class="row">
            <div class="panel col-xs-12 animated fadeInUp" >

                    <div class="box-title no-border">
                        <h3>Login <span class="semi-bold">Here</span></h3>

                        <p>Enter your username and password to login</p>
                        <br>

                        @if (Session::get('error'))
                            <div class="row form-row col-sm-12">
                                <div class="alert alert-error alert-danger col-sm-11 alert-dismissable">{{{ Session::get('error') }}}</div>
                            </div>
                        @endif

                        @if (Session::get('notice'))
                            <div class="row form-row col-sm-12">
                                <div class="alert alert-info col-sm-11">{{{ Session::get('notice') }}}</div>
                            </div>
                        @endif
                    </div>
                    <div class="box-body col-sm-12">

                            {{ Form::open(array('url' => 'login' )) }}
                            <!-- if there are login errors, show them here -->
                            <div class="form-group">
                                <div class="input-append col-md-10 col-xs-10 primary">
                                    {{ Form::text('username', Input::old('email'), array('placeholder' => 'Email or username' ,'class' => 'form-control')) }}
                                    <span class="add-on"><span class="arrow"></span><i
                                                class="fa fa-user"></i> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-append col-md-10 col-xs-10 success">
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
                                    <a href="/forgot">Trouble login in ?</a>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>

    </div>

@stop



