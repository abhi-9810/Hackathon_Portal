<?php
  include('session.php');
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

    <title>Profile Page:</title>

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
         width: 100%;
         word-wrap: break-word;
         padding-left: 120px;
         text-align:center;
      }	      
      .inv{
           display: none;
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
            <li class="active"><a href="home.php">HOME:</a></li>
            <li><a href="notification.php">NOTIFICATION</a></li>        
            <li><a href="teams.php">TEAMS</a></li>  
          </ul>
        </nav>
      </div>
	 
	 <a href="logout.php"><h4 style="position: absolute; top: 0; right: 0; width: 100px; text-align:right;">SignOut:</h4> </a><br>
	   <a href="changepassword.php"><h4 style="position: absolute; top: 70; right: 50; width: 100px; text-align:right;">ChangePassword:</h4> </a><br>
      </div>
      </body>
  </html> 
