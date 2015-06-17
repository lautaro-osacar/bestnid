<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bestnid</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app-custom.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}"><img class="img-circle logo-img" src="{{ asset('bestnid-logo.png') }}"></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav logo-text">
					<li><a href="{{ url('/') }}">Bestnid</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-center no-collapse">
				 	<form class="navbar-form navbar-left" role="search">
			        	<div class="form-group">
			          	<input style="width:350px" type="text" class="form-control" placeholder="Producto a buscar">
			        	</div>
			        	<button type="submit" class="btn btn-default">Buscar</button>
			      </form>
			     </ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}" style="color:#F0291D">Registrarse</a></li>
					@else
						<li><a href="{{ url('/subasta/create') }}" style="color:#F0291D">Subastar</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/perfil/subastas') }}">Mi Perfil</a></li>
								<li><a href="{{ url('/auth/logout') }}">Cerrar sesión</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class='contenido'>
	@yield('content')
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
	<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
	<script src="{{ asset('/js/fileinput.min.js') }}"></script>
	<link href="{{ asset('/css/fileinput.min.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/fileinput_locale_es.js') }}"></script>
	<script type="text/javascript" src="http://markusslima.github.io/bootstrap-filestyle/js/bootstrap-filestyle.min.js"> </script>

</body>
</html>
