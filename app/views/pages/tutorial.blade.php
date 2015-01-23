@extends('layout.master')
@section('head')

    <title>Api tutorial</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="content h-align-middle">
        <div class="row">
            <div class="panel col-sm-12">
                <div class="box simple">
                    <div class="box-title no-border">
                        <h4>SIGN <span class="semi-bold">UP</span></h4>

                        <div class="tools"><a href="javascript:;" class="collapse"></a> <a
                                    href="#box-config" data-toggle="modal" class="config"></a> <a
                                    href="javascript:;" class="reload"></a> <a href="javascript:;"
                                                                               class="remove"></a></div>
                    </div>
                    <div class="box-body no-border">
                        @if (Session::get('error'))
                            <div class="alert alert-error alert-danger">
                                @if (is_array(Session::get('error')))
                                    {{ head(Session::get('error')) }}
                                @endif
                            </div>
                        @endif

                        @if (Session::get('notice'))
                            <div class="alert">{{ Session::get('notice') }}</div>
                        @endif
                            ticket: create, execute, update, and look up payments

                        <p class="text-black"><b>GET POST	</b>: api/v1/ticket/ </p>
                        <p class="text-black"><b>GET POST	</b>: api/v1/ticket/ </p>
                        <p class="text-black"><b>GET POST	</b>: api/v1/ticket/ </p>





                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- /.content -->
    </div>


@stop
@section('javascript')
    {{HTML::script('assets\plugins\boostrap-form-wizard\js\jquery.bootstrap.wizard.min.js')}}
    {{HTML::script('assets/js/form_elements.js')}}
    {{HTML::script('assets/js/form_validations.js')}}
@stop



