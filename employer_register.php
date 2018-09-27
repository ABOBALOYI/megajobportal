<?php
/* filename : register.php
 * Here we have some fields as input in add User page with submit button
 * created on 13-02-2018
 * created by Swatantra gupta
 * modified by Swatantra Gupta
*/
  session_start();
  error_reporting(1); 
  include('includes/config.php');
  //echo $session_info = $_SESSION['user_session_info']; die;
  // include phpmailer class
    include('phpmailer/class.phpmailer.php');
  
  //echo $session_info = $_SESSION['user_session_info'];
  //echo $strUserName = $session_info['user_name'];
  //echo $intUserId = $session_info['user_id'];
?>

<?php
      $strFirstNameError = "";
      $strLastNameError = "";
      $strUserNameError ="";
      $strUserPasswordError ="";
      $strConfirmUserPasswordError ="";
      $strEmailError ="";
      $IntMobileNumberError = "";
      $strCompanyNameError = "";
      $strWebsiteNameError = "";
      $strCompanyAddressPrimaryError = "";
      $strCompanyAddressSecondaryError = "";
      if(isset($_POST['submit'])){

        if (empty($_POST["first_name"])) {
          $strFirstNameError = "First Name is required";
          } else {
            $strFirstName = validateInput($_POST["first_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$strFirstName)) {
              $strFirstNameError = "Only letters and white space allowed";
            }
          }

        if (empty($_POST["last_name"])) {
          $strLastNameError = "Last Name is required";
          } else {
            $strLastName = validateInput($_POST["last_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$strLastName)) {
              $strLastNameError = "Only letters and white space allowed";
            }
          }

        if (empty($_POST["user_name"])) {
          $strUserNameError = "User Name is required";
          } else {
            $strUserName = validateInput($_POST["user_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$strUserName)) {
              $strUserNameError = "Only letters and white space allowed";
            }
          }
        if (empty($_POST["password"])) {
            $strUserPasswordError = "User Password is required";
          } else {
            $strUserPassword = validateInput($_POST["password"]);
            // check Password only contains letters and whitespace
            if (!preg_match("/[!@#$%*a-zA-Z0-9]{8,}/",$strUserPassword)) {
              $strUserPasswordError = "Only Alpha Numeric Letters allowed";
            }
          }
        if (empty($_POST["confirm_password"])) {
            $strConfirmUserPasswordError = "Confirm User Password is required";
          
          } else {
            $strUserConfirmPassword = validateInput($_POST["confirm_password"]);
            // check if Mobile No syntax is valid or not
            if (!preg_match("/[!@#$%*a-zA-Z0-9]{8,}/",$strUserConfirmPassword)) {
              $strConfirmUserPasswordError = "Only Alpha Numeric Letters allowed";
            }
          }
        if (empty($_POST["email_address"])) {
            $strEmailError = "Email is required";
          } else {
            $strUserEmailAddress = validateInput($_POST["email_address"]);
            // check if e-mail address syntax is valid or not
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$strUserEmailAddress)) {
              $strEmailError = "Invalid email format";
            }
          }
        if (empty($_POST["mobile_no"])) {
            $IntMobileNumberError = "Mobile Number is required";
          
          } else {
            $intMobileNumber = validateInput($_POST["mobile_no"]);
            // check if Mobile No syntax is valid or not
            if (!preg_match("/^[789][0-9]{9}$/",$intMobileNumber)) {
              $IntMobileNumberError = "Invalid Mobile Number format";
            }
          }
        if (empty($_POST["company_name"])) {
          $strCompanyNameError = "Company Name is required";
          } else {
            $strCompanyName = validateInput($_POST["company_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]+\.*$/",$strCompanyName)) {
              $strCompanyNameError = "Only letters and white space allowed";
            }
          }
        
        if (empty($_POST["website_name"])) {
          $strWebsiteNameError = "Total Experience is required";
          } else {
            $strCompanyWebsiteName= validateInput($_POST["website_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/",$strCompanyWebsiteName)) {
              $strWebsiteNameError = "Only letters and white space allowed";
            }
          }

          if (empty($_POST["company_address"])) {
          $strCompanyAddressPrimaryError = "Company Address is required";
          }

          if (empty($_POST["company_address_1"])) {
          $strCompanyAddressSecondaryError = "Company Address is required";
          }

        if(''!=$strFirstNameError || ''!=$strLastNameError || ''!=$strUserNameError || ''!=$strUserPasswordError || ''!=$strConfirmUserPasswordError || ''!=$strEmailError || ''!=$strCompanyNameError || ''!=$IntMobileNumberError || ''!=$strTotalExperienceError || ''!=$strWebsiteNameError || ''!=$strCompanyAddressPrimaryError || ''!=$strCompanyAddressSecondaryError) {
      
          $err_msg = '<p style="color:red;font-size:15px;">Please fill the below fields!</p>';
            
        } else {
         if(isset($_POST['submit']) && 'add_user' == $_POST['submit']){
              //echo "FSHFHG"; 
            $strFirstName = $_POST['first_name'];
            $strLastName = $_POST['last_name'];
            $strUserName = $_POST['user_name'];
            $strUserEmailAddress = $_POST['email_address'];
            $strUserPassword = base64_encode($_POST['password']);
            $strUserConfirmPassword = base64_encode($_POST['confirm_password']);
            $strCompanyName = $_POST['company_name'];
            $intMobileNumber = $_POST['mobile_no'];
            $strCompanyWebsiteName = $_POST['website_name'];
            $strCompanyAddressPrimary = $_POST['company_address_primary'];
            $strCompanyAddressSecondary = $_POST['company_address_secondary'];
            $created_by = $_POST['user_name'];
            $created_date = date("Y-m-d h:i:s");
            $subject    = "Sending HTML eMail using PHPMailer.";
              //$message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";
            // Validation checking User Name and Email Address already exist
            if($strUserEmailAddress !='') {
              
              $add_query = "SELECT * FROM employer_registration WHERE emplr_user_name = '$strUserName' OR emplr_email_address = '$strUserEmailAddress'"; 
                $result = mysqli_query($connection, $add_query);
                //$results = mysqli_num_rows($connection, $add_result);
                //echo "Swatantra".$resul = mysqli_insert_id($connection);
                //print_r($array_row);
                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  if ($strUserName==$row['emplr_user_name'])
                        {
                            $user_msg = '<p style="color:red;">User Name Already exist...</p>';
                        }
                        elseif($strUserEmailAddress==$row['emplr_email_address'])
                        {
                            $check_msg = '<p style="color:red;">Email Address Already exist...</p>';
                        } 
                }
                elseif($strUserPassword !=$strUserConfirmPassword){
                    $confirmpassmsg = "Password doesn't match!";

                // Validation checking User Name and Email Address already exist End Here
                }else {
                  // Query for Inserting data User Details

              // File Uploading Script Start Here
             
               if(isset($_POST['submit'])) {
                $name = $_FILES['logo']['name'];
                $size = $_FILES['logo']['size'];
                $type = $_FILES['logo']["type"];
                $tmp_name = $_FILES['logo']['tmp_name'];
                }
              
              $location = "upload_logo/";
              $maxsize = 5120;
              if(isset($name) && !empty($name)){
                if($type =='image/png' || $type =='image/jpg' || $type =='image/jpeg' && $size <= $maxsize){
                  if(move_uploaded_file($tmp_name, $location.$name)){
                    $uploadsuccmsg =  '<p style="color:green;">file Uploaded Successfully..</p>';
                  }else{
                    $uploderrormsg = '<p style="color:red;">Failed to Upload</p>';
                  }
                }else{
                  $uploderrormsg = '<p style="color:red;">File should be pdf,doc and docs & only 2 MB in size</p>';
                  //exit;
                }
              }
              // File Uploading Script End Here

            
              $query = "INSERT INTO `employer_registration` 
              (
              emplr_first_name, 
              emplr_last_name,
              emplr_user_name,
              emplr_email_address,
              emplr_password,
              emplr_confirm_password,
              emplr_mobile_no,
              emplr_company_name,
              emplr_website_name,
              emplr_company_address_primary,
              emplr_company_address_secondary,
              emplr_logo_path,
              created_by,
              created_on) 
              VALUES 
              (
              '$strFirstName', 
              '$strLastName',
              '$strUserName',
              '$strUserEmailAddress',
              '$strUserPassword',
              '$strUserConfirmPassword',
              '$intMobileNumber',
              '$strCompanyName',
              '$strCompanyWebsiteName',
              '$strCompanyAddressPrimary',
              '$strCompanyAddressSecondary',
              'NULL',
              '$created_by', 
              '$created_date')";
                  $result = mysqli_query($connection, $query); 
                  // Query for Inserting data User Details End Here

                    // Email Sending Script Start Here

              if($result){
                  
                $lastID = mysqli_insert_id($connection);
                $password = base64_decode($strUserPassword);
                   //echo $abc = base64_encode($lastID); die;

                    $message = '<html><head><title>Email Verification</title></head><body>';
                    $message .= '<h1 style="color:green;">Hi ' .$strFirstName .' '.$strLastName. '!</h1>';
                    $message .= '<div class=" "> You Have successfully Registered in USAEAD.com.  
                     Your User Name is' . '<h4 style="color:blue;">'.$strUserName. '</h4>'. ' and Password is ' .' <h4 style="color:blue;"> '. $password . ' </h4> ' .' Cheers :)</div>';
                  $message .= '<p><a href="'.SITE_URL.'activate.php?id=' . $lastID . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
                  $message .= '<p><a href="http://www.usaead.com">usaead.com</a>';
                    $message .= "</body></html>";
                   
                    // php mailer code starts
                    $mail = new PHPMailer(true);
                    $mail->IsSMTP();// telling the class to use SMTP

                    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
                    $mail->SMTPAuth = true;                  // enable SMTP authentication
                    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
                    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                    $mail->Port = 465;                   // set the SMTP port for the GMAIL server

                    $mail->Username = 'swatantra.gupta70@gmail.com'; 
                    $mail->Password = 'swatantra1402@';

                    $mail->SetFrom('swatantra.gupta70@gmail.com', 'Swatantra Gupta');
                    $mail->AddAddress($strUserEmailAddress);

                    $mail->Subject = trim("Email Verifcation - www.usaead.com");
                    $mail->MsgHTML($message);
                  try { 
                   $mail->Send();
                   $msg = "An email has been sent for verfication.";
                       $msgType = "success";
                  }
                 //}
                 catch(phpmailerException $ex)
                 {
                  $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
                 }
              } 
              // Email Sending Script End Here


                  if($result){
                    $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> User has been registered successfully.
                        </div>';
                    header('redirect:register.php');
                    //exit();
                  }else{
                    $err_msg = '<div class="alert alert-danger">
                            <strong>Oopss!</strong> Something went wrong.
                        </div>';
                  }
            }
          }

      }//Closing Connection with Server     
        mysqli_close($connection);
    } 
  } // endIf
  function validateInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon_usa.png" type="image/png" sizes="26x26">
    <title>USAEAD Employer | Register</title>

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
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="Mega Jobs Logo"></a>
          </div>
            <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
             
            </ul>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
         
        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>
  
    <section class="signup-signin">
       <div id="flash-msg">
          <p> <?php if(isset($err_msg)) { echo $err_msg; } 
              if(isset($success_msg)) { echo $success_msg; 
            } ?>    
          </p>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#employer" aria-controls="employer" role="tab" data-toggle="tab">Company Account <span>We are hiring Employees</span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="employer">
                <div class="signin-form">
                  <h6>Fields with * are mandatory</h6>
                  <form method="POST" action="employer_register.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" name="first_name" class="form-control" placeholder="First Name" style="border-radius: 25px;" value="<?php echo $_POST['first_name']; ?>" />
                           <span class="error pull-left" style="color:red;">* <?php echo $strFirstNameError;?>
                        </div>
                        <div class="form-group">
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name" style="border-radius: 25px;" value="<?php echo $_POST['last_name']; ?>" />
                          <span class="error pull-left" style="color:red;">* <?php echo $strLastNameError;?>
                        </div>
                        <div class="form-group">
                          <input type="text" name="user_name" class="form-control" placeholder="User Name" style="border-radius: 25px;" value="<?php echo $_POST['user_name']; ?>" />
                          <span class="error pull-left" style="color:red;">* <?php echo $strUserNameError;?>
                              <?php if(isset($user_msg)){ echo $user_msg; } ?></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="email_address" class="form-control" placeholder="Email Address" style="border-radius: 25px;" value="<?php echo $_POST['email_address']; ?>" />
                          <span class="error pull-left " id="checkmsgl" style="color:red;">* <?php echo $strEmailError;?>
                            <?php if(isset($check_msg)){ echo $check_msg; } ?></span>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" style="border-radius: 25px;" value="" />
                          <span class="error pull-left " style="color:red;">* <?php echo $strUserPasswordError;?></span>
                        </div>
                       
                        <div class="form-group">
                          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" style="border-radius: 25px;" />
                          <span class="error pull-left " style="color:red;">* <?php echo $strConfirmUserPasswordError;?>
                            <?php if(isset($confirmpassmsg)){ echo $confirmpassmsg; } ?></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" name="mobile_no" class="form-control" placeholder="Mobile Number" style="border-radius: 25px;" value="<?php echo $_POST['mobile_no']; ?>" maxlength="10" />
                           <span class="error pull-left" style="color:red;">* <?php echo $IntMobileNumberError;?></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="company_name" class="form-control" placeholder="Company Name" style="border-radius: 25px;" value="<?php echo $_POST['company_name']; ?>" />
                           <span class="error pull-left" style="color:red;">* <?php echo $strCompanyNameError;?></span>
                        </div>
                        <!-- <div class="form-group">
                          <input type="text" name="vat-no" class="form-control" placeholder="VAT No." />
                        </div> -->
                        <div class="form-group">
                          <input type="text" name="website_name" class="form-control" placeholder="Website" style="border-radius: 25px;" value="<?php echo $_POST['website_name']; ?>" />
                           <span class="error pull-left" style="color:red;">* <?php echo $strWebsiteNameError;?></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="company_address_primary" class="form-control" placeholder="Company Address (Line1)" style="border-radius: 25px;" value="<?php echo $_POST['company_address_primary']; ?>" />
                          <span class="error pull-left" style="color:red;">* <?php echo $strCompanyAddressPrimaryError; ?></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="company_address_secondary" class="form-control" placeholder="Company Address (Line2)" style="border-radius: 25px;" value="<?php echo $_POST['company_address_secondary']; ?>" />
                          <span class="error pull-left" style="color:red;">* <?php echo $strCompanyAddressSecondaryError; ?></span>
                        </div>
                        <!-- <div class="form-group">
                          <div class="custom-input">
                            <span style="border-radius: 25px;"><i class="fa fa-upload"></i> Upload Logo</span>
                           <input type="file" name="logo" id="logo" />
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="form-group checkbox">
                          <input type="checkbox" id="company-terms" />
                          <label for="company-terms">I agreed to the <a href="javascript:void(0);">Terms and Conditions</a> governing the use of jobportal</label>
                        </div>
                        <button class="btn btn-primary btn-secondary btn-block" type="submit" name="submit" value="add_user" style="border-radius: 25px;">Submit</button>
                      </div>
                    </div>
                  </form>
                  <p class="register-link text-center">Already a member? <a href="employer_login.php">Sign in here</a></p>
                </div>
              </div>
              <p class="desclimer-text text-center">In case you are using a public/shared computer we recommend that<br>
              you logout to prevent any un-authorized access to your account</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <a href="index.html" class="footer-logo"><img src="img/footer-logo.png" alt="Mega Jobs Logo"></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum. Phasellus et bibendum lorem. Pellentesque non nulla quis nibh pulvinar eleifend. Nullam id lacus ut urna</p>
            <ul class="social-links">
              <li>
                <a href="javascript:void(0);" class="fa fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-linkedin"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-google-plus"></a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-lg-offset-1 col-md-3 col-sm-6">
            <h5>Trending Jobs</h5>
            <ul class="quick-links">
              <li><a href="javascript:void(0);">Android Developer</a></li>
              <li><a href="javascript:void(0);">PHP Developer</a></li>
              <li><a href="javascript:void(0);">Marketing Executive</a></li>
              <li><a href="javascript:void(0);">Full Stack developer</a></li>
              <li><a href="javascript:void(0);">Frontend Developer</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6">
            <h5>Quick Links</h5>
            <ul class="quick-links">
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="javascript:void(0);">How it work's</a></li>
              <li><a href="plans-and-pricing.html">Pricing</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="copyright">
          <div class="row">
            <div class="col-sm-6">
              © <a href="javascript:void(0);">Mega Jobs</a>, 2017 All rights reserved.
            </div>
            <div class="col-sm-6 author-info">
              Created by <a href="javascript:void(0);">pixshed</a>. Premium themes and templates.
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- FOOTER ENDS -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
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