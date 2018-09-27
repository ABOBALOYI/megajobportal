<?php
error_reporting(0); 
session_start();
require_once('../includes/config.php');
  $session_info      = $_SESSION['user_session_info'];
  $UserName          = $session_info['user_name'];
  $userEmailAddress  = $session_info['user_email_address'];
  $intUserId         = $session_info['user_id'];
  //echo $intEmployeeId = $_GET['candidate_user_id'];
  /* Select Query for fetching Data to show Registred Candidate List Start Here */

      $sql_query_reg_list = "SELECT * FROM employer_registration WHERE is_active = 'Approved'";
      $result_reg_list    = mysqli_query($connection, $sql_query_reg_list);

  /* Select Query for fetching Data to show Registred Candidate List End Here */

          if(isset($_SESSION['user_email_address'])){
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
<style type="text/css">
 /*table { table-layout: fixed; }
 table th, table td { overflow: hidden; }*/
</style>

<?php include('admin_header.php'); ?>
    <section class="inner-banner">
      <!-- BANNER STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="margin-0">Employer Registration List</h4>
          </div>
        </div>
      </div>
    </section>
     <!-- BANNER ENDS -->
    <section>
      <div class="flash">
          <p> 
          <?php if(isset($err_msg)) { echo $err_msg; } 
              if(isset($success_msg)) { echo $success_msg; 
            } ?>    
          </p>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- JOB LISTING & COMPANY LISTING STARTS -->
            <div class="jobs-tab-panel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Employer Registration List</a></li>
              </ul>
              <br>
              
              <table id="example" class="ui celled table-hover table-responsive table table-condensed" style="width:100%">
                <thead class="">
                    <tr>
                      <th>S No.</th>
                      <th>Full Name</th>
                      <th >User Name</th>
                      <th >Email Address</th>
                      <th >Contact No</th>
                      <th >Company Name</th>
                      <th >Website Link</th>
                      <th >Address</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $num=1; while($row_array = mysqli_fetch_assoc($result_reg_list)) { 

                        $id             = $row_array['emplr_id'];
                        $fullname       = $row_array['emplr_first_name'].' '.$row_array['emplr_last_name'];
                        $username       = $row_array['emplr_user_name'];
                        $emailaddress   = $row_array['emplr_email_address'];
                        $mobileno       = $row_array['emplr_mobile_no'];
                        $companyname    = $row_array['emplr_company_name'];
                        $weburl         = $row_array['emplr_website_name'];
                        $address        = $row_array['emplr_company_address_primary'];
                        $createddate    = $row_array['created_on'];
                    ?>
                   
                        <tr>
                          <td><?php echo $num; ?></td>
                          <td><?php echo $fullname; ?></td>
                          <td><?php echo $username; ?></td>
                          <td><?php echo $emailaddress; ?></td>
                          <td><?php echo $mobileno; ?></td>
                          <td><?php echo $companyname; ?></td>
                          <td><?php echo $weburl; ?></td>
                          <td><?php echo $address; ?></td>
                          <td><?php echo $createddate; ?></td>
                          <td>
                            <a href="" id="<?php echo $id; ?>" class="delete" title="Delete"><img src="../img/delete.png" title="Delete" width="28" height="28"></a>
                            <a href="javascript:void(0);"><img src="../img/view.png" title="View Details" style="margin-left: 30px;margin-top: -24px;"></a>
                          </td>
                        </tr>
                  <?php $num++; } ?>
                </tbody>
              </table>
            </div>
            <!-- JOB LISTING & COMPANY LISTING ENDS -->
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".delete").click(function(){
        var element = $(this);
        var del_id = this.id;
        var info = 'id=' + del_id;
        if(confirm("Are you sure you want to delete this?"))
        {
         $.ajax({
           type: "POST",
           url: "employer_delete.php",
           data: info,
           //alert(data);
           success: function(data){
                
                //this alert message does not display, 
                var message = '<div class="alert alert-success"><strong>Success!</strong> User has been Deleted successfully.</div>';  
                if(message)
                  {                   
                      $('.flash').html(message).fadeIn('slow', 8000);
                  } 
                  window.location = 'employer_registration_list.php';          
                }
              });
              // $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
              // .animate({ opacity: "hide" }, "slow");
             }
        return false;
        });
        });
  </script>
<?php include('admin_footer.php'); ?>