<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    {{HTML::script('assets/js/metro/pace.min.js')}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/animate.css') }}
    {{ HTML::style('assets/css/font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('assets/js/metro/MetroJs.css') }}
    {{HTML::style('assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css')}}
    {{HTML::style('assets/css/admin.css')}}
    {{HTML::style('assets/css/pace.css')}}
    {{HTML::script('assets/js/jquery-2.1.3.min.js')}}
    <link rel="stylesheet" type="text/css" href="/assets/css/normalize.css" />

    <link rel="stylesheet" type="text/css" href="/assets/css/component.css" />

    @yield('head')
</head>
<body id="bodyskin" class="skin-black fixed ">
@yield('bodyfirst')

<?php if(Auth::check()) { ?>

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
{{HTML::script('assets/js/jquery-ui-1.11.2/jquery-ui.min.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/metro/MetroJs.min.js')}}
{{HTML::script('assets/js/jquery.smoothState.js')}}
{{HTML::script('assets/js/app.js')}}
<script src="/assets/js/classie.js"></script>


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
















$('#Description').wysihtml5();
//$('.left-side').addClass('animated bounceInLeft');
    //$('.left-side').smoothState();


(function($) {
    'use strict';
    var $body = $('html, body'),
            content = $('.box').smoothState({
                // Runs when a link has been activated
                onStart: {
                    duration: 250, // Duration of our animation
                    render: function (url, $container) {
                        // toggleAnimationClass() is a public method
                        // for restarting css animations with a class
                        content.toggleAnimationClass('.bounceDown');
                        // Scroll user to the top
                        $body.animate({
                            scrollTop: 0
                        });
                    }
                }
            }).data('smoothState');
    //.data('smoothState') makes public methods available
})(jQuery);






    /***** for demo purposes only: don't allow to submit the form *****/
    morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
})();
</script>
</body>
</html>