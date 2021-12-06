<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Dashboard | NUMVA</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
	 <link rel="shortcut icon" href="{{url('/img/logo.png')}}">
	 
    <!-- Template -->
    <link rel="stylesheet" href="{{url('/graindashboard/css/graindashboard.css')}}">
	<script src = "https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
	@include('admin.layouts.header')
	<main class="main">
		@include('admin.layouts.sidebar')
		<div class="content">
		@yield('content')
		@include('admin.layouts.footer')
		</div>
		@if(Route::is('admin.index'))
			@include('admin.qr.modal')
		@elseif(Route::is('admin.user'))
			@include('admin.user.modal')
		@endif
	</main>
	<script src="{{url('/graindashboard/js/graindashboard.js')}}"></script>
	<script src="{{url('/graindashboard/js/graindashboard.vendor.js')}}"></script>
</body>
</html>