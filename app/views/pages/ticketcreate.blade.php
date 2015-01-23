@extends('layout.master')
@section('head')
    {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
@stop


@section('page')


    <div class="row">

        <div class="col-sm-12">
            <div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
                    <div class="pace-progress-inner"></div>
                </div>
                <div class="pace-activity"></div></div>
            <div class="box simple">
                <div class="box-title no-border">
                    <h4>Create a <span class="semi-bold"> Ticket</span></h4>

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

                    <form method="POST" action="{{{ URL::to('/profile/'.$user->username.'/ticket/create') }}}" accept-charset="UTF-8"
                          class="form-no-horizontal-spacing" id="form-condensed"
                          novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                        <div class="row column-seperation">
                            <div class="col-md-6">
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <input class="form-control"
                                               placeholder="Subject"
                                               type="text"
                                               name="Subject" id="Subject" value="{{{ Input::old('Subject') }}}">
                                    </div>
                                </div>






                            </div>
                            <div class="col-md-6">

                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <input name="Purchase_id" id="Purchase_id" type="text"
                                               class="form-control" placeholder="Purchase id"><span
                                                class="error" style="display: none;"><span
                                                    for="Purchase_id"
                                                    class="error">This field is required.</span></span>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="Product_id" name="Product_id" style="width:100%">
                                            <option value="1">Loading Products...</option>
                                            <option value="product">test.</option>
                                        </select>
                                    </div>
                                </div>

                        </div>


                            <div class="col-sm-12">

                        <div class="row form-row">
                            <div class="col-md-12">
                                <label for="comment">Description</label>
                                <textarea class="form-control" rows="10" id="Description" name="Description"></textarea>
                            </div>
                        </div>
                                </div>

                        </div>
                        <div class="row form-row">
                            <div class="col-md-4">
                                {{ Form::captcha(array('theme' => 'plain')) }}
                            </div>

                        </div>


                        <div class="form-actions">
                            <div class="pull-left">
                                <div class="pull-left">
                                    <div class="checkbox checkbox check-success 	">
                                        <input type="checkbox" value="1" id="chkTerms" name="terms">
                                        <label for="chkTerms">I Here by agree on the Term and
                                            condition. </label>
                                    </div>

                                </div>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-danger btn-cons" type="submit"><i
                                            class="icon-ok"></i> Save
                                </button>
                                <button class="btn btn-white btn-cons" type="button">Cancel</button>
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
    {{HTML::script('assets/js/form_elements.js')}}
    <script>

    </script>


@stop

