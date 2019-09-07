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

    <title>Details Page:</title>

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
           background-repeat:repeat;
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
         text-align: center;
      }
         .inv {
             display: none;
         }  
         .inv1 {
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
            <li><a href="home.php">HOME</a></li>        
            <li><a href="notification.php">NOTIFICATION</a></li>
            <li class="active"><a href="teams.php">TEAMS</a></li>		
          </ul>
        </nav>
      </div>
<div class="row">    
             
    <div class="col-md-12 ">
        <br /><br /><br />
	  <?php
          echo "<table border =\"1\" class=\"wrapText\">";
          echo "<tr>";
          echo "<td><b>Leader Name</b></td>";
          echo "<td><b>Team Name</b></td>";
          echo"<td><b>Contact</b></td>";
          echo"<td><b>Username</b></td>";
          echo"<td><b>Password</b></td>";
          echo"<td><b>Email</b></td>";
          echo"<td><b>Member2</b></td>";
          echo"<td><b>Member3</b></td>";
          echo"<td><b>idea</b></td>";
          echo "</tr>";
          //connecting to database:
	      $query = "SELECT * FROM hackathon"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $id=$row['id'];
              $teamname=$row['teamname'];
              $leader=$row['leader'];
              $password=$row['password'];
              $contact=$row['phone'];
              $email=$row['email1'];
              $m2=$row['m2'];
              $m3=$row['m3'];
	          echo "<td>$leader</td>";
              echo "<td>$teamname</td>";
	          echo "<td>$contact</td>";
              echo "<td>$id</td>";
              echo "<td>$password</td>";
              echo "<td>$email</td>";
              echo "<td>$m2</td>";
              echo "<td>$m3</td>";
              echo '<td> <a href="view.php?id=' .$id.'">VIEW</a></td>';
	          echo "</tr>";
	      
          }
          echo "</table>";
     ?>
      </div>
      </div>
      </div>
      </body>
  </html> 
