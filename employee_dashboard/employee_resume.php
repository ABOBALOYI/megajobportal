<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  // print_r($session_info);
  $strUserName = $session_info['candidate_user_name'];
  $strUserEmailAddress = $session_info['candidate_email_address'];
  $intUserId = $session_info['candidate_user_id'];
  //$intJobID = $_GET['job_id'];
  // echo $strUserType = $session_info['user_type'];
  $sql_quest = "SELECT candidate_first_name,candidate_last_name,date_of_birth,candidate_age,nationality,religion,marital_status,gender,candidate_email_address,candidate_mobile_no FROM employee_registration WHERE candidate_user_id =".$intUserId;
  $result_quest = mysqli_query($connection, $sql_quest);
    while ($row_quest   = mysqli_fetch_assoc($result_quest)) {
      $CfirstName       = $row_quest['candidate_first_name'];
      $ClastName        = $row_quest['candidate_last_name'];
      $CemailAddress    = $row_quest['candidate_email_address'];
      $CMobileNo        = $row_quest['candidate_mobile_no'];
      $Cage             = $row_quest['candidate_age'];
      $Cdateofbirth     = $row_quest['date_of_birth'];
      $Cgender          = $row_quest['gender'];
      $CNationality     = $row_quest['nationality'];
      $CReligion        = $row_quest['religion'];
      $CMaritalStatus   = $row_quest['marital_status'];
      //print_r($row_quest); die;
    }
  //Fetch all the country data
    $query = $connection->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
    //Count total number of rows
    $rowCount = $query->num_rows;


 
    if(isset($_POST['submit'])){
          
              //echo "FSHFHG"; 
            $strCandidateBiographyDesc      = $_POST['biography_description'];
            $strCandidateFirstName          = $_POST['candidate_first_name'];
            $strCandidateLastName           = $_POST['candidate_last_name'];
            $strDateOfBirth                 = $_POST['date'];
            $strCandidateAge                = $_POST['candidate_age'];
            $strCandidateGender             = $_POST['gender'];
            $strCandidateMaritalStatus      = $_POST['marital_status'];
            $strCandidateNationality        = $_POST['candidate_nationality'];
            $strCandidateReligion           = $_POST['religion'];
            $strCountry                     = $_POST['country'];
            $strState                       = $_POST['state_name'];
            $strCity                        = $_POST['city_name'];
            $intZipCode                     = $_POST['zipcode'];
            $intCandidatePhoneNo            = $_POST['mobile_no'];
            $strCandidateEmailAddress       = $_POST['candidate_email_address'];
            $strCandidateAddress            = $_POST['candidate_address'];
            $strCandidateJobTitle           = $_POST['candidate_job_title'];
            $strStartDate                   = $_POST['start_date'];
            $strEndDate                     = $_POST['end_date'];
            $strCandidateJobExpDesc         = $_POST['job_experience_desc'];
            $strCandidateDegreeName         = $_POST['candidate_degree_name'];
            $strCandidateInstituteName      = $_POST['candidate_institute_name'];
            $strCandidatePassingYear        = $_POST['year_date'];
            $strCandidateEduExperience      = $_POST['education_experience_desc'];
            $strCandidateSkills             = $_POST['skills'];
            $strCandidateCTC                = $_POST['candidate_ctc'];
            $strCandidateExpectedCTC        = $_POST['candidate_expected_ctc'];
            $strCandidateHourlyRate         = $_POST['candidate_hourly_rate'];
            $strCandidateWorkAuthType       = $_POST['candidate_work_auth_type'];
            $strCandidateType               = $_POST['candidate_type'];
            $strCandidateWillingRelocate    = $_POST['candidate_willing_relocate'];
            $strSkillsPercentage            = $_POST['skills_percentage'];
            $strFacebook                    = $_POST['facebook'];
            $strTwitter                     = $_POST['twitter'];
            $strInstagram                   = $_POST['instagram'];
            $strlinkedin                    = $_POST['linkedin'];
            $created_by                     = $strUserName;
            $created_date                   = date("Y-m-d h:i:s");

             // File Uploading Script Start Here
             
               $target_dir = "../profile_images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] = 50000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
              // File Uploading Script End Here


            //$subject    = "Sending HTML eMail using PHPMailer.";
            //$message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";
         
          $sql_update_query = "UPDATE employee_registration SET candidate_first_name = '$strCandidateFirstName', candidate_last_name = '$strCandidateLastName', date_of_birth = '$strDateOfBirth', candidate_age = '$strCandidateAge', gender = '$strCandidateGender', marital_status = '$strCandidateMaritalStatus', nationality = '$strCandidateNationality', religion = '$strCandidateReligion' WHERE candidate_user_id = '".$intUserId."' ";
           $result_update = mysqli_query($connection, $sql_update_query);
           $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Candidate has been Resume created successfully.
                        </div>'; 

          $query_insert_resume = "INSERT INTO `candidate_biography_info` 
                  (candidate_user_id,
                  candidate_biography_desc, 
                  created_by,
                  created_date) 
                  VALUES 
                  ( '$intUserId',
                    '$strCandidateBiographyDesc', 
                    '$created_by', 
                    '$created_date');
             
                      INSERT INTO `candidate_work_auth_table` 
                        (candidate_user_id,
                        candidate_ctc, 
                        candidate_expected_ctc,
                        candidate_hourly_rate,
                        candidate_work_auth_type,
                        candidate_type,
                        candidate_willing_relocate,
                        created_by,
                        created_date)
                        VALUES 
                        ( '$intUserId',
                          '$strCandidateCTC',
                          '$strCandidateExpectedCTC',
                          '$strCandidateHourlyRate',
                          '$strCandidateWorkAuthType',
                          '$strCandidateType',
                          '$strCandidateWillingRelocate',
                          '$created_by', 
                          '$created_date');

                          INSERT INTO `candidate_socials_sites_info` 
                          (candidate_user_id,
                          facebook_url, 
                          twitter_url,
                          instagram_url,
                          linkedin_url,
                          created_by,
                          created_date)
                          VALUES 
                          ( '$intUserId',
                            '$strFacebook',
                            '$strTwitter',
                            '$strInstagram',
                            '$strlinkedin',
                            '$created_by', 
                            '$created_date');
           
                         INSERT INTO `candidate_contact_info_data` 
                          (candidate_user_id,
                          country, 
                          state,
                          city,
                          zip_code,
                          candidate_address,
                          created_by,
                          created_date) 
                          VALUES 
                          ( '$intUserId',
                            '$strCountry', 
                            '$strState',
                            '$strCity',
                            '$intZipCode',
                            '$strCandidateAddress',
                            '$created_by', 
                            '$created_date')";

                /* Candidate Education Info Add more Field Insert Query Start Here */
                      if($_POST['skills'] !=''){
                          foreach ( $_POST['skills'] as $key=>$value ) {
                          $values_1   = $intUserId;
                          $values_rel     = $value;
                          //$skillsPer  = $_POST['skills_percentage'][$key];
                          $values_2   = $created_by;
                          $values_3   = $created_date;
                   
                        $query_insert_resumes = "INSERT INTO `candidate_skills_info` 
                                      (candidate_user_id,
                                      candidate_skill,
                                      created_by,
                                      created_date) 
                                      VALUES 
                                      ( '$values_1',
                                        '$values_rel',
                                        '$values_2',
                                        '$values_3')";
                                $res = mysqli_query($connection,$query_insert_resumes);
                                 $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Candidate has been Resume created successfully.
                        </div>'; 
                          } 
                        }
              /* Candidate Skills Info Add more Field Insert Query End Here */

              /* Candidate Job Info Add more Field Insert Query Start Here */                  
                    if($_POST['candidate_job_title'] !=''){
                    foreach ( $_POST['candidate_job_title'] as $key=>$val ) {
                          $values_4   = $intUserId;
                          $values_5   = $val;
                          $values_6   = $_POST['start_date'][$key];
                          $values_7   = $_POST['end_date'][$key];
                          $values_8   = $_POST['job_experience_desc'][$key];
                          $values_9   = $created_by;
                          $values_10  = $created_date;
                   
                   $query_insert_resumes_1 = "INSERT INTO `candidate_job_experience_info` 
                              ( candidate_user_id,
                                candidate_job_title, 
                                start_date,
                                end_date,
                                candidate_job_desc,
                                created_by,
                                created_date) 
                              VALUES 
                              ( '$values_4',
                                '$values_5', 
                                '$values_6',
                                '$values_7',
                                '$values_8',
                                '$values_9', 
                                '$values_10')";
                                $res = mysqli_query($connection,$query_insert_resumes_1);
                                 $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Candidate has been Resume created successfully.
                        </div>';  
                            }
                          }
                /* Candidate Job Info Add more Field Insert Query End Here */

                /* Candidate Education Info Add more Field Insert Query Start Here */              
                if($_POST['candidate_degree_name'] !=''){
                    foreach ( $_POST['candidate_degree_name'] as $key=>$val ) {
                    $values_11 = $intUserId;
                    $values_12 = $val;
                    $values_13 = $_POST['candidate_institute_name'][$key];
                    $values_14 = $_POST['year_date'][$key];
                    $values_15 = $_POST['education_experience_desc'][$key];
                    $values_16 = $created_by;
                    $values_17 = $created_date;
                   
                 $query_insert_resumes_2 = "INSERT INTO `candidate_qualification_info`
                                  (candidate_user_id,
                                  candidate_degree_name, 
                                  candidate_institute_name,
                                  passing_year,
                                  candidate_qualification_desc,
                                  created_by,
                                  created_date) 
                                  VALUES 
                                  ( '$values_11',
                                    '$values_12', 
                                    '$values_13',
                                    '$values_14',
                                    '$values_15',
                                    '$values_16', 
                                    '$values_17')";
                             $res = mysqli_query($connection,$query_insert_resumes_2);
                                 $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Candidate has been Resume created successfully.
                        </div>';         
                         }
                        }
              /* Candidate Education Info Add more Field Insert Query End Here */

              $results = mysqli_multi_query($connection, $query_insert_resume);

                  $success_msg = '<div class="alert alert-success">
                            <strong>Success!</strong> Candidate has been Resume created successfully.
                        </div>';
                    header('location:employee_resume.php');
                    //exit();
                    mysqli_close($connection);
             
            } 

/* After 30 Monute Session has been Destroyed. */
  if(isset($_SESSION['candidate_email_address'])){
            if((time()-$_SESSION['last_time']) > 60*30){
                header("Location:../logout.php");
            }else{
              $_SESSION['last_time'] = time();
            }
        }else{
            header('Location:../index.php');
  }    
/* After 30 Monute Session has been Destroyed. */

?>

<?php include('employee_header.php'); ?>
    <!-- <section class="inner-banner"> -->
  <!-- BANNER STARTS -->
    <section class="inner-banner">
        <div id="flash-msg">
          <p> 
          <?php if(isset($success_msg)) { echo $success_msg; } 
              if(isset($err_msg)) { echo $err_msg; 
            } ?>    
          </p>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="margin-0">Candidate Create Resume</h4>
          </div>
        </div>
      </div>
    </section>
  <!-- BANNER ENDS -->
  <form method="POST" action="employee_resume.php" enctype="multipart/form-data">
    <section class="">
      <div class="container">
        <div class="row">
          <div class="sidebar col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
            <div class="user-intro">
             <!--  <img src="../img/1.jpg" alt="User profile wall"> -->
              <div class="candidate-info">
                <img src="../img/michel-brown.jpg" alt="Candidate" class="img-circle" width="150px" height="150px">
                 
                     <div class="custom-input" style="margin-left:10px;">
                       <span style="border-radius: 25px;"><i class="fa fa-upload" ></i> Upload Avatar</span>
                        <input type="file" name="fileToUpload" title="Upload Profile Image" id="fileToUpload" style="border-radius: 25px;"/>
                    </div>
                
               <!--  <h4>Swatantra Gupta</h4>
                <p>Software Developer</p>
                <hr>
                <div class="social-icons">
                  <a href="javascript:void(0);" ><i class="fa"><img src="../img/facebook.png" width="25px" height="25px"></i></a>
                  <a href="javascript:void(0);" ><i class="fa"><img src="../img/instagram.png" width="25px" height="25px"></i></a>
                  <a href="javascript:void(0);" ><i class="fa"><img src="../img/twitter.png" width="25px" height="25px"></i></a>
                  <a href="javascript:void(0);" ><i class="fa"><img src="../img/googleplus.png" width="20px" height="20px"></i></a>
              </div> -->
              <hr>
            </div> 
          </div>
            
          </div>
          <div class="col-md-8 col-sm-12">
    <!-- Accordion Start Here -->
          <div class="bs-example">
            
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Biography</a>
                          </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <h6>Biography <span class="small pull-right">Fields with * are mandetory</span></h6>
                             <div class="summernote"></div>
                              <div class="form-group">
                                    <textarea name="biography_description" class="form-control" placeholder="Please Enter About Your Self"></textarea>
                                    <span class="required">*</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Personal Info</a>
                          </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Personal Info <span class="small pull-right">Fields with * are mandetory</span></h6>
                           
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" name="candidate_first_name" class="form-control" placeholder="First Name" value="<?php echo $CfirstName; ?>" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                               <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" name="candidate_last_name" class="form-control" placeholder="Last Name" value="<?php echo $ClastName; ?>" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" id="date" name="date" placeholder="DOB (DD/MM/YYY)" class="form-control" value="<?php echo $Cdateofbirth; ?>" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="candidate_age" class="form-control" required>
                                      <option >Age</option>
                                      <option value="18" <?php if (!empty($Cage) && $Cage == '18')  echo 'selected = "selected"'; ?>>18</option>
                                      <option value="19" <?php if (!empty($Cage) && $Cage == '19')  echo 'selected = "selected"'; ?>>19</option>
                                      <option value="20" <?php if (!empty($Cage) && $Cage == '20')  echo 'selected = "selected"'; ?>>20</option>
                                      <option value="21" <?php if (!empty($Cage) && $Cage == '21')  echo 'selected = "selected"'; ?>>21</option>
                                      <option value="22" <?php if (!empty($Cage) && $Cage == '22')  echo 'selected = "selected"'; ?>>22</option>
                                       <option value="23" <?php if (!empty($Cage) && $Cage == '23')  echo 'selected = "selected"'; ?>>23</option>
                                       <option value="24" <?php if (!empty($Cage) && $Cage == '24')  echo 'selected = "selected"'; ?>>24</option>
                                       <option value="25" <?php if (!empty($Cage) && $Cage == '25')  echo 'selected = "selected"'; ?>>25</option>
                                       <option value="26" <?php if (!empty($Cage) && $Cage == '26')  echo 'selected = "selected"'; ?>>26</option>
                                       <option value="27" <?php if (!empty($Cage) && $Cage == '27')  echo 'selected = "selected"'; ?>>27</option>
                                      <option value="28" <?php if (!empty($Cage) && $Cage == '28')  echo 'selected = "selected"'; ?>>28</option>
                                       <option value="29" <?php if (!empty($Cage) && $Cage == '29')  echo 'selected = "selected"'; ?>>29</option>
                                       <option value="30" <?php if (!empty($Cage) && $Cage == '30')  echo 'selected = "selected"'; ?>>30</option>
                                      <option value="31" <?php if (!empty($Cage) && $Cage == '31')  echo 'selected = "selected"'; ?>>31</option>
                                      <option value="32" <?php if (!empty($Cage) && $Cage == '32')  echo 'selected = "selected"'; ?>>32</option>
                                      <option value="33" <?php if (!empty($Cage) && $Cage == '33')  echo 'selected = "selected"'; ?>>33</option>
                                      <option value="34" <?php if (!empty($Cage) && $Cage == '34')  echo 'selected = "selected"'; ?>>34</option>
                                      <option value="35" <?php if (!empty($Cage) && $Cage == '35')  echo 'selected = "selected"'; ?>>35</option>
                                      <option value="36" <?php if (!empty($Cage) && $Cage == '36')  echo 'selected = "selected"'; ?>>36</option>
                                      <option value="37" <?php if (!empty($Cage) && $Cage == '37')  echo 'selected = "selected"'; ?>>37</option>
                                      <option value="38" <?php if (!empty($Cage) && $Cage == '38')  echo 'selected = "selected"'; ?>>38</option>
                                      <option value="39" <?php if (!empty($Cage) && $Cage == '39')  echo 'selected = "selected"'; ?>>39</option>
                                      <option value="40" <?php if (!empty($Cage) && $Cage == '40')  echo 'selected = "selected"'; ?>>40</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="gender" class="form-control" required>
                                      <option value="">Sex</option>
                                      <option value="Male" <?php if (!empty($Cgender) && $Cgender == 'Male')  echo 'selected = "selected"'; ?>>Male</option>
                                      <option value="Female" <?php if (!empty($Cgender) && $Cgender == 'Female')  echo 'selected = "selected"'; ?>>Female</option>
                                      <option value="Others" <?php if (!empty($Cgender) && $Cgender == 'Others')  echo 'selected = "selected"'; ?>>Others</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="marital_status" class="form-control" required>
                                      <option value="">Marital Status</option>
                                      <option value="Single" <?php if (!empty($CMaritalStatus) && $CMaritalStatus == 'Single')  echo 'selected = "selected"'; ?>>Single</option>
                                       <option value="Married" <?php if (!empty($CMaritalStatus) && $CMaritalStatus == 'Married')  echo 'selected = "selected"'; ?>>Married</option>
                                       <option value="Divorcee" <?php if (!empty($CMaritalStatus) && $CMaritalStatus == 'Divorcee')  echo 'selected = "selected"'; ?>>Divorcee</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="candidate_nationality" class="form-control" required>
                                      <option value="">---Select Nationality---</option>
                                       <option value="United State" <?php if (!empty($CNationality) && $CNationality == 'United State')  echo 'selected = "selected"'; ?>>United State</option>
                                       <option value="Canada" <?php if (!empty($CNationality) && $CNationality == 'Canada')  echo 'selected = "selected"'; ?>>Canada</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="religion" class="form-control" required>
                                      <option value="">---Select Religion---</option>
                                      <option value="Hindu" <?php if (!empty($CReligion) && $CReligion == 'Hindu')  echo 'selected = "selected"'; ?>>Hindu</option>
                                      <option value="Muslim" <?php if (!empty($CReligion) && $CReligion == 'Muslim')  echo 'selected = "selected"'; ?>>Muslim</option>
                                      <option value="Sikh" <?php if (!empty($CReligion) && $CReligion == 'Sikh')  echo 'selected = "selected"'; ?>>Sikh</option>
                                      <option value="Christian" <?php if (!empty($CReligion) && $CReligion == 'Christian')  echo 'selected = "selected"'; ?>>Christian</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Work Authorization Info Block Start Here -->
                    
                     <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Work Authorization Info</a>
                          </h4>
                      </div>
                      <div id="collapseSeven" class="panel-collapse collapse">
                          <div class="panel-body">
                            <h6>Work Authorization Info <span class="small pull-right">Fields with * are mandetory</span></h6>
                           
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="text" name="candidate_ctc" class="form-control" placeholder="Current CTC ($)" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                               <div class="col-sm-6">
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="text" name="candidate_expected_ctc" class="form-control" placeholder="Expected CTC ($)" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                  <div class="form-group input-group">
                                   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="text" id="" name="candidate_hourly_rate" placeholder="Hourly Rate in ($)" class="form-control" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="candidate_work_auth_type" class="form-control" required>
                                      <option value="">Work Type (Auth)</option>
                                      <option value="US Citizen">US Citizen</option>
                                      <option value="Canadian Citizen">Canadian Citizen</option>
                                      <option value="Green Card Holder">Green Card Holder</option>
                                      <option value="Employment Auth Document">Employment Auth Document</option>
                                      <option value="TN Permit Holder">TN Permit Holder</option>
                                      <option value="Canadian Citizen">Canadian Citizen</option>
                                      <option value="Have H1 VISA">Have H1 VISA</option>
                                      <option value="Need H1 VISA">Need H1 VISA</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <label><i class="fa fa-user" style="color:red;"></i> Candidate Type:</label>
                                  <div class="form-group">
                                    <label class="radio-inline">
                                      <input type="radio"  value="1st Party" name="candidate_type" />1st Party
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio"  value="3rd Party" name="candidate_type"  />3rd Party
                                    </label>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                   <label><i class="material-icons" style="font-size:20px;color:red">transfer_within_a_station</i> Willing to Relocate: </label>
                                 <div class="form-group">
                                   <label class="radio-inline">
                                      <input type="radio"  value="Yes" name="candidate_willing_relocate" />Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio"  value="No" name="candidate_willing_relocate"  />No
                                    </label>
                                  </div>
                                  </div>
                                </div>
                             
                              <!-- <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="candidate_nationality" class="form-control" required>
                                      <option value="">---Select Nationality---</option>
                                      <option value="United State">United State</option>
                                      <option value="Canadian">Canadian</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="candidate_religion" class="form-control" required>
                                      <option value="">---Select Religion---</option>
                                      <option value="Hindu">Hindu</option>
                                      <option value="Muslim">Muslim</option>
                                      <option value="Sikh">Sikh</option>
                                      <option value="Christian">Christian</option>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div> -->
                          </div>
                      </div>
                  </div>

                  <!-- Work Authorization Info Block End Here -->

                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Contact Info</a>
                          </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body">
                             <h6>Contact Information <span class="small pull-right">Fields with * are mandetory</span></h6>
                           
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="country" id="country" class="form-control" required>
                                      <option value="">---Select Country---</option>
                                         <?php
                                              if($rowCount > 0){
                                                  while($row = $query->fetch_assoc()){ 
                                                      echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
                                                  }
                                              }else{
                                                  echo '<option value="">---Country not Available---</option>';
                                              }
                                              ?>
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="state_name" class="form-control" id="state" required>
                                      <option value="">---Select State---</option>
                                     
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group custom-select">
                                    <select name="city_name" class="form-control" id="city" required>
                                      <option value="">---Select City---</option>
                                      
                                    </select>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" name="zipcode" class="form-control" placeholder="Zip Code" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <textarea name="candidate_address" class="form-control" placeholder="Address"></textarea>
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Job Experience Info</a>
                          </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                          <div class="panel-body field_wrapper">
                              <div class="row ">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="text" name="candidate_job_title[]" class="form-control" placeholder="Job title" />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" name="start_date[]" id="start_date" class="form-control" placeholder="Start Date (dd-mm-yyyy)" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="text" name="end_date[]" id="end_date" class="form-control" placeholder="End Date (dd-mm-yyyy)" required />
                                    <span class="required">*</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                               <!--  <div class="summernote"></div> -->
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <textarea name="job_experience_desc[]" class="form-control" placeholder="Job Experience Description"></textarea>
                                      <span class="required">*</span>
                                    </div>
                                </div>
                              </div>
                              <br>
                              <a href="javascript:void(0);" class="add_button" title="Add Job Experience">Add One More Job Experience <img src="../img/add.png" class="pull-right"></a>
                              <hr>
                          </div>
                      </div>
                  </div>
                   <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Qualification Info</a>
                          </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse">
                          <div class="panel-body field_wrapper_education">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input type="text" name="candidate_degree_name[]" class="form-control" placeholder="Degree" />
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="candidate_institute_name[]" class="form-control" placeholder="Scholl / College Name" required />
                                      <span class="required">*</span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="year_date[]" class="form-control" placeholder="Year of passing" required />
                                      <span class="required">*</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea name="education_experience_desc[]" class="form-control" placeholder="Qualification Description"></textarea>
                                      <span class="required">*</span>
                                    </div>
                                  </div>
                                </div>
                                 <br>
                              <a href="javascript:void(0);" class="add_button_education" title="Add Education Experience">Add One More Qualification <img src="../img/add.png" class="pull-right"></a>
                              <hr>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Skills Info</a>
                          </h4>
                      </div>
                      <div id="collapseSix" class="panel-collapse collapse">
                          <div class="panel-body field_wrapper_skills">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" name="skills[]" class="form-control" placeholder="Skills" />
                                  </div>
                                </div>
                                <a href="javascript:void(0);" class="add_button_skills" title="Add Skills"><img src="../img/add.png" class="pull-right" style="margin-top:12px;margin-right: 350px;"></a>
                              </div>
                          </div>
                      </div>
                  </div> 
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Socials Sites Link Info</a>
                          </h4>
                      </div>
                      <div id="collapseEight" class="panel-collapse collapse">
                          <div class="panel-body">
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" name="facebook" class="form-control" placeholder="Please Eneter Your Profile URL" />
                                  </div>
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" name="twitter" class="form-control" placeholder="Please Eneter Your Profile URL" />
                                  </div>
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    <input type="text" name="instagram" class="form-control" placeholder="Please Eneter Your Profile URL" />
                                  </div>
                                  <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                    <input type="text" name="linkedin" class="form-control" placeholder="Please Eneter Your Profile URL" />
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div> 
              </div>
              <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
            </div> 
          <!-- Accordion End Here-->
          </div>
        </div>
      </div>
    </section>
</form>
    <!-- FOOTER STARTS -->
    <?php include('employee_footer.php'); ?>