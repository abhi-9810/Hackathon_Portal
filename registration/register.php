<?php
$name = $_POST["lname"]; 
$pass = $_POST["password"] ;
$email = $_POST["e-mail"];
$phone = $_POST["phone"] ;
$id = uniqid("irschack_",FALSE) ;
$success = 0 ;

$conn = new mysqli("localhost", "", "","");

$result = mysqli_query($conn, "SELECT * FROM hackathon WHERE email1='$email' LIMIT 1");
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {

		echo '<br><p align="center">You already have a team account with this email id.<br>Please <a href="https://road-safety.co.in/hackathon/registration/">RE-REGISTER</a> with a different email id.' ;
	}
 
else 
{
$sql = "INSERT INTO hackathon (leader,password,email1,phone,id) VALUES ('$name','$pass','$email','$phone','$id')" ;

try {
	mysqli_query($conn,$sql);
	$success = 1 ;
}
catch (Exception $e)
{
$success = 0 ;
}

if ($success == 1)
{

	//mailing code

$to = $email;
$subject = "IRSC Hackathon | Registration Id " . $id;
$txt = "Greetings from Indian Road Safety Campaign !\n\n You have been successfully registered for the Hackathon to be held from 16th February to 18th February at IIT Delhi. \n\nThis mail will serve as a confirmation mail for participating the hackathon. \nYour reference ID : ".$id." . \n\n Please login to https://road-safety.co.in/hackathon/registration/team/?user=".$id."  with your set password ( Password : ".$pass." ) and complete all the required details on the portal by 16th February, 5PM post which all details would be locked. \n\n Also, refer to the registration instructions at https://road-safety.co.in/hackathon/index.html#bootcamp. \n\n For queries, contact : info@road-safety.co.in\n\n--------------------------------------\nTHIS IS AN AUTOMATED MAIL. REPLIES TO THIS MAIL WON'T BE RECEIVED.";
$headers = "From: hackathon@road-safety.co.in" ;


mail($to,$subject,$txt,$headers);

// end of mail code

	echo '<br><br><p align="center"><img src="images/subscribed.gif" height="120px" width="auto"><br><font size="4px">You have been successfully registered.<br>Please check your mail (SPAM/JUNK folders as well) containing further instructions to complete your registration.<br>Your Unique Ref Id : '.$id.'<br><br>Please complete the instructions stated in the mail before 16th February, 5PM.</font></p>' ;
}
else 
{
echo '<br><br><p align="center"><font size="4px">REGISTRATION UNSUCCESSFUL.<br>Please re-register.<br>If this continues, mail us at info@road-safety.co.in</font></p>' ;
}
$conn -> close ;

}





?>