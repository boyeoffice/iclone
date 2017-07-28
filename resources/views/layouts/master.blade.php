<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title') | Clone</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/ionicons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">

        
        <style>
        [v-cloak] { display: none; }
       </style>

    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }

        window.User = {!! json_encode(Auth::user()) !!}

        window.Language = "{{ config('app.locale') }}"
        </script>
    
    <body class="skin-red sidebar-mini">
    <div id="app" class="wrapper">
    @include('inc.navbar')
    @include('inc.sidebar')
    @yield('content')
    </div>
    <script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    @yield('scripts')
    </body>
</html>
