@extends('layout.master')
@section('head')
    {{ HTML::style('assets/js/metro/MetroJs.css') }}
@stop
@section('body')

    <body id="bodyskin" class="skin-black fixed">
    <div id="overlay2"></div>
    @include('includes.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        @include('includes.sidebar')


    </div>





    {{HTML::script('assets/js/app.js')}} {{HTML::script('assets/js/metro/MetroJs.min.js')}}


    <script type="text/javascript">
        $(document).ready(function () {
            $(".live-tile,.flip-list").liveTile();
        });
    </script>




@stop
