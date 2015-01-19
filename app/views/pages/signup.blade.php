@extends('layout.master')
@section('head')

    <title>login here</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <section class="wrapper h-align-middle">

            <div class="container">
        <div class="row">
        <div class="panel col-sm-12">


            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box simple">
                                <div class="box-title no-border">
                                    <h4>SIGN <span class="semi-bold">UP</span></h4>

                                    <div class="tools"><a href="javascript:;" class="collapse"></a> <a
                                                href="#box-config" data-toggle="modal" class="config"></a> <a
                                                href="javascript:;" class="reload"></a> <a href="javascript:;"
                                                                                           class="remove"></a></div>
                                </div>
                                <div class="box-body no-border">
                                    <form class="form-no-horizontal-spacing" id="form-condensed"
                                          novalidate="novalidate">
                                        <div class="row column-seperation">
                                            <div class="col-md-6">
                                                <h4>Basic Information</h4>

                                                <div class="row form-row">
                                                    <div class="col-md-5">
                                                        <input name="form3FirstName" id="form3FirstName" type="text"
                                                               class="form-control" placeholder="First Name"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3FirstName" class="error">This field is required.</span></span>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input name="form3LastName" id="form3LastName" type="text"
                                                               class="form-control" placeholder="Last Name"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3LastName" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-5">
                                                        <select name="form3Gender" id="form3Gender"
                                                                class="select2 form-control select2-offscreen"
                                                                tabindex="-1">
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select><span class="error" style="display: none;"><span
                                                                    for="form3Gender" class="error"></span></span>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" placeholder="Date of Birth"
                                                               class="form-control" id="form3DateOfBirth"
                                                               name="form3DateOfBirth"><span class="error"
                                                                                             style="display: none;"><span
                                                                    for="form3DateOfBirth" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <input name="form3Occupation" id="form3Occupation" type="text"
                                                               class="form-control" placeholder="Occupation"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3Occupation" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-8">
                                                        <div class="radio">
                                                            <input id="male" type="radio" name="gender" value="male"
                                                                   checked="checked">
                                                            <label for="male">Male</label>
                                                            <input id="female" type="radio" name="gender"
                                                                   value="female">
                                                            <label for="female">Female</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <input name="form3Email" id="form3Email" type="text"
                                                               class="form-control"
                                                               placeholder="email@address.com"><span class="error"
                                                                                                     style="display: none;"><span
                                                                    for="form3Email" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h4>Postal Information</h4>

                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <input name="form3Address" id="form3Address" type="text"
                                                               class="form-control" placeholder="Address"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3Address" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-6">
                                                        <input name="form3City" id="form3City" type="text"
                                                               class="form-control" placeholder="City"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3City" class="error">This field is required.</span></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="form3State" id="form3State" type="text"
                                                               class="form-control" placeholder="State"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3State" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-8">
                                                        <input name="form3Country" id="form3Country" type="text"
                                                               class="form-control" placeholder="Country"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3Country" class="error">This field is required.</span></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input name="form3PostalCode" id="form3PostalCode" type="text"
                                                               class="form-control" placeholder="Postal Code"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3PostalCode" class="error">This field is required.</span></span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-4">
                                                        <input name="form3TeleCode" id="form3TeleCode" type="text"
                                                               class="form-control" placeholder="+94"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3TeleCode" class="error">This field is required.</span></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="form3TeleNo" id="form3TeleNo" type="text"
                                                               class="form-control" placeholder="Phone Number"><span
                                                                class="error" style="display: none;"><span
                                                                    for="form3TeleNo" class="error"></span></span>
                                                    </div>
                                                </div>
                                                <div class="row small-text">
                                                    <p class="col-md-12">
                                                        NOTE - Facts to be considered, Simply remove or edit this as for
                                                        what you desire. Disabled font Color and size
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="pull-left">
                                                <div class="pull-left">
                                                    <div class="checkbox checkbox check-success 	">
                                                        <input type="checkbox" value="1" id="chkTerms">
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
                    </div>


                </div>
            </div>
            <!-- /.row -->

            <!-- /.content -->
        </div>
            </div>
                </div>
</section>
@stop



