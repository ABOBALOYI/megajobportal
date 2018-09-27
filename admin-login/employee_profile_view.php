<?php
include('../includes/config.php');
  $session_info      = $_SESSION['user_session_info'];
  $UserName          = $session_info['user_name'];
  $userEmailAddress  = $session_info['user_email_address'];
  $intUserId         = $session_info['user_id'];
  if($_POST['id'])
    {
      $id = $_POST['id'];
      $sql_qu = "SELECT ER.file_path,CPI.candidate_profile_image,CPI.candidate_first_name,CPI.candidate_last_name,CPI.date_of_birth,CPI.candidate_nationality,CBI.candidate_biography_desc,
      CCID.candidate_phone_no,CCID.candidate_email_address,CCID.candidate_address,CCID.city,
      CCID.state,CCID.country,CCID.zip_code,C.city_name,S.state_name,CU.country_name FROM employee_registration as ER 
      LEFT JOIN candidate_personal_info as CPI ON ER.candidate_user_id = CPI.candidate_user_id
      LEFT JOIN candidate_biography_info as CBI ON CBI.candidate_user_id = CPI.candidate_user_id
      LEFT JOIN candidate_contact_info_data as CCID ON CCID.candidate_user_id = CPI.candidate_user_id
      LEFT JOIN countries as CU ON CCID.country = CU.country_id 
      LEFT JOIN states as S ON CCID.state = S.state_id 
      LEFT JOIN cities as C ON CCID.city = C.city_id WHERE CPI.candidate_user_id =".$id;
      $result_4 = mysqli_query($connection, $sql_qu);
    }      
?>
