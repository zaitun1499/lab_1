<?php 
include "Crud.php";
include "authenticator.php";
class User implements Crud, Authenticator{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;
	private $username;
	private $password;

	function __construct($first_name,$last_name,$city_name){
		$this->first_name= $first_name;
		$this->last_name= $last_name;
		$this->city_name= $city_name
		$this->username= $username;
		$this->password= $password;


	}

	public static function create(){
		$instance = new self();
		return $instance;
	}

	//username setter
	public function setUsername($username){
		$this->username=$username;
	}
	//username getter
	public function getUsername(){
		return $this->$username;
	}
	//password setter
	public function setPassword(){
		$this->password=$password;
	}
	//password getter
	public function getPassword(){
		return $this->$password;
	}
	//user id setter
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	//user id getter
	public function getUserId(){
		return $this-> $user_id;
	}

	//Implement all the methods defined in the crud interface to avoid errors

	public function save(){

		$fn = $this->first_name;
		$ln = $this->last_name;
		$city = $this->city_name;
		$uname=$this->username;
		$this->hashpassword();
		$pass=$this->password;
		$res = mysql_query("INSERT INTO user(first_name, last_name, user_city) VALUES('$fn', '$ln','$city','$uname','$pass')") or die("Error".mysql_error());
		return $res;
	}

	public function readAll()
	{
		return null;
	}
	public function readUnique()
	{
		return null;
	}
	public function search()
	{
		return null;
	}
	public function update()
	{
		return null;
	}
	public function removeOne()
	{
		return null;
	}
	public function removeAll()
	{
		return null;
	}

	public function validateForm()
	{
		//returns true if there is no empty value
		$fn = $this->first_name;
		$ln = $this->last_name;
		$city = $this->city_name;

		if($fn==""||$ln==""||$city==""){
			return false;
		}
		return true;
	}
	public function createFormErrorSessions(){
		session_start();
		$_SESSION['form_errors']="All fields are required";
	}

	public function hashpassword(){
		//inbuilt function password_hash hashes out passwords
		$this->password=password_hash($this->password, PASSWORD_DEFAULT);
	}
	public function isPasswordCorrect(){
		$con = new dbConnector;
		$found=false;
		$res = mysql_query("SELECT*FROM user") or die ("Error".mysql_error());

		while($row=mysql_fetch_array($res)){
			if(password_verify($this->getPassword(),$row['password'])&& $this->getUsername()==$row['username']){
				$found = true;
			}
		}
		$connection->closeDB();
		return $found;

	}
	public function login(){
		if($this->isPasswordCorrect()){
			header("Location:private_page.php");
		}
	}
	public function createUserSession(){
		session_start();
		$_SESSION['username']=$this->getUsername();
	}
	public function logout(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		header("location:lab1.php");
	}
	
}



 ?>
