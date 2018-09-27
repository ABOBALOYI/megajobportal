<?php 
error_reporting(0);
  session_start();
  include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $userName = $session_info['emplr_user_name'];
  $strEmplrEmailAddress = $session_info['emplr_email_address'];
  $intUserId = $session_info['emplr_id'];
  //echo $intJobID = $_GET['job_id']; die;
  // echo $strUserType = $session_info['user_type'];

  $sql_query_1 = "SELECT JBT.*,ER.* FROM `employer_registration` as ER 
                INNER JOIN job_post_table as JBT 
                ON ER.emplr_id = JBT.emplr_id ORDER BY JBT.job_id DESC";
  $result_1 = mysqli_query($connection, $sql_query_1);

      if(isset($session_info['emplr_email_address'])){
            if((time()-$_SESSION['last_time']) > 60*30){
                header("Location:../logout.php");
            }else{
              $_SESSION['last_time'] = time();
            }
        }else{
            header('Location:../index.php');
        }

?>
<?php echo include('employer_header.php'); ?>
 
    <section>
      <div class="container">
        <div class="row">
           <div class="sidebar col-md-3 col-sm-4">
            <h5>Refine Search <a href="javascript:void(0);" class="pull-right">Clear All Filter</a></h5>
            <div class="filters-wrap">
              <div class="category-title">Top Employers</div>
              <div class="filter-list">
                <ul>
                  <li>
                    <input type="checkbox" name="employer1" id="employer1" />
                    <label for="employer1">Orcapod Consulting Services</label>
                    <span class="pull-right">63</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer2" id="employer2" />
                    <label for="employer2">Growel Softech Limited</label>
                    <span class="pull-right">55</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer3" id="employer3" />
                    <label for="employer3">Capgemini</label>
                    <span class="pull-right">64</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer4" id="employer4" />
                    <label for="employer4">Abyss & Horizon Pvt. Ltd.</label>
                    <span class="pull-right">64</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer5" id="employer5" />
                    <label for="employer5">iQuest Management Services</label>
                    <span class="pull-right">56</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Jobs by Location <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <div class="input-group">
                  <input type="text" name="search-location" placeholder="Search New Location" />
                  <i class="fa fa-search"></i>
                </div>
                <ul>
                  <li>
                    <input type="checkbox" name="location1" id="location1" />
                    <label for="location1">Mumbai</label>
                    <span class="pull-right">63</span>
                  </li>
                  <li>
                    <input type="checkbox" name="location2" id="location2" />
                    <label for="location2">Pune</label>
                    <span class="pull-right">55</span>
                  </li>
                  <li>
                    <input type="checkbox" name="location3" id="location3" />
                    <label for="location3">Bangalore</label>
                    <span class="pull-right">64</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Jobs by Industry <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <div class="input-group">
                  <input type="text" name="search-industry" placeholder="Search New Industry" />
                  <i class="fa fa-search"></i>
                </div>
                <ul>
                  <li>
                    <input type="checkbox" name="industry1" id="industry1" />
                    <label for="industry1">IT</label>
                    <span class="pull-right">63</span>
                  </li>
                  <li>
                    <input type="checkbox" name="industry2" id="industry2" />
                    <label for="industry2">Manufacturing</label>
                    <span class="pull-right">55</span>
                  </li>
                  <li>
                    <input type="checkbox" name="industry3" id="industry3" />
                    <label for="industry3">Hospitality</label>
                    <span class="pull-right">64</span>
                  </li>
                </ul>
              </div>
            </div>
             <div class="filters-wrap">
              <div class="category-title">Jobs by Salary</div>
              <div class="filter-list">
                <form class="row">
                  <div class="col-md-6">
                    <input type="number" name="minimun" class="form-control" placeholder="Min" min="0" max="100000" step="500">
                  </div>
                  <div class="col-md-6">
                    <input type="number" name="maximum" class="form-control" placeholder="Max" min="0" max="100000" step="500">
                  </div>
                </form>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Jobs by Function <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-plus"></i></a> </div>
              <div class="filter-list" style="display:none;">
                <ul>
                  <li>
                    <input type="checkbox" name="function1" id="function1" />
                    <label for="function1">IT</label>
                    <span class="pull-right">245</span>
                  </li>
                  <li>
                    <input type="checkbox" name="function2" id="function2" />
                    <label for="function2">Customer Service / Call Center / BPO</label>
                    <span class="pull-right">68</span>
                  </li>
                  <li>
                    <input type="checkbox" name="function3" id="function3" />
                    <label for="function3">Finance & Accounts</label>
                    <span class="pull-right">81</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Company Type <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-plus"></i></a> </div>
              <div class="filter-list" style="display:none;">
                <ul>
                  <li>
                    <input type="checkbox" name="company-type1" id="company-type1" />
                    <label for="company-type1">Company</label>
                    <span class="pull-right">457</span>
                  </li>
                  <li>
                    <input type="checkbox" name="company-type2" id="company-type2" />
                    <label for="company-type2">Placement Agency</label>
                    <span class="pull-right">241</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Job by Experience <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-plus"></i></a> </div>
              <div class="filter-list" style="display:none;">
                <ul>
                  <li>
                    <input type="radio" name="experience" id="experience1" value="experience1" checked />
                    <label for="experience1">Less than 1 year</label>
                    <span class="pull-right">220</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience2" value="experience2" />
                    <label for="experience2">1 to 2 years</label>
                    <span class="pull-right">451</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience3" value="experience3" />
                    <label for="experience3">2 to 5 years</label>
                    <span class="pull-right">154</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience4" value="experience4" />
                    <label for="experience4">5 to 7 years</label>
                    <span class="pull-right">195</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience5" value="experience5" />
                    <label for="experience5">7 to 10 years</label>
                    <span class="pull-right">54</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience6" value="experience6" />
                    <label for="experience6">10 to 15 years</label>
                    <span class="pull-right">23</span>
                  </li>
                  <li>
                    <input type="radio" name="experience" id="experience7" value="experience7" />
                    <label for="experience7">More than 15 years</label>
                    <span class="pull-right">7</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Job Fressness <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-plus"></i></a> </div>
              <div class="filter-list" style="display:none;">
                <ul>
                  <li>
                    <input type="radio" name="freshness" id="freshness1" value="freshness1" />
                    <label for="freshness1">Today</label>
                  </li>
                  <li>
                    <input type="radio" name="freshness" id="freshness2" value="freshness2" />
                    <label for="freshness2">Upto 7 days</label>
                  </li>
                  <li>
                    <input type="radio" name="freshness" id="freshness3" value="freshness3" />
                    <label for="freshness3">Upto 15 days</label>
                  </li>
                  <li>
                    <input type="radio" name="freshness" id="freshness4" value="freshness4" />
                    <label for="freshness4">Upto 30 days</label>
                  </li>
                  <li>
                    <input type="radio" name="freshness" id="freshness5" value="freshness5" />
                    <label for="freshness5">Upto 60 days</label>
                  </li>
                  <li>
                    <input type="radio" name="freshness" id="freshness6" value="freshness6" checked />
                    <label for="freshness6">All Jobs</label>
                  </li>
                </ul>
              </div>
            </div>
           </div>
          <div class="col-md-9">

            <!-- JOB LISTING & COMPANY LISTING STARTS -->
            <div class="jobs-tab-panel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Employer Job List</a></li>
              </ul>
              <br>
              <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                      <th>Company List</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while ($row_company = mysqli_fetch_assoc($result_1)) { ?>
                         <tr>
                            <td>
                               <div class="job-list">
                                  <div class="list-view">
                                    <a href="employer_job_detail_list.php?job_id=<?php echo $row_company['job_id'] ?>" target="_blank"><img src="<?php echo $row_company['logo_path']; ?>" alt="Company Logo 01"></a>
                                    <div class="list-info job-list-info">
                                      <h4><a href="employer_job_detail_list.php?job_id=<?php echo $row_company['job_id'] ?>" target="_blank"><?php echo $row_company['job_title']; ?></a></h4>
                                      <p><?php echo $row_company['emplr_company_name']; ?></p>
                                      <div class="job-icons">
                                        <span><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $row_company['total_experience']; ?></span>
                                        <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $row_company['location']; ?></span>
                                        <span><i class="fa fa-money"></i>&nbsp;&nbsp;<i class="fa fa-inr">&nbsp;&nbsp;<?php echo $row_company['min_salary_package']. ' - '. $row_company['max_salary_package']; ?></i> ANNUM</span>
                                        <span class="full-time"><?php echo $row_company['job_type']; ?></span>
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
            <!-- JOB LISTING & COMPANY LISTING ENDS -->
          </div>
        </div>
      </div>
    </section>
<?php echo include('employer_footer.php'); ?>

