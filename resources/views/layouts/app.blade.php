<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clone</title>
     @if(Auth::user())
     <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
     @if(Auth::guest())
        <link rel="stylesheet" type="text/css" href="css/auth.css"> 
        @endif
        <script>
            window.Url = "{{url('/')}}"
        </script>
</head>
<body>
@if(Auth::user())
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        iCLONE
                    </a>
                </div>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                          <li class="dropdown"> <img src="{{asset('avatar/'. Auth::user()->avatar)}}" style="margin-top: 5px;" width="40" height="40" class="img img-rounded"> </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                <li><a href="{{url('user/'. Auth::user()->username)}}">
                                    <i class="fa fa-user"></i> {{Auth::user()->username}}
                                </a>
                                 </li>
                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
            </div>
        </nav>
@endif

 @if(Auth::guest())
    <div id="app">
    <auth></auth>
    </div>
 <script src="{{asset('js/auth.js')}}"></script>
 @endif

 @if(Auth::user())
@yield('content')
@yield('scripts') 
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endif
</body>
</html>
