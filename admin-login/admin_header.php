<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $userEmailAddress = $session_info['user_email_address'];
  $intUserId = $session_info['user_id'];
  $strUserType = $session_info['user_type'];
  if(isset($_SESSION['user_email_address'])){
    if((time()-$_SESSION['last_time']) > 60*30){
        header("Location:../logout.php");
    }else{
      $_SESSION['last_time'] = time();
      $sql_query = "SELECT * FROM admin_registration WHERE user_id = '".$intUserId."'";
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
    <title>USAEAD Admin Dashboard</title>

    <!-- Bootstrap -->
      
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
     <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
     <link href="../css/vendors/bootstrap.min.css" rel="stylesheet">
    <!-- Style Sheet Script For Data Tables Start Here -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
     <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css"> -->
     <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.semanticui.min.css"> -->
    <!-- Style Sheet Script For Data Tables End Here -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
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
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

   <!--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.semanticui.min.css">
   <!--  <style type="text/css">
      .custom-input-textarea>span {
         
          background-color: #f53157;
          font-size: 18px;
          font-weight: 700;
          line-height: 30px;
          color: #FFF;
          text-transform: uppercase;
          display: block;
          text-align: center;
        }
        .form-group-textarea {
          height: 50px;
          padding: 10px 20px;
        }
    </style> -->
    
</head>

<body class="inner-page">
  <header class="navbar-fixed-top" data-spy="affix" data-offset-top="60">
      <!-- MAIN NAVIGATION STARTS -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../img/logo.png" alt="Mega Jobs Logo"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Admin List Details <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="employee_registration_list.php">Candidate Listing</a></li>
                  <li><a href="employer_registration_list.php">Employer Listing</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Jobs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="job-listing.php">Job Listing</a></li>
                 <!--  <li><a href="job-details.php">Job Details</a></li> -->
                </ul>
              </li>
              <!-- <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Companies <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="company-listing.php">Company Listing</a></li>
                  <li><a href="company-details.php">Company Details</a></li>
                  <!-- <li><a href="add-posting.html">Add Job Posting</a></li> -->
               <!--  </ul>
              </li> -->
              <!-- <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Candidate <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="employee-listing.php">Candidate Listing</a></li>
                  <li><a href="employee-profile.php">Candidate Profile</a></li> -->
                  <!-- <li><a href="create-resume.html">Create Resume</a></li> -->
                <!-- </ul>
              </li> -->
              <li class="dropdown pull-right">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <label><?php echo $row['first_name'].' '.$row['last_name']; ?></label>
                  <img src="../img/swat.jpg" width="40px" height="40px" style="border-radius: 50px;">
                  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="admin_logout.php">Logout</a></li>
                  <!-- <li><a href="employee_resume.php">Create Resume</a></li> -->
                </ul>
            </ul>
          </div>
        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>