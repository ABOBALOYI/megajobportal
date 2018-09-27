<?php 
  error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
   $strUserName = $session_info['candidate_user_name'];
  $strUserEmailAddress = $session_info['candidate_email_address'];
  $intUserId = $session_info['candidate_user_id'];
  $intJobApplyId = $_POST['job_id'];
  //echo $JobId = $_GET['Jobid'];
  // echo $strUserType = $session_info['user_type'];
  $sql_query_2 = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                    INNER JOIN job_post_table as JBT 
                    ON ER.emplr_id = JBT.emplr_id LIMIT 0,7 ";
  $result_2 = mysqli_query($connection, $sql_query_2);
  
  $sql_query = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                    INNER JOIN job_post_table as JBT 
                    ON ER.emplr_id = JBT.emplr_id WHERE JBT.job_id = '".$_GET['job_id']."' ORDER BY JBT.job_id DESC";
  $result = mysqli_query($connection, $sql_query);
   while ($row_array = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $strJobTitle            = $row_array['job_title'];
                $strSearchLocation      = $row_array['location'];
                $intZipcode             = $row_array['zipcode'];
                $strMaxQualification    = $row_array['max_qualification'];
                $intMinSalaryPackage    = $row_array['min_salary_package'];
                $intMaxSalaryPackage    = $row_array['max_salary_package'];
                $intNoticePeriod        = $row_array['job_notice_period'];
                $strFunctionalArea      = $row_array['functional_area'];
                $strIndustryType        = $row_array['industry_type'];
                $strJobType             = $row_array['job_type'];
                $strCertificate         = $row_array['certificate_info_1'];
                $strSpokenLanguage      = $row_array['spoken_language'];
                $strSkills              = $row_array['skills'];
                $strJoiningFacilities   = $row_array['joining_facilities'];
                $strJobSummary          = $row_array['job_summary'];
                $strJobDescription      = $row_array['job_description'];
                $strCompanyName         = $row_array['emplr_company_name'];
                $intMobileNo            = $row_array['emplr_mobile_no'];
                $strLogoPath            = $row_array['logo_path'];
                $intJobId               = $row_array['job_id'];
                $strAddress1            = $row_array['emplr_company_address_primary'];
                $strAddress2            = $row_array['emplr_company_address_secondary'];
                $strCreatedDate         = $row_array['created_on'];
                $strTotalExperience     = $row_array['total_experience'];
                $strJobDescriptionID    = $row_array['job_description_id'];
                $strDesiredProfileInfo  = $row_array['desired_profile_info'];
                $strFirstName           = $row_array['emplr_first_name'];
                $strLastName            = $row_array['emplr_last_name'];

            }

            $sql ="SELECT * FROM job_applied_table WHERE job_id = ". $_GET['job_id'];
            $sql_result_applied = mysqli_query($connection, $sql);
            $row_appl = mysqli_fetch_assoc($sql_result_applied);
            //print_r($row_appl);
            // echo $sql = "SELECT * FROM job_post_table WHERE job_id = '".$r['job_id']."'";
            // $sql_res = mysqli_query($connection, $sql);
            // $row_swat = mysqli_fetch_assoc($sql_res); die;
        
              /* Insert Query for Applied Particular Job Start Here */

                 if(isset($_POST['submit']) && 'Apply' == $_POST['submit']) {
        
                      $intJobID           = $_GET['job_id'];
                      $intEmployeeId      = $intUserId;
                      $strJobAppliedBy    = $userName;
                      $strJobAppliedDate  = date("Y-m-d h:i:s");
                      $sql_job_apply      = "SELECT * FROM job_applied_table WHERE job_id = '".$row_appl['job_id']."'";
                      $sql_job_apply_result = mysqli_query($connection, $sql_job_apply);
                          if(mysqli_num_rows($sql_job_apply_result) > 0){
                            $err_msg = '<h5><div class="alert alert-warning" style="text-align:center;">
                                      <strong>Oops!</strong> You have already Applied!...
                                  </div></h5>'; 
                                 
                          }else{

                             $sql_insert_query   = "INSERT INTO job_applied_table
                                ( job_id,
                                  user_id, 
                                  job_applied_by,
                                  job_applied_date
                                 ) 
                                  VALUES 
                                  ( '$intJobID',
                                    '$intEmployeeId', 
                                    '$strJobAppliedBy',
                                    '$strJobAppliedDate'
                                  )"; 
                            $insert_result = mysqli_query($connection, $sql_insert_query);
                              if($insert_result > 0){
                                  $success_msg = '<div class="alert alert-success" style="text-align:center;">
                                          <strong>Success!</strong> Job Applied successfully!.
                                      </div>';
                                  header('redirect:index.php');
                                  //exit();
                                }else{
                                  $err_msg = '<div class="alert alert-danger" style="text-align:center;">
                                          <strong>Oopss!</strong> Something went wrong.
                                      </div>';
                                } 

                      }
                              
                       
                }

              /* Insert Query for Applied Particular Job End Here */


          if(isset($_SESSION['candidate_email_address'])){
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

<?php include('employee_header.php'); ?>
     <section class="inner-banner padding-bottom-0">

       <div id="flash-msg">
          <p> <?php 
              if(isset($err_msg)) { echo $err_msg; }  
              if(isset($success_msg)) { echo $success_msg; }  
            ?>    
          </p>
        </div>

      <!-- BANNER STARTS -->
      <div class="container">
        <h4>JOIN US & EXPLORE THOUSANDS OF JOBS</h4>
        
        </div>
        <div class="position-intro">
           <h4>JOIN US & EXPLORE THOUSANDS OF JOBS</h4>
          <div class="row">
            <div class="col-md-2">
              <a href="javascript:void(0);"><img src="<?php echo $strLogoPath; ?>" alt="Company Logo 01"></a>
            </div>
            <div class="col-md-10">
              <div class="company-info">
                <h1><?php echo $strJobTitle; ?> (<?php echo $strJobDescriptionID; ?>)<small class="pull-right">Full time</small></h1>
                <p><?php echo $strCompanyName; ?></p>
                <div class="job-icons">
                  <span><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $strTotalExperience; ?></span>
                  <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $strSearchLocation ?></span>
                  <span><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo '+91-' .$intMobileNo; ?></span>
                  <span><i class="fa fa-money"></i>&nbsp;&nbsp;<i class="fa fa-inr" >&nbsp;&nbsp;<?php echo $intMinSalaryPackage .' - '.$intMaxSalaryPackage ?></i> LPA</span>
                </div>
                <form method="POST" action="">
                    <div class="btn-group">
                      <input type="submit" name="submit" class="btn btn-primary" value="Apply" />
                      <a href="../employee_register.php" class="btn btn-secondary">Register and Apply</a>
                    </div>
                </form>
                <input type="hidden" name="jobid" value="<?php echo  $intJobId; ?>">
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
          <div class="col-md-9">
            <h5>Detail Information <a href="javascript:void(0);" class="pull-right">Send me Jobs like this</a></h5>
            <h6>Job Summary</h6>
            <div class="well">
              Dear Candidate,<br>
              We have a mandate to hire for for a UI Developer for Pune Location.<br>
              Exp - 2-6 Years<br>
              Work Location :- Pune<br>
              Salary :- 800000 PA<br>
              Interview Date - 17th Oct 2016<br>
              Interview Day - Monday
            </div>
            <h6>Job Description</h6>
            <ul class="list-item">
              <li>Complete familiarity with web technologies such as HTML5 / CSS3 / JavaScript</li>
              <li>Minimum project experience of 3 years in RWD Angular.JS, JavaScript / jQuery frameworks like bootstrap, boilerplate, foundation. Minimum 1 year experience in Angular JS project</li>
              <li>Working knowledge of OOPs in JS frameworks</li>
              <li>Ability to convert the UI designs in to fully-functional interactive prototypes</li>
              <li>Awareness of UI design tools like Photoshop and Flash Â· Ability to create Wireframes is an added advantage</li>
              <li>Awareness of UI development principles and best practices</li>
              <li>Understanding of cross-browser compatibility and accessibility standards (W3C Guidelines)</li>
              <li>Ability to work with development teams and provide UI support</li>
              <li>Good presentation and excellent communication skills</li>
              <li>Team player with strong analytical and problem solving skills Flexible to work in shifts Flexible to short / Long term travel / Movement.</li>
            </ul>
            <h6>Key Skills</h6>
            <div class="label-group">
              <a href="javascript:void(0);" class="label label-lg label-default"><?php echo $strSkills; ?></a>
            </div>
            <hr>
            <div class="form-group">
                <b>Industry Type : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strIndustryType; ?>
            </div>
            <hr>
            <div class="form-group">
                <b>Functional Area : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strFunctionalArea; ?>
            </div>
            <hr>
            <div class="form-group">
                <b>Desired Profile Info : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strDesiredProfileInfo; ?>
            </div>
            <hr>
            <br>
            <span><i class="fa fa-calendar" >&nbsp;&nbsp;Job Posted on </i>&nbsp;&nbsp;<?php echo date('d-m-Y',strtotime($strCreatedDate)); ?></span>
            <div class="position-footer">
             <!--  <div class="btn-group">
                <a href="javascript:void(0);" class="btn btn-secondary">Apply</a>
                <a href="javascript:void(0);" class="btn btn-inverse">Register and Apply</a>
              </div> -->
            </div>
            <div class="similar-jobs-section job-list">
              <h5>Similar Jobs <a href="javascript:void(0);" class="pull-right">View All Similar Jobs</a></h5>
              <table>
                <thead></thead>
                <tbody>
                  <?php while($rows = mysqli_fetch_assoc($result_2)) {  ?>
                  <tr>
                    <td>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="list-view">
                            <div class="list-info">
                              <h4><a href="javascript:void(0);"><?php echo $rows['job_title'].' ( '.$rows['job_description_id'].' ) '; ?></a></h4>
                              <p><?php echo $rows['emplr_company_name'] ?></p>
                              <div class="job-icons">
                                <span><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $rows['total_experience'] ?></span>
                                <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $rows['location']; ?></span>
                                <span class="full-time">Full-Time</span>
                              </div>
                              <p><i class="fa fa-money"></i>&nbsp;&nbsp;<i class="fa fa-inr"></i>&nbsp;&nbsp;<?php echo $rows['min_salary_package'] .' - '.$rows['max_salary_package'] ?></i> Annum</p>
                              <p><b>Key Skills: </b> <?php echo $rows['skills']; ?></p>
                              <p><b>Job Posted by:</b> <?php echo $rows['emplr_first_name'] .' '. $rows['emplr_last_name'] ?> <span class="time-stamp">Just now</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="sidebar col-md-3">
            <h5>Related Keywords</h5>
            <div class="keywords-wrap">
              <a href="javascript:void(0);" class="label label-simple">Visual Design</a>
              <a href="javascript:void(0);" class="label label-simple">Web design</a>
              <a href="javascript:void(0);" class="label label-simple">Logo Design</a>
              <a href="javascript:void(0);" class="label label-simple">Creative designer</a>
              <a href="javascript:void(0);" class="label label-simple">UI design</a>
              <a href="javascript:void(0);" class="label label-simple">Creative director</a>
              <a href="javascript:void(0);" class="label label-simple">IT</a>
              <a href="javascript:void(0);" class="label label-simple">UI / UX designer</a>
              <a href="javascript:void(0);" class="label label-simple">Project Manager</a>
            </div>
            <div class="job-notification">
              <div class="center-large-title">Increase your chances to get this job. Take these courses</div>
              <a title="Create Job Alert" class="btn btn-default btn-block">Know More</a>
            </div>
            <!-- <a href="javascript:void(0);" class="advertisement"><img src="../img/advertise-2.jpg" alt="Advertisement"></a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
<?php include('employee_footer.php'); ?>    