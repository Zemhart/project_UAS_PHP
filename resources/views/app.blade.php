<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>
	<!-- Fonts -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
	<style>
		body 
		{
			font-family: 'Lato';
		}
		.fa-btn {
			margin-right: 6px;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">	
		</nav>
	</div>
	@yield('content')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script></script>
	{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>