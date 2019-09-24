<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Portfolio</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/main.css">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<style>
			Remove the navbar's default margin-bottom and rounded borders  
			.navbar {
				margin-bottom: 0;
				border-radius: 0;
			}

			Add a gray background color and some padding to the footer 
			footer {
				background-color: #f2f2f2;
				padding: 25px;
			}
		</style>
	</head>
	<body>

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
			 
				<!	<a class="navbar-brand" href="#">Dew Hunt</a> !>
				
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
						@if (!Auth::check())
							<li><a href="/login">Login</a></li>
							<li><a href="/register">Register</a></li>
						@else
							<li><a href="/gallery/create">Create Gallery</a></li>
							<li><a href="/logout">Logout</a></li>
						@endif
					</ul>
{{-- 					<ul class="nav navbar-nav navbar-right">
						<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul> --}}
				</div>
			</div>
		</nav>

		@if (Session::has('message'))
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('message') }}
			</div>			
		@endif

		@yield('content')

{{-- 		<footer class="container-fluid text-center">
			<p>Footer Text</p>
		</footer> --}}

	</body>
</html>

