<!DOCTYPE html>
<?php   
include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])) {
      $teamname=$_POST['teamname'];
      $m2=$_POST['m2'];
      $m3=$_POST['m3'];
      $email2=$_POST['email2'];
      $email3=$_POST['email3'];
      $phone2=$_POST['phone2'];
      $phone3=$_POST['phone3'];
      $idea1=$_POST['idea'];
      $link=$_POST['link'];
      $idea1 = mb_ereg_replace("'","\'", $idea1);
      $query="";   
      $query ="UPDATE hackathon SET teamname='$teamname',m2='$m2',m3='$m3',idea='$idea1',email2='$email2',email3='$email3',phone2='$phone2',phone3='$phone3',link='$link' WHERE id='$id'";
        if(!mysqli_query($con,$query)){
	       die('Error: ' . mysqli_error($con));
        }
        else{
            echo "<h1 style=\"color:white;float:right; \" class=\"navbar-brand\">Details Updated Sucessfully.</h1>";   
        }
      $date=date('Y-m-d');
      $query="INSERT INTO hackathon_idea (id,idea,date) VALUES ('$id','$idea1','$date')";
      if(!mysqli_query($con,$query)){
	       die('Error: ' . mysqli_error($con));
        }
  }
$sql="SELECT * FROM hackathon WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $idea2=$row['idea'];
    $m21=$row['m2'];                                   
    $m31=$row['m3'];
    $email21=$row['email2'];
    $email31=$row['email3'];
    $phone21=$row['phone2'];
    $phone31=$row['phone3']; 
    $link=$row['link'];
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hackathon</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="sweetalert.css">    
  <script type="text/javascript">
    function Display(){
    swal({
      title: "Will Be Updated Soon!",
      text: "",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Okay!",
      closeOnConfirm: true
    },
      function(isConfirm){
        if (!isConfirm) {
          Redirect();          
      } 
     });
    }
 </script>        
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php">Hackathon</a>
    <p class="navbar-brand">Welcome <?php echo $teamname;?></p>    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="team.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Team Details &amp; Ideas</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" onclick="Display()">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Report</span>
          </a>
        </li>  
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notifications
              <span class="badge badge-pill badge-warning">1 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Notifications:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                  
                <?php
                       $img="http://road-safety.co.in/isafe1/admin/v1/general.png";
                       $sql = "SELECT * FROM hackathon_notification ORDER BY date DESC";
                       $result = $con->query($sql);
                       $i=0;
                       if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              $i++;
                              $temp=$row['sub']."(".substr($row['date'],0,10).")";
                              ?>
                              <strong><i class="fa fa-long-arrow-up fa-fw"></i><?php echo $temp;?></strong>
                              <div class="dropdown-message small"><hr /></div>
                            <?php
                              if($i==3)
                               break;
                           }
                           
                               
                        } 
                       else {
                           ?>
                          <strong><i class="fa fa-long-arrow-up fa-fw"></i>No results</strong>
                              <div class="dropdown-message small"><hr /></div>
                          <?php
                        }
                ?>  
                 
              </span>
              
              
            </a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Profile</h1>
                     <div class="row">
                                <div class="col-lg-6">
                                <!--<form action="teamimgupload.php" method="post" enctype="multipart/form-data">
                                    Team Image:
                                <div class="form-group">
                                    <img src='../teamphoto/ksonali570@gmail.com/teamimg.jpg' height="120px" id="output_image"   width="auto">
                                    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="preview_image(event)" >
                                </div>
                              <div class="form-group">
                                <input type="submit" value="Save Team Image" onclick="showImg2()" name="submit">   <img id="load_img2" src="load.gif" height="70px" width="70px" style="display: none;" width="400" height="400"/>
                              </div>
                              </form>-->
                                    <form role="form" method="post" action="">
                                        <div class="form-group">
                                            <label>Team Name *</label>
                                            <input class="form-control" name="teamname" value="<?php echo $teamname;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Leader *</label>
                                            <input class="form-control" name="leader" value="<?php echo $leader;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Member 2 </label>
                                            <input class="form-control" name="m2" value="<?php echo $m21;?>" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Member 2's Email-id </label>
                                            <input class="form-control" name="email2" value="<?php echo $email21;?>" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Member 2's Contact Number  </label>
                                            <input class="form-control" name="phone2" value="<?php echo $phone21;?>" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>Member 3 </label>
                                            <input class="form-control" name="m3" value="<?php echo $m31;?>" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>Member 3'email-id </label>
                                            <input class="form-control" name="email3" value="<?php echo $email31;?>" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>Member 3's Contact Number  </label>
                                            <input class="form-control" name="phone3" value="<?php echo $phone31;?>" placeholder="Enter text" >
                                        </div>
                                         <!--<div class="form-group">
                                            <label>Link of Your Project.</label>
                                            <input class="form-control" name="link" value="<?php echo $link;?>" placeholder="Enter text" >
                                        </div>-->
                                        <div class="form-group">
                                            <label>Idea for Hackathon *</label>
                                            
                                            <textarea name="idea" class="form-control" cols="70" rows="10"  required><?php echo htmlspecialchars($idea2);?></textarea><br>
                                            <font color="red"> You may keep editing the ideas. However, all ideas submitted before 16/2/18 8PM will be given special consideration</font>
                                        </div>
                                        
                                          <div class="form-group">
                                            <button type="submit" name="submit" onclick="showImg()" > SAVE  DETAILS </button>
                                              <img id="load_img" src="load.gif" height="70px" width="70px" style="display: none;" width="400" height="400"/>
                                           </div>
                                      
                                    </form>
                                   
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                   
                        <!-- /.panel-body -->
               
                    <!-- /.panel -->
           
                <!-- /.col-lg-12 -->


       
            <!-- /.row -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © IRSC 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
