<?php
 include('session.php');
  if($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploaddir = "submissions/";
        $uploadfile = $uploaddir . $id.".zip";
        if(file_exists($uploadfile))
        {
            if(unlink($uploadfile)){
                 echo "<h1 style=\"color:white;float:right;\">Deleted.</h1>";
            }
            else
            {
                 echo "<h1 style=\"color:white;float:right;\">Couldn't be deleted.</h1>";
            }
        }
      header('Location: report.php');
  }
        
?>