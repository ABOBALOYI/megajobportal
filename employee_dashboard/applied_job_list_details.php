<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $strUserName = $session_info['candidate_user_name'];
  $strUserEmailAddress = $session_info['candidate_email_address'];
  $intUserId = $session_info['candidate_user_id'];
 
  // echo $strUserType = $session_info['user_type'];

/* Select Query for fetching Data to show Recent Jobs Start Here */
      $sql_query_recent_jobs = "SELECT AJT.*,JBT.* FROM `job_applied_table` as AJT 
                    INNER JOIN job_post_table as JBT 
                    ON AJT.job_id = JBT.job_id WHERE AJT.user_id = '".$intUserId."'";
      $result_recent_jobs = mysqli_query($connection, $sql_query_recent_jobs);
/* Select Query for fetching Data to show Recent Jobs End Here */

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
    <section class="inner-banner">
      <!-- BANNER STARTS -->
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="margin-0">Candidate Applied Job List</h4>
          </div>
        </div>
      </div>
      <!-- BANNER ENDS -->
      <!-- CLIENTS SLIDER STARTS -->
     <!--  <div class="client-slider">
        <div class="container">
          <div class="clients slider">
            <div>
              <img src="img/client-hp.png" alt="Client Logo 1">
            </div>
            <div>
              <img src="img/client-google.png" alt="Client Logo 2">
            </div>
            <div>
              <img src="img/client-at-and-t.png" alt="Client Logo 3">
            </div>
            <div>
              <img src="img/client-infosys.png" alt="Client Logo 4">
            </div>
            <div>
              <img src="img/client-tata.png" alt="Client Logo 5">
            </div>
            <div>
              <img src="img/client-hp.png" alt="Client Logo 1">
            </div>
            <div>
              <img src="img/client-google.png" alt="Client Logo 2">
            </div>
            <div>
              <img src="img/client-at-and-t.png" alt="Client Logo 3">
            </div>
            <div>
              <img src="img/client-infosys.png" alt="Client Logo 4">
            </div>
            <div>
              <img src="img/client-tata.png" alt="Client Logo 5">
            </div>
            <div>
              <img src="img/client-hp.png" alt="Client Logo 1">
            </div>
            <div>
              <img src="img/client-google.png" alt="Client Logo 2">
            </div>
            <div>
              <img src="img/client-at-and-t.png" alt="Client Logo 3">
            </div>
            <div>
              <img src="img/client-infosys.png" alt="Client Logo 4">
            </div>
            <div>
              <img src="img/client-tata.png" alt="Client Logo 5">
            </div>
          </div>
        </div>
      </div> -->
      <!-- CLIENTS SLIDER ENDS -->
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <!-- JOB LISTING & COMPANY LISTING STARTS -->
            <div class="jobs-tab-panel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Applied Job List</a></li>
               <!--  <li role="presentation"><a href="#employers" aria-controls="employers" role="tab" data-toggle="tab">Popular Employers</a></li> -->
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="jobs">
                  <table>
                    <thead></thead>
                      <tbody>
                        <?php while($row = mysqli_fetch_assoc($result_recent_jobs)) {  ?>
                        <tr>
                          <td>
                             <div class="job-list">
                              <div class="list-view">
                                <a href="employee_job_detail_list.php?job_id=<?php echo $row['job_id'] ?>" target="_blank"><img src="<?php echo $row['logo_path']; ?>" alt="Company Logo 01"></a>
                                <div class="list-info job-list-info">
                                  <h4><a href="employee_job_detail_list.php?job_id=<?php echo $row['job_id'] ?>" target="_blank"><?php echo $row['job_title']; ?></a></h4>
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
            </div>
            <!-- JOB LISTING & COMPANY LISTING ENDS -->
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <!-- RECENT JOB ALERTS STARTS -->
                <!-- <div class="recent-alerts">
                  <h4>Recent Alerts <a class="pull-right" href="javascript:void(0);">View All</a></h4>
                  <table>
                    <tbody>
                      <tr>
                        <td>
                          <ul class="alert-list">
                             <?php while($rows = mysqli_fetch_assoc($result_recent_alerts)) { ?>
                            <li><a href="javascript:void(0);"><?php echo $rows['emplr_company_name']; ?></a> looking for <?php echo $rows['job_title']; ?></li>
                            <?php } ?>
                          </ul>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div> -->
                <!-- RECENT JOB ALERTS ENDS -->
              </div>
              <div class="col-md-12 col-sm-6">
                <!-- JOB NOTIFICATION STARTS -->
                <div class="job-notification">
                  <div class="center-large-title">Get best matched jobs on your email. No registration needed</div>
                  <a title="Create Job Alert" class="btn btn-primary btn-block">Create a Job Alert</a>
                </div>
                <!-- JOB NOTIFICATION ENDS -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- BROWSE JOBS STARTS -->
    <!-- <section class="browse-jobs">
     
    </section> -->
    <!-- BROWSE JOBS ENDS -->
    <!-- BLOG SECTION STARTS -->
    
    <!-- WHY MEGA JOBS ENDS -->
    <!-- FOOTER STARTS -->
    <?php include('employee_footer.php'); ?>