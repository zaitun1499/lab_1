
<?php
include_once 'dbConn.php';
include_once 'user.php';

$connection=new dbConnector;

if(isset($_POST['submit']))
{
	$first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$email=$_POST['email'];

	$user= new User($first_name,$last_name,$email);
	$res=$user->submit();
	if($res){
		echo"Successful at saving";
	}else{
		echo"An error occurred!";
	}

}?>

<!DOCTYPE html>
<html>
 <head>
	<title> Sign Up</title>
 </head>
	<body>
		<form action="users.php" method="post">
			  
				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="fname"><
				<label for="lname">Last Name:</label>
				<input type="text" id="lname" name="lname"><br>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email"><br>

				<br>
			    <input type="submit" name="submit">
		    SS
		</form>

		
	</body>




</html>