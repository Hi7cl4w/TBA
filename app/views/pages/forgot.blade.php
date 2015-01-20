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
                            <form method="POST" action="{{ URL::to('/forgot') }}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                                @if (Session::get('error'))
                                    <div class="row form-row">
                                        <div class="alert alert-error alert-danger col-sm-11 alert-dismissable">{{{ Session::get('error') }}}</div>
                                    </div>
                                @endif

                                @if (Session::get('notice'))
                                    <div class="row form-row">
                                        <div class="alert alert-info col-sm-11">{{{ Session::get('notice') }}}
                                        </div>
                                    </div>
                                @endif

                            <div class="row form-row">

                                <div class="input-append col-md-11 col-sm-11 primary">

                                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                                    <span class="add-on"><span class="arrow"></span><i class="fa fa-mail-forward"></i> </span>
                                </div>
                            </div>

                                <div class="row form-row">
                                <div class="input-append col-md-11 col-sm-11 primary">
                                    <?php echo Form::captcha() ?>
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

@stop



