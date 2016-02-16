<?php
session_start();
include_once("config.php");
include_once("includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null; 
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output ='<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>';
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender']);
	if(empty($user_data)){

        $output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>';

if(isset($_POST['submit']))
{
$mobile =$_POST['mobile'];
$email=$_POST['email'];
$id=random_id();

$conn=connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="INSERT INTO `fb`.`users`(`oauth_provider`,`oauth_uid`,`fname`,`lname`,`emailid`,`gender`,`mobile`,`mokshaid`)
VALUES('{$_SESSION['oauth_provider']}','{$_SESSION['oauth_uid']}','{$_SESSION['first_name']}','{$_SESSION['last_name']}','$email','{$_SESSION['gender']}','$mobile','$id')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:home.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

?>

<html>


	<form method="POST">
        Name:<input type="text" name="name" value="<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> " readonly></input>
	    Email:<input type="text" name="email" value="<?php echo $_SESSION['emailid']; ?>"></input>
	    Gender:<input type="text" name="gender" value="<?php echo $_SESSION['gender']; ?>" readonly></input>
	    Mobile-no:<input type="text" name"mobile" required></input>
	    <button type="submit" name="submit">Submit</button>
	</form>
    </html>
    <?php


	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
		//echo $output;
	}
	
}

?>


<html>
<head>
</head>
<body>
<div>
<?php 
echo $output; ?>  
</div>
</body>
</html>

