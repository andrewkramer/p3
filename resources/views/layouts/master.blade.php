<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="img/favicon.png"/>
		<title>@yield('title',"Developer's Best Friend")</title>

		<!-- Import Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
		
		<!-- Import Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Import sitewide custom CSS -->
		<link href="css/dbf.css" rel="stylesheet">
		
		{{-- Yield page specific css --}}
		@yield('head')
	</head>
	<body>
		<div class="container">
			<header class="row">
				<div class="row">
					<div class="col-md-12">
						<h1>Developer's Best Friend</h1>
						<h2>
							{{-- Yield Subtitle for page --}}
							@yield('header', 'Tools for the Web Developer')
						</h2>
					</div>
				</div>
				<nav class="row">
					<ul class="nav nav-justified">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="/lipsum">Lorum Ipsum</a></li>
						<li><a href="/users">Users</a></li>
						<li><a href="/password">Password</a></li>
					</ul>
				</nav>
			</header>

			<main class="row">
				{{-- Yield main content of page --}}
				@yield('main')
			</main>

			<footer class="row">
				<p class="col-md-12">Copyright &copy; {{ date('Y') }} Andrew Kramer</p>
			</footer>
		</div> <!-- End Container -->
		
		<!-- Import jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Import Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		{{-- Yield page specific scripts --}}
		@yield('body')
	</body>
</html>