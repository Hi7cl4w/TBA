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
</head>
<body id="bodyskin" class="skin-black fixed">
@yield('body')
{{HTML::script('assets/js/jquery-ui-1.11.2/jquery-ui.min.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/app.js')}} {{HTML::script('assets/js/metro/MetroJs.min.js')}}
<script type="text/javascript">
$(document).ready(function() {
    $(".live-tile,.flip-list").liveTile();
});
</script>}
@show
</body>
</html>