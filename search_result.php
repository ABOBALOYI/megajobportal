<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar Dropdown Login and Signup Form with Social Buttons</title>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  body{
    font-family: 'Cambria', sans-serif;
  }
  .form-control {
    box-shadow: none;   
    font-weight: normal;
    font-size: 13px;
  }
  .form-control:focus {
    border-color: #33cabb;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
  }
  .navbar-header.col {
    padding: 0 !important;
  } 
  .navbar {
    background: #344154;
    padding-left: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #dfe3e8;
    border-radius: 0;
  }
  .nav-link img {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    margin: -8px 0;
    float: left;
    margin-right: 10px;
  }
  .navbar .navbar-brand, .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
    padding-left: 0;
    font-size: 20px;
    padding-right: 50px;
  }
  .navbar .navbar-brand b {
    font-weight: bold;
    color: #33cabb;   
  }
  .navbar .form-inline {
        display: inline-block;
    }
  .navbar .nav li {
    position: relative;
  }
  .navbar .nav li a {
    color: #aaa5a5;
  }
  .search-box {
        position: relative;
    } 
    .search-box input {
        padding-right: 35px;
    border-color: #dfe3e8;
        border-radius: 4px !important;
    box-shadow: none
    }
  .search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
    height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
    font-size: 19px;
    }
  .navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
    color: #fff;
    background: #33cabb;
    padding-top: 8px;
    padding-bottom: 6px;
    vertical-align: middle;
    border: none;
      } 
      .navbar .nav .btn-primary:hover, .navbar .nav .btn-primary:focus {    
        color: #fff;
        outline: none;
        background: #31bfb1;
      }
      .navbar .navbar-right li:first-child a {
        padding-right: 30px;
      }
      .navbar .nav-item i {
        font-size: 18px;
      }
      .navbar .dropdown-item i {
        font-size: 16px;
        min-width: 22px;
      }
      .navbar ul.nav li.active a, .navbar ul.nav li.open > a {
        background: transparent !important;
      } 
      .navbar .nav .get-started-btn {
        min-width: 120px;
        margin-top: 8px;
        margin-bottom: 8px;
      }
      .navbar ul.nav li.open > a.get-started-btn {
        color: #fff;
        background: #31bfb1 !important;
      }
      .navbar .dropdown-menu {
        border-radius: 1px;
        border-color: #e5e5e5;
        box-shadow: 0 2px 8px rgba(0,0,0,.05);
      }
      .navbar .nav .dropdown-menu li {
        color: #999;
        font-weight: normal;
      }
      .navbar .nav .dropdown-menu li a, .navbar .nav .dropdown-menu li a:hover, .navbar .nav .dropdown-menu li a:focus {
        padding: 8px 20px;
        line-height: normal;
      }
      .navbar .navbar-form {
        border: none;
      }
      .navbar .dropdown-menu.form-wrapper {
        width: 280px;
        padding: 20px;
        left: auto;
        right: 0;
            font-size: 14px;
      }
      .navbar .dropdown-menu.form-wrapper a {   
        color: #33cabb;
        padding: 0 !important;
      }
      .navbar .dropdown-menu.form-wrapper a:hover{
        text-decoration: underline;
      }
      .navbar .form-wrapper .hint-text {
        text-align: center;
        margin-bottom: 15px;
        font-size: 13px;
      }
      .navbar .form-wrapper .social-btn .btn, .navbar .form-wrapper .social-btn .btn:hover {
        color: #fff;
            margin: 0;
        padding: 0 !important;
        font-size: 13px;
        border: none;
        transition: all 0.4s;
        text-align: center;
        line-height: 34px;
        width: 47%;
        text-decoration: none;
        } 
      .navbar .social-btn .btn-primary {
        background: #507cc0;
      }
      .navbar .social-btn .btn-primary:hover {
        background: #4676bd;
      }
      .navbar .social-btn .btn-info {
        background: #64ccf1;
      }
      .navbar .social-btn .btn-info:hover {
        background: #4ec7ef;
      }
      .navbar .social-btn .btn i {
        margin-right: 5px;
        font-size: 16px;
        position: relative;
        top: 2px;
      }
      .navbar .form-wrapper .form-footer {
        text-align: center;
        padding-top: 10px;
        font-size: 13px;
      }
      .navbar .form-wrapper .form-footer a:hover{
        text-decoration: underline;
      }
      .navbar .form-wrapper .checkbox-inline input {
        margin-top: 3px;
      }
      .or-seperator {
            margin-top: 32px;
        text-align: center;
        border-top: 1px solid #e0e0e0;
        }
        .or-seperator b {
        color: #666;
            padding: 0 8px;
        width: 30px;
        height: 30px;
        font-size: 13px;
        text-align: center;
        line-height: 26px;
        background: #fff;
        display: inline-block;
        border: 1px solid #e0e0e0;
        border-radius: 50%;
        position: relative;
        top: -15px;
        z-index: 1;
        }
        .navbar .checkbox-inline {
        font-size: 13px;
      }
      .navbar .navbar-right .dropdown-toggle::after {
        display: none;
      }
      @media (min-width: 1200px){
        .form-inline .input-group {
          width: 300px;
          margin-left: 30px;
        }
      }
      @media (max-width: 768px){
        .navbar .dropdown-menu.form-wrapper {
          width: 100%;
          padding: 10px 15px;
          background: transparent;
          border: none;
        }
        .navbar .form-inline {
          display: block;
        }
        .navbar .input-group {
          width: 100%;
        }
        .navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
          display: block;
        }
      }
      .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
        color: #66d7e4;
        background-color: transparent;
    }
    .textcenter{
      text-align: center;
    }
</style>
<script type="text/javascript">
  // Prevent dropdown menu from closing when click inside the form
  $(document).on("click", ".navbar-right .dropdown-menu", function(e){
    e.stopPropagation();
  });
</script>
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-lg navbar-light">
  <div class="navbar-header">
    <a class="navbar-brand" href="#"><b style="color:red">USA</b> <b style="clor:darkblue">EAD</b></a>     
    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
      <span class="navbar-toggler-icon"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- Collection of nav links, forms, and other content for toggling -->
 <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Home</a>
              </li>
              <li class="dropdown">
                <a href="about-us.php">About Us</a>
              </li>
              <li class="dropdown">
                <a href="contact-us.php">Contact Us</a>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Jobs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="job-listing.html">Job Listing</a></li>
                  <li><a href="job-details.html">Job Details</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Companies <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="company-listing.html">Company Listing</a></li>
                  <li><a href="company-details.html">Company Details</a></li>
                  <li><a href="add-posting.html">Add Job Posting</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Candidate <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="candidate-listing.html">Candidate Listing</a></li>
                  <li><a href="candidate-profile.html">Candidate Profile</a></li>
                  <li><a href="create-resume.html">Create Resume</a></li>
                </ul>
              </li>
              <li class="pull-right" style="margin-left: 550px;">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Login  
                  <i class="fa fa-user"></i><span class="caret"></span> </a>
                  <ul class="dropdown-menu">
                  <li><a href="employee_login.php">Employee Sign In</a></li>
                  <li><a href="employer_login.php">Employer Sign In</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
       <!-- JOB SEARCH FORM START --> 
      <div class="container">
        <h4 style="margin-left: 0px;">JOIN US & EXPLORE THOUSANDS OF JOBS :</h4>
        <div class="row  well">
          <div class="col-md-12">
            <!-- JOB SEARCH FORM STARTS -->
            <form class="" method="" action="">
              <div class="col-md-10">
                <div class="form-group col-md-3">
                  <input type="text" class="form-control" placeholder="Keyword (eg job Title, Position..)" required="required">
                </div>
                <div class="form-group col-md-3">
                  <input type="text" class="form-control" placeholder="Job Location (eg City, Country..)" required="required">
                </div>
                <div class="form-group col-md-3">
                 <select name="" id="" class="form-control">
                   <option name="" id="">---Select---</option>
                   <option name="" id="">IT Services</option>
                   <option name="" id="">Information Technologies</option>
                   <option name="" id="">Application Support</option>
                   <option name="" id="">Banking Solutions</option>
                   <option name="" id="">Big Data</option>
                 </select>
                </div>
                <div class="form-group col-md-3">
                  <input type="submit" class="btn btn-info" name="submit" value="Filter">
                </div>
              </div>
            </form>
            <!-- JOB SEARCH FORM ENDS -->
          </div>   
        </div>
      </div>
      <div class="container well">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-md-3 well">
                <h4 style="margin-left: 12px;">Refine Search</h4>
                <div class="panel-group" style="margin-left: 0px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">
                          <span>Job's by Location</span> 
                        </a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Washington" style="margin-left: 0px;">Washington</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Newyork" style="margin-left: 0px;">Newyork</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="San Jose" style="margin-left: 0px;">San Jose</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse5">
                          <span>Job's by Skill's</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in">
                     <ul class="list-group">
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Green Card Holder" style="margin-left: 0px;">Java Developer</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Employment Authorization Document" style="margin-left: 0px;">Dot Net Developer</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="H1 VISA" style="margin-left: 0px;">Node Js Developer</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2">
                          <span>Job's by EAD</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in">
                     <ul class="list-group">
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Green Card Holder" style="margin-left: 0px;">Green Card Holder</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Employment Authorization Document" style="margin-left: 0px;">EAD</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="H1 VISA" style="margin-left: 0px;">H1 VISA</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse3">
                          <span>Job's by Industry</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Green Card Holder" style="margin-left: 0px;">IT Services</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="Employment Authorization Document" style="margin-left: 0px;">Business Outsourcing</span>
                        </li>
                        <li class="list-group-item">
                          <input type="checkbox" name="" class="" />
                          <span class="" for="H1 VISA" style="margin-left: 0px;">Banking Solutions</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Searching Job List View Start Here -->
               <div class="col-md-9 well">
                 <h4 style="margin-left: 12px;">Searching Job List Daetails</h4>
                
                <table class="table table-hover table-responsive" border="0">
                  <tbody>
                    <tr>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view form-group">
                              <a href="job-details.html"><img src="img/job-list-logo-01.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4>
                                  <a href="#" class="">User Interface Project Manager with hcl at mumbai location
                                  </a>
                                </h4>
                                <p class="">Technology Management Consulting</p>
                                <div class="job-icons ">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view">
                              <a href="job-details.html"><img src="img/job-list-logo-02.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4><a href="job-details.html">User Interface Project Manager with hcl at mumbai location</a></h4>
                                <p>Technology Management Consulting</p>
                                <div class="job-icons">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view">
                              <a href="job-details.html"><img src="img/job-list-logo-03.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4><a href="job-details.html">User Interface Project Manager with hcl at mumbai location</a></h4>
                                <p>Technology Management Consulting</p>
                                <div class="job-icons">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view form-group">
                              <a href="job-details.html"><img src="img/job-list-logo-01.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4>
                                  <a href="#" class="">User Interface Project Manager with hcl at mumbai location
                                  </a>
                                </h4>
                                <p class="">Technology Management Consulting</p>
                                <div class="job-icons ">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view">
                              <a href="job-details.html"><img src="img/job-list-logo-02.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4><a href="job-details.html">User Interface Project Manager with hcl at mumbai location</a></h4>
                                <p>Technology Management Consulting</p>
                                <div class="job-icons">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                      <td>
                        <div class="col-md-10 panel panel-default">
                            <div class="list-view">
                              <a href="job-details.html"><img src="img/job-list-logo-03.jpg" alt="Company Logo 01"></a>
                            </div>
                              <div class="list-info job-list-info">
                                <h4><a href="job-details.html">User Interface Project Manager with hcl at mumbai location</a></h4>
                                <p>Technology Management Consulting</p>
                                <div class="job-icons">
                                  <span><i class="fa fa-briefcase"></i> Comera</span>
                                  <span><i class="fa fa-map-marker"></i> Mumbai</span>
                                  <span><i class="fa fa-usd"></i> 300000 - 500000 / Annum</span>
                                  <span class="full-time">Full-Time</span>
                                </div>
                              </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
                  </div>
                  <!-- Searching Job List View End Here -->
                </div>
              </div>
            </div>
          </div>
        </body>
      </html>                                                                                    