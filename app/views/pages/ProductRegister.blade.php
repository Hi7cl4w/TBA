
@extends('layout.master')
@section('head')
    {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
@stop


@section('page')


    <ul class="breadcrumb">
        <li>
            <p>HOME</p>
        </li>
        <li><a href="#" class="active">Create a Product</a></li>
    </ul>

    <div class="row">

        <div class="col-sm-6">
            <div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
                    <div class="pace-progress-inner"></div>
                </div>
                <div class="pace-activity"></div></div>
            <div class="box simple">
                <div class="box-title no-border">
                    <h4>Register a <span class="semi-bold"> Product</span></h4>

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


                    <form method="POST" action="{{{ URL::to('/profile/'.$user->username."/product/create") }}}" accept-charset="UTF-8"
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
                                               name="username" id="id" value="{{{ Input::old('id') }}}">
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
        $(document).ready(function() {
            $("#Product_id option[value='']").remove();
            $.ajax({
                type: "POST",
                url: "{{{ URL::to('/profile/'.$user->username.'/products/list') }}}",
                success: function (data) {
                    // Parse the returned json data

                    // Use jQuery's each to iterate over the opts value
                    $.each(data, function (i, d) {
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                        $('#Product_id').append('<option value="' + d.id + '">' + d.Vendor +" : "+ d.Name  + '</option>');
                    });
                }
            });

        });
    </script>


@stop

