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

    @yield('head')
</head>
<body id="bodyskin" class="skin-black fixed">

<?php if(Auth::check()) { ?>
<div id="overlay2"></div>
@include('includes.header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.sidebar')
    <aside class="right-side">
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
$('#Description').wysihtml5();
$('.left-side').addClass('animated bounceInLeft');
    $('.left-side').smoothState();

</script>
</body>
</html>