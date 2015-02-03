
@extends('layout.master')
@section('head')
    {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
@stop


@section('page')




    <ul class="breadcrumb">
        <li>
            <p>HOME</p>
        </li>
        <li><a href="#" class="active">Register a Product</a></li>
    </ul>

    <div class="row">

        <div class="col-sm-5">
            <div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
                    <div class="pace-progress-inner"></div>
                </div>
                <div class="pace-activity"></div></div>
            <div class="box simple">
                <div class="box-title no-border">
                    <h4>Register a <span class="semi-bold">Product</span></h4>
                </div>
                <div class="box-body no-border">





                    <form method="POST" action="{{{ URL::to('/profile/'.$user->username."/products/register") }}}" accept-charset="UTF-8"
                          class="form-no-horizontal-spacing" id="form-condensed"
                          novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                        <div class="row column-seperation">
                            <div class="col-md-12">
                                 <div class="row form-row">
                                    <div class="col-md-12">
                                        <input class="form-control"
                                               placeholder="Product ID"
                                               type="text"
                                               name="id" id="id" value="{{{ Input::old('id') }}}">
                                    </div>
                                 </div>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <input class="form-control"
                                               placeholder="Name"
                                               type="text"
                                               name="Name" id="Name" value="{{{ Input::old('Name') }}}">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <input name="Vendor" id="Vendor" type="text"
                                               class="form-control" placeholder="Vendor"><span
                                                class="error" style="display: none;"><span
                                                    for="Vendor"
                                                    class="error">This field is required.</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="pull-right">
                                <button class="btn btn-danger btn-cons" type="submit"><i
                                            class="icon-ok"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   <!-- END ROW -->
@stop
@section('javascript')
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}
    <script type="text/javascript">
        $(document).ready(function () {
           // $("#b").click(function () {
            $('#popupmodal').modal('show');
            //    $('#myModal .modal-body').load("/test");
                  // $('#myModal').modal('show');
          //  });
        });


    </script>


@stop

