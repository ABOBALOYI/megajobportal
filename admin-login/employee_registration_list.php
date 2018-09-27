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

      $sql_query_reg_list = "SELECT * FROM employee_registration WHERE is_active = 'Approved'";
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


<?php include('admin_header.php'); ?>
    <section class="inner-banner">
      <!-- BANNER STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="margin-0">Candidate Registration List</h4>
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
                <li role="presentation" class="active"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Candidate Registration List</a></li>
              </ul>
              <br>
              <table id="example" class="ui celled table table-stripped table-hover" style="width:100%">
                <thead>
                    <tr>
                      <th>S No.</th>
                      <th>Full Name</th>
                      <th>Email Address</th>
                      <th>Contact No</th>
                      <th>Current Location</th>
                      <th>Experience</th>
                      <th>Avatar</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $num=1; while($row_array = mysqli_fetch_assoc($result_reg_list)) {
                        $id             = $row_array['candidate_user_id'];
                        $firstname      = $row_array['candidate_first_name'];
                        $lastname       = $row_array['candidate_last_name'];
                        $emailaddress   = $row_array['candidate_email_address'];
                        $mobileno       = $row_array['candidate_mobile_no'];
                        $location       = $row_array['candidate_current_location'];
                        $experience     = $row_array['candidate_total_experience'];
                        $filepath       = $row_array['file_path'];
                        $createddate    = $row_array['created_date'];
                        //print_r($row_array);

                   ?>
                            
                        <tr>
                          <td><?php echo $num; ?></td>
                          <td><?php echo $firstname.' '.$lastname; ?></td>
                          <td><?php echo $emailaddress; ?></td>
                          <td><?php echo $mobileno; ?></td>
                          <td><?php echo $location; ?></td>
                          <td><?php echo $experience; ?></td>
                          <td><img src="../<?php echo $filepath; ?>" width="40px" height="40px"></td>
                          <td><?php echo $createddate; ?></td>
                          <td>
                          <a href=" " id="<?php echo $id; ?>" class="delete" title="Delete"><img src="../img/delete.png" title="Delete" width="28" height="28"><a>
                          <a href="employee_profile.php?EmpID=<?php echo $id; ?>" id="" target="_blank" class="view" title="view"><img src="../img/view.png" title="View Details"></a>
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
           url: "employee_delete.php",
           data: info,
           //alert(data);
           success: function(data){
                
                //this alert message does not display, 
                var message = '<div class="alert alert-success"><strong>Success!</strong> User has been Deleted successfully.</div>';  
                if(message)
                  {                   
                      $('.flash').html(message).fadeIn('slow', 8000);
                  } 
                  window.location = 'employee_registration_list.php';          
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