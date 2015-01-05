<?php
require_once("classes/staff_reg_class.php");
$registration = new Registration();
?>


<aside class="right-side">







    <!-- Content Header (Page header) -->
    <section id="add_user" class="content-header">
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >User Manager</li>
            <li class="active">Add User</li>
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
                        <h1 class="panel-title">Add a Staff Account</h1><small>enter details</small>
                    </div><!-- /.panel-header -->




                    <div class="panel-body">
                        <!-- form start -->
                        <form  id="regform" action="#messagebox" method="post">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="login_input_prn" >*PRN</label>
                                    <input type="text" class="form-control" placeholder="User name" id="login_input_prn" name="staff_prn" required />
                                </div>
                            
                            


                                <div class="form-group">
                                    <label for="login_input_designation" >*Designation</label>
                                    <input type="text" class="form-control" placeholder="Designation" id="login_input_designation" name="designation" />
                                </div>
                           
                            
                            

                                <div class="form-group">
                                    <label for="login_input_password_new">*Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="login_input_password_new" name="password_new"   />
                                </div>
                            

                                <div class="form-group">
                                    <label for="login_input_password_repeat">*Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Retype password" id="login_input_password_repeat"  name="confirm_password" />
                                </div>
                             <div class="form-group">
                                    <label for="login_input_email" >Email</label>

                                    <input class="form-control" id="login_input_email" placeholder="Email" name="email" type="text">

                                
                            </div>
                            </div>
                            
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="login_input_fname" >*First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" id="login_input_fname" name="fname" />
                                </div>
                           

                                <div class="form-group">

                                    <label for="login_input_lname" >Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" id="login_input_lname" name="lname" />
                                </div>
                            
                            

                                <div class="form-group">
                                    <label for="login_input_department" >Department</label>
                                    <select id="login_input_department" class="form-control" name="department"  >
                                        <option value="" disabled selected>Select your option</option>
                                        <option value='AEI' >AEI</option>
                                        <option value='CE' >CE</option>
                                        <option value='CSE' >CSE</option>
                                        <option value='EC' >EC</option>
                                        <option value='EEE' >EEE</option>
                                        <option value='ME' >ME</option>

                                    </select >
                                </div >
                            
                                <div class="form-group">
                                    <label for="login_input_status">Account Status</label>
                                    <select class="form-control" placeholder="User Status" id="login_input_status" name="user_status"  >
                                        <option value='1' >Enable</option>
                                        <option value='2' >Disable</option>
                                    </select>
                                </div>
                    </div>
                           


                               

                            <div class="col-sm-12 col-lg-12">


                                <div class="footer">
                                    <button type="submit" class="btn btn-primary btn-group-justified" name="register" value="Register" >Submit</button>
                                </div>
                            </div>

                        </form><!-- /admin -->

                    </div><!-- /dynamic form end -->










                </div><!-- /.panel -->
            </div><!-- /.box -->

        </div>   <!-- /.row -->
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