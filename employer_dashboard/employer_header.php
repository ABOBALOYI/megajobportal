<?php 
error_reporting(0);
  session_start();
  include('../config.php');
  $session_info = $_SESSION['user_session_info'];
  $strUserName = $session_info['emplr_user_name'];
  $strUserEmailAddress = $session_info['emplr_email_address'];
  $intUserId = $session_info['emplr_id'];
  $strUserType = $session_info['user_type'];
  if(isset($_SESSION['emplr_email_address'])){
    if((time()-$_SESSION['last_time']) > 60*30){
        header("Location:../logout.php");
    }else{
      $_SESSION['last_time'] = time();
      $sql_query = "SELECT * FROM employer_registration WHERE emplr_id = '".$intUserId."'";
      $result = mysqli_query($connection,$sql_query);
      $row = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/favicon_usa.png" type="image/png" sizes="26x26">
    <title>USAEAD Employer Dashboard</title>

    <!-- Bootstrap -->
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  
   <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="../css/vendors/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Font Awesome for icon fonts -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/vendors/font-awesome.min.css" rel="stylesheet">
    <!-- Google Font API for Lato and Montserrat font families -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <!-- CSS for slick slider plugin -->
    <link href="../css/vendors/slick.css" rel="stylesheet">
    <link href="../css/vendors/slick-theme.css" rel="stylesheet">
    <!-- Main Custom CSS file -->
    <link href="../css/app.css" rel="stylesheet" type="text/css" />
    
    <!-- <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
   <!--  <link rel="stylesheet" type="text/css" href="../css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.semanticui.min.css"> -->
    <style>
        /*#geomap{width: 100%; height: 400px;}*/
    </style>
  </head>
  <body class="inner-page">
    <header class="navbar-fixed-top" data-spy="affix" data-offset-top="60">
      <!-- MAIN NAVIGATION STARTS -->
      <nav class="navbar navbar-inverse" style="background-color: rgb(52, 65, 84);">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../img/viral_usa.jpeg" width="150px" height="60px" alt="Mega Jobs Logo" style="margin-left: -24px;"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
              <!-- <li class="dropdown">
                <a href="index.php" class="" data-toggle="">Employer Home</a>
              </li> -->
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Jobs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php">Job Listing</a></li>
                 <!--  <li><a href="update_job_post_details.php">Update Post Job Info</a></li> -->
                </ul>
              </li>
             <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Employer <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <!--  <li><a href="employer_job_detail_list.php">Employer Listing</a></li> -->
                  <li><a href="employer_profile.php">Update Employer Profile</a></li>
                  <li><a href="employer_change_password.php">Change Password</a></li>
                  <li><a href="employer_job_post.php">Job Post</a></li>
                </ul>
              </li>
              <li class="dropdown pull-right">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <label><?php echo $row['first_name'].' '.$row['last_name']; ?></label>
                  <img src="../img/swat.jpg" width="40px" height="40px" style="border-radius: 50px;">
                  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../logout.php">Logout</a></li>
                  <!-- <li><a href="employee_resume.php">Create Resume</a></li> -->
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>