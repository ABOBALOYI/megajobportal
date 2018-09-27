<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <a href="index.php" class="footer-logo"><img src="../img/footer-logo.png" alt="Mega Jobs Logo"></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt diam in ex dictum scelerisque. Fusce consequat enim sed libero tincidunt, sed pulvinar ante dictum. Phasellus et bibendum lorem. Pellentesque non nulla quis nibh pulvinar eleifend. Nullam id lacus ut urna</p>
            <ul class="social-links">
              <li>
                <a href="javascript:void(0);" class="fa fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-linkedin"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-google-plus"></a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-lg-offset-1 col-md-3 col-sm-6">
            <h5>Trending Jobs</h5>
            <ul class="quick-links">
              <li><a href="javascript:void(0);">Android Developer</a></li>
              <li><a href="javascript:void(0);">PHP Developer</a></li>
              <li><a href="javascript:void(0);">Marketing Executive</a></li>
              <li><a href="javascript:void(0);">Full Stack developer</a></li>
              <li><a href="javascript:void(0);">Frontend Developer</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6">
            <h5>Quick Links</h5>
            <ul class="quick-links">
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="javascript:void(0);">How it work's</a></li>
              <li><a href="plans-and-pricing.html">Pricing</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="copyright">
          <div class="row">
            <div class="col-sm-6">
              © <a href="javascript:void(0);">Mega Jobs</a>, 2017 All rights reserved.
            </div>
            <div class="col-sm-6 author-info">
              Created by <a href="javascript:void(0);">pixshed</a>. Premium themes and templates.
            </div>
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
   <!-- Add Multiple Job Experience Field Script Start Here --> 
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="panel-body field_wrapper"><div class="row"><div class="col-md-12"><div class="form-group"><input type="text" name="candidate_job_title[]" class="form-control" placeholder="Job title" /></div></div></div><div class="row"><div class="col-sm-6"><div class="form-group"><input type="text" name="start_date[]" class="form-control" placeholder="Start Date (dd-mm-yyyy)" required /><span class="required">*</span></div></div><div class="col-sm-6"><div class="form-group"><input type="text" name="end_date[]" class="form-control" placeholder="End Date (dd-mm-yyyy)" required /><span class="required">*</span></div></div></div><div class="row"><div class="col-md-12"><div class="form-group"><textarea name="job_experience_desc[]" class="form-control" placeholder="Job Experience Description"></textarea><span class="required">*</span></div></div></div><a href="javascript:void(0);" class="remove_button"><br><img src="../img/remove.png" class="pull-right"/></a><hr></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
<!-- Add Multiple Job Experience Field Script End Here --> 

 <!-- Add Multiple Education Experience Field Script Start Here --> 
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button_education'); //Add button selector
            var wrapper = $('.field_wrapper_education'); //Input field wrapper
            var fieldHTML = '<div class="panel-body field_wrapper_education"><div class="row"><div class="col-md-12"><div class="form-group"><input type="text" name="candidate_degree_name[]" class="form-control" placeholder="Degree" /></div></div></div><div class="row"><div class="col-sm-6"><div class="form-group"><input type="text" name="candidate_institute_name[]" class="form-control" placeholder="Scholl / College Name" required /><span class="required">*</span></div></div><div class="col-sm-6"><div class="form-group"><input type="text" name="year_date[]" class="form-control" placeholder="Year of passing" required /><span class="required">*</span></div></div></div><div class="row"><div class="col-md-12"><div class="form-group"><textarea name="education_experience_desc[]" class="form-control" placeholder="Address"></textarea><span class="required">*</span></div></div></div><br><a href="javascript:void(0);" class="remove_button_education"><img src="../img/remove.png" class="pull-right"/></a><hr></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button_education', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
<!-- Add Multiple Education Experience Field Script End Here -->

 <!-- Add Multiple Skills Script Start Here --> 
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 20; //Input fields increment limitation
            var addButton = $('.add_button_skills'); //Add button selector
            var wrapper = $('.field_wrapper_skills'); //Input field wrapper
            var fieldHTML = '<div class="row"><div class="col-md-6"><div class="form-group"><input type="text" name="skills[]" class="form-control" placeholder="Skills" /></div></div><a href="javascript:void(0);" class="remove_button_skills" title="Remove Skills"><img src="../img/remove.png" class="pull-right" style="margin-top:12px;margin-right: 350px;"></a></div>'; 
            //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button_skills', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $("#flash-msg").delay(2000).fadeOut("slow");
          $("#checkmsg").delay(2000).fadeOut("slow");
          $("#uplod").delay(2000).fadeOut("slow");
          $("#dismiss").delay(2000).fadeOut("slow");
      });
     </script>
<!-- Add Multiple Skills Script End Here --> 

      <!-- Country, State and City dependent Script Start Here --> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
          $('#country').on('change',function(){
              var countryID = $(this).val();
              if(countryID){
                  $.ajax({
                      type:'POST',
                      url:'ajaxData.php',
                      data:'country_id='+countryID,
                      success:function(html){
                          $('#state').html(html);
                          $('#city').html('<option value="">Select state first</option>'); 
                      }
                  }); 
              }else{
                  $('#state').html('<option value="">Select country first</option>');
                  $('#city').html('<option value="">Select state first</option>'); 
              }
          });
          
          $('#state').on('change',function(){
              var stateID = $(this).val();
              if(stateID){
                  $.ajax({
                      type:'POST',
                      url:'ajaxData.php',
                      data:'state_id='+stateID,
                      success:function(html){
                          $('#city').html(html);
                      }
                  }); 
              }else{
                  $('#city').html('<option value="">Select state first</option>'); 
              }
          });
      });
      </script>
      <!-- Country, State and City dependent Script End Here -->
    
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      <script type="text/javascript">
        $(document).ready(function(){       
              var date_input=$('input[name="date"]'); //our date input has the name "date"
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
              };
              date_input.datepicker(options);
          });
      </script>
       <script type="text/javascript">
        $(document).ready(function(){       
              var date_input=$('input[name="start_date[]"]'); //our date input has the name "date"
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
              };
              date_input.datepicker(options);
          });
      </script>
       <script type="text/javascript">
        $(document).ready(function(){       
              var date_input=$('input[name="end_date[]"]'); //our date input has the name "date"
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
              };
              date_input.datepicker(options);
          });
      </script> 
      <script type="text/javascript">
        $(document).ready(function(){       
              var date_input=$('input[name="year_date[]"]'); //our date input has the name "date"
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
              };
              date_input.datepicker(options);
          });
      </script>     
  </body>
</html>