<?php
	$dbhost = 'localhost';
   $dbuser = '';
   $dbpass = '';
   $db='';
   $error="";
   $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   $username=$_SESSION['login_user'];
   $sql="SELECT * FROM hackathon WHERE id='$username'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $teamname=$row['teamname'];
   $leader=$row['leader'];
   $m2=$row['m2'];
   $m3=$row['m3'];    
   $id=$row['id'];
   $idea=$row['idea'];
   $_SESSION['msgUpdate'] = "" ;
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>