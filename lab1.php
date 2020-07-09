<?php
include_once 'dbConn.php';
include_once 'user.php';

$connection=new dbConnector;

if(isset($_POST['submit']))
{
	$first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$city=$_POST['city_name'];

	$username = $_POST['username'];
	$password = $_POST['password'];

	$utc_timestamp=$_POST['utc_timestamp'];
	$offset = $_POST['time_zone_offset'];

	$user= new User($first_name,$last_name,$city, $username, $password);
	/*$uploader = new FileUploader;
	if(!$user->validateForm()){
		$user->createFormErrorSession();
		header("Refresh:0");

		die();
	}*/
	$res=user->save();

	if(!$user->validateform()){
		$user->createFormErrorSession();
		header("Refresh:0");
		die();
	}
	$res=$user->submit();
	if($res){
		echo"Successful at saving";
	}else{
		echo"An error occurred!";
	}

	$connection->closeDB();

}
?>





<!DOCTYPE html>
<html>
 <head>
	<header> <h2>Sign Up</h2></header>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript" src="timezone.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
	<link rel="stylesheet" type="text/css" href="validate.css">
 </head>
	<body>
		<form action="lab1.php" name="user_details"method="post" onsubmit="return validateForm()">

			<div id="form-errors">
				<?php
					session_start();
					if(!empty($_SESSION['form_errors'])){
						echo "".$_SESSION['form_errors'];
						unset($_SESSION['form_errors']);
					}
				?>
			</div>
			  
				<label for="fname">First Name:</label><br>
				<input type="text" style="height:20px; width:300px;" id="fname" placeholder="First Name" name="fname" required=""><br></br>
				<label for="lname">Last Name:</label><br>
				<input type="text" style="height:20px; width:300px;" id="lname" placeholder="Last Name" name="lname"><br></br>
				<label for="cname">City Name:</label><br>
				<input type="text" style="height:20px; width:300px;" name="city_name" placeholder="city"><br></br>
				<label for='uname'> User Name:</label><br>
				<input type="text" name="username" style="height:20px; width:300px;" placeholder="password"><br></br>
				<label>Password:</label><br>
				<input type="Password" style="height:20px; width:300px;" name="password" placeholder="password"><br></br>
				<label>Profile Image:</label><br>
				<input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" name='submit' value="Sign up"><br></br>
			    <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""/>
			    <input type="hidden" name="time_zone_offset" value=""/>
			    <a href="login.php">Login</a>
		      
		</form>

		
	</body>




</html>
