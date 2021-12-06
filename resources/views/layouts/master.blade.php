<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

        <title>Numva</title>
		
		<!-- Favicon -->
	 	<link rel="shortcut icon" href="{{url('/img/logo.png')}}">
	 
        <!-- Style -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.css" integrity="sha512-/AilQf/shuEGfh8c3DoIqcIqHZCKpiImSyt+fxIKJphHiNa6QMPb6AbDly6rkjmGr/5OZd35JtvVkbEKnCZO+A==" crossorigin="anonymous" />
		
		<!-- Script CDN -->
		<script src = "https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--       	<script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script> -->
      	
      	@include('layouts._css')
    </head>
    <body class="antialiased">
        @yield('content')
    	@include('layouts.footer')
    	
    	
    	@include('layouts._scripts')
    </body>
</html>
