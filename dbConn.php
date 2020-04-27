<?php
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','YES');
	define('DB_NAME','access');
	
	
	
  class dbConnector
  {
	//properties/variables
	public $connection;
     

    //method to establish connection
	function __construct() {
		$this -> connection = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME) or die("Error:".mysql_error());
	}

	//function to close connection
	public function closeDB()
	{
		mysqli_close($this->connection);
	}
}
	/*$servername = "localhost";
	$username = "root";
	$dbname = "access";
	$dbpassword="YES";*/



	

    /*create table
    $sql = "CREATE TABLE Registration(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Firstname VARCHAR(30) NOT NULL,
    Lastname VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Password VARCHAR(20) NOT NULL)";
   
   if ($connection->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}*/

?>
