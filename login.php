<?php
include_once 'dbConn.php';
include_once 'user.php';

$connection=new dbConnector;

if(isset($_POST['btn-login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$instance=User::create();
	$instance->setPassword($password);
	$instance->setUsername($username);

	if($instance->isPasswordCorrect()){
		$instance->login();
		//closing conncetion
		$connection->closeDB();
		//creating user session
		$instance->createUserSession();

	}else{
		$connection->closeDB();
		header("Location:login.php");
	}
}
	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Log In</title>
		<script type="text/javascript" src="validate.js"></script>
		<link rel="stylesheet" type="text/css" href="validate.css">
	</head>
	<body>
		<form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
			<table align="center">
				<tr><td><input type="text" name="username" placeholder="Username" required/></td></tr>
				<tr><td><input type="password" name="password" placeholder="Password" required/></td></tr>
				<tr><td><button type="submit" name="btn-login"><strong>LOGIN</strong></button></td></tr>
			</table>
		</form>


	</body>
	</html>