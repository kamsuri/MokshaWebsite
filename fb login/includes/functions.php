<?php
session_start();
class Users {
	public $table_name = 'users';
	
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = 'kamakshi5'; //Define database password
		$dbName = 'fb'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}


	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender){
		$_SESSION['first_name']=$fname;
			$_SESSION['last_name']=$lname;
			$_SESSION['oauth_provider']=$oauth_provider;
			$_SESSION['oauth_uid']=$oauth_uid;
			$_SESSION['gender']=$gender;
			$_SESSION['emailid']=$email;
		$prev_query = mysqli_query($this->connect,"SELECT * FROM ".$this->table_name." WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysql_error($this->connect));
		if(mysqli_num_rows($prev_query)>0){
			
			header('Location: home.php');
			
		}
		$query = mysqli_query($this->connect,"SELECT * FROM $this->table_name WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		$result = mysqli_fetch_array($query);
		return $result;
	}

	
}

function random_id() {
	$alpha_key = '';
	$keys = array('M','O','K','S','H','A');
	$key=range(0,9);

	for ($i = 0; $i <5; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
		$alpha_key.=$key[array_rand($key)];
	}

	return $alpha_key;
}

function connect(){
$servername = "localhost";
$username = "root";
$password = "kamakshi5";
$dbname = "fb";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}return $conn;
}

?>