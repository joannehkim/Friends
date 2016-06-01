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
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <h2>Welcome!</h2>
    </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php
	if ($this->session->flashdata('errors')) {
		echo $this->session->flashdata('errors');
	}	
?>

<div class="container">
    <div class="row">
        <form action="/Users/register" method="POST">
            <div class="col-xs-6">
            	<legend><h3>Register</h3></legend>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="name">Alias:</label>
                    <input type="text" class="form-control" name="alias" id="alias" placeholder="Alias">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@domain.com">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <p>* Password should be at least 8 characters</p>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="birthday">Date of Birth:</label>
                    <input type="date" class="form-control" name="birthday" id="date" placeholder="Birthday">
                </div>
                <input type="submit" class="btn btn-default" value="Register">
            </div>
       	</form>
        <form action="/Users/login" method="POST">
            <div class="col-xs-6">
            	<legend><h3>Login</h3></legend>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@domain.com">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-default" id="login_email" name="login_email" value="Login">
            </div>
        </form>
    </div>
</div>




</body>
</html>