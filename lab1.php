

<?php
include_once 'dbConn.php';
include_once 'user.php';

$connection=new dbConnector;

if(isset($_POST['submit']))
{
	$first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$user= new User($first_name,$last_name,$email,$password);
	$res=$user->submit();
	if($res){
		echo"Successful at saving";
	}else{
		echo"An error occurred!";
	}

}
?>





<!DOCTYPE html>
<html>
 <head>
	<header> <h2>Sign Up</h2></header>
 </head>
	<body>
		<form action="lab1.php" method="post">
			  
				<label for="fname">First Name:</label><br>
				<input type="text" style="height:20px; width:300px;" id="fname" name="fname"><br></br>
				<label for="lname">Last Name:</label><br>
				<input type="text" style="height:20px; width:300px;" id="lname" name="lname"><br></br>
				<label for="email">Email:</label><br>
				<input type="email" style="height:20px; width:300px;" id="email" name="email"><br></br>
				<label for="password">Password:</label><br>
				<input type="password" style="height:20px; width:300px;" id="password" name="password"><br>

				<br>
			    <input type="submit" value="Sign up">
		      
		</form>

		
	</body>




</html>
