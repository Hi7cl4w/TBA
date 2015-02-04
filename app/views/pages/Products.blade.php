
@extends('layout.master')
@section('head')
    {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
    {{HTML::style('assets/plugins/datatables/dataTables.bootstrap.css')}}
    {{HTML::style('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}



@stop


@section('page')
      <ul class="breadcrumb">
        <li>
            <p>HOME</p>
        </li>
        <li><a href="#" class="active">Products</a></li>
    </ul>


        <div class="row-fluid">
            <div class="span12">
                <div class="box simple ">
                    <div class="box-title">
                        <h4>Advance <span class="semi-bold">Options</span></h4>
                    </div>
                    <div class="box-body ">
                        <table class="table table-hover table-striped" id="products" >
                            <thead>
                            <tr>
                                <th>Product id</th>
                                <th>Product Name</th>
                                <th>Product Vendor</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>   <!-- END ROW -->
@stop
@section('javascript')
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}
    {{HTML::script('assets/plugins/datatables/js/jquery.dataTables.min.js')}}
    {{HTML::script('assets/plugins/datatables/dataTables.bootstrap.min.js')}}
    {{HTML::script('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}
    {{HTML::script('assets/plugins/datatables-responsive/js/lodash.min.js')}}
    {{HTML::script('assets/js/datatables.js')}}
    <script type="text/javascript">

        $(document).ready(function(){

            $('.box-body #products').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{{ URL::to('/profile/'.$user->username."/products/table") }}}",
                    "data": function ( d ) {
                        d.myKey = "myValue";

                        // d.custom = $('#myInput').val();
                        // etc
                    }
                }
            } );


        });

        $(document).ready(function() {
            var table = $('.box-body #products').DataTable();

            $('.box-body #products tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

            $('#button').click( function () {
                table.row('.selected').remove().draw( false );

            } );
            $("#products tbody").delegate("tr", "click", function() {
              //
                //$('#myModal').modal('hide');
                var c=table.cell('.selected', 0).data();
                //alert(c);

            });


        } );
        $(document).ready(function () {
            $(document).on('click', '.delete', function() {
                $(this).removeData('#myModel');
             var id= $(this).attr('id');
                var value="{{{ URL::to('/profile/'.$user->username."/products/delete?id=") }}}";
                //alert(value+id);
               $('#myModal .modal-body').load(value+id);
                $('#myModal').modal('show');
            });

        });


    </script>



@stop

