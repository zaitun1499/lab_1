<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("Location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Private Page</title>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<p>This is a private page</p>
	<p>We aim at protecting it</p>
	<p><a href="logout.php"></a></p>

</body>
</html>