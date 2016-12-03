<!DOCTYPE html>
<html>
<head>
<meta charaset="utf-8"/>
<title>Админка</title>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
</head> 
<body> 
<div id="header">
<h1>Админка</h1>
 <div id="content">@yield('content')</div>
 </body>
</html>