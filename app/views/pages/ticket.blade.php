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
        <h3>New Ticket</h3><button class="btn btn-fab btn-raised btn-material-red" type="button" id="btn-new-ticket"><i class="mdi-content-add"></i> </button>
    </div>


    <div class="pull-right actions">

    </div>



    <div class="page-title">
        <h1>Support</h1>


        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box simple light animated" id="new-ticket-wrapper" style="display:none">
                <div class="box-title no-border">
                    <h4 class="semi-bold">How can we help you?</h4>
                </div>
                <div class="box-body">
                    <form class="" method="POST" id="new-ticket-form"
                          action="{{{ URL::to('/profile/'.$user->username.'/ticket') }}}">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                        <div class="row form-row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Subject" class="form-control" id="Subject"
                                       name="Subject" value="{{{ Input::old('Subject') }}}">
                            </div>
                            <div class="col-md-3">
                                <select id="Product_id" name="Product_id" style="width:100%">
                                    <option value="">Loading Products...</option>

                                </select>
                             
                            </div>
                            <div class="col-md-3">
                                <input type="text" placeholder="Purchase ID" class="form-control" id="Purchase_id"
                                       name="Purchase_id">
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="10" id="Description" name="Description"
                                          value="{{{ Input::old('Subject') }}}"></textarea>
                            </div>
                        </div>
                        <div class="row form-row h-align-middle">
                            <div class="col-md-12 ">
                                {{ Form::captcha(array('theme' => 'plain')) }}
                            </div>

                        </div>
                        <div class="row form-row">
                            <div class="col-md-12 margin-top-10">
                                <div class="pull-left">
                                    <div class="checkbox checkbox check-success col-md-12">
                                        <label for="chkTerms"> <input type="checkbox" name="terms" value="1" id="chkTerms">
                                            <span class="ripple"></span><span class="check"></span>I Here by agree on the Term and
                                            condition. </label>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-cons" type="button" id="btn-close-ticket">Close
                                    </button>
                                    <button class="btn btn-primary btn-cons" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h4>Open <span class="semi-bold">Tickets</span></h4>
    <br>

    <div class="row">

            <div class="col-md-12">
                @foreach($tickets as $ticket)
                <div class="box simple no-border">
                    <div class="box-title no-border descriptive clickable">
                        <h4 class="semi-bold">{{ $ticket->Subject }}</h4>


                        <p><span class="text-success bold">Ticket #{{ $ticket->prefix }}{{ $ticket->id }}</span> -
                            Created on {{ $ticket->created_at}}&nbsp;&nbsp;
                            <?php $user = Auth::user();?>
                            @if ($ticket->Status=="Completed"&&$user->hasRole('Customer'))
                            <input id="{{$ticket->id}}" type="number" class="rating" min=1 max=5 step=.5 data-size="xs" data-rtl="false"  >
                            @endif
                            @if ($ticket->Status=="Completed"&&$user->hasRole('Administrator'))
                                <input id="{{$ticket->id}}" type="number" class="rating" min=1 max=5 step=.5 data-size="xs" data-rtl="false" readonly="true"  >
                            @endif
                            <script type="text/javascript">

                                $("#{{$ticket->id}}").rating();
                                $('#{{$ticket->id}}').rating('update',{{$ticket->Rating}});
                                @if ($ticket->Status=="Completed"&&$user->hasRole('Customer'))
                                $("#{{$ticket->id}}").on('rating.change', function(event, value, caption) {

                                    $.ajax({
                                        type: "GET",
                                        url: "{{{ URL::to('/profile/'.$user->username.'/ticket/rating') }}}",
                                        data: {value: value,id:"{{$ticket->id}}"},
                                        cache: false,
                                        success: function (data) {
                                            $(this).removeData('#myModel');
                                            var value="{{{ URL::to('/profile/'.$user->username."/ticket/feedback?id=") }}}";
                                            //alert(value+id);
                                            $('#myModal .modal-body').load(value+"{{$ticket->id}}");
                                            $('#myModal').modal('show');

                                        }
                                    });

                                });
                                $(document).on('click', '#{{$ticket->id}}', function() {

                                    var value=$('#Feedback{{$ticket->id}}').val();

                                    $.ajax({
                                        type: "GET",
                                        url: "{{{ URL::to('/profile/'.$user->username.'/ticket/feedback/post') }}}",
                                        data: {value: value,id:"{{$ticket->id}}"},
                                        cache: false,
                                        success: function (data) {

                                            $('#myModal').modal('toggle');

                                        }
                                    });
                                    //alert(value+id);
                                    $('#myModal .modal-body').load(value+id);
                                    $('#myModal').modal('show');
                                });
                                @endif
                                </script>
                                <span
                                    class="label {{$ticket->Status}}">{{$ticket->Status}}</span></p>

                        <div class="actions"><a class="view" href="javascript:;"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div class="box-body  no-border" style="display:none">
                        <div class="post">
                            <div class="user-profile-pic-wrapper">
                                <div class="user-profile-pic-normal"><img width="35" height="35"
                                                                          src="/assets/img/user.svg"   alt=""></div>
                            </div>
                            <div class="info-wrapper">
                                <div class="info"> {{ $ticket->Description }} </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <hr>
                        <div class="form-actions">
                            <div class="post col-md-12">

                                <div class="row col-xs-12">
                                <div id="results{{$ticket->id}}"></div>
                                <div align="center">
                                    <button class="load_more{{$ticket->id}}" id="load_more_button">load More</button>

                                    <div class="animation_image" style="display:none;"><img src="/assets/img/load.gif"> Loading...</div>
                                </div>  <hr>
                                </div>

                                <div class="info-wrapper">
                                    <div class="form-row-stripped">


                                         <span><div class="input-with-icon  right"><i class=""></i>
                                            <input type="text" id="replaybox{{$ticket->id}}"> <label ><button id="replay{{$ticket->id}}" class="btn btn-primary btn-xs fa fa-reply"></i>&nbsp;Comment</button>
                                                     <script>
                                                        $("#replaybox{{$ticket->id}}").keyup(function (event) {
                                                             if (event.keyCode == 13) {
                                                                 $("#replay{{$ticket->id}}").click();
                                                             }
                                                         });
                                                         $("#replay{{$ticket->id}}").on('click', function () {
                                                             var comment = $("#replaybox{{$ticket->id}}").val();

                                                             replay({{$ticket->id}},comment);

                                                         });
                                                      var track_click = 1; //track user click on "load more" button, righ now it is 0 click
                                                     $.ajax({
                                                          type: "GET",
                                                          url: "{{{ URL::to('/profile/'.$user->username.'/comments?page=') }}}"+track_click,
                                                         data: {id: "{{$ticket->id}}" },
                                                          success: function (data) {
                                                              // Parse the returned json data
                                                              $(".load_more").show();
                                                              $("#products").html("");
                                                              $( "#page-selection" ).show();
                                                              if (data.comments != '') {
                                                                  $.each(data.comments, function (key, value) {

                                                                      r = "<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" src=\"/assets/img/user.svg\" alt=\"\"> "+value.user.fname+"</div></div><div class=\"info\"> <br><br> "+value.comment+"<br><p>Posted on "+value.updated_at+"</p><hr> </div>";

                                                                      $("#results{{$ticket->id}}").append(r); // some ajax content loading...

                                                                  });

                                                              }                                                  //scroll page smoothly to button id
                                                              total_pages=data.pagination.last_page;

                                                              $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                                                              //hide loading image
                                                              $('.animation_image').hide(); //hide loading image once data is received

                                                          }
                                                      });

                                                      $(document).on('click', '.load_more{{$ticket->id}}', function () { //user clicks on button

                                                          $(this).hide(); //hide load more button on click
                                                          $('.animation_image').show(); //show loading image

                                                          track_click++;
                                                          if (track_click <= total_pages) //user click number is still less than total pages
                                                          {
                                                              $.ajax({
                                                                  type: "GET",
                                                                  url: "{{{ URL::to('/profile/'.$user->username.'/comments?page=') }}}"+track_click,
                                                                  data: {id: "{{$ticket->id}}" },
                                                                  success: function (data) {
                                                                      // Parse the returned json data

                                                                      $(".load_more").show();
                                                                      $("#products").html("");
                                                                      $( "#page-selection" ).show();
                                                                      if (data.comments != '') {
                                                                          $.each(data.comments, function (key, value) {
                                                                              r = "<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" src=\"/assets/img/user.svg\" alt=\"\"> "+value.user.fname+"</div></div><div class=\"info\"> <br><br> "+value.comment+"<br><p>Posted on "+value.updated_at+"</p><hr> </div>";

                                                                              $("#results{{$ticket->id}}").append(r); // some ajax content loading...

                                                                          });

                                                                      }                                                  //scroll page smoothly to button id

                                                                      $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                                                                      //hide loading image
                                                                      $('.animation_image').hide(); //hide loading image once data is received

                                                                      //user click increment on load button
                                                                  }
                                                              });  //post page number and load returned data into result element


                                                              if (track_click >= total_pages - 1) //compare user click with page number
                                                              {
                                                                  //reached end of the page yet? disable load button
                                                                  $(".load_more").attr("disabled", "disabled");
                                                              }
                                                          }

                                                      });

                                                     </script>
                                        </div></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                </div>
                @endforeach
            </div>



    </div>

    <div class="row">
        <div class="col-md-12">

                {{ $tickets->links() }}
        </div>
    </div>













@stop
@section('javascript')
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
    {{HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}

    {{HTML::script('assets/js/support_ticket.js')}}



        <script type="text/javascript">


            $('#btn-new-ticket').on('click', function (e) {


                $("#Product_id option[value='']").remove();
                $.ajax({
                    type: "GET",
                    url: "{{{ URL::to('/profile/'.$user->username.'/products/list') }}}",
                    success: function (data) {
                        // Parse the returned json data

                        // Use jQuery's each to iterate over the opts value
                        $.each(data, function (i, d) {
                            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                            $('#Product_id').append('<option value="' + d.id + '">' + d.Vendor + " : " + d.Name + '</option>');
                        });
                    }
                });
            });




            function replay(id,comment) {
                $.ajax({
                    type: "POST",
                    url: "{{{ URL::to('/profile/'.$user->username.'/comments/post') }}}",
                    data: {id: id , comment:comment},
                    cache: false,
                    success: function (data) {
                        // Parse the returned json data
                        $(".load_more").show();
                        $("#results"+id).append(data);
                        //scroll page smoothly to button id
                        $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);

                        //hide loading image
                        $('.animation_image').hide(); //hide loading image once data is received

                        track_click++; //user click increment on load button
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


            $( "#Purchase_id" ).bind("keyup change",function() {
                        var value = $( this ).val();


                $("#Product_id option[value='']").remove();
                $.ajax({
                    type: "GET",
                    url: "{{{ URL::to('/profile/'.$user->username.'/purchases/get') }}}",
                    data: {value: value},
                    cache: false,
                    success: function (d) {
                        // Parse the returned json data

                        if(d.id) {   // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
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

