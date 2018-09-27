<?php 
error_reporting(0);
  session_start();
  require('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  // print_r($session_info);
  $strUserName = $session_info['user_name'];
  $strUserEmailAddress = $session_info['user_email_address'];
  $intUserId = $session_info['user_id'];
  //echo $id = $_GET['candidate_user_id'];

  // echo $sql_query_admin = "SELECT candidate_user_id FROM employee_registration WHERE candidate_user_id = '".$intUserId."'";
  // $result_admin = mysqli_query($connection, $sql_query_admin);
  // while ($row_admin = mysqli_fetch_assoc($result_admin)) {
  //   $intUserId = $row_admin['candidate_user_id']; 

  // }
//echo $intUserId[0];
  //Fetch all the country data
    $query_profile = "SELECT cbi.candidate_biography_desc,cu.country_name,s.state_name,c.city_name, er.candidate_user_id,er.file_path,er.candidate_first_name,er.candidate_last_name,er.date_of_birth,er.religion,er.nationality,er.candidate_mobile_no,er.candidate_email_address,ccid.candidate_address,ccid.city,ccid.state,ccid.country,ccid.zip_code FROM employee_registration as er LEFT JOIN candidate_contact_info_data as ccid ON er.candidate_user_id = ccid.candidate_user_id LEFT JOIN countries as cu ON ccid.country = cu.country_id LEFT JOIN states as s ON ccid.state = s.state_id LEFT JOIN cities as c ON ccid.city = c.city_id INNER JOIN candidate_biography_info as cbi ON cbi.candidate_user_id = er.candidate_user_id WHERE er.candidate_user_id=".$intUserId;

    //Count total number of rows
    $result_profile    = mysqli_query($connection,$query_profile);
    while($row_profile = mysqli_fetch_assoc($result_profile)) {
           $id            = $row_profile['candidate_user_id'];
           $candidatebio  = $row_profile['candidate_biography_desc'];
           $filepath      = $row_profile['file_path'];
           $firstname     = $row_profile['candidate_first_name'];
           $lastname      = $row_profile['candidate_last_name'];
           $jobtitle      = $row_profile['candidate_job_title'];
           $emailaddress  = $row_profile['candidate_email_address'];
           $phoneno       = $row_profile['candidate_mobile_no'];
           $nationality   = $row_profile['nationality'];
           $religion      = $row_profile['religion'];
           $address       = $row_profile['candidate_address'];
           $dateofbirth   = $row_profile['date_of_birth'];
           $city          = $row_profile['city_name'];
           $state         = $row_profile['state_name'];
           $country       = $row_profile['country_name'];
           $zipcode       = $row_profile['zip_code'];
            // echo "<pre>";
            // print_r($row_profile); 
            // echo "</pre>"; die;
        }
   

    $sqlquery_edu = "SELECT * FROM candidate_qualification_info WHERE candidate_user_id = 1";
    $sql_result_edu = mysqli_query($connection,$sqlquery_edu);

    $sqlquery_job = "SELECT * FROM candidate_job_experience_info WHERE candidate_user_id = 1";
    $sql_result_job = mysqli_query($connection,$sqlquery_job);

    $sqlquery_skills = "SELECT * FROM candidate_skills_info WHERE candidate_user_id = 1";
    $sql_result_skills = mysqli_query($connection,$sqlquery_skills);

    $sqlquery_socilas = "SELECT * FROM candidate_socials_sites_info WHERE candidate_user_id = 1";
    $sql_result_socilas = mysqli_query($connection,$sqlquery_socilas);
    $row_socials = mysqli_fetch_assoc($sql_result_socilas);
    
    if(isset($session_info['user_email_address'])){
        if((time()-$_SESSION['last_time']) > 60*30){
            header("Location:../logout.php");
        }else{
          $_SESSION['last_time'] = time();
        }
        }else{
            header('Location:../index.php');
        } 
?>

<?php include('admin_header.php'); ?>
    <section class="inner-banner">
      <!-- BANNER STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="margin-0">Candidate Profile</h4>
          </div>
        </div>
      </div>
      <!-- BANNER ENDS -->
    </section>
    <section class="candidate-profile">
      <div class="container">
        <div class="row">
          <div class="sidebar col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
            <div class="user-intro">
              <img src="../img/b2.png" alt="User profile wall" style="height: 150px;width: 359px;">
              <div class="candidate-info" style="width: 280px;">
                <img src="../<?php echo $filepath; ?>" style="border-radius: 100px;margin-top:-50px;" alt="Candidate" class="img-circle" width="150" height="150">
                <h4 style=""><?php echo $firstname.' '. $lastname ?></h4>
                <p style=""><?php echo $jobtitle ?></p>
                <!-- <div class="rating-star">
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div> -->
                <br>
                <div class="social-icons" style="margin-left:-75px;width:300px;">
                  <a href="<?php echo $row_socials['facebook_url']; ?>" ><i class="fa"><img src="../img/facebook.png" width="25px" height="25px"></i></a>
                  <a href="<?php echo $row_socials['twitter_url']; ?>" ><i class="fa"><img src="../img/instagram.png" width="25px" height="25px"></i></a>
                  <a href="<?php echo $row_socials['instagram_url']; ?>" ><i class="fa"><img src="../img/twitter.png" width="25px" height="25px"></i></a>
                  <a href="<?php echo $row_socials['linkedin_url']; ?>" ><i class="fa"><img src="../img/googleplus.png" width="20px" height="20px"></i></a>
              </div> 
              </div>
            </div>
            <div class="social-connect">
              <a href="javascript:void(0);" class="btn btn-special btn-block">
                <i class="fa fa-download"></i> Download Resume
              </a>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Primary Information</a>
                          </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <h6>Primary Information <span class="small pull-right"></span></h6><hr>
                              <div class="form-group">
                                  <div class="primary-info">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <i class="fa fa-user"></i><?php echo $firstname.' '. $lastname ?>
                                      </div>
                                      <div class="col-sm-5">
                                        <i class="fa fa-envelope"></i> <?php echo $emailaddress; ?>
                                      </div>
                                      <div class="col-sm-3">
                                        <i class="fa fa-mobile"></i> <?php echo $phoneno; ?>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <i class="fa fa-flag"></i> <?php echo $nationality.' , '.$religion; ?>
                                      </div>
                                      <div class="col-sm-5">
                                        <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                                      </div>
                                       <div class="col-sm-3">
                                        <i class="fa fa-calendar-o"></i> <?php echo $dateofbirth; ?>
                                      </div>
                                    </div>
                                     <div class="row">
                                       <div class="col-sm-6">
                                        <i class="fa fa-map-marker"></i> <?php echo $city.', '.$state.', '.$country.' - '.$zipcode ?>
                                      </div>
                                       <div class="col-sm-2">
                                        <input type="text" name="candidate_user_id" value="<?php echo $id ?>">
                                       </div>
                                      <!--  <div class="col-sm-3">
                                        <i class="fa fa-map-marker"></i> <?php echo $row_profile['state_name'] ?>
                                      </div>
                                      <div class="col-sm-3">
                                        <i class="fa fa-map-marker"></i> <?php echo $row_profile['country_name'] ?>
                                      </div>
                                      <div class="col-sm-3">
                                        <i class="fa fa-map-marker"></i> <?php echo $row_profile['zip_code'] ?>
                                      </div> -->
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Biography
                              </a>
                          </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Biography <span class="small pull-right"></span></h6><hr>
                             <div class="summernote"></div>
                              <div class="form-group">
                                  <div class="primary-info">
                                    <p><?php echo $candidatebio; ?></p>
                                    <p>Nam pellentesque ac orci at tempus. Nulla sed nunc scelerisque, rhoncus magna vitae, placerat nisi. Fusce convallis ex nec tellus vulputate vehicula. Duis venenatis turpis a varius lacinia. Fusce eu est lectus. Integer commodo fringilla libero, non sodales ipsum consectetur sit amet. Aenean non ligula ac est dapibus feugiat.</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Education
                            </a>
                          </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Education <span class="small pull-right"></span></h6><hr>
                             <div class="summernote"></div>
                              <div class="form-group">
                                  <div class="primary-info">
                                   <?php while ($row_edu = mysqli_fetch_assoc($sql_result_edu)) { ?>
                                      <ul class="timeline">
                                        <li>
                                            <b>Degree: </b> <?php echo $row_edu['candidate_degree_name']; ?><br>
                                            <b>Institute Name: </b> <?php echo $row_edu['candidate_institute_name']; ?><br>
                                            <b>Passing Year: </b> <?php echo $row_edu['passing_year']; ?><br>
                                            <b>Description: </b><?php echo $row_edu['candidate_qualification_desc']; ?>
                                        </li>
                                      </ul>
                                    <?php } ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Experience</a>
                          </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Experience <span class="small pull-right"></span></h6><hr>
                              <div class="form-group">
                                  <div class="primary-info">
                                   <?php while ($row_job = mysqli_fetch_assoc($sql_result_job)) { ?>
                                      <ul class="timeline">
                                        <li>
                                            <b>Job Title: </b> <?php echo $row_job['candidate_job_title']; ?><br>
                                            <b>Start Date: </b> <?php echo $row_job['start_date']; ?><br>
                                            <b>End Date: </b> <?php echo $row_job['end_date']; ?><br>
                                            <b>Description: </b><?php echo $row_job['candidate_job_desc']; ?>
                                        </li>
                                      </ul>
                                       <?php } ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Skills</a>
                          </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Skills <span class="small pull-right"></span></h6><hr>
                              <div class="form-group">
                                  <div class="primary-info">
                                    <?php while ($row_skills = mysqli_fetch_assoc($sql_result_skills)) { ?>
                                      <button type="button" class="btn btn-default" style=""><h7><?php echo $row_skills['candidate_skill']; ?></h7></button>
                                    <?php } ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
    <?php include('admin_footer.php'); ?>