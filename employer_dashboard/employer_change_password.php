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

?>
  
<?php
      
         if(isset($_POST['submit']) && 'update_profile' == $_POST['submit']){
              //echo "FSHFHG"; die;
            $strUserPassword = base64_encode($_POST['password']);
            $strUserConfirmPassword = base64_encode($_POST['confirm_password']);
            $created_by = $_POST['user_name'];
            $created_date = date("Y-m-d h:i:s");

              $query = "UPDATE `employer_registration` SET
                      emplr_password          = '$strUserPassword', 
                      emplr_confirm_password  = '$strUserConfirmPassword',
                      created_by              = '$strUserName',
                      created_on              = '$created_date' WHERE emplr_id = $intUserId";
                  $result = mysqli_query($connection, $query); 
                  // Query for Inserting data User Details End Here

                  if($result){
                    $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Password has been updated successfully.
                        </div>';
                    header('redirect:index.php');
                    //exit();
                  }else{
                    $err_msg = '<div class="alert alert-danger">
                            <strong>Oopss!</strong> Something went wrong.
                        </div>';
                  }
            //}
          //}

      //}//Closing Connection with Server     
        mysqli_close($connection);
    } 
  //} // endIf
  

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
                <h4 class="margin-0">Employer Change Password Page</h4>
              </div>
            </div>
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
            <h6>Change Password</h6>
                <form method="POST" action="employer_change_password.php">
                
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" value="" required="" />
                        </div>
                       </div> 
                      <div class="col-sm-6">
                      <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="" required="" />  
                      </div>
                    </div>
                  </div>
                     
                  <div class="divider"></div>
                  <button class="btn btn-primary" type="submit" name="submit" value="update_profile">Update Password</button>
            </form>     
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
<?php include('employer_footer.php'); ?>    