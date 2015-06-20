<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fokusin - Personal Management Project</title>

	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/adminLTE.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/font-awesome.min.css') }}

	{{ HTML::script('assets/js/jquery-2.1.0.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/app.js') }}

</head>
<body>
	<div class="container">
      	<div class="header">
        	<a href="{{ URL::to('/') }}"><h3 class="text-info">Fokusin<small><sup>beta</sup></small></h3></a>
      	</div>

	    <div class="content">
	    	@yield('content')
	    </div>

	    <div class="footer">
	        <p>&copy; Solaiman Mansyur 2014</p>
	    </div>

    </div> <!-- /container -->
</body>
</html>