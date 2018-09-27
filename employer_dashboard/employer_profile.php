<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $strUserName = $session_info['emplr_user_name'];
  $intUserId = $session_info['emplr_id'];
  // echo $strUserType = $session_info['user_type'];

  $sql_query = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                INNER JOIN job_post_table as JBT 
                ON ER.emplr_id = JBT.emplr_id WHERE job_id = 1 ";
  $result = mysqli_query($connection, $sql_query);
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $strJobTitle            = $row['job_title'];
                $strFirstName           = $row['emplr_first_name'];
                $strLastName            = $row['emplr_last_name'];
                $strUserName            = $row['emplr_user_name'];
                $strCompanyName         = $row['emplr_company_name'];
                $strUserPassword        = $row['emplr_password'];
                $strUserConfirmPassword = $row['emplr_confirm_password'];
                $strEmailAddress        = $row['emplr_email_address'];
                $intMobileNo            = $row['emplr_mobile_no'];
                $strWebsiteAddress      = $row['emplr_website_name'];
                $strLogoPath            = $row['logo_path'];
                $strCreatedDate         = $row['created_on'];
                

            }
          if(isset($_SESSION['user_email_id'])){
            if((time()-$_SESSION['last_time']) > 60*30){
                header("Location:../logout.php");
            }else{
              $_SESSION['last_time'] = time();
            }
        }else{
            header('Location:../index.php');
        }
        //mysqli_close($connection);
      
?>
<?php
      $strFirstNameError = "";
      $strLastNameError = "";
      $strUserNameError ="";
      // $strUserPasswordError ="";
      // $strConfirmUserPasswordError ="";
      $strEmailError ="";
      $IntMobileNumberError = "";
      //$strCompanyNameError = "";
      $strWebsiteNameError = "";
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
        // if (empty($_POST["password"])) {
        //     $strUserPasswordError = "User Password is required";
        //   } else {
        //     $strUserPassword = validateInput($_POST["password"]);
        //     // check Password only contains letters and whitespace
        //     if (!preg_match("/[!@#$%*a-zA-Z0-9]{8,}/",$strUserPassword)) {
        //       $strUserPasswordError = "Only Alpha Numeric Letters allowed";
        //     }
        //   }
        // if (empty($_POST["confirm_password"])) {
        //     $strConfirmUserPasswordError = "Confirm User Password is required";
          
        //   } else {
        //     $strUserConfirmPassword = validateInput($_POST["confirm_password"]);
        //     // check if Mobile No syntax is valid or not
        //     if (!preg_match("/[!@#$%*a-zA-Z0-9]{8,}/",$strUserConfirmPassword)) {
        //       $strConfirmUserPasswordError = "Only Alpha Numeric Letters allowed";
        //     }
        //   }
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
       
        if (empty($_POST["website_name"])) {
          $strWebsiteNameError = "Total Experience is required";
          } else {
            $strCompanyWebsiteName= validateInput($_POST["website_name"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/",$strCompanyWebsiteName)) {
              $strWebsiteNameError = "Only letters and white space allowed";
            }
          }

         
        if(''!=$strFirstNameError || ''!=$strLastNameError || ''!=$strUserNameError || ''!=$strEmailError || ''!=$IntMobileNumberError || ''!=$strTotalExperienceError || ''!=$strWebsiteNameError) {
      
          $err_msg = '<p style="color:red;font-size:15px;">Please fill the below fields!</p>';
            
        } else {
          
         if(isset($_POST['submit']) && 'update_profile' == $_POST['submit']){
              //echo "FSHFHG"; die;
            $strFirstName = $_POST['first_name'];
            $strLastName = $_POST['last_name'];
            $strUserName = $_POST['user_name'];
            $strUserEmailAddress = $_POST['email_address'];
            // $strUserPassword = base64_encode($_POST['password']);
            // $strUserConfirmPassword = base64_encode($_POST['confirm_password']);
            $intMobileNumber = $_POST['mobile_no'];
            $strCompanyWebsiteName = $_POST['website_name'];
            $created_by = $_POST['user_name'];
            $created_date = date("Y-m-d h:i:s");
            $subject    = "Sending HTML eMail using PHPMailer.";
              //$message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";
            // Validation checking User Name and Email Address already exist
            // if($strUserEmailAddress || $strUserPassword) {
              
            // $add_query = "SELECT * FROM employer_registration WHERE emplr_user_name = '$strUserName' OR emplr_email_address = '$strUserEmailAddress'"; 
            //     $result_array = mysqli_query($connection, $add_query);
            //     $results = mysqli_num_rows($connection, $add_result);
               
            //     if (mysqli_num_rows($result_array) > 0) {

            //        $rows = mysqli_fetch_assoc($result_array);
            //        echo "TESTTT"; 
                   
                  // Query for Updating data Employer Details

              //echo "Test1"; die;
              $query = "UPDATE `employer_registration` SET
                      emplr_first_name        = '$strFirstName', 
                      emplr_last_name         = '$strLastName',
                      emplr_user_name         = '$strUserName',
                      emplr_email_address     = '$strUserEmailAddress',
                      emplr_mobile_no         = '$intMobileNumber',
                      emplr_website_name      = '$strCompanyWebsiteName',
                      created_by              = '$strUserName',
                      created_on              = '$created_date' WHERE emplr_id = $intUserId";
                  $result = mysqli_query($connection, $query); 
                  // Query for Inserting data User Details End Here

                  if($result){
                    $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Data has been updated successfully.
                        </div>';
                    header('redirect:register.php');
                    //exit();
                  }else{
                    $err_msg = '<div class="alert alert-danger">
                            <strong>Oopss!</strong> Something went wrong.
                        </div>';
                  }
            //}
          //}

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
<?php include('employer_header.php'); ?>

    <section class="inner-banner padding-bottom-0">
      <!-- BANNER STARTS -->
       <div id="flash-msg">
          <p> <?php if(isset($err_msg)) { echo $err_msg; } 
              if(isset($success_msg)) { echo $success_msg; 
            } ?>    
          </p>
        </div>
         <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h4 class="margin-0">Employer Profile Page</h4>
              </div>
            </div>

      <div class="container">
       
        <div class="position-intro">
          <div class="row">
            <div class="col-md-2">
              <a href="javascript:void(0);"><img src="<?php echo $strLogoPath; ?>" alt="Company Logo 01"></a>
            </div>
            <div class="col-md-10">
              <div class="company-info">
                <h1><p><?php echo $strCompanyName; ?></p></h1> 
                
                <div class="job-icons">
                  <div class="form-group">
                  <span><i class="fa fa-user" style="font-size:20px;color:darkgray"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $strFirstName .' '. $strLastName ?></span>
                  </div>
                  <div class="form-group">
                  <span><i class="fa fa-user" style="font-size:20px;color:darkgray"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $strUserName ?></span>
                  </div>
                  <div class="form-group">
                  <span><i class="fa fa-phone" style="font-size:20px;color:darkgray"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '+91-' .$intMobileNo; ?></span>
                  </div>
                  <div class="form-group">
                  <span><i class="fa fa-envelope" style="font-size:20px;color:darkgray"></i>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $strEmailAddress ?></span>
                  </div>
                  <div class="form-group">
                  <span><i class="fa fa-globe" style="font-size:20px;color:darkgray"></i>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $strWebsiteAddress ?></span>
                  </div>
                   <div class="form-group">
                  <span><i class="fa fa-calendar" style="font-size:25px;color:darkgray"></i>&nbsp;&nbsp;Last Updated on &nbsp;&nbsp;<?php echo date('d-m-Y H:i:s A',strtotime($strCreatedDate)); ?></span>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-sm-6">
                    <address>
                      <b>Address 1</b><br>
                      <?php echo $strAddress1; ?>
                    </address>
                  </div>
                  <div class="col-sm-6">
                    <address>
                      <b>Address 2</b><br>
                      <?php echo $strAddress2; ?>
                    </address>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- BANNER ENDS -->
    </section>
    <section class="position-details">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h5>Employer Profile Information </h5>
            <h6>Update Summary</h6>
                <form method="POST" action="employer_profile.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php echo $strFirstName; ?>"/>
                       <span class="error pull-left" style="color:red;">* <?php echo $strFirstNameError;?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="<?php echo $strLastName; ?>"/>
                        <span class="error pull-left" style="color:red;">* <?php echo $strLastNameError;?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" id="search_location" name="user_name" class="form-control" placeholder="Enter User Name" value="<?php echo $strUserName; ?>"/>
                        <span class="error pull-left" style="color:red;">* <?php echo $strUserNameError;?>
                              <?php if(isset($user_msg)){ echo $user_msg; } ?></span>
                        <!-- <div id="geomap"></div> -->
                      </div>
                      <!-- <div class="form-group">
                        <input type="text" name="zipcode" class="form-control" placeholder="Zip Code" value="<?php echo $rows['zipcode']; ?>"/>
                        <span class="error pull-left" style="color:red;">* <?php echo $strZipcodeError;?>
                      </div> -->
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                       <input type="text" name="email_address" class="form-control" placeholder="Enter Email Address" value="<?php echo $strEmailAddress; ?>"/>
                        <span class="error pull-left" style="color:red;">* <?php echo $strEmailError;?>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $strUserPassword; ?>" />
                          <span class="error pull-left " style="color:red;">* <?php echo $strUserPasswordError;?></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $strUserConfirmPassword; ?>" />
                          <span class="error pull-left " style="color:red;">* <?php echo $strConfirmUserPasswordError;?>
                            <?php if(isset($confirmpassmsg)){ echo $confirmpassmsg; } ?></span>
                      </div>
                    </div>
                  </div> -->
                     <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No" value="<?php echo $intMobileNo; ?>"/>
                          <!-- <a href="javascript:void(0);" class="add_button pull-right" style="margin-top: -36px;margin-right: -27px;"><img src="../img/add.png"></a> -->
                          <span class="error pull-left" style="color:red;">* <?php echo $IntMobileNumberError;?>
                        </div>
                      </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" name="website_name" class="form-control" placeholder="Enter Website Address" value="<?php echo $strWebsiteAddress; ?>"/>
                        <!-- <a href="javascript:void(0);" class="add_button pull-right" style="margin-top: -36px;margin-right: -27px;"><img src="../img/add.png"></a> -->
                        <span class="error pull-left" style="color:red;">* <?php echo $strWebsiteNameError;?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="divider"></div>
                  <button class="btn btn-primary" type="submit" name="submit" value="update_profile">Update Profile</button>
            </form>     
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
<?php include('employer_footer.php'); ?>    