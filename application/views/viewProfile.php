<!DOCTYPE html>
<html>
<head>
	<title>LOGIN/REGISTRATION</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<style type="text/css">
		.table {
			margin: 0 auto;
			width: 700px;
			margin-bottom: 70px;
		}
		h1 {
			text-align: center;
			margin-bottom: 50px;
		}
		h4 {
			text-align: center;
		}
		h3 {
			font-weight: bolder;
			color: navy;
		}
		#logout {
			margin-right: 30px;
			font-weight: bolder;
			color: black;
			font-size: 1.1em;
		}
	</style>
</head>
<body>



<nav class="navbar navbar-default">
<ul class="nav navbar-nav">
        <li><a id="logout" href="/Users/friends">Home
        <li><a id="logout" href="/Users/logout">Logout</a></li>
</ul>
</nav>


<table class="table table-bordered table-striped">
	<thead>
			<tr>
				<td><h3><?= $viewProfile['alias'] ?>'s Profile</h3></td>
			</tr>
			<tr>
				<td>
					Name: <?= $viewProfile['name'] ?>
				</td>
			</tr>
			<tr>
				<td>
					Email Address: <?= $viewProfile['email'] ?>
				</td>
			</tr>
	</thead>
	<tbody>



</body>
</html>





