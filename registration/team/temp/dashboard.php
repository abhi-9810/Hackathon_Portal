<?php
$user = $_POST["id"] ;
$pass = $_POST["password"] ;
$img = "";

if ($user == "" || $user == NULL)
	{
header("Location: https://road-safety.co.in/hackathon/registration/team/index.php");
die();
	}

	else 
	{
		$conn = new mysqli("localhost", "irsciitd16", "irsc2016","company");

$result = mysqli_query($conn, "SELECT * FROM hackathon WHERE (email1='$user' OR id='$user') AND password='$pass' LIMIT 1");
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {

		echo 'Logged in as : ' . $user ;
$conn -> close ;
	}
else 
{
	$v = uniqid("faillogin_",TRUE) ;
	$url = "Location: https://road-safety.co.in/hackathon/registration/team/index.php?status=" .$v ;
	header($url);
die();
}



	}


?>
<html>
<p align="center"><img src="https://www.road-safety.co.in/assets/img/logo.png" height="60px" width="auto"></p>
<p align="center"><font size="5px">IRSC Hackathon Team Dashboard</font></p><hr/><br>
<br>
Portal will open soon. Closing the tab will logout the session.<br>
<a href="index.php">LogOut</a> | <a href="change.php">Change Password</a>


<br><hr/>

<p align="center">&copy IRSC 2018</p>


</html>

