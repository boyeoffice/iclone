<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/auth.css')}}">
</head>
<body>
<div id="app">
    <auth></auth>
    </div>
 <script src="{{asset('js/auth.js')}}"></script>
</body>
</html>