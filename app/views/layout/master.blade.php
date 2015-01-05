<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
{{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}




@yield('head')


</head>
<body>


{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}

{{HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}
{{HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js')}}

@yield('body')

</body>
</html>