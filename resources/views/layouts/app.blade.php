<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    @php
        $applogo=DB::table('settings')->get();
    @endphp
    @foreach($applogo as $row)
    <link rel="icon" href="{{URL::to('images/'.$row->favicon)}}" type="image/x-icon">
    @endforeach
    <title>@yield('title'){{ config('app.name', 'Backend') }}</title>

    @include('layouts.layout_css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


        @include('layouts.admin_nav')

        @include('layouts.admin_aside')

        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

            @yield('content')
            </div>
            <!-- /.content-wrapper -->
       @include('layouts.admin_fotter')
</div>
@include('layouts.layout_js')
</body>
</html>
