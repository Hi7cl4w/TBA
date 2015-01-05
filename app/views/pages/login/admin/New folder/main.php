<!DOCTYPE html>


<meta charset="UTF-8">
<title>Welcome, <?php echo $_SESSION["fname"];?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>



<!-- link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" / -->
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<!--link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /-->
<!-- bootstrap 3.0.2 -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Theme style -->
<link href="css/dam.css" rel="stylesheet" type="text/css" >

<link rel="stylesheet" href="css/bootstrapValidator.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<?php ?>



<body id="bodyskin" class="skin-black fixed">
    <!-- header logo: style can be found in header.less -->
    <?php include("header.php"); ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php
            include("sidebar.php");
            if (!isset($_GET["page"])) {

                echo "<script> document.getElementById('dash').className = 'active'</script>";
                include("rmain.php");
            } else if ($_GET['page'] == "userreg") {

                include("req.php");
            } else if ($_GET['page'] == "usermanage") {

                echo "<script> document.getElementById('usertree').className = 'treeview active';
           document.getElementById('usersubtree').className = 'active' </script>";
                include("user_manage.php");
            } else if ($_GET['page'] == "addadmin") {
                echo "<script> document.getElementById('usertree').className = 'treeview active';
           document.getElementById('addadmin').className = 'active';</script>";

                require("add_admin.php");
            } else if ($_GET['page'] == "addstaff") {
                echo "<script> document.getElementById('usertree').className = 'treeview active';
           document.getElementById('addstaff').className = 'active';</script>";

                require("add_staff.php");
            } else if ($_GET['page'] == "addstudent") {
                echo "<script> document.getElementById('usertree').className = 'treeview active';
           document.getElementById('addstudent').className = 'active';</script>";

                require("add_student.php");
            } else if ($_GET['page'] == "dam_manage") {
                echo "<script> document.getElementById('damtree').className = 'treeview active';
           document.getElementById('dam_manage').className = 'active';</script>";
                require("dam_manage.php");
            } else if ($_GET['page'] == "dam_reg") {
                echo "<script> document.getElementById('damtree').className = 'treeview active';
           document.getElementById('dam_reg').className = 'active';</script>";

                require("dam_reg.php");
            }
        ?>

    </div><!-- ./wrapper -->

    <!-- add new calendar event modal -->



    <script type="text/javascript">
$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); });

function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});

        $(document).ready(function() {
            $("#adyear").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $('.date').datepicker({
                format: "dd/mm/yyyy"
               
            });


            $('#regform').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    prn: {
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            regexp: {
                                regexp: /^\d{2}[a-zA-Z]{2}\d{2}$/,
                                message: 'PRN format is not correct'
                            }

                        }
                    },
                     staff_prn: {
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]{3}\d{2}$/,
                                message: 'PRN format is not correct'
                            }

                        }
                    },
                      department:{
                          feedbackIcons: 'false',
                        validators: {
                            
                            notEmpty: {
                                message: '*Required'
                            }
                            
                        }
                    },
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
                            }

                        }
                    },
                    lname: {
                        validators: {
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: '*Not valid'
                            }
                        }
                    },
                    password_new: {
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            stringLength: {
                                min: 6,
                                message: 'Password contain min. 6 characters. '
                            },
                            identical: {
                                field: 'confirm_password',
                                message: ' Passwords does not match. '
                            }

                        }
                    },
                    confirm_password: {
                        enabled: true,
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            identical: {
                                field: 'password_new',
                                message: 'Passwords does not match'
                            }
                        }
                    }
                }
            })
            $('#damform').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    prn: {
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            regexp: {
                                regexp: /^\d{2}[a-zA-Z]{2}\d{2}$/,
                                message: 'PRN format is not correct'
                            }

                        }
                    },
                 
                   
                    name: {
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
                                   
                    h_prn: {
                        validators: {
                            regexp: {
                                regexp: /^[a-zA-Z]{3}\d{2}$/,
                                message: 'PRN format is not correct'
                            }

                        }
                    },
                     h_name: {
                        validators: {
                            
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: '*Must be Alphanumeric'
                            }
                        }
                    },
                    action:{
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
                    department:{
                        feedbackIcons: 'false',
                        validators: {
                            
                            notEmpty: {
                                message: '*Required'
                            }
                            
                        }
                    },
                    fine:{
                        feedbackIcons: 'false',
                        validators: {
                           integer: {
                        message: 'The value is not an integer'
                    }
                        }
                    },
                    punishment_duration:{
                        feedbackIcons: 'false',
                        validators: {
                           integer: {
                        message: 'The value is not an integer'
                    }
                        }
                    },
                     fine_payment_date: {
                         feedbackIcons: 'false',
                         trigger: 'blur',
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
                     action_taken_date: {
                         feedbackIcons: 'false',
                         trigger: 'blur',
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
                     incident_date: {
                         feedbackIcons: 'false',
                         trigger: 'blur',
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    },
                    notEmpty: {
                                message: '*Required'
                            }
                }
            },
                    reason:{
                        validators: {
                            notEmpty: {
                                message: '*Required'
                            },
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: '*Must be Alphanumeric'
                            }
                        }
                    }                    
                }
            })
           
            
                    // Enable the password/confirm password validators if the password is not empty
                    .on('keyup', '[name="password_new"]', function() {
                        var isEmpty = $(this).val() == '';
                        $('#regform')
                                .bootstrapValidator('enableFieldValidators', 'password_new', !isEmpty)
                                .bootstrapValidator('enableFieldValidators', 'confirm_password', !isEmpty);

                        // Revalidate the field when user start typing in the password field
                        if ($(this).val().length == 1) {
                            $('#regform').bootstrapValidator('validateField', 'password_new')
                                    .bootstrapValidator('validateField', 'confirm_password');
                        }
                    });
            
                    $('#datetimePicker').on('dp.change dp.show', function(e) {
        $('#damform').bootstrapValidator('revalidateField', 'fine_payment_date');
        
    });
                    $('#datetimePicker').on('dp.change dp.show', function(e) {
        $('#regform').bootstrapValidator('revalidateField', 'adyear');
        
    });
                     


        });





    </script>

   

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php
// show potential errors / feedback (from registration object)
                if (isset($registration)) {
                    if ($registration->errors) {
                        foreach ($registration->errors as $error) {

                            echo "<div class=\"alert alert-danger alert-dismissable\"><i class=\"fa fa-ban\"></i>";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";

                            echo $error . "</div><script> $('#loginModal').modal('show');</script>";
                        }
                    }
                    if ($registration->messages) {
                        foreach ($registration->messages as $message) {
                            echo "<div class=\"alert alert-success alert-dismissable\"><i class=\"fa fa-check\"></i>";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
                            echo $message . "</div><script> $('#loginModal').modal('show');</script>";
                        }
                    }
                }
            ?>
        </div>
    </div>


</body>
</html>
