<?php
error_reporting(0); 
session_start();
include('../includes/config.php');
  $session_info      = $_SESSION['user_session_info'];
  $UserName          = $session_info['user_name'];
  $userEmailAddress  = $session_info['user_email_address'];
  $intUserId         = $session_info['user_id'];
?>
<?php include('admin_header.php'); ?>
     <section class="banner">
      <!-- BANNER STARTS -->
      <div class="container form-wrapper">
        <h1>JOIN US & EXPLORE THOUSANDS OF JOBS</h1>
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
              <div class="input-group" style="margin-left: 1000px;margin-top: -70px;">
                <i class="fa fa-search"></i>
                <input align="" type="submit" name="submit" value="Find">
              </div>
            </form>
            <!-- JOB SEARCH FORM ENDS -->
          </div>
        </div>
        <div class="search-category">
          <p><b>TOP CATEGORY</b> <a href="javascript:void(0);">Interior Designor</a> | <a href="javascript:void(0);">IT</a> | <a href="javascript:void(0);">KPO / BPO</a> | <a href="javascript:void(0);">Tele communication</a> | <a href="javascript:void(0);">Banking</a> | <a href="javascript:void(0);">Finance</a>
        </div>
      </div>
      <!-- BANNER ENDS -->
      <!-- CLIENTS SLIDER STARTS -->
      <!-- CLIENTS SLIDER ENDS -->
    </section>
  <!-- FOOTER STARTS -->
 <?php include('admin_footer.php'); ?>   