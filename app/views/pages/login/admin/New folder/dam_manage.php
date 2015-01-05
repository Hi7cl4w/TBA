<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Disciplinary Action Manager
                        <small>Manage,View Disciplinary Actions</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Disciplinary Action Manager</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row no-print">
                        <div class="col-xs-12">
                         
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Disciplinary Action List</h3>
                                </div><!-- /.box-header -->
                               
     
 
                                <div class="box-body table-responsive">
                                   
                                    
                               
                                    <table id="damtable" class="table table-bordered table-condensed table-striped table-hover hidden-print">
                                        <thead>
                                            <tr>
                                                
                                                <th>Student's PRN</th>
                                                <th>Students's name</th>
                                                <th>Action</th>
                                                <th>Department</th>                                               
                                                <th>added time and date</th>
                                                 <th>Status</th>
                                                <th style="width: 5px;">View</th>
                                                <th style="width: 5px;">Edit</th>
                                                <th style="width: 5px;">Delete</th>
                                             
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>
                                                                   </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
                
                
              
                
                
                                        
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria- labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-di">
       <div class="modal-body">
       </div><!-- /.modal-content -->
   </div>
    <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
                
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria- labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-di">
       <div class="modal-body">
       </div><!-- /.modal-content -->
   </div>
    <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
 
                
            </aside><!-- /.right-side -->
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
     <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>

       <script type="text/javascript" language="javascript" class="init">

        usertable = {
            tablef: function() {
                var oTable = $('#damtable').dataTable();
                var user = $(this).attr('id');
                if (user != '')
                {
                    $.ajax({
                        url: 'ajax/d_process.php?method=fetchdata',
                        type: "POST",
                        dataType: 'json',
                        success: function(s) {
                            console.log(s);
                            oTable.fnClearTable();
                            for (var i = 0; i < s.length; i++) {
                                oTable.fnAddData({
                                    "DT_RowId": s[i][0],
                                    "0": s[i][1],
                                    "1": s[i][2],
                                    "2": s[i][3],
                                     "3": s[i][4],
                                     "4": s[i][5],
                                     "5": s[i][6],
                                    "6": " <button id=" + s[i][0] + " data-toggle=\"modal\" class=\"btn btn-warning btn-xs\"  data-target=\"#myModal\"><span class=\"glyphicon glyphicon-file\"></span></button>",
                                    "7": " <button id=" + s[i][0] + " data-toggle=\"modal\" class=\"btn btn-primary btn-xs\"  data-target=\"#myModal\"><span class=\"glyphicon glyphicon-pencil\"></span></button>",
                                    "8": "<button id=" + s[i][0] + " data-toggle=\"modal\" class=\"btn btn-danger btn-xs\"  data-target=\"#myModal\"><span class=\"glyphicon glyphicon-trash\"></span></button>"
                                });

                            } // End For

                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                }



            }

        }




        $('document').ready(function() {
            usertable.tablef();

           
            $( ".btn-success" ).click(function() {
usertable.tablef();
});

            $('#myModal').on('hidden.bs.modal', function() {

                usertable.tablef();

            });
             $('#damtable tbody').on('click', '.btn-warning', function() {
               
               
                    $('#myModal').load("ajax/d_view.php?id=" + $(this).attr('id'));

               
            });

            $('#damtable tbody').on('click', '.btn-primary', function() {
                
                    $('#myModal').load("ajax/d_update.php?id=" + $(this).attr('id'));

             
            });
            $('#damtable tbody').on('click', '.btn-danger', function() {

                 $('#myModal').load("ajax/d_delete.php?id=" + $(this).attr('id'));

              
            });

        });

    </script>