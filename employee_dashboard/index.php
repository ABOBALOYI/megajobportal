<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $strUserName = $session_info['candidate_user_name'];
  $strUserEmailAddress = $session_info['candidate_email_address'];
  $intUserId = $session_info['candidate_user_id'];
  $intJobID = $_GET['job_id'];
  // echo $strUserType = $session_info['user_type'];



/* Select Query for fetching Data to show Recent Jobs Start Here */
      $sql_query_recent_jobs = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                    INNER JOIN job_post_table as JBT 
                    ON ER.emplr_id = JBT.emplr_id order by JBT.job_id DESC";
      $result_recent_jobs = mysqli_query($connection, $sql_query_recent_jobs);
/* Select Query for fetching Data to show Recent Jobs End Here */

/* Select Query for fetching Data to show Recent Alerts Start Here */
      $sql_query_recent_alerts = "SELECT ER.*,JBT.* FROM `employer_registration` as ER 
                    INNER JOIN job_post_table as JBT 
                    ON ER.emplr_id = JBT.emplr_id";
      $result_recent_alerts = mysqli_query($connection, $sql_query_recent_alerts);
/* Select Query for fetching Data to show Recent Alerts End Here */

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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/favicon_usa.png" type="image/png" sizes="26x26">
    <title>USAEAD Candidate Dashboard</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 -->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link href="../css/vendors/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font API for Lato and Montserrat font families -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <!-- CSS for slick slider plugin -->
    <link href="../css/vendors/slick.css" rel="stylesheet">
    <link href="../css/vendors/slick-theme.css" rel="stylesheet">
    <!-- <link href="../css/vendors/summernote.css" rel="stylesheet"> -->
    <!-- Main Custom CSS file -->
    <link href="../css/app.css" rel="stylesheet" type="text/css" />
    
    <style>
    .abc {
     padding:8px 16px;
     border:1px solid #ccc;
     color:#333;
     font-weight:bold;
    }
    .swat { position: initial; top: 20px; left: 20px; bottom: 20px; right: 20px; padding: 10px; overflow-y: scroll; overflow-x: hidden; }

    </style>
    <style type="text/css">
      .custom-input-textarea>span {
         
          background-color: #f53157;
          font-size: 18px;
          font-weight: 700;
          line-height: 30px;
          color: #FFF;
          text-transform: uppercase;
          display: block;
          text-align: center;
        }
        .form-group-textarea {
          height: 50px;
          padding: 10px 20px;
        }
    </style>
    <style type="text/css">
      .body_back_image{
        background-image: url('http://localhost/megajobportal/img/bg.jpg');
      }
    </style>
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
            <a class="navbar-brand" href="index.php"><img src="../img/viral_usa.jpeg" width="150px" height="60px" alt="Mega Jobs Logo"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
              <li class="dropdown">
                <a href="index.php" class="" data-toggle=""> Home</a>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Jobs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="applied_job_list_details.php">Applied Job Listing</a></li>
                  <!-- <li><a href="#">Job Details</a></li> -->
                </ul>
              </li>
             <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Candidate <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <!-- <li><a href="#"> Listing</a></li> -->
                  <li><a href="employee_profile.php">Candidate Profile</a></li>
                  <li><a href="employee_resume.php">Create Resume</a></li>
                </ul>
              </li>
              <li class="dropdown pull-right">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <label><?php echo $row['first_name'].' '.$row['last_name']; ?></label>
                  <img src="../img/swat.jpg" width="40px" height="40px" style="border-radius: 50px;">
                  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../logout.php">Logout</a></li>
                  <!-- <li><a href="employee_resume.php">Create Resume</a></li> -->
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>
    <section class="banner body_back_image">
      <!-- BANNER STARTS -->
      <div class="container form-wrapper">
        <h1>JOIN US & EXPLORE THOUSANDS OF JOBS</h1>
        <div class="row">
          <div class="col-md-9">
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
          <div class="col-md-3">
            <div class="custom-input">
              <span><i class="fa fa-upload"></i> Upload Resume</span>
              <input type="file" name="resume" id="resume" />
            </div>
          </div>
        </div>
        <div class="search-category">
          <p><b>TOP CATEGORY</b> <a href="javascript:void(0);">Interior Designor</a> | <a href="javascript:void(0);">IT</a> | <a href="javascript:void(0);">KPO / BPO</a> | <a href="javascript:void(0);">Tele communication</a> | <a href="javascript:void(0);">Banking</a> | <a href="javascript:void(0);">Finance</a>
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
                <li role="presentation" class="active"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Recent Jobs</a></li>
               <!--  <li role="presentation"><a href="#employers" aria-controls="employers" role="tab" data-toggle="tab">Popular Employers</a></li> -->
              </ul>
              <!-- Tab panes -->

              <div class="tab-content">
                  <div class="row">
                    <div class="col-sm-6">
                      <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <li id="previous-page"><a href="javascript:void(0)" aria-label=Previous><span aria-hidden="true">Prev</span></a></li>
                        </ul>
                      </nav>
                    </div>
                    <div class="col-sm-4" style="margin-top: 15px;margin-left: 130px;">
                        <form class="form-inline">
                          <div class="form-group keyword">
                            <input type="text" name ="search_text" id="search_text" class="form-control" placeholder="Searching Content Here...">
                          </div>
                      </form>
                    </div>
                </div>
                <hr>
                <div role="tabpanel" class="tab-pane active swat" id="jobs" >
                  <table id="myTable" >
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
                <div class="recent-alerts">
                  <h4>Recent Alerts <a class="pull-right" href="javascript:void(0);">View All</a></h4>
                  <ul class="alert-list">
                    <li><a href="javascript:void(0);">Accenture</a> looking for AngularJS developer</li>
                    <li>Ruby developer <a href="javascript:void(0);">John Doe</a> looking for job change</li>
                    <li>Team Google looking for <a href="javascript:void(0);">IT consultant</a></li>
                    <li><a href="javascript:void(0);">John Doe</a> looking for job change</li>
                    <li><a href="javascript:void(0);">Accenture</a> looking for AngularJS developer</li>
                    <li>Ruby developer <a href="javascript:void(0);">John Doe</a> looking for job change</li>
                    <li><a href="javascript:void(0);">Team Google</a> looking for <a href="javascript:void(0);">IT consultant</a></li>
                    <li><a href="javascript:void(0);">John Doe</a> looking for job change</li>
                    <li><a href="javascript:void(0);">Accenture</a> looking for AngularJS developer</li>
                    <li>Ruby developer <a href="javascript:void(0);">John Doe</a> looking for job change</li>
                    <li><a href="javascript:void(0);">Team Google</a> looking for <a href="javascript:void(0);">IT consultant</a></li>
                    <li><a href="javascript:void(0);">John Doe</a> looking for job change</li>
                  </ul>
                </div>
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
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">brows jobs by area / category</h2>
            <form class="form-inline text-center">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Keyword (eg job Title, Position..)">
              </div>
              <div class="input-group">
                <i class="fa fa-search"></i>
                <input type="submit" name="submit" value="Search">
              </div>
              <div class="btn-group change-view">
                <a href="javascript:void(0);" class="list active"><i class="fa fa-bars"></i></a>
                <a href="javascript:void(0);" class="grid"><i class="fa fa-th-large"></i></a>
              </div>
            </form>
          </div>
        </div>
        <div class="row classic-list-view">
          <div class="col-md-3 col-sm-6">
            <ul class="job-category-list">
              <li><a href="javascript:void(0);">Finance Sector Jobs</a></li>
              <li><a href="javascript:void(0);">Banking Sector Jobs</a></li>
              <li><a href="javascript:void(0);">Mechanical Engineering Jobs</a></li>
              <li><a href="javascript:void(0);">Content Writing Jobs</a></li>
              <li><a href="javascript:void(0);">Accounting Jobs</a></li>
              <li><a href="javascript:void(0);">Interior Design Jobs</a></li>
              <li><a href="javascript:void(0);">Consulting Jobs</a></li>
              <li><a href="javascript:void(0);">Export Import Jobs</a></li>
              <li><a href="javascript:void(0);">Marketing Jobs</a></li>
              <li><a href="javascript:void(0);">Sales and Services Jobs</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <ul class="job-category-list">
              <li><a href="javascript:void(0);">Computer Engineering Jobs</a></li>
              <li><a href="javascript:void(0);">Telecommunication Jobs</a></li>
              <li><a href="javascript:void(0);">Call center Jobs</a></li>
              <li><a href="javascript:void(0);">Teacher Jobs</a></li>
              <li><a href="javascript:void(0);">Private institution Jobs</a></li>
              <li><a href="javascript:void(0);">BPO / KPO Jobs</a></li>
              <li><a href="javascript:void(0);">Airline Jobs</a></li>
              <li><a href="javascript:void(0);">Aviation Jobs</a></li>
              <li><a href="javascript:void(0);">Analytics Jobs</a></li>
              <li><a href="javascript:void(0);">Data Science Jobs</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <ul class="job-category-list">
              <li><a href="javascript:void(0);">Finance Sector Jobs</a></li>
              <li><a href="javascript:void(0);">Banking Sector Jobs</a></li>
              <li><a href="javascript:void(0);">Mechanical Engineering Jobs</a></li>
              <li><a href="javascript:void(0);">Content Writing Jobs</a></li>
              <li><a href="javascript:void(0);">Accounting Jobs</a></li>
              <li><a href="javascript:void(0);">Interior Design Jobs</a></li>
              <li><a href="javascript:void(0);">Consulting Jobs</a></li>
              <li><a href="javascript:void(0);">Export Import Jobs</a></li>
              <li><a href="javascript:void(0);">Marketing Jobs</a></li>
              <li><a href="javascript:void(0);">Sales and Services Jobs</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <ul class="job-category-list">
              <li><a href="javascript:void(0);">Computer Engineering Jobs</a></li>
              <li><a href="javascript:void(0);">Telecommunication Jobs</a></li>
              <li><a href="javascript:void(0);">Call center Jobs</a></li>
              <li><a href="javascript:void(0);">Teacher Jobs</a></li>
              <li><a href="javascript:void(0);">Private institution Jobs</a></li>
              <li><a href="javascript:void(0);">BPO / KPO Jobs</a></li>
              <li><a href="javascript:void(0);">Airline Jobs</a></li>
              <li><a href="javascript:void(0);">Aviation Jobs</a></li>
              <li><a href="javascript:void(0);">Analytics Jobs</a></li>
              <li><a href="javascript:void(0);">Data Science Jobs</a></li>
            </ul>
          </div>
        </div>
        <div class="row grid-view">
          <div class="col-sm-4">
            <div class="job-box">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="ribbon">Full Time</div>
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 45 / Hour</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="job-box">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 15000 / PA</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="job-box">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="ribbon">Full Time</div>
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 60 / Hour</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="job-box margin-0">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 50000 / PA</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="job-box margin-0">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 100 - 6000 / PA</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="job-box margin-0">
              <img src="img/team-work.jpg" alt="Team Work">
              <div class="ribbon">Full Time</div>
              <div class="job-details">
                <h4>Marketing Job</h4>
                <h5>Posted By : Lewis ellipsis text</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <span class="offer"><i class="fa fa-usd"></i> 55 / Hour</span>
                <a href="javascript:void(0);" class="pull-right mark-favorite"><i class="fa fa-star-o"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- BROWSE JOBS ENDS -->
    <!-- BLOG SECTION STARTS -->
    <!-- <section class="blog-container">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2 class="text-center">Recent from Blog</h2>
            <p class="intro-text text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum.</p>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <div class="blog-small">
                  <a href="javascript:void(0);" class="blog-image">
                    <div class="border-box"></div>
                    <img src="img/blog-img-1.jpg" alt="Blog Image 1">
                  </a>
                  <h2><a href="javascript:void(0);">Career opportunity at Google</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante</p>
                  <a href="javascript:void(0);" class="read-more">Read more</a>
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="blog-small margin-0">
                  <a href="javascript:void(0);" class="blog-image">
                    <div class="border-box"></div>
                    <img src="img/blog-img-2.jpg" alt="Blog Image 2">
                  </a>
                  <h2><a href="javascript:void(0);">Career opportunity at Google</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante</p>
                  <a href="javascript:void(0);" class="read-more">Read more</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="blog-small blog-large">
              <div class="overlay"></div>
              <div class="border-box">
                <div class="blog-details">
                  <h2><a href="javascript:void(0);">walkin at HCL</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum.</p>
                  <a href="javascript:void(0);" class="read-more">Read more</a>
                </div>
              </div>
              <img src="img/blog-img-3.jpg" alt="Blog Image 3">
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <div class="blog-small">
                  <a href="javascript:void(0);" class="blog-image">
                    <div class="border-box"></div>
                    <img src="img/blog-img-4.jpg" alt="Blog Image 4">
                  </a>
                  <h2><a href="javascript:void(0);">Career opportunity at Google</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante</p>
                  <a href="javascript:void(0);" class="read-more">Read more</a>
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="blog-small margin-0">
                  <a href="javascript:void(0);" class="blog-image">
                    <div class="border-box"></div>
                    <img src="img/blog-img-5.jpg" alt="Blog Image 5">
                  </a>
                  <h2><a href="javascript:void(0);">Career opportunity at Google</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante</p>
                  <a href="javascript:void(0);" class="read-more">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- BLOG SECTION ENDS -->
    <!-- PLANS AND PRICING STARTS -->
   <!--  <section class="plans-pricing">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2 class="text-center">job plans & pricing</h2>
            <p class="intro-text text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum.</p>
          </div>
          <div class="col-sm-4">
            <div class="plan-wrap essential">
              <div class="plan-info">
                <h1>Essential</h1>
                <h3>$5.5 <span>/per month</span></h3>
                <div class="plan-intro">
                  <p>1GB Of Space<br>
                  500 Candidate search / month<br>
                  Small social media package</p>
                </div>
                <p class="small">No setup Fee or hidden charges</p>
                <p><span>24X7 Custom Support</span> Available</p>
              </div>
              <div class="plan-details">
                <div class="content">
                  <h1>ESSENTIAL</h1>
                  <ul class="list-check">
                    <li><i class="fa fa-check fa-1x"></i> 2 Open positions at a time</li>
                    <li><i class="fa fa-check fa-1x"></i> Custom page and logo</li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Highlighted Job Posts </li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Custom Made Application form </li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Branding and Campaigning Options</li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Statistics and Reports</li>
                  </ul>
                  <a class="btn btn-default btn-sm" href="plans-and-pricing.html">Details</a>
                  <a class="btn btn-info btn-sm" href="javascript:void(0);">Order Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="plan-wrap elite">
              <div class="plan-info">
                <div class="ribbon"><span>100% Money Back</span></div>
                <h1>Elite</h1>
                <h3>$9.65 <span>/per month</span></h3>
                <div class="plan-intro">
                  <p>5GB Of Space<br>
                  1000 Candidate search / month<br>
                  Small social media package</p>
                </div>
                <p class="small">Guaranteed Custom Satisfaction</p>
                <p><span>100%</span> Money Back Guarantee</p>
              </div>
              <div class="plan-details">
                <div class="content">
                  <h1>Elite</h1>
                  <ul class="list-check">
                    <li><i class="fa fa-check fa-1x"></i> 2 Open positions at a time</li>
                    <li><i class="fa fa-check fa-1x"></i> Custom page and logo</li>
                    <li><i class="fa fa-check fa-1x"></i> Highlighted Job Posts </li>
                    <li><i class="fa fa-check fa-1x"></i> Custom Made Application form </li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Branding and Campaigning Options</li>
                    <li class="deactive"><i class="fa fa-check fa-1x"></i> Statistics and Reports</li>
                  </ul>
                  <a class="btn btn-default btn-sm" href="plans-and-pricing.html">Details</a>
                  <a class="btn btn-info btn-sm" href="javascript:void(0);">Order Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="plan-wrap extended">
              <div class="plan-info">
                <h1>Extended</h1>
                <h3>$99 <span>/per month</span></h3>
                <div class="plan-intro">
                  <p>Unlimited Space<br>
                  Unlimited Candidate search<br>
                  Complete social media package</p>
                </div>
                <p class="small">Unlimited Applications</p>
                <p><span>Security</span> Taken by Anti-virus</p>
              </div>
              <div class="plan-details">
                <div class="content">
                  <h1>Extended</h1>
                  <ul class="list-check">
                    <li><i class="fa fa-check fa-1x"></i> 2 Open positions at a time</li>
                    <li><i class="fa fa-check fa-1x"></i> Custom page and logo</li>
                    <li><i class="fa fa-check fa-1x"></i> Highlighted Job Posts </li>
                    <li><i class="fa fa-check fa-1x"></i> Custom Made Application form </li>
                    <li><i class="fa fa-check fa-1x"></i> Branding and Campaigning Options</li>
                    <li><i class="fa fa-check fa-1x"></i> Statistics and Reports</li>
                  </ul>
                  <a class="btn btn-default btn-sm" href="plans-and-pricing.html">Details</a>
                  <a class="btn btn-info btn-sm" href="javascript:void(0);">Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- PLANS AND PRICING ENDS -->
    <!-- WHY MEGA JOBS STARTS -->
   <!--  <section class="why-us padding-top-0">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2 class="text-center">Why Mega Jobs?</h2>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <ul>
                <li>Clean and corporate design</li>
                <li>Hand coded HTML FILES</li>
                <li>MULTIPLE LAYOUT OPTIONS</li>
                <li>Google Free fonts</li>
                <li>1170px grid system</li>
                <li>easy to customize</li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul>
                <li>LESS AND SASS OPTIONS AVAILABLE</li>
                <li>RESPONSIVE DESIGN</li>
                <li>fONT AWESOME ICONS INCLUDED</li>
                <li>bOOTSTRAP 3.x INCLUDED</li>
                <li>very well documented code</li>
                <li>compatible with all modern browsers</li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul>
                <li>Interested in our services?</li>
                <li><a href="javascript:void(0);">connect with us</a> or <a href="javascript:void(0);">check our pricing</a></li>
                <li class="text-center">Or</li>
                <li><a href="javascript:void(0);" class="btn btn-secondary btn-block">Explore more</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- WHY MEGA JOBS ENDS -->
    <!-- FOOTER STARTS -->
    <footer>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-sm-6" style="margin-left:425px;">
              © <a href="javascript:void(0);">USAEAD Jobs</a> All rights reserved.
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
    <script src="../js/vendors/bootstrap.min.js"></script>
    <!-- Slick slider plugin JS -->
    <script src="../js/vendors/slick.min.js"></script>
    <!-- Countdown plugin used on coming soon page -->
    <script src="../js/vendors/jquery.countdown.min.js"></script>
    <!-- Summernote Text editor plugin used on create resume page -->
    <script src="../js/vendors/summernote.min.js"></script>
    <!-- Custom Javascript code as per requirement -->
    <script src="../js/custom.js"></script>
   <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
    <script src="../js/employee_scripts.js"></script>
    
  </body>
</html>