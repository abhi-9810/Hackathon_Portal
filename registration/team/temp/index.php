

<html>
<p align="center"><img src="https://www.road-safety.co.in/assets/img/logo.png" height="60px" width="auto"></p>
<p align="center"><font size="5px">IRSC Hackathon Secure Login</font></p><hr/><br>

<form action="dashboard.php" method="POST">
<input type="text" placeholder="email or ref.id" value="<?php echo $_GET["user"] ; ?>" name="id" required><br><br>
<input type="password" placeholder="password" name="password">
<br><br>
<input type="submit" name="submit" value="Login"><br><br>
<a href="#">Forgot Password</a> | <a href="#">Change Password</a>

</form>
<br><hr/>

<p align="center">&copy IRSC 2018</p>


</html>