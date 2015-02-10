@extends('layout.master')
@section('head_last')
    {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
    {{HTML::style('assets/plugins/star/css/star-rating.min.css')}}

    {{HTML::script('assets/plugins/star/js/star-rating.min.js')}}
@stop


@section('page')

    <ul class="breadcrumb">
        <li>
            <p>HOME</p>
        </li>
        <li><a href="#" class="active">Support</a></li>
    </ul>



    <div class="pull-right actions">

    </div>




    <div class="page-title">
        <h1><i class="fa fa-arrow-circle-left"></i>Support</h1>

        <div class="row form-row">
            <div class="col-md-12">
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
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <br>

    <div class="row">

            <div class="col-md-12">

                <div class="box simple no-border ">
                    <div class="box simple no-border">
                        <div class="box-title no-border descriptive clickable">
                            <h4 class="semi-bold"><b>Subject: </b> {{ $ticket->Subject }}</h4>


                            <p><span class="text-success bold">Ticket #{{ $ticket->prefix }}{{ $ticket->id }}</span> -
                                Created on {{ $ticket->created_at}}&nbsp;&nbsp;


                             <span
                                     class="label {{$ticket->Status}}">{{$ticket->Status}}</span></p>

                            <p>
                                <?php
                                echo "<br>Last Updated Location : ".$ticket->GeoLocation;
                                ?>

                            @if ($user->hasRole('Administrator') or $user->hasRole('Staff') )
                            <div class="actions">


                                    <a id="status{{$ticket->id}}"
                                       class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-default pull-right"><i
                                                class="fa fa-cog"></i></a>

                            </div>
                            @endif

                            <?php $user = Auth::user();?>

                            <div class="actions">


                                <div class="form-group">

                                    @if ($ticket->Status=="Completed"&&$user->hasRole('Customer'))
                                        <label>Rating</label>
                                        <input id="{{$ticket->id}}" type="number" class="rating" showCaption="false"
                                               data-show-clear="false" min=0 max=5 step=1 data-size="xs" data-rtl="false">
                                    @endif

                                    @if ($ticket->Status=="Completed"&&$user->hasRole('Administrator') or $ticket->Status=="Completed"&&$user->hasRole('Staff') )
                                        <label>Rating</label>
                                        <input id="{{$ticket->id}}" type="number" class="rating" showCaption="false"
                                               data-show-clear="false" min=0 max=5 step=1 data-size="xs" data-rtl="false"
                                               readonly="true">
                                    @endif
                                </div>
                            </div>
                            <script type="text/javascript">
                                //STATUS CHANGE
                                $(document).on('click', '#status{{$ticket->id}}', function () {
                                    $('body').on('hidden.bs.modal', '.modal', function () {
                                        $(this).removeData('bs.modal');
                                        $(this).removeData('#myModel');
                                    });

                                    $('#myModal .modal-body').load('{{{ URL::to('/profile/'.$user->username."/ticket/status/") }}}/{{$ticket->id}}');
                                    $('#myModal').modal('show');

                                });
                                //change status post
                                $(document).on('click', '#submitstatus{{$ticket->id}}', function () {

                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        alert("Geolocation is not supported by this browser.");

                                    }
                                    function showPosition(position) {
                                        var lat = position.coords.latitude;
                                        var long = position.coords.longitude;

                                        var status = $('#status').val();
                                        var remark = $('#remark').val();

                                        $.ajax({
                                            type: "GET",
                                            url: "{{{ URL::to('/profile/'.$user->username.'/ticket/status/post') }}}/{{$ticket->id}}",
                                            data: {status: status, remark: remark, lat: lat, long: long},
                                            cache: false,
                                            success: function (data) {
                                                $('#myModal').modal('toggle');
                                                location.reload();
                                            }
                                        });
                                        //alert(value+id);
                                    }

                                });
                                $(document).on('click', '#submitstaff{{$ticket->id}}', function () {

                                    var staffold="{{$ticket->Staff_id}}";
                                    var staff=$( "#staff" ).val();

                                    $.ajax({
                                        type: "GET",
                                        url: "{{{ URL::to('/profile/'.$user->username.'/ticket/staff/post') }}}/{{$ticket->id}}",
                                        data: {staffold: staffold, staff: staff},
                                        cache: false,
                                        success: function (data) {
                                            $('#myModal').modal('toggle');
                                            //location.reload();
                                        }
                                    });
                                    //alert(value+id);


                                });


                                $("#{{$ticket->id}}").rating();
                                //set current rating
                                $('#{{$ticket->id}}').rating('update', "{{$ticket->Rating}}");
                                //update rating
                                @if ($ticket->Status=="Completed"&&$user->hasRole('Customer'))
                                $("#{{$ticket->id}}").on('rating.change', function (event, value, caption) {

                                    $.ajax({
                                        type: "GET",
                                        url: "{{{ URL::to('/profile/'.$user->username.'/ticket/rating') }}}",
                                        data: {value: value, id: "{{$ticket->id}}"},
                                        cache: false,
                                        success: function (data) {
                                            $(this).removeData('#myModel');
                                            var value = "{{{ URL::to('/profile/'.$user->username."/ticket/feedback?id=") }}}";
                                            //alert(value+id);
                                            $('#myModal .modal-body').load(value + "{{$ticket->id}}");
                                            $('#myModal').modal('show');

                                        }
                                    });

                                });
                                $(document).on('click', '#{{$ticket->id}}', function () {

                                    var value = $('#Feedback{{$ticket->id}}').val();

                                    $.ajax({
                                        type: "GET",
                                        url: "{{{ URL::to('/profile/'.$user->username.'/ticket/feedback/post') }}}",
                                        data: {value: value, id: "{{$ticket->id}}"},
                                        cache: false,
                                        success: function (data) {

                                            $('#myModal').modal('toggle');

                                        }
                                    });
                                    //alert(value+id);

                                });
                                @endif
                            </script>
                            </p>

                        </div>
                        <div class="box-body no-border" >


                            <div class="post">
                                <div class="user-profile-pic-wrapper">
                                    <div class="user-profile-pic-normal"><img width="35" height="35"
                                                                              src="/assets/img/user.svg" alt=""></div>
                                </div>
                                <div class="info-wrapper">
                                    <div class="info"> {{ $ticket->Description }} </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="info "> <h4>Customer Details</h4> </div>
                                    <b>Name:</b>  {{$ticket->usercustomer->fname}}<br>
                                    <b>Phone:</b>  {{$ticket->userstaffd->Phone}}<br>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-md-6 ">
                                <div class="info"> <h4>Staff Details</h4>
                                    <b>Name:</b>  {{$ticket->userstaff->fname}}<br>
                                    <b>Phone:</b>  {{$ticket->userstaffd->Phone}}<br>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                                    @if($ticket->Feedback)
                                    <div class="info-wrapper">
                                <div class="info"> <h4>Feedback</h4>

                                      {{$ticket->Feedback}}<br>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                                    @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <br>

                            <div class="form-actions">
                                <div class="post col-md-12">

                                    <div class="form-row">
                                        <div class="col-xs-10">
                                            <input type="text" id="replaybox{{$ticket->id}}">
                                        </div>
                                        <div class="col-xs-2">

                                            <button id="replay{{$ticket->id}}"
                                                    class="form-group btn btn-primary btn-xs"></i>Comment
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row col-xs-12">
                                        <div class="comments">
                                            <hr>
                                            <div id="results{{$ticket->id}}"></div>
                                            <div align="center">
                                                <p>
                                                    <button class="paginate_button load_more{{$ticket->id}} btn btn-default"
                                                            id="load_more_button">load More
                                                    </button>
                                                <div class="animation_image" style="display:none;"><img
                                                            src="/assets/img/load.gif"> Loading...
                                                </div>
                                                </p>

                                            </div>

                                        </div>
                                    </div>


                                    <script>

                                        $("#replaybox{{$ticket->id}}").keyup(function (event) {
                                            if (event.keyCode == 13) {
                                                $("#replay{{$ticket->id}}").click();
                                            }
                                        });
                                        $("#replay{{$ticket->id}}").on('click', function () {
                                            var comment = $("#replaybox{{$ticket->id}}").val();

                                            replay({{$ticket->id}}, comment);

                                        });
                                        var track_click{{$ticket->id}} = 1; //track user click on "load more" button, righ now it is 0 click
                                        $.ajax({
                                            type: "GET",
                                            url: "{{{ URL::to('/profile/'.$user->username.'/comments?page=') }}}" + track_click{{$ticket->id}},
                                            data: {id: "{{$ticket->id}}"},
                                            success: function (data) {
                                                // Parse the returned json data
                                                $(".load_more").show();
                                                $("#products").html("");
                                                $("#page-selection").show();

                                                if (data.comments.length >= 1) {
                                                    $.each(data.comments, function (key, value) {
                                                        var t = value.updated_at.split(/[- :]/);

                                                        var d = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                                                        var f = new Date(d + "UTC");

                                                        r = "<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" src=\"/assets/img/user.svg\" alt=\"\"> " + value.user.fname + "</div></div><div class=\"info\"> <br><br> " + value.comment + "<br><p>Posted on " + f + "</p><hr> </div>";

                                                        $("#results{{$ticket->id}}").append(r); // some ajax content loading...

                                                    });

                                                }
                                                else {

                                                    $(".load_more").attr("disabled", "disabled");
                                                    $('.animation_image').hide();
                                                    $(".load_more{{$ticket->id}}").hide();
                                                    r = "<hr><h4>No comments yet<h4><hr>";

                                                    $("#results{{$ticket->id}}").html(r);

                                                }

                                                //scroll page smoothly to button id
                                                total_pages{{$ticket->id}} = data.pagination.last_page;
                                                track_click{{$ticket->id}} = data.pagination.current_page + 1;

                                                //hide loading image
                                                $('.animation_image').hide(); //hide loading image once data is received

                                            }
                                        });

                                        $(document).on('click', '.load_more{{$ticket->id}}', function () { //user clicks on button

                                            //hide load more button on click
                                            //show loading image

                                            id ={{ $ticket->id}};

                                            if (track_click{{$ticket->id}} <= total_pages{{$ticket->id}}) //user click number is still less than total pages
                                            {
                                                $.ajax({
                                                    type: "GET",
                                                    url: "{{{ URL::to('/profile/'.$user->username.'/comments?page=') }}}" + track_click{{$ticket->id}},
                                                    data: {id: id},
                                                    success: function (data) {
                                                        // Parse the returned json data

                                                        $(".load_more").show();
                                                        $("#products").html("");
                                                        $("#page-selection").show();
                                                        if (data.comments.length >= 1) {
                                                            $('.animation_image').show();
                                                            $.each(data.comments, function (key, value) {
                                                                var t = value.updated_at.split(/[- :]/);
                                                                var d = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                                                                var f = new Date(d + "UTC");

                                                                r = "<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" src=\"/assets/img/user.svg\" alt=\"\"> " + value.user.fname + "</div></div><div class=\"info\"> <br><br> " + value.comment + "<br><p>Posted on " + f + "</p><hr> </div>";

                                                                $("#results{{$ticket->id}}").append(r); // some ajax content loading...

                                                            });

                                                            $('.animation_image').hide();
                                                            track_click{{$ticket->id}} = data.pagination.current_page + 1;
                                                        } else {
                                                            $(".load_more").attr("disabled", "disabled");
                                                            $('.animation_image').hide();
                                                            $(".load_more{{$ticket->id}}").hide();

                                                        }
                                                        if (data.pagination.current_page + 1 >= data.pagination.last_page) //compare user click with page number
                                                        {
                                                            $(".load_more{{$ticket->id}}").hide();
                                                            $(".load_more").attr("disabled", "disabled");
                                                            $('.animation_image').hide();

                                                        }

                                                        //scroll page smoothly to button id

                                                    }
                                                });  //post page number and load returned data into result element


                                            }

                                        });

                                    </script>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>




                    </div>
            </div>



    </div>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>














@stop
@section('javascript')
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}

    {{HTML::script('assets/js/support_ticket.js')}}



    <script type="text/javascript">


        function replay(id, comment) {
            $.ajax({
                type: "POST",
                url: "{{{ URL::to('/profile/'.$user->username.'/comments/post') }}}",
                data: {id: id, comment: comment},
                cache: false,
                success: function (data) {
                    // Parse the returned json data
                    $(".load_more").show();

                    $("#results" + id).before(data);
                    //scroll page smoothly to button id

                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received

                    //user click increment on load button
                }
            });

        }

        $('.view').on('click', function () {

            var el = jQuery(this).parents(".box").children(".box-body");
            if (jQuery(this).hasClass("expand")) {
                jQuery(this).removeClass("expand");


                el.slideUp(200);
            } else {
                jQuery(this).removeClass("collapse").addClass("expand");
                el.slideDown(200);
            }
        });


        $("#Purchase_id").bind("keyup change", function () {
            var value = $(this).val();


            $("#Product_id option[value='']").remove();
            $.ajax({
                type: "GET",
                url: "{{{ URL::to('/profile/'.$user->username.'/purchases/get') }}}",
                data: {value: value},
                cache: false,
                success: function (d) {
                    // Parse the returned json data

                    if (d.id) {   // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                        $('#Product_id').html('<option value="' + d.id + '">' + d.Vendor + " : " + d.Name + '</option>');
                    }
                    else {
                        $('#Product_id').html("<option value='' > --invalid purchase id-- </option>");
                    }
                }
            });

        });


    </script>


@stop

