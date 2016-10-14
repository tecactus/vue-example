<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vue-Example</title>
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}">
	<style>
		.mt40 {
			margin-top: 40px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ url('/') }}">Vue-Example</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="{{ request()->is('instancias') ? 'active' : '' }}"><a href="{{ url('instancias') }}">Instancias</a></li>
	        <li class="{{ request()->is('selects-dependientes') ? 'active' : '' }}"><a href="{{ url('selects-dependientes') }}">Selects - El malo</a></li>
	        <li class="{{ request()->is('selects-dependientes-2') ? 'active' : '' }}"><a href="{{ url('selects-dependientes-2') }}">Selects - El feo</a></li>
	        <li class="{{ request()->is('selects-dependientes-3') ? 'active' : '' }}"><a href="{{ url('selects-dependientes-3') }}">Selects - El bueno</a></li>
	        <li class="{{ request()->is('selects-dependientes-4') ? 'active' : '' }}"><a href="{{ url('selects-dependientes-4') }}">Selects - El bonito!</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container">
		@yield('content')
	</div>
	
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/vue.min.js') }}"></script>
	<script src="{{ asset('js/vue-resource.min.js') }}"></script>

	@stack('scripts');
	
</body>
</html>