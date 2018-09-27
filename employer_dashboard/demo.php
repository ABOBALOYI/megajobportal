<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $userName = $session_info['emplr_user_name'];
  $intUserId = $session_info['emplr_id'];
  $intJobID = $_GET['job_id'];
  // echo $strUserType = $session_info['user_type'];
  $sql_query_2 = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                INNER JOIN job_post_table as JBT 
                ON ER.emplr_id = JBT.emplr_id";
  $result_2 = mysqli_query($connection, $sql_query_2);


  $sql_query = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                INNER JOIN job_post_table as JBT 
                ON ER.emplr_id = JBT.emplr_id WHERE job_id = $intJobID ";
  $result = mysqli_query($connection, $sql_query);
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $strJobTitle            = $row['job_title'];
                $strSearchLocation      = $row['location'];
                $intZipcode             = $row['zipcode'];
                $strMaxQualification    = $row['max_qualification'];
                $intMinSalaryPackage    = $row['min_salary_package'];
                $intMaxSalaryPackage    = $row['max_salary_package'];
                $intNoticePeriod        = $row['job_notice_period'];
                $strFunctionalArea      = $row['functional_area'];
                $strIndustryType        = $row['industry_type'];
                $strJobType             = $row['job_type'];
                $strCertificate         = $row['certificate_info_1'];
                $strSpokenLanguage      = $row['spoken_language'];
                $strSkills              = $row['skills'];
                $strJoiningFacilities   = $row['joining_facilities'];
                $strJobSummary          = $row['job_summary'];
                $strJobDescription      = $row['job_description'];
                $strCompanyName         = $row['emplr_company_name'];
                $intMobileNo            = $row['emplr_mobile_no'];
                $strLogoPath            = $row['logo_path'];
                $intJobId               = $row['job_id'];
                $strAddress1            = $row['emplr_company_address_primary'];
                $strAddress2            = $row['emplr_company_address_secondary'];
                $strCreatedDate         = $row['created_on'];
                $strTotalExperience     = $row['total_experience'];
                $strJobDescriptionID    = $row['job_description_id'];
                $strDesiredProfileInfo  = $row['desired_profile_info'];

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

<?php include('employer_header.php'); ?>
    <section class="inner-banner padding-bottom-0">
      <!-- BANNER STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- JOB SEARCH FORM STARTS -->
            <form class="form-inline">
              <div class="form-group keyword">
                <input type="text" class="form-control" placeholder="Keyword (eg job Title, Position..)">
              </div>
              <div class="form-group keyword hidden-xs">
                <input type="text" class="form-control" placeholder="Job Location (eg City, Country..)">
              </div>
              <div class="form-group keyword hidden-xs">
                <input type="text" class="form-control" placeholder="Type of Industry">
              </div>
              <div class="input-group">
                <i class="fa fa-search"></i>
                <input type="submit" name="submit" value="Find">
              </div>
            </form>
            <!-- JOB SEARCH FORM ENDS -->
          </div>
        </div>
        <div class="position-intro">
          <div class="row">
            <div class="col-md-2">
              <a href="javascript:void(0);"><img src="<?php echo $strLogoPath; ?>" alt="Company Logo 01"></a>
            </div>
            <div class="col-md-10">
              <div class="company-info">
                <h1><?php echo $strJobTitle; ?> (<?php echo $strJobDescriptionID; ?>)</h1> 
                <p><?php echo $strCompanyName; ?></p>
                <div class="job-icons">
                  <span><i class="fa fa-briefcase">&nbsp;&nbsp;<?php echo $strTotalExperience; ?></i></span>
                  <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $strSearchLocation ?></span>
                  <span><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo '+91-' .$intMobileNo; ?></span><br>
                  <span><i class="fa fa-cogs" ></i>&nbsp;&nbsp;<?php echo $strSkills; ?></span><br>
                  <span><i class="fa fa-money" ></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-inr" >&nbsp;&nbsp;<?php echo $intMinSalaryPackage .' - '.$intMaxSalaryPackage ?></i> LPA</span><br>
                  <span><i class="fa fa-calendar" >&nbsp;&nbsp;Job Posted on </i>&nbsp;&nbsp;<?php echo date('d-m-Y',strtotime($strCreatedDate)); ?></span>
                  <input type="hidden" name="job_id" value="<?php echo $intJobId; ?>" />
                </div>
                <div class="row">
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
                </div>
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
            <h5>Detail Information <a href="javascript:void(0);" class="pull-right">Other companies like this</a></h5>
            <h6>Job Summary</h6>
            <div class="well"><?php echo $strJobSummary; ?></div>
            <h6>Job Description</h6>
            <div class="well"><?php echo $strJobDescription; ?></div>
            <div class="form-group">
                <b>Industry Type : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strIndustryType; ?>
            </div>
            <div class="form-group">
                <b>Functional Area : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strFunctionalArea; ?>
            </div>
            <div class="form-group">
                <b>Job Role : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strJobTitle; ?>
            </div>
             <div class="form-group">
                <b>Employment Type : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strJobType; ?>
            </div>
            <div class="form-group">
                <b>Desired Profile Info : </b>
                 &nbsp;&nbsp;&nbsp;<?php echo $strDesiredProfileInfo; ?>
            </div>
            <div class="form-group">
               <input type="submit" name="apply_job" class="btn btn-primary pull-right" value="Apply Job">
            </div>
            <br>
            <br>
            <br>
            <div class="similar-jobs-section">
              <h5>Current Openings <a href="javascript:void(0);" class="pull-right"><!-- View All Openings --></a></h5>
               <table>
              <thead></thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result_2)) {  ?>
                  <tr>
                    <td>
                       <div class="job-list">
                        <div class="list-view">
                          <a href="employer_job_detail_list.php?job_id=<?php echo $row['job_id'] ?>" target="_blank"><img src="<?php echo $row['logo_path']; ?>" alt="Company Logo 01"></a>
                          <div class="list-info job-list-info">
                            <h4><a href="employer_job_detail_list.php?job_id=<?php echo $row['job_id'] ?>" target="_blank"><?php echo $row['job_title']; ?></a></h4>
                            <p><?php echo $row['emplr_company_name']; ?></p>
                            <div class="job-icons">
                              <span><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $row['total_experience']; ?></span>
                              <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $row['location']; ?></span>
                              <span><i class="fa fa-money"></i>&nbsp;&nbsp;<i class="fa fa-inr">&nbsp;&nbsp;<?php echo $row['min_salary_package']. ' - '. $row['max_salary_package']; ?></i> ANNUM</span>
                              <span class="full-time"><?php echo $row['job_type']; ?></span>
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
            <!-- <h5>Related Keywords</h5> -->
            <!-- <div class="keywords-wrap">
              <a href="javascript:void(0);" class="label label-simple">Visual Design</a>
              <a href="javascript:void(0);" class="label label-simple">Web design</a>
              <a href="javascript:void(0);" class="label label-simple">Logo Design</a>
              <a href="javascript:void(0);" class="label label-simple">Creative designer</a>
              <a href="javascript:void(0);" class="label label-simple">UI design</a>
              <a href="javascript:void(0);" class="label label-simple">Creative director</a>
              <a href="javascript:void(0);" class="label label-simple">IT</a>
              <a href="javascript:void(0);" class="label label-simple">UI / UX designer</a>
              <a href="javascript:void(0);" class="label label-simple">Project Manager</a>
            </div> -->
           <!--  <div class="job-notification">
              <div class="center-large-title">Increase your chances to get this job. Register Here</div>
              <a title="Create Job Alert" class="btn btn-default btn-block">Know More</a>
            </div>
            <a href="javascript:void(0);" class="advertisement"><img src="img/advertise-2.jpg" alt="Advertisement"></a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
<?php include('employer_footer.php'); ?>    