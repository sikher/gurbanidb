<!DOCTYPE html>
<html>
	<head>
		<title>GurbaniDB</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
  	<body>
  		<div class="container">
	  		<div class="navbar navbar-default" role="navigation">
	  			<div class="navbar-header">
	  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	  					<span class="sr-only">Toggle navigation</span>
	  					<span class="icon-bar"></span>
	  					<span class="icon-bar"></span>
	  					<span class="icon-bar"></span>
	  				</button>
	  				<a class="navbar-brand" href="#">GurbaniDB API</a>
	  			</div>
	  			<div class="navbar-collapse collapse">
	  				<ul class="nav navbar-nav">
	  					<li><a href="/search">Search</a></li>
	  					<li><a href="/page">Page</a></li>
	  					<li><a href="/hymn">Hymn</a></li>
	  					<li><a href="/random">Random</a></li>
	  					<li class="dropdown">
	  						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Meta <b class="caret"></b></a>
	  						<ul class="dropdown-menu">
	  							<li><a href="/author">Author</a></li>
	  							<li><a href="/melody">Melody</a></li>
	  							<li><a href="/language">Language</a></li>
	  						</ul>
	  					</li>
	  				</ul>
	  				<ul class="nav navbar-nav navbar-right">
	  					<li><a href="/about">About</a></li>
	  				</ul>
	  			</div>
	  		</div>

	  		<div class="jumbotron">
	  			<h2>Welcome to the GurbaniDB API</h2>
	  			<p>Please check out our developer docs for full details about our API</p>
	  			<p>
	  				<a class="btn btn-lg btn-primary" href="https://github.com/sikher/gurbanidb" role="button">View Developer Docs &raquo;</a>
	  			</p>
	  		</div>

		</div>
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
	</body>
</html>
