<?php
session_start();
include_once("includes/functions.php");

echo "Welcome ". $_SESSION['first_name'] . " " . $_SESSION['last_name'];
 
$conn=connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT mokshaid FROM users WHERE oauth_uid='".$_SESSION['oauth_uid']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
	

	echo "<br/>your moksha id:" . $row['mokshaid'];

}
}
 $output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>';
 
?>
<html>
<head>
</head>
<body>
<div>
<?php echo $output; ?>  
</div>
</body>
</html>
