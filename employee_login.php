<?php 
include('includes/config.php'); 
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
    $_SESSION['candidate_email_address'] = $_POST['email'];
    $_SESSION['candidate_password'] = ($_POST['password']);
    $_SESSION['last_time'] = time();

    if(!empty($_POST['email']) && !empty($_POST['password'])){
           $user_name = $_POST['email'];
           $password = $_POST['password']; 
        // Select Query For Fetching Data from Database
       $sql_query = "SELECT * FROM employee_registration WHERE candidate_email_address = '".$_SESSION['candidate_email_address']."' AND candidate_password = '".$_SESSION['candidate_password']."' AND is_active = 'Approved'";
       
        $result = mysqli_query($connection,$sql_query);
       
        $row = mysqli_fetch_assoc($result);
     
            if($user_name == $row['candidate_email_address'] && $password == $row['candidate_password']) {
               
              $_SESSION['user_session_info'] = array();
              $_SESSION['user_session_info']["candidate_user_name"]           = $row["candidate_user_name"];
              $_SESSION['user_session_info']["candidate_email_address"]       = $row["candidate_email_address"];
              $_SESSION['user_session_info']["user_type"]                     = $row["user_type"];
              $_SESSION['user_session_info']["candidate_user_id"]             = $row["candidate_user_id"]; 
              $_SESSION['user_session_info']["candidate_password"]            = $row["candidate_password"]; 

                if($row['candidate_email_address'] == $row['candidate_email_address']){
                header('location: employee_dashboard/index.php');
                 }
                   }else{
                $err_msg = '<div class="alert alert-danger" role="alert">
                    <strong>Opss!</strong> User Name and Password should not match..
                </div>';
              }
          
          }
      //}
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon_usa.png" type="image/png" sizes="26x26">
    <title>USAEAD Candidate | Login</title>

    <!-- Bootstrap -->
    <link href="css/vendors/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Font Awesome for icon fonts -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/vendors/font-awesome.min.css" rel="stylesheet">
    <!-- Google Font API for Lato and Montserrat font families -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <!-- CSS for slick slider plugin -->
    <link href="css/vendors/slick.css" rel="stylesheet">
    <link href="css/vendors/slick-theme.css" rel="stylesheet">
    <!-- Main Custom CSS file -->
    <link href="css/app.css" rel="stylesheet" type="text/css" />
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
            <a class="navbar-brand" href="index.php"><img src="img/viral_usa.jpeg" alt="Mega Jobs Logo" width="150px" height="60px"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
              <li class="sign-in pull-right">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Login
                  <i class="fa fa-user"></i><span class="caret"></span> </a>
                  <ul class="dropdown-menu">
                  <li><a href="employee_login.php">Employee Sign In</a></li>
                  <li><a href="employer_login.php">Employer Sign In</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>
    <section class="signup-signin">
      <div id="flash-msg">
          <p> 
          <?php if(isset($err_msg)) { echo $err_msg; } 
              if(isset($success_msg)) { echo $success_msg; 
            } ?>    
          </p>
        </div>
      <div class="container">
        <div class="row" style="width:50%;">
          <div class="col-md-10 col-md-offset-1">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#candidate" aria-controls="candidate" role="tab" data-toggle="tab">Employee Login Account</a></li>
              <!-- <li role="presentation"><a href="#employer" aria-controls="employer" role="tab" data-toggle="tab">Employer Login Account</a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="candidate">
                <div class="signin-form">
                  <form method="POST" action="employee_login.php">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email" required />
                          <span class="required">*</span>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" required />
                          <span class="required">*</span>
                        </div>
                         <input type="submit" name="submit" class="btn btn-primary" value="Login" />
                        <p class="register-link text-center">Not a member? <a href="employee_register.php">Sign Up here</a></p>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- <div role="tabpanel" class="tab-pane" id="employer">
                <div class="signin-form">
                  <form method="POST" action="login.php">
                    <div class="row">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="email" name="email_address" class="form-control" placeholder="Email Address" required />
                          <span class="required">*</span>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" required />
                          <span class="required">*</span>
                        </div>
                         <input type="submit" name="login" class="btn btn-primary" value="login" />
                          <p class="register-link text-center">Not a member? <a href="employer_register.php">Sign Up here</a></p>
                      </div>
                    </div>
                  </form>
                </div>
              </div> -->
              <!-- <p class="desclimer-text text-center">In case you are using a public/shared computer we recommend that<br>
              you logout to prevent any un-authorized access to your account</p> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
    <footer>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-sm-6" style="margin-left:425px;">
              © <a href="javascript:void(0);">USAEAD Jobs </a>&nbsp;&nbsp;All rights reserved.
            </div>
            <!-- <div class="col-sm-6 author-info">
              Created by <a href="javascript:void(0);">Swatantra Gupta</a>. Premium themes and templates.
            </div> -->
          </div>
        </div>
      </div>
    </footer>
    <!-- FOOTER ENDS -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap JS -->
    <script src="js/vendors/bootstrap.min.js"></script>
    <!-- Slick slider plugin JS -->
    <script src="js/vendors/slick.min.js"></script>
    <!-- Countdown plugin used on coming soon page -->
    <script src="js/vendors/jquery.countdown.min.js"></script>
    <!-- Summernote Text editor plugin used on create resume page -->
    <script src="js/vendors/summernote.min.js"></script>
    <!-- Custom Javascript code as per requirement -->
    <script src="js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#flash-msg").delay(2000).fadeOut("slow");
        $("#checkmsg").delay(2000).fadeOut("slow");
        $("#uplod").delay(2000).fadeOut("slow");
        $("#dismiss").delay(2000).fadeOut("slow");
      });
 </script>
  </body>
</html>