<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
{{ HTML::style('assets/css/bootstrap.min.css') }}
{{ HTML::style('assets/css/font-awesome-4.2.0/css/font-awesome.min.css') }}
{{HTML::style('assets/css/admin.css')}}
 {{ HTML::style('assets/js/metro/MetroJs.css') }} 
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
         </aside><!-- /.right-side -->

 	</div>
 	<?php } ?>
{{HTML::script('assets/js/jquery-ui-1.11.2/jquery-ui.min.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/app.js')}} {{HTML::script('assets/js/metro/MetroJs.min.js')}}
<script type="text/javascript">
$(document).ready(function() {
    $(".live-tile,.flip-list").liveTile();
});
</script>}
@yield('body')
@show
</body>
</html>