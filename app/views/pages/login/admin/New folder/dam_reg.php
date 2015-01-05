<?php
    require_once("classes/dam_reg_class.php");
    $registration = new Registration();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section id="add_user" class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Disciplinary Action</li>
            <li class="active">Register</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title" >
                            Register a Disciplinary Action</h1>
                        <small>Enter details</small>

                    </div><!-- /.box-header -->

                    <div class="panel-body">

                        <!-- form start -->
                        <form  class="form" id="damform" action="#messagebox" method="post">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="login_input_prn" >*Student's PRN</label>


                                    <input type="text" class="form-control" placeholder="PRN" id="login_input_prn" name="prn"  />
                                </div>


                                <div class="form-group">

                                    <label for="login_input_fname" >*Student's Name</label>

                                    <input type="text" class="form-control" placeholder="Full Name" id="login_input_adyear" name="name" />

                                </div>
                                <div class="form-group">
                                    <label for="login_input_department" >*Department</label>

                                    <select id="login_input_department" class="form-control" name="department"  >
                                        <option value="" disabled selected>Select your option</option>
                                        <option value='AEI' >AEI</option>
                                        <option value='CE' >CE</option>
                                        <option value='CSE' >CSE</option>
                                        <option value='EC' >EC</option>
                                        <option value='EEE' >EEE</option>
                                        <option value='ME' >ME</option>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="e_prn" >Enquiry Head's PRN</label>

                                    <input type="text" class="form-control" placeholder="Enquiry Head's PRN" id="e_prn" name="h_prn" />

                                </div>

                                <div class="form-group">

                                    <label for="login_input_hname" >Enquiry Head's Name</label>

                                    <input type="text" class="form-control" placeholder="Enquiry Head's Name" id="login_hname" name="h_name" />

                                </div>
                                <div class="form-group">
                                    <label for="action" >*Disciplinary Action</label>

                                    <input type="text" class="form-control" placeholder="Disciplinary Action" id="action" name="action" />

                                </div>
                                <div class="form-group">
                                    <label for="reason" >*Reason</label>

                                    <input type="text" class="form-control" placeholder="Reason" id="fine" name="reason" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fine</label>
                                    <div class="inputContainer">
                                        <input class="form-control" name="fine" type="number" data-bv-integer-message="The value is not an integer" />
                                    </div>
                                </div>   


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Fine payment date</label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="fine_payment_date" placeholder="DD/MM/YYYY" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">*Incident Date</label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="incident_date" placeholder="DD/MM/YYYY" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Action taken date </label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="action_taken_date" placeholder="DD/MM/YYYY" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="action_taken_date" >Punishment duration </label>

                                    <input type="text" class="form-control" placeholder="No of days" id="action_taken_date" name="punishment_duration" />

                                </div>
                                <div class="form-group">
                                    <label for="location" >Location</label>

                                    <input type="text" class="form-control" placeholder="location" id="location" name="location" />

                                </div>
                                <div class="form-group">
                                    <label for="witnesses" >Witnesses </label>
                                    <input type="text" class="form-control" placeholder="name1,name2,name3,...." id="location" name="witnesses" />

                                </div>

                                <div class="form-group">
                                    <label for="login_input_status">Status</label>


                                    <select class="form-control" placeholder="User Status" id="login_input_status" name="status"  >
                                        <option value='pending' >Pending</option>
                                        <option value='enquiry' >Enquiry</option>
                                        <option value='completed' >Completed</option>
                                    </select>

                                </div>
                            </div>

                            <input type="hidden" name="staff_prn" value='<?php echo $_SESSION['prn']; ?>' />
                            <input type="hidden" name="staff_name" value='<?php echo $_SESSION['fname']; ?>' />

                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">

                                    <button id="submit "type="submit" class="btn btn-primary btn-group-justified" name="register" value="Register" >Submit</button>
                                </div></div>

                        </form><!-- dam reg -->
                    </div>
                </div><!-- /.col-body -->


            </div>  <!--/row) -->




    </section><!-- /.content -->


</aside>
 <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script-->
    <script src="js/jquery-2.1.1.min.js"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- script src="js/bootstrap.min.js" type="text/javascript"></script -->
    <!-- Morris.js charts -->
    <!--script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script-->
    <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>

    <!-- Form Val-->

    <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>