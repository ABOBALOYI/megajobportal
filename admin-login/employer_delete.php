<?php

include('../includes/config.php');
  $session_info      = $_SESSION['user_session_info'];
  $UserName          = $session_info['user_name'];
  $userEmailAddress  = $session_info['user_email_address'];
  $intUserId         = $session_info['user_id'];
  if($_POST['id'])
    {
      $id = $_POST['id'];
      $sql = "UPDATE `employer_registration` SET is_active = 'Pending' WHERE emplr_id =".$id;
      $result_3 = mysqli_query($connection, $sql);
    }     
?>