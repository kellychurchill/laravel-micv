<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Norcal Policy Holders</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
		<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/underscore-min.js') }}" ></script>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a href="{{ action('HomeController@index') }}" class="navbar-brand">Norcal Policy Holders</a>
				</div>
			</nav>
			@yield('message')
			@yield('content')
		</div>
	</body>
</html>