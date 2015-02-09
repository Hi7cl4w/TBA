@extends('layout.master')
@section('head_last')

    <title>Sign Up</title>

    {{HTML::style('assets/css/login.css')}}
@stop
@section('body')
    <div class="wrapper row-offcanvas  row-offcanvas-left">
        <div class="col-md-10 col-xs-11 col-sm-10 center-block" id="login">
            <div class="row">
                <div class="panel col-xs-12 animated fadeInUp">
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

                        <form method="POST" action="{{{ URL::to('/') }}}" accept-charset="UTF-8"
                              class="form-no-horizontal-spacing" id="form"
                              novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                            <div class="row column-seperation">
                                <div class="col-md-6">
                                    <h4>Create an account</h4>

                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <input class="form-control"
                                                   placeholder="{{{ Lang::get('confide::confide.username') }}}"
                                                   type="text"
                                                   name="username" id="username" value="{{{ Input::old('username') }}}">
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <input class="form-control"
                                                   placeholder="{{{ Lang::get('confide::confide.e_mail') }}}"
                                                   type="text"
                                                   name="email" id="email" value="{{{ Input::old('email') }}}">
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <input class="form-control"
                                                   placeholder="{{{ Lang::get('confide::confide.password') }}}"
                                                   type="password" name="password" id="password">
                                        </div>

                                        <div class="col-md-6">
                                            <input class="form-control"
                                                   placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}"
                                                   type="password" name="password_confirmation"
                                                   id="password_confirmation">
                                        </div>
                                    </div>


                                    <h4>Basic Information</h4>

                                    <div class="row form-row">
                                        <div class="col-md-5">
                                            <input name="FirstName" id="FirstName" type="text"
                                                   class="form-control" placeholder="First Name"><span
                                                    class="error" style="display: none;"><span
                                                        for="FirstName"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                        <div class="col-md-7">
                                            <input name="LastName" id="LastName" type="text"
                                                   class="form-control" placeholder="Last Name"><span
                                                    class="error" style="display: none;"><span
                                                        for="LastName"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                    </div>
                                    <div class="row form-row">

                                        <div class="col-md-6">
                                            <input type="text" placeholder="Date of Birth"
                                                   class="form-control" id="DOB"
                                                   name="DOB"><span class="error"
                                                                    style="display: none;"><span
                                                        for="DateOfBirth"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                        <div class="col-md-6">
                                            <input name="Occupation" id="Occupation" type="text"
                                                   class="form-control" placeholder="Occupation"><span
                                                    class="error" style="display: none;"><span
                                                        for="Occupation"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                    </div>

                                    <div class="row form-row">

                                        <div class="col-md-8">
                                            <div class="radio radio-success">
                                                <label>
                                                    <input id="male" type="radio" name="Gender" value="male"
                                                           checked="checked"><span class="circle"></span><span
                                                            class="check"></span>
                                                    Male</label>
                                            </div>
                                            <div class="radio radio-success">
                                                <label>
                                                    <input id="female" type="radio" name="Gender"
                                                           value="female"><span class="circle"></span><span
                                                            class="check"></span>
                                                    Female</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <h4>Postal Information</h4>

                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <input name="Address" id="Address" type="text"
                                                   class="form-control" placeholder="Address"><span
                                                    class="error" style="display: none;"><span
                                                        for="Address"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <input name="City" id="City" type="text"
                                                   class="form-control" placeholder="City"><span
                                                    class="error" style="display: none;"><span
                                                        for="City"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                        <div class="col-md-6">
                                            <input name="State" id="State" type="text"
                                                   class="form-control" placeholder="State"><span
                                                    class="error" style="display: none;"><span
                                                        for="State"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-8">
                                            <input name="Country" id="Country" type="text"
                                                   class="form-control" placeholder="Country"><span
                                                    class="error" style="display: none;"><span
                                                        for="Country"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                        <div class="col-md-4">
                                            <input name="Pin" id="Pin" type="text"
                                                   class="form-control" placeholder="Postal Code"><span
                                                    class="error" style="display: none;"><span
                                                        for="PostalCode"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-4">
                                            <input name="TeleCode" id="TeleCode" type="text"
                                                   class="form-control" placeholder="+91"><span
                                                    class="error" style="display: none;"><span
                                                        for="TeleCode"
                                                        class="error">This field is required.</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <input name="TeleNo" id="TeleNo" type="text"
                                                   class="form-control" placeholder="Phone Number"><span
                                                    class="error" style="display: none;"><span
                                                        for="TeleNo" class="error"></span></span>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-4">
                                            {{ Form::captcha(array('theme' => 'plain')) }}
                                        </div>

                                    </div>
                                    <div class="row form-row">
                                        <div class="checkbox checkbox check-success col-md-12">
                                            <label for="chkTerms"> <input type="checkbox" value="1" id="chkTerms">
                                                <span class="ripple"></span><span class="check"></span>I Here by agree
                                                on the Term and
                                                condition. </label>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="pull-left">


                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger btn-cons" type="submit"><i
                                                class="icon-ok"></i> Sign Up
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- /.content -->
    </div>


@stop
@section('javascript')
    {{HTML::script('assets\plugins\boostrap-form-wizard\js\jquery.bootstrap.wizard.min.js')}}
    {{HTML::script('assets/js/bootstrap-datetimepicker.min.js')}}


    <script>
        $(function () {
            $('#DOB').datetimepicker();
        });
        $('#form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

                username: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: '*Must be Alphanumeric'
                        }
                    }
                },
                fname: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                adyear: {
                    feedbackIcons: 'false',
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Date is required '
                        },
                        regexp: {
                            regexp: /^\d{4}$/i,
                            message: 'Format is not correct  '
                        }
                    }
                },
                designation: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                email: {
                    validators: {

                        regexp: {
                            regexp: /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i,
                            message: 'Email address not valid'
                        },
                        notEmpty: {
                            message: '*Required'
                        }

                    }
                },
                FirstName: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: '*Must be Character'
                        }
                    }
                },
                Occupation: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }

                    }
                },

                DOB: {
                    feedbackIcons: 'false',

                    validators: {
                        date: {
                            format: 'DD/MM/YYYY',
                            message: 'The value is not a valid date, format is DD/MM/YYYY'
                        },
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                Address: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                City: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                State: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                Country: {
                    validators: {

                        notEmpty: {
                            message: '*Required'
                        }
                    }
                },
                Pin: {

                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        regexp: {
                            regexp: /^([0-9]{6,6})/i,
                            message: 'Must be a pin code'
                        }
                    }

                },
                TeleNo: {

                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        regexp: {
                            regexp: /^([0-9]{10,10})$/i,
                            message: 'Must be a phone number'
                        }
                    }

                },
                LastName: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        stringLength: {
                            min: 1,
                            message: 'Password contain min. 1 characters. '
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Password contain min. 6 characters. '
                        },
                        identical: {
                            field: 'password_confirmation',
                            message: ' Passwords does not match. '
                        }

                    }
                },
                password_confirmation: {
                    enabled: true,
                    validators: {
                        notEmpty: {
                            message: '*Required'
                        },
                        identical: {
                            field: 'password',
                            message: 'Passwords does not match'
                        }
                    }
                }
            }
        })

    </script>
@stop



