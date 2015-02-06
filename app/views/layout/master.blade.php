<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    {{HTML::style('assets/js/jquery-ui-1.11.2/jquery-ui.min.css')}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/animate.css') }}
    {{ HTML::style('assets/css/font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('assets/js/metro/MetroJs.css') }}
    @yield('head')

    {{HTML::style('assets/css/material.min.css')}}
    {{HTML::style('assets/css/ripples.min.css')}}
    {{HTML::style('assets/css/admin.css')}}
    @yield('headlogin')

    {{HTML::style('assets/css/table.css')}}


    {{HTML::style('assets/css/component.css')}}


    {{HTML::script('assets/js/jquery-2.1.3.min.js')}}
    {{HTML::script('assets/js/jquery-ui-1.11.2/jquery-ui.min.js')}}

    {{HTML::script('assets/js/jquery.bootpag.min.js')}}

    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('head_last')

</head>
<body id="bodyskin" class="skin-black fixed animated fade fadeIn" >
@if (is_array(Session::get('error')))

    <div id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5>Error: Please read</h5>
        </div>
        <div class="modal-body">

            <div class="alert alert-error alert-danger">    {{ head(Session::get('error')) }}      </div>

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
                </div>
            </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            //  $('#popupmodal').modal();
            $('#popupmodal').modal('show');
        });
    </script>
@endif
@if (Session::get('notice'))

    <div id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Notification</h4>
        </div>
        <div class="modal-body">
            <p>
            <div class="alert alert-info">{{ Session::get('notice') }}</div>
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal('show');
        });
    </script>
@endif




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria- labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@yield('bodyfirst')

<?php if(Auth::check()) { ?>
<div class="clearfix"></div>
<!-- Modal -->



<div class="w" >

    <div id="morphsearch" class="morphsearch animated zoomIn">
        <form class="morphsearch-form">
            <input class="morphsearch-input" type="search" placeholder="Search..."/>
            <button class="morphsearch-submit" type="submit">Search</button>
        </form>
        <div class="morphsearch-content">
            <div class="dummy-column colspecial" id="products">
                    <h1><i class="fa fa-search " ></i> Just type here </h1>
            </div>
            <div class="row" >
            <div class="form-group col-sm-12" >

             <div id="page-selection"></div>
                </div>
            </div>
        </div><!-- /morphsearch-content -->
        <span class="morphsearch-close"></span>
    </div><!-- /morphsearch -->

</div><!-- /container -->




@include('includes.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.sidebar')

<div class="wrapper row-offcanvas row-offcanvas-left">

    <aside class="right-side animated bounceInRight">
        @yield('page')

    </aside>

    <!-- /.right-side -->

</div>

<?php } ?>
@yield('body')
{{--scripts--}}

{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/material.min.js')}}
{{HTML::script('assets/js/ripples.min.js')}}
{{HTML::script('assets/js/metro/MetroJs.min.js')}}
{{HTML::script('assets/js/jquery.smoothState.js')}}
{{HTML::script('assets/js/app.js')}}
{{HTML::script('assets/js/validator.min.js')}}
{{HTML::script('assets/js/classie.js')}}



<script type="text/javascript">
    $(document).ready(function () {
        $(".live-tile,.flip-list").liveTile();
    });

        // <![CDATA[
    $('aside').appear();

    // ]]>


</script>

{{--script end--}}


@yield('javascript')
{{HTML::script('assets/js/form_elements.js')}}
{{HTML::script('assets/js/form_validations.js')}}
<script type="text/javascript">

    (function() {
        var morphSearch = document.getElementById( 'morphsearch' ),
                input = morphSearch.querySelector( 'input.morphsearch-input' ),
                ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
                isOpen = isAnimating = false,
        // show/hide search area
                toggleSearch = function(evt) {
                    // return if open and the input gets focused
                    if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

                    var offsets = morphsearch.getBoundingClientRect();
                    if( isOpen ) {
                        classie.remove( morphSearch, 'open' );

                        // trick to hide input text once the search overlay closes
                        // todo: hardcoded times, should be done after transition ends
                        if( input.value !== '' ) {
                            setTimeout(function() {
                                classie.add( morphSearch, 'hideInput' );
                                setTimeout(function() {
                                    classie.remove( morphSearch, 'hideInput' );
                                    input.value = '';
                                }, 300 );
                            }, 500);
                        }

                        input.blur();
                    }
                    else {
                        classie.add( morphSearch, 'open' );
                    }
                    isOpen = !isOpen;
                };

        // events
        input.addEventListener( 'focus', toggleSearch );
        ctrlClose.addEventListener( 'click', toggleSearch );
        // esc key closes search overlay
        // keyboard navigation events
        document.addEventListener( 'keydown', function( ev ) {
            var keyCode = ev.keyCode || ev.which;
            if( keyCode === 27 && isOpen ) {
                toggleSearch(ev);
            }
        } );


        /***** for demo purposes only: don't allow to submit the form *****/
        morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
    })();
    @if (Auth::check())
    $('.morphsearch-input').keyup( function(){
        //alert($(this).val());
        // Set Search String
        var search_string = $(this).val();

            ajaxpaginate(search_string, 1, "/test2", "GET", true);




    });

    function ajaxpaginate(search_string, num, url, method, firstcall) {
        if (search_string !== '') {
            if (firstcall) {
                $.ajax({
                    type: method,
                    url: url + "?page=" + 1,//for server side
                    data: {query: search_string},
                    cache: false,
                    success: function (a) {
                        //alert(a.pagination.total);

                        var r = "";
                        $("#products").html("");
                        $( "#page-selection" ).show();
                        if (a.tickets != '') {
                            $.each(a.tickets, function (key, value) {
                                $( "#page-selection" ).show();
                                var fname="not";
                                var lname="allocated";
                                var cfname=null;
                                var clname=null;
                                if(value.userstaff){
                                    var fname=value.userstaff.fname;
                                    var lname=value.userstaff.lname;
                                }
                                if(value.usercustomer){
                                    var cfname=value.usercustomer.fname;
                                    var clname=value.usercustomer.lname;
                                }
                                if(Staff_id=null)
                                {
                                    Staff="not assigned";
                                }
                                var url="{{{ URL::to('/profile/'.$user->username.'/ticket') }}}/"+value.id;
                                r = "<div class='panel simple no-border shadow-z-5 animated flipInX'><div class='box-title no-border descriptive clickable'><h4 class='semi-bold'>" + value.Subject + "</h4><span><h6> Created by " + cfname+" "+clname + " Assigned Staff: " + fname+" "+lname + "</h6></span> <p><span class='text-success bold'><a href='"+url+"' > Ticket " + value.prefix + value.id + "</span>&nbsp Created on -0001-11-30 00:00:00&nbsp;&nbsp;<span class='label label-important'>" + value.Status + "</span></p></div></div>";
                                $("#products").append(r); // some ajax content loading...
                            });
                            search(search_string, a.pagination.last_page, url, method);


                        }
                        else {

                            $( "#page-selection" ).hide();
                            $("#products").html("<h1><i class='fa fa-search'></i> Not found </h1>");

                        }
                        //search( search_string, a.pagination.total);
                    }
                });

            }
            else {

                $.ajax({
                    type: method,
                    url: url + "?page=" + num ,
                    data: {query: search_string},
                    cache: false,
                    success: function (a) {
                        //alert(a.pagination.total);
                        var r = "";
                        if (a.tickets != '') {
                            $("#products").html("");
                            $( "#page-selection" ).show();
                            $.each(a.tickets, function (key, value) {

                                var fname="not";
                                var lname="allocated";
                                var cfname=null;
                                var clname=null;
                                if(value.userstaff){
                                    var fname=value.userstaff.fname;
                                    var lname=value.userstaff.lname;
                                }
                                if(value.usercustomer){
                                    var cfname=value.userstaff.fname;
                                    var clname=value.userstaff.lname;
                                }
                                r = "<div class='panel simple no-border shadow-z-4'><div class='box-title no-border descriptive clickable'><h4 class='semi-bold'>" + value.Subject + "</h4><span><h6> Created by " + cfname+" "+clname + " Assigned Staff: " + fname+" "+lname + "</h6></span> <p><span class='text-success bold'><a href='{{{ URL::to('/profile/'.$user->username.'/ticket/') }}}+value.id' >Ticket " + value.prefix + value.id + "</span>&nbsp Created on -0001-11-30 00:00:00&nbsp;&nbsp;<span class='label label-important'>" + value.Status + "</span></p></div></div>";
                                $("#products").append(r); // some ajax content loading...
                            });
                            //search( search_string, a.pagination.total);

                        }
                        else {
                            $( "#page-selection" ).hide();
                            $("#products").html("<h1><i class='fa fa-search'></i> Not found </h1>");

                        }

                    }
                });
            }
        }
        else{
            $( "#page-selection").hide();
            $("#products").html("<h1><i class='fa fa-search'></i> Not found </h1>");

        }

    };


         function search (search_string,total ,url,method) {

        $('#page-selection').bootpag({
            maxVisible: 25,
            total: total
        }).on("page", function(event, num){
               // $("#content").html("Insert content"); // some ajax content loading...
            ajaxpaginate(search_string, num, url, method, false);


            });

    };


@endif











$('#Description').wysihtml5({
        "image": false,
        "color": false,
        "font-styles": false,
        "lists": false,
        "link": false
    });
$('#Feedback').wysihtml5({
        "image": false,
        "color": false,
        "font-styles": false,
        "lists": false,
        "link": false
    });
//$('.left-side').addClass('animated bounceInLeft');
    //$('.left-side').smoothState();
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
    });

(function($) {
    'use strict';
    var $body = $('html, body'),
            content = $('.left-side').smoothState({
                // Runs when a link has been activated
                onStart: {
                    duration: 250, // Duration of our animation
                    render: function (url, $container) {
                        // toggleAnimationClass() is a public method
                        // for restarting css animations with a class
                        content.toggleAnimationClass('.animated .bounceDown');
                        // Scroll user to the top
                        $body.animate({
                            scrollTop: 0
                        });
                    }
                }
            }).data('smoothState');
    //.data('smoothState') makes public methods available
})(jQuery);
</script>


</body>
</html>