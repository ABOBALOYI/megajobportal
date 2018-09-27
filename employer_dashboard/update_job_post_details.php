<?php
/* filename : register.php
 * Here we have some fields as input in add User page with submit button
 * created on 13-02-2018
 * created by Swatantra gupta
 * modified by Swatantra Gupta
*/
session_start();
 error_reporting(0); 
  include('../includes/config.php');
  //echo $session_info = $_SESSION['user_session_info']; die;
  // include phpmailer class
    //include('phpmailer/class.phpmailer.php');
  
  $session_info = $_SESSION['user_session_info'];
  $strUserName = $session_info['emplr_user_name'];
  $intUserId = $session_info['emplr_id'];
  echo $intJobID = $_GET['JobId'];
 
  echo $select_query = "SELECT * FROM job_post_table WHERE job_id =".$intJobID;
  $result_select = mysqli_query($connection, $select_query);
  $rows = mysqli_fetch_assoc($result_select);
// print_r($rows); 
?>
 <?php     
      $strJobTitleError = "";
      $strLocationError = "";
      $strZipcodeError ="";
      $strMaxQualificationError ="";
      $intMinSalaryPackageError ="";
      $intMaxSalaryPackageError ="";
      $IntNoticePeriodError = "";
      $strCertificationError = "";
      $strSpokenLanguageError = "";
      $strSkillsError = "";
      $strJoiningFacilitiesError = "";
      $strJobSummaryError = "";
      $strJobDescriptionError = "";
      $strDesiredProfileInfoError = "";
      $strTotalExperienceError = "";
      $strJobDescriptionIDError = "";
      if(isset($_POST['submit'])){
        
        if (empty($_POST["job_title"])) {
          $strJobTitleError = "Job Title is required";
          } else {
            $strJobTitle = validateInput($_POST["job_title"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$strJobTitle)) {
              $strJobTitleError = "Only letters and white space allowed";
            }
          }

        if (empty($_POST["zipcode"])) {
          $strZipcodeError = "Zipcode is required";
          } else {
            $strZipcode = validateInput($_POST["zipcode"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[0-9]{6}$/",$strZipcode)) {
              $strZipcodeError = "Only Number allowed";
            }
          }

        if (empty($_POST["max_qualification"])) {
          $strMaxQualificationError = "Max Qualification is required";
          } else {
          $strMaxQualification = validateInput($_POST["max_qualification"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$strMaxQualification)) {
              $strMaxQualificationError = "Only letters and white space allowed";
            }
          }
        if (empty($_POST["min_salary_package"])) {
            $intMinSalaryPackageError = "Minimum Salary Package is required";
          } else {
          $intMinSalaryPackage = validateInput($_POST["min_salary_package"]);
            // check Password only contains letters and whitespace
            if (!preg_match("/[0-9]/",$intMinSalaryPackage)) {
              $intMinSalaryPackageError = "Only Numeric Value allowed";
            }
          }

        if (empty($_POST["max_salary_package"])) {
          $intMaxSalaryPackageError = "Maximum Salary Package is required";
          } else {
        $intMaxSalaryPackage = validateInput($_POST["max_salary_package"]);
            // check Password only contains letters and whitespace
            if (!preg_match("/[0-9]/",$intMaxSalaryPackage)) {
              $intMaxSalaryPackageError = "Only Numeric Value allowed";
            }
          }

          if (empty($_POST["notice_period"])) {
          $IntNoticePeriodError = "Notice Period is required";
          } else {
          $IntNoticePeriod = validateInput($_POST["notice_period"]);
            // check Password only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9 ]*$/",$IntNoticePeriod)) {
              $IntNoticePeriodError = "Only Numeric and Character Value allowed";
            }
          }

        if (empty($_POST["certificate_info_1"])) {
            $strCertificationError = "Certification info is required";
          } else {
            $strCertification = validateInput($_POST["certificate_info_1"]);
            // check if Mobile No syntax is valid or not
            if (!preg_match("/[a-zA-Z ]/",$strCertification)) {
              $strCertificationError = "Only Alpha Numeric Letters allowed";
            }
          }
        if (empty($_POST["spoken_language"])) {
            $strSpokenLanguageError = "Spoken Language Field is required";
          } else {
            $strSpokenLanguage = validateInput($_POST["spoken_language"]);
            // check if Mobile No syntax is valid or not
            if (!preg_match("/[a-zA-Z0-9]/",$strSpokenLanguage)) {
              $strSpokenLanguageError = "Only Alpha Numeric Letters allowed";
            }
          }
       if (empty($_POST["skills"])) {
            $strSkillsError = "Skills Field is required";
          } else {
            $strSkills = validateInput($_POST["skills"]);
            // check if Mobile No syntax is valid or not
            if (!preg_match("/[a-zA-Z0-9]/",$strSkills)) {
              $strSkillsError = "Only Alpha Numeric Letters allowed";
            }
          }
        if (empty($_POST["job_summary"])) {
          $strJobSummaryError = "Job Summary Field is required";
          } else {
            $strJobSummary = validateInput($_POST["job_summary"]);
            // check name only contains letters and whitespace
            if (!preg_match("/[A-Za-z0-9'\.\-\s\,]/",$strJobSummary)) {
              $strJobSummaryError = "Only letters and white space allowed";
            }
          }
        
        if (empty($_POST["job_description"])) {
          $strJobDescriptionError = "Job Description Field is required";
          } else {
            $strJobDescription = validateInput($_POST["job_description"]);
            // check name only contains letters and whitespace
            if (!preg_match("/[A-Za-z0-9'\.\-\s\,]/",$strJobDescription)) {
            $strJobDescriptionError = "Only letters and white space allowed";
            }
          }

        if (empty($_POST["desired_profile_info"])) {
          $strDesiredProfileInfoError = "Desired Profile Info Field is required";
          } else {
            $strDesiredProfileInfo = validateInput($_POST["desired_profile_info"]);
            // check name only contains letters and whitespace
            if (!preg_match("/[A-Za-z0-9'\.\-\s\,]/",$strDesiredProfileInfo)) {
            $strDesiredProfileInfoError = "Only letters and white space allowed";
            }
          }

        if (empty($_POST["total_experience"])) {
          $strTotalExperienceError = "Total Experience Field is required";
          } else {
            $strTotalExperience = validateInput($_POST["total_experience"]);
            // check name only contains letters and whitespace
            if (!preg_match("/[A-Za-z0-9'\.\-\s\,]/",$strTotalExperience)) {
            $strTotalExperienceError = "Only letters and white space allowed";
            }
          }

      if (empty($_POST["job_description_id"])) {
          $strJobDescriptionIDError = "Job Description ID is required";
          } else {
            $strJobDescriptionID = validateInput($_POST["job_description_id"]);
            //check name only contains letters and whitespace
            if (!preg_match("/[A-Za-z0-9'\.\-\s\,]/",$strJobDescriptionID)) {
            $strJobDescriptionIDError = "Only letters and white space allowed";
            }
          }

          if (empty($_POST["search_location"])) {
          $strLocationError = "Search Location Field is required";
          }

          if (empty($_POST["joining_facilities"])) {
          $strJoiningFacilitiesError = "Joining Facilities Field is required";
          }
        if(''!=$strJobTitleError || ''!=$strZipcodeError || ''!=$strMaxQualificationError || ''!=$intMinSalaryPackageError || ''!=$intMaxSalaryPackageError || ''!=$IntNoticePeriodError || ''!=$strCertificationError || ''!=$strSpokenLanguageError || ''!=$strSkillsError || ''!=$strJoiningFacilitiesError || ''!=$strLocationError || ''!=$strJobDescriptionError || ''!=$strJobSummaryError || ''!=$strDesiredProfileInfoError || ''!=$strTotalExperienceError || ''!=$strJobDescriptionIDError) {
         
          $err_msg = '<p style="color:red;font-size:15px;">Please fill the below fields!</p>';
            
        } else {
         
         if(isset($_POST['submit']) && 'job_post' == $_POST['submit']){
          
              //echo "FSHFHG"; 
            $strJobTitle = mysqli_real_escape_string($connection,$_POST['job_title']);
            $strSearchLocation = $_POST['search_location'];
            $strZipcode = $_POST['zipcode'];
            $strMaxQualification = $_POST['max_qualification'];
            $intMinSalaryPackage = $_POST['min_salary_package'];
            $intMaxSalaryPackage = $_POST['max_salary_package'];
            $IntNoticePeriod = $_POST['notice_period'];
            $strJobType = $_POST['job_type'];
            $strIndustryType = $_POST['industry_type'];
            $strFunctionalArea = $_POST['functional_area'];
            $strCertificationOne = $_POST['certificate_info_1'];
            $strSpokenLanguage = $_POST['spoken_language'];
            $strSkills = $_POST['skills'];
            $strJoiningFacilities = $_POST['joining_facilities'];
            $strJobSummary = $_POST['job_summary'];
            $strJobDescription = $_POST['job_description'];
            $strDesiredProfileInfo = $_POST['desired_profile_info'];
            $strTotalExperience = $_POST['total_experience'];
            $created_by = $strUserName;
            $created_date = date("Y-m-d h:i:s");
            //$subject    = "Sending HTML eMail using PHPMailer.";
            //$message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";
           

              // File Uploading Script Start Here
             
               if(isset($_POST['submit'])) {
                $name = $_FILES['logo']['name'];
                $size = $_FILES['logo']['size'];
                $type = $_FILES['logo']["type"];
                $tmp_name = $_FILES['logo']['tmp_name'];
                }
              
              $location = "../upload_logo/";
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

            
            echo $query = "UPDATE `job_post_table` SET
              
              job_title = '$strJobTitle', 
              location = '$strSearchLocation',
              zipcode = '$strZipcode',
              max_qualification = '$strMaxQualification',
              min_salary_package = '$intMinSalaryPackage',
              max_salary_package = '$intMaxSalaryPackage',
              job_notice_period = '$IntNoticePeriod',
              industry_type = '$strIndustryType',
              functional_area = '$strFunctionalArea',
              job_type = '$strJobType',
              certificate_info_1 = '$strCertificationOne',
              spoken_language = '$strSpokenLanguage',
              skills = '$strSkills',
              joining_facilities = '$strJoiningFacilities',
              job_summary = '$strJobSummary',
              job_description = '$strJobDescription',
              logo_path = '$location$name',
              desired_profile_info = '$strDesiredProfileInfo',
              total_experience = '$strTotalExperience',
              created_by = '$strUserName',
              created_on = '$created_date' WHERE job_id = '$intJobID'"; die;
              
              $result = mysqli_query($connection, $query); 
                  // Query for Inserting data User Details End Here

                    // Email Sending Script Start Here

              // if($result){
                  
              //   $lastID = mysqli_insert_id($connection);
              //   $password = base64_decode($strUserPassword);
              //      //echo $abc = base64_encode($lastID); die;

              //       $message = '<html><head><title>Email Verification</title></head><body>';
              //       $message .= '<h1 style="color:green;">Hi ' .$strFirstName .' '.$strLastName. '!</h1>';
              //       $message .= '<div class=" "> You Have successfully Registered in USAEAD.com.  
              //        Your User Name is' . '<h4 style="color:blue;">'.$strUserName. '</h4>'. ' and Password is ' .' <h4 style="color:blue;"> '. $password . ' </h4> ' .' Cheers :)</div>';
              //     $message .= '<p><a href="'.SITE_URL.'activate.php?id=' . $lastID . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
              //     $message .= '<p><a href="http://www.usaead.com">usaead.com</a>';
              //       $message .= "</body></html>";
                   
              //       // php mailer code starts
              //       $mail = new PHPMailer(true);
              //       $mail->IsSMTP();// telling the class to use SMTP

              //       $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
              //       $mail->SMTPAuth = true;                  // enable SMTP authentication
              //       $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
              //       $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
              //       $mail->Port = 465;                   // set the SMTP port for the GMAIL server

              //       $mail->Username = 'swatantra.gupta70@gmail.com'; 
              //       $mail->Password = 'swatantra1402@';

              //       $mail->SetFrom('swatantra.gupta70@gmail.com', 'Swatantra Gupta');
              //       $mail->AddAddress($strUserEmailAddress);

              //       $mail->Subject = trim("Email Verifcation - www.usaead.com");
              //       $mail->MsgHTML($message);
              //     try { 
              //      $mail->Send();
              //      $msg = "An email has been sent for verfication.";
              //          $msgType = "success";
              //     }
              //    //}
              //    catch(phpmailerException $ex)
              //    {
              //     $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
              //    }
              // } 
              // Email Sending Script End Here


                  // if($result){
                  //   $success_msg = '<div class="alert alert-success">
                  //           <strong>Success!</strong> User has been registered successfully.
                  //       </div>';
                  //   header('redirect:register.php');
                  //   //exit();
                  // }else{
                  //   $err_msg = '<div class="alert alert-danger">
                  //           <strong>Oopss!</strong> Something went wrong.
                  //       </div>';
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
    <section class="inner-banner">
       <div id="flash-msg">
         <!--  <p> 
          <?php //if(isset($err_msg)) { echo $err_msg; } 
              //if(isset($success_msg)) { echo $success_msg; 
            //} ?>    
          </p> -->
        </div>
      <!-- BANNER STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-job-title">
            <h4>Post New Job
            <span>Or you  can upload you job post in word or pdf format and we will do the rest</span>
            </h4>
          </div>
          <!-- <div class="col-md-3">
            <div class="custom-input">
              <span><i class="fa fa-upload"></i> Upload Job Post</span>
              <input type="file" name="resume" id="resume" />
            </div>
          </div> -->
        </div>
      </div>
      <!-- BANNER ENDS -->
    </section>
    <section class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h6>Job Details <span class="small pull-right">Fields with * are mandetory</span></h6>
            <form method="POST" action="update_job_post_details.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" name="job_description_id" class="form-control" placeholder="Job Description ID" value="<?php echo $rows['job_description_id']; ?>"/>
                   <span class="error pull-left" style="color:red;">* <?php echo $strJobDescriptionIDError;?>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" name="job_title" class="form-control" placeholder="Job Title" value="<?php echo $rows['job_title']; ?>"/>
                   <span class="error pull-left" style="color:red;">* <?php echo $strJobTitleError;?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group custom-select">
                    <select name="industry_type" class="form-control" >
                      <option value="" selected>Industry Type</option>
                     <option value="Computer Games" <?php if($rows["industry_type"] =='Computer Games'){echo "selected";}?>>Computer Games</option>
                      <option value="Computer Hardware" <?php if($rows["industry_type"] =='Computer Hardware'){echo "selected";}?>>Computer Hardware</option>
                      <option value="Computer Networking" <?php if($rows["industry_type"] =='Computer Networking'){echo "selected";}?>>Computer Networking</option>
                      <option value="Computer Softwares" <?php if($rows["industry_type"] =='Computer Softwares'){echo "selected";}?>>Computer Softwares</option>
                      <option value="Information Services" <?php if($rows["industry_type"] =='Information Services'){echo "selected";}?>>Information Services</option>
                      <option value="IT Software / Software Services" <?php if($rows["industry_type"] =='IT Software / Software Services'){echo "selected";}?>>IT Software / Software Services</option>
                    </select>
                    <span class="required">*</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="search_location" name="search_location" class="form-control" placeholder="Search Job Location Country, State and City" value="<?php echo $rows['location']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $strLocationError;?>
                    <div id="geomap"></div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="zipcode" class="form-control" placeholder="Zip Code" value="<?php echo $rows['zipcode']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $strZipcodeError;?>
                  </div>
                </div>
                <div class="col-sm-6">
                   <div class="form-group custom-select">
                    <select name="functional_area" class="form-control">
                      <option value="">Functional Area</option>
                      <option value="Human Resource" <?php if($rows["functional_area"] =='Human Resource'){echo "selected";}?>>Human Resource</option>
                      <option value="IT SOftware" <?php if($rows["functional_area"] =='IT Software'){echo "selected";}?>>IT Software</option>
                      <option value="Application Programming" <?php if($rows["functional_area"] =='Application Programming'){echo "selected";}?>>Application Programming</option>\
                      <option value="Tech Support" <?php if($rows["functional_area"] =='Tech Support'){echo "selected";}?>>Tech Support</option>
                      <option value="Business Out Sourcing"<?php if($rows["functional_area"] =='Business Out Sourcing'){echo "selected";}?>>Business Out Sourcing</option>
                    </select>
                    <span class="required">*</span>
                  </div>
                  <div class="form-group">
                    <input type="text" name="certificate_info_1" class="form-control" placeholder="Certification Info" value="<?php echo $rows['certificate_info_1']; ?>"/>
                    <!-- <a href="javascript:void(0);" class="add_button pull-right" style="margin-top: -36px;margin-right: -27px;"><img src="../img/add.png"></a> -->
                    <span class="error pull-left" style="color:red;">* <?php echo $strCertificationError;?>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="desired_profile_info" class="form-control" placeholder="Desired Profile Info" value="<?php echo $rows['desired_profile_info']; ?>"/>
                   <span class="error pull-left" style="color:red;">* <?php echo $strDesiredProfileInfoError;?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group custom-select">
                    <select name="job_type" class="form-control">
                      <option value="">Job Type</option>
                      <option value="Part Time" <?php if($rows["job_type"] =='Part Time'){echo "selected";}?>>Part Time</option>
                      <option value="Permanent, Full Time" <?php if($rows["job_type"] =='Permanent, Full Time'){echo "selected";}?>>Permanent, Full Time</option>
                      <option value="Contract" <?php if($rows["job_type"] =='Contract'){echo "selected";}?>>Contract</option>
                    </select>
                    <span class="required">*</span>
                  </div>
                </div>
              </div>  
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" name="max_qualification" class="form-control" placeholder="Heighest Qualification" value="<?php echo $rows['max_qualification']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $strMaxQualificationError;?>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" name="spoken_language" class="form-control" placeholder="Additional Spoken Language" value="<?php echo $rows['spoken_language']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $strSpokenLanguageError;?>
                  </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" name="min_salary_package" class="form-control" placeholder="Salary Package Min" value="<?php echo $rows['min_salary_package']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $intMinSalaryPackageError;?>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" name="max_salary_package" class="form-control" placeholder="Salary Package Max" value="<?php echo $rows['max_salary_package']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $intMaxSalaryPackageError;?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="skills" class="form-control" placeholder="Skills required" value="<?php echo $rows['skills']; ?>"/>
                    <span class="error pull-left" style="color:red;">* <?php echo $strSkillsError;?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="notice_period" class="form-control" placeholder="Notice Period" value="<?php echo $rows['job_notice_period']; ?>" />
                    <span class="error pull-left" style="color:red;">* <?php echo $IntNoticePeriodError;?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="joining_facilities" class="form-control" placeholder="Joining fascilities" value="<?php echo $rows['joining_facilities']; ?>" />
                    <span class="error pull-left" style="color:red;">* <?php echo $strJoiningFacilitiesError;?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <div class="custom-input">
                    <span style="border-radius: 25px;"><i class="fa fa-upload" ></i> Upload Company Logo</span>
                    <input type="file" name="logo" id="logo" style="border-radius: 25px;"/>
                  </div>
                  </div>
                </div>
                 <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="total_experience" class="form-control" placeholder="Total Experience" value="<?php echo $rows['total_experience']; ?>" />
                    <span class="error pull-left" style="color:red;">* <?php echo $strTotalExperienceError;?>
                  </div>
                </div>
              </div>
              <div class="divider"></div>
              <div class="row">
                <div class="col-sm-6">
                  <h6>Job Summary</h6>
                     <textarea class="form-control" type="text" name="job_summary" maxlength="1000"><?php echo $rows['job_summary']; ?></textarea>
                  <!-- <span class="error pull-left" style="color:red;">* <?php echo $strJobSummaryError;?> -->
                </div>
                <div class="col-sm-6">
                  <h6>Job Description</h6>
                    <textarea class="form-control" type="text"  name="job_description" maxlength="1000"><?php echo $rows['job_description']; ?></textarea>
                  <!-- <span class="error pull-left" style="color:red;">* <?php echo $strJobDescriptionError;?> -->
                </div>
              </div>
              <div class="divider"></div>
              <button class="btn btn-primary" type="submit" name="submit" value="job_post">Job Post</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
    <?php include('employer_footer.php'); ?>