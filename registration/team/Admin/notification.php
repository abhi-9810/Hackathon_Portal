<?php
  include('session.php');
  date_default_timezone_set("Asia/Kolkata");
  if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])) {
	  $sub=$_POST['sub'];
      $date=$_POST['date'];
      $notification=$_POST['notification'];
      $notification = mb_ereg_replace("'","\'", $notification);
      $query="";
          $query ="INSERT INTO hackathon_notification(date,sub,description) values('$date','$sub','$notification')";
  if(!mysqli_query($con,$query)){
	die('Error: ' . mysqli_error($con));
  }
  else{
     $sql="SELECT * FROM hackathon";
     $result=mysqli_query($con,$sql);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $email=$row['email1'];
        $to = $email;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$message = 'Hi!<br /> There is a new notification on the website.<br />Please Check <a href="https://www.road-safety.co.in/hackathon/registration/team/">Here</a>. "<br /> Regards<br /> Team <br /> Indian Road Safety Campaign."';
	$headers .= "From: hackathon@road-safety.co.in";

mail($to,$sub,$message,$headers);
     }
     echo "Notification Sent Sucessfully.";   
   }
  }
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Notification Page:</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="css/form.css" type="text/css">
     <style>
	   img {
         opacity: 0.5;
         filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		   background:url("Image/black.jpg");
           height :100%;
		   background-position: center;
           background-repeat: repeat;
           background-size: cover;
	  }
	   /* unvisited link */
      a:link {
        color: white;
      }

      /* visited link */
      a:visited {
        color: white;
      }

      /* mouse over link */
      a:hover {
        color: hotpink;
      }

      /* selected link */
      a:active {
        color: blue;
      }
      .wrapText{
         table-layout:fixed;
         width: 50%;
         word-wrap: break-word;
         padding-left: 120px;
      }	 
           .inv {
              display: none;
            }  
         
          #table{
             display: none;
         }
           .article {
               margin-left: 500px;
               border-left: 1px solid gray;
               padding: 1em;
               overflow: hidden;
           }
           .left {
               margin-right: 370px;
               border-left: 1px solid gray;
               padding: 1em;
               overflow: hidden;
           }
           .btn {
               background-color: palegreen;
               border-radius: 0px; 
               color: red;
               display: inline-block;
           }

           .btn:hover { color: white; }
           .btn:visited { background-color: blue; }
        
           .button-clicked {
                background-color: red;
            }
       </style>
  </head>
  <body>
<div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li><a href="home.php">HOME</a></li>        
            <li class="active"><a href="notification.php">NOTIFICATION</a></li>
            <li><a href="teams.php">TEAMS</a></li>		
          </ul>
        </nav>
      </div>
    
  <div class="row">    
    <div class="col-md-10 col-md-offset-1"> 
       <h1>Notification</h1>   
    <form action = "" method = "post">
        <label><h4>Date:</h4></label><input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" /><br>
				  <label><h3>Subject :</h3></label><input type = "text" name = "sub"  /><br/><br />
				  <label><h3>Notification :</h3></label> <textarea  type = "text" name = "notification" cols="30" rows="10" style="height:200px;"></textarea><br>
        <input type = "submit" value = " Submit " name="submit" style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
    </div>
   
    </div>
      </div>
      </body>
  </html> 
