<?php
error_reporting(0); 
session_start();
include('../includes/config.php');
  $session_info = $_SESSION['user_session_info'];
  $userName = $session_info['user_email_id'];
  $intUserId = $session_info['user_id'];



?>

<?php include('admin_header.php'); ?>
    <section class="inner-banner">
      <!-- BANNER STARTS -->
       
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="sr-only">Search Form</h2>
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
        </div>
       <!--  <div class="alpha-filters">
          <div class="filter-by slider">
            <div><a href="javascript:void(0);" class="active">a</a></div>
            <div><a href="javascript:void(0);">b</a></div>
            <div><a href="javascript:void(0);">c</a></div>
            <div><a href="javascript:void(0);">d</a></div>
            <div><a href="javascript:void(0);">e</a></div>
            <div><a href="javascript:void(0);">f</a></div>
            <div><a href="javascript:void(0);">g</a></div>
            <div><a href="javascript:void(0);">h</a></div>
            <div><a href="javascript:void(0);">i</a></div>
            <div><a href="javascript:void(0);">j</a></div>
            <div><a href="javascript:void(0);">k</a></div>
            <div><a href="javascript:void(0);">l</a></div>
            <div><a href="javascript:void(0);">m</a></div>
            <div><a href="javascript:void(0);">n</a></div>
            <div><a href="javascript:void(0);">o</a></div>
            <div><a href="javascript:void(0);">p</a></div>
            <div><a href="javascript:void(0);">q</a></div>
            <div><a href="javascript:void(0);">r</a></div>
            <div><a href="javascript:void(0);">s</a></div>
            <div><a href="javascript:void(0);">t</a></div>
            <div><a href="javascript:void(0);">u</a></div>
            <div><a href="javascript:void(0);">v</a></div>
            <div><a href="javascript:void(0);">w</a></div>
            <div><a href="javascript:void(0);">x</a></div>
            <div><a href="javascript:void(0);">y</a></div>
            <div><a href="javascript:void(0);">z</a></div>
            <div><a href="javascript:void(0);">0-9</a></div>
          </div>
        </div> -->
      </div>
      <!-- BANNER ENDS -->
    </section>
    <section class="search-result">
      <div class="container">
        <div class="row">
          <div class="sidebar col-md-3 col-sm-4">
            <h5>Refine Search <a href="javascript:void(0);" class="pull-right">Clear All Filter</a></h5>
            <div class="filters-wrap">
              <div class="category-title">Salary</div>
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
              <div class="category-title">Contract <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                  <li>
                    <input type="checkbox" name="employer1" id="employer1" />
                    <label for="employer1">Full Time</label>
                    <span class="pull-right">63</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer2" id="employer2" />
                    <label for="employer2">Part Time</label>
                    <span class="pull-right">55</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer3" id="employer3" />
                    <label for="employer3">One-time Project</label>
                    <span class="pull-right">64</span>
                  </li>
                  <li>
                    <input type="checkbox" name="employer4" id="employer4" />
                    <label for="employer4">Contract</label>
                    <span class="pull-right">56</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Candidate by Location <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
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
                  <li>
                    <input type="checkbox" name="location4" id="location4" />
                    <label for="location4">Delhi</label>
                    <span class="pull-right">64</span>
                  </li>
                  <li>
                    <input type="checkbox" name="location5" id="location5" />
                    <label for="location5">Noida</label>
                    <span class="pull-right">56</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filters-wrap">
              <div class="category-title">Status <a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <div class="input-group">
                  <input type="text" name="search-industry" placeholder="Search New Industry" />
                  <i class="fa fa-search"></i>
                </div>
                <ul>
                  <li>
                    <input type="checkbox" name="industry1" id="industry1" />
                    <label for="industry1">Most Recent</label>
                    <span class="pull-right">63</span>
                  </li>
                  <li>
                    <input type="checkbox" name="industry2" id="industry2" />
                    <label for="industry2">Featured</label>
                    <span class="pull-right">55</span>
                  </li>
                  <li>
                    <input type="checkbox" name="industry3" id="industry3" />
                    <label for="industry3">Urgent</label>
                    <span class="pull-right">64</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="row">
              <div class="col-md-7">
                <h5>Top employees matched to your serch result</h5>
              </div>
              <div class="col-md-5">
                <div class="btn-group btn-block">
                  <a href="javascript:void(0);" class="btn btn-toggle">Best Match</a>
                  <a href="javascript:void(0);" class="btn btn-toggle active">View All</a>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="list-view">
                <a href="candidate-profile.html"><img src="../img/cp-patty-white.jpg" alt="Candidate"></a>
                <div class="list-info job-list-info candidate-info">
                  <h4><a href="candidate-profile.html">Patty White</a></h4>
                  <a href="javascript:void(0);" class="btn btn-primary pull-right">Contact</a>
                  <p>Frontend Developer
                    <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                  </p>
                  <div class="job-icons label-group">
                    <span class="label label-default">Javascript</span>
                    <span class="label label-default">jQuery</span>
                    <span class="label label-default">HTML5</span>
                    <span class="label label-default">CSS3</span>
                    <span class="label label-default">UI Development</span>
                    <span class="label label-default">jSon</span>
                    <a href="javascript:void(0);" class="pull-right">Save this Profile</a>
                  </div>
                </div>
              </div>
              <div class="list-view">
                <a href="candidate-profile.html"><img src="../img/cp-steven-lewis.jpg" alt=""></a>
                <div class="list-info job-list-info candidate-info">
                  <h4><a href="candidate-profile.html">Steven Lewis</a></h4>
                  <a href="javascript:void(0);" class="btn btn-primary pull-right">Contact</a>
                  <p>Frontend Developer
                    <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                  </p>
                  <div class="job-icons label-group">
                    <span class="label label-default">Javascript</span>
                    <span class="label label-default">jQuery</span>
                    <span class="label label-default">HTML5</span>
                    <span class="label label-default">CSS3</span>
                    <span class="label label-default">UI Development</span>
                    <span class="label label-default">jSon</span>
                    <a href="javascript:void(0);" class="pull-right">Save this Profile</a>
                  </div>
                </div>
              </div>
              <div class="list-view">
                <a href="candidate-profile.html"><img src="../img/cp-charles-white.jpg" alt=""></a>
                <div class="list-info job-list-info candidate-info">
                  <h4><a href="candidate-profile.html">Charles White</a></h4>
                  <a href="javascript:void(0);" class="btn btn-primary pull-right">Contact</a>
                  <p>Frontend Developer
                    <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                  </p>
                  <div class="job-icons label-group">
                    <span class="label label-default">Javascript</span>
                    <span class="label label-default">jQuery</span>
                    <span class="label label-default">HTML5</span>
                    <span class="label label-default">CSS3</span>
                    <span class="label label-default">UI Development</span>
                    <span class="label label-default">jSon</span>
                    <a href="javascript:void(0);" class="pull-right">Save this Profile</a>
                  </div>
                </div>
              </div>
              <div class="list-view">
                <a href="candidate-profile.html"><img src="../img/cp-susan-chan.jpg" alt=""></a>
                <div class="list-info job-list-info candidate-info">
                  <h4><a href="candidate-profile.html">Susan Chan</a></h4>
                  <a href="javascript:void(0);" class="btn btn-primary pull-right">Contact</a>
                  <p>Frontend Developer
                    <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                  </p>
                  <div class="job-icons label-group">
                    <span class="label label-default">Javascript</span>
                    <span class="label label-default">jQuery</span>
                    <span class="label label-default">HTML5</span>
                    <span class="label label-default">CSS3</span>
                    <span class="label label-default">UI Development</span>
                    <span class="label label-default">jSon</span>
                    <a href="javascript:void(0);" class="pull-right">Save this Profile</a>
                  </div>
                </div>
              </div>
              <div class="list-view">
                <a href="candidate-profile.html"><img src="../img/cp-john-doe.jpg" alt=""></a>
                <div class="list-info job-list-info candidate-info">
                  <h4><a href="candidate-profile.html">John Doe</a></h4>
                  <a href="javascript:void(0);" class="btn btn-primary pull-right">Contact</a>
                  <p>Frontend Developer
                    <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                  </p>
                  <div class="job-icons label-group">
                    <span class="label label-default">Javascript</span>
                    <span class="label label-default">jQuery</span>
                    <span class="label label-default">HTML5</span>
                    <span class="label label-default">CSS3</span>
                    <span class="label label-default">UI Development</span>
                    <span class="label label-default">jSon</span>
                    <a href="javascript:void(0);" class="pull-right">Save this Profile</a>
                  </div>
                </div>
              </div>
            </div>
            <ul class="pagination pull-right">
              <li><a href="javascript:void(0);"><i class="fa fa-angle-double-left"></i></a></li>
              <li><a href="javascript:void(0);"><i class="fa fa-angle-left"></i></a></li>
              <li class="page-text">Page</li>
              <li><input type="text" name="page-number" value="1" /></li>
              <li class="page-text">/ 80</li>
              <li><a href="javascript:void(0);">Go</a></li>
              <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
              <li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER STARTS -->
    <?php include('admin_footer.php'); ?>