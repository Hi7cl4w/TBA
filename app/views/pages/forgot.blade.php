@extends('layout.master')
@section('head_last')

    <title>Forgot Password</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
   <div class="wrapper row-offcanvas  row-offcanvas-left"  >
        <div class="col-md-3 col-xs-11 col-sm-5 center-block" id="login" >
            <div class="row">
                <div class="panel col-xs-12 animated fadeInUp" >


                <div class="box-title no-border">
                        <h3>Forgot your <span class="semi-bold"> Password </span> ?</h3>

                        <p>Enter your email and proceed</p>
                        <br>
                    </div>
                    <div class="box-body no-border">
                        <div class="row-fluid">
                            <form method="POST" action="{{ URL::to('/forgot') }}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                                @if (Session::get('error'))
                                    <div class="row form-row">
                                        <div class="alert alert-error alert-danger col-sm-11 alert-dismissable">{{{ Session::get('error') }}}</div>
                                    </div>
                                @endif
                                {{ $errors->first('g-recaptcha-response') }}
                                {{ $errors->first('email') }}
                                @if (Session::get('notice'))
                                    <div class="row form-row">
                                        <div class="alert alert-info col-sm-10">{{{ Session::get('notice') }}}
                                        </div>
                                    </div>
                                @endif

                            <div class="row form-row">

                                <div class="input-append col-md-11 col-sm-10 primary">

                                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                                    <span class="add-on"><span class="arrow"></span><i class="fa fa-mail-forward"></i> </span>
                                </div>
                            </div>

                                <div class="row form-row">
                                <div class="input-append col-md-11 col-sm-11 primary">
                                    {{ Form::captcha(array('theme' => 'plain')) }}
                                </div>
                                    </div>
                                <div class="form-actions">
                                <div class="pull-right">
                                    <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
                                </div>
                            </div>


                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="javascript" >

            $('body').load( function() {
                $('.rc-anchor-standard').css({
                    "background": "transparent",
                    "border": 0
                });
                $('.rc-anchor').css({
                    "border-radius": 0,
                    "box-shadow": "none",
                    "-webkit-box-shadow": "none"

                });
            });
            $(document).ready(function () {
                $('.rc-anchor-standard').css({
                    "background": "transparent",
                    "border": 0
                });
                $('.rc-anchor').css({
                    "border-radius": 0,
                    "box-shadow": "none",
                    "-webkit-box-shadow": "none"

                });
            });
        </script>
@stop



