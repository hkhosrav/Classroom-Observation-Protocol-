<?php
  $dbhost = 'localhost';
  $dbname = 'uq_copus_db';
  $dbuser = 'root';
  $dbpass = '559711dfc2eae1f6';

  try{
    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
  catch(PDOException $ex){die($ex->getMessage());}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITaLI COPUS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/buttons.bootstrap.css" rel="stylesheet">
    <link href="css/fixedHeader.bootstrap.css" rel="stylesheet">
    <link href="css/responsive.bootstrap.css" rel="stylesheet">
    <link href="css/scroller.bootstrap.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="session_performance_one_hour.php" class="site_title">
                  <i class="fa fa-database"></i>
                  <span>ITaLI COPUS</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fas fa-edit"></i> Data Entry</a>
                    <ul class="nav child_menu">
                      <li><a href="add_class_activity_one_hour.php">Add 1 Hour Activity data</a></li>
                      <li><a href="edit_class_activity_one_hour.php">Edit 1 Hour Activity data</a></li>
                      <li><a href="add_class_activity_two_hour.php">Add 2 Hour Activity data</a></li>
                      <li><a href="edit_class_activity_two_hour.php">Edit 2 Hour Activity data</a></li>
                      <li><a href="add_new_course.php">Add New Course Offering</a></li>
                      <li><a href="add_additional_activities.php">Add Additional Activities</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fas fa-chart-bar"></i> Analyse Data</a>
                    <ul class="nav child_menu">
                      <li><a href="session_performance_one_hour.php">1 Hour Session Perfomance</a></li>
                      <li><a href="performance_trend_one_hour.php">1 Hour Performance Trend</a></li>
                      <li><a href="session_performance_two_hour.php">2 Hour Session Perfomance</a></li>
                      <li><a href="performance_trend_two_hour.php">2 Hour Performance Trend</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fas fa-question-circle"></i> About</a>
                    <ul class="nav child_menu">
                      <li><a href="copus.php">COPUS</a></li>
                      <li><a href="faq.php">FAQ</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Analyse activities in a session </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select from options below to filter for a session<small>1 hour session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm" action="session_performance_two_hour.php" method="post">
                  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Year">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Year FROM Session_Two_Hour GROUP BY Year");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Year']."\"";
                              if($_POST['Year'] == $row['Year'])
                                  echo 'selected';
                              echo ">".$row['Year']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Semester">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_2=$dbcon->prepare("SELECT Semester FROM Session_Two_Hour GROUP BY Semester");
                            $stmt_2->execute();
                            while ($row=$stmt_2->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Semester']."\"";
                              if($_POST['Semester'] == $row['Semester'])
                                  echo 'selected';
                              echo ">".$row['Semester']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Teaching Week</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Teaching_Week">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_3=$dbcon->prepare("SELECT Teaching_Week FROM Session_Two_Hour GROUP BY Teaching_Week");
                            $stmt_3->execute();
                            while ($row=$stmt_3->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Teaching_Week']."\"";
                              if($_POST['Teaching_Week'] == $row['Teaching_Week'])
                                  echo 'selected';
                              echo ">".$row['Teaching_Week']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Date">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_4=$dbcon->prepare("SELECT Date FROM Session_Two_Hour GROUP BY Date");
                            $stmt_4->execute();
                            while ($row=$stmt_4->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Date']."\"";
                              if($_POST['Date'] == $row['Date'])
                                  echo 'selected';
                              echo ">".$row['Date']."</option>";
                            }
                            ?>                             
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CourseCode</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Course_Code">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_5=$dbcon->prepare("SELECT Course_Code FROM Session_Two_Hour GROUP BY Course_Code");
                            $stmt_5->execute();
                            while ($row=$stmt_5->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Course_Code']."\"";
                              if($_POST['Course_Code'] == $row['Course_Code'])
                                  echo 'selected';
                              echo ">".$row['Course_Code']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Instructor</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Instructor">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_6=$dbcon->prepare("SELECT Personal_No, First_Name, Last_Name FROM Instructor WHERE Personal_No IN (SELECT Instructor FROM Session_Two_Hour GROUP BY Instructor)");
                            $stmt_6->execute();

                            while ($row=$stmt_6->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Personal_No']."\"";
                              if($_POST['Instructor'] == $row['Personal_No'])
                                  echo 'selected';
                              echo ">".$row['First_Name']." ".$row['Last_Name']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Time</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Start_Time">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_7=$dbcon->prepare("SELECT Start_Time FROM Session_Two_Hour GROUP BY Start_Time");
                            $stmt_7->execute();
                            while ($row=$stmt_7->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Start_Time']."\"";
                              if($_POST['Start_Time'] == $row['Start_Time'])
                                  echo 'selected';
                              echo ">".$row['Start_Time']."</option>";
                            }
                            ?>                        
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Record</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="ID">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_8=$dbcon->prepare("SELECT ID FROM Session_Two_Hour GROUP BY ID");
                            $stmt_8->execute();
                            while ($row=$stmt_8->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['ID']."\"";
                              if($_POST['ID'] == $row['ID'])
                                  echo 'selected';
                              echo ">".$row['ID']."</option>";
                            }
                            ?>                        
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5 col-sm-offset-6 col-xs-offset-6">
                          <button type="submit" class="btn btn-success" name="submit1">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <?php
                if(isset($_POST['submit1'])){
                  $ID = $_POST['ID'];

                  $stmt_op_1_1=$dbcon->prepare("SELECT COUNT(DISTINCT(Student_Activity)) FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_1->execute();
                  $json_op_1_1 = 0;
                  while ($row=$stmt_op_1_1->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_1 = (int)$row['COUNT(DISTINCT(Student_Activity))'];
                  }

                  $stmt_op_1_2=$dbcon->prepare("SELECT COUNT(DISTINCT(Faculty_Activity)) FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_2->execute();
                  $json_op_1_2 = 0;
                  while ($row=$stmt_op_1_2->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_2 = (int)$row['COUNT(DISTINCT(Faculty_Activity))'];
                  }
                  
                  $stmt_op_1_3=$dbcon->prepare("SELECT AVG(Student_Engagement)*100 FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_3->execute();
                  $json_op_1_3 = 0;
                  while ($row=$stmt_op_1_3->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_3 = (int)$row['AVG(Student_Engagement)*100'];
                  }

                  $stmt_op_1_4=$dbcon->prepare("SELECT AVG(Num_Students) FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_4->execute();
                  $json_op_1_4 = 0;
                  while ($row=$stmt_op_1_4->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_4 = (int)$row['AVG(Num_Students)'];
                  }

                  $stmt_op_1_5=$dbcon->prepare("SELECT Enrolled_Students FROM Session_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_5->execute();
                  $json_op_1_5 = 0;
                  while ($row=$stmt_op_1_5->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_5 = (int)$row['Enrolled_Students'];
                  }
                  $stmt_op_1_6=$dbcon->prepare("SELECT Duration_Minutes FROM Session_Two_Hour WHERE ID = '$ID'");       
                  $stmt_op_1_6->execute();
                  $json_op_1_6 = 0;
                  while ($row=$stmt_op_1_6->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $json_op_1_6 = (int)$row['Duration_Minutes'];
                  }

                }
              ?>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Overall Performance <small>For the chosen session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row tile_count">
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-file-signature"></i> Count of Student Activities</span>
                        <div class="count"><?php echo json_encode($json_op_1_1); ?></div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user-tie"></i> Count of Instructor Activities</span>
                        <div class="count"><?php echo json_encode($json_op_1_2); ?></div>
                      </div>
                    </div>
                  </div>

                  <div class="x_content">
                    <div class="row tile_count">
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-chalkboard-teacher"></i> Average Student Engagement</span>
                        <div class="count"><?php echo json_encode($json_op_1_3); ?>%</div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-users"></i> Average Student Attendance</span>
                        <div class="count"><?php echo json_encode($json_op_1_4); ?></div>
                      </div>
                    </div>
                  </div>

                  <div class="x_content">
                    <div class="row tile_count">
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user-edit"></i> Students Enrolled</span>
                        <div class="count"><?php echo json_encode($json_op_1_5); ?></div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock"></i> Session Duration</span>
                        <div class="count"><?php echo json_encode($json_op_1_6); ?> Minutes</div>
                      </div>
                    </div>
                  </div>



                </div>
              </div>           
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Activities <small>Activity by Engagement and Time Duration</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="polarArea1"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Instructor Activities <small>Activity by Time Duration</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="canvasDoughnut1"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Activity Table <small>Activity and Engagement across Time</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Time Slot</th>
                          <th>Student Activity</th>
                          <th>Engagement</th>
                          <th>Number of Students</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(isset($_POST['submit1'])){
                            $ID = $_POST['ID'];

                            $stmt_sp_1=$dbcon->prepare("SELECT Time_Slot, Student_Activity, Student_Engagement*100, Num_Students FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                            $stmt_sp_1->execute();
                            while ($row=$stmt_sp_1->fetch(PDO::FETCH_ASSOC)){
                              echo "<tr>";
                              echo "<td>".$row["Time_Slot"]."</td>";
                              echo "<td>".$row["Student_Activity"]."</td>";
                              echo "<td>".(int)$row["Student_Engagement*100"]."%</td>";
                              echo "<td>".$row["Num_Students"]."</td>";
                              echo "</tr>";
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Instructor Activity Table <small>Activity across Time</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Time Slot</th>
                          <th>Faculty_Activity</th>
                          <th>Engagement</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(isset($_POST['submit1'])){
                            $ID = $_POST['ID'];

                            $stmt_lp_1=$dbcon->prepare("SELECT Time_Slot, Faculty_Activity, Student_Engagement*100 FROM Class_Activity_Two_Hour WHERE ID = '$ID'");       
                            $stmt_lp_1->execute();
                            while ($row=$stmt_lp_1->fetch(PDO::FETCH_ASSOC)){
                              echo "<tr>";
                              echo "<td>".$row["Time_Slot"]."</td>";
                              echo "<td>".$row["Faculty_Activity"]."</td>";
                              echo "<td>".(int)$row["Student_Engagement*100"]."%</td>";
                              echo "</tr>";
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Engagement Graph </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybarChart2"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Attendance Graph </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybarChart1"></canvas>
                  </div>
                </div>
              </div>

            </div>



            <div class="clearfix"></div>
            <br />            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            UQ COPUS - Dashboard by <a href="mailto:ankit.sharma@uqconnect.edu.au">Ankit Sharma</a> <i class="fa fa-hand-spock"></i>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
    </div>



    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>
    <!-- Bootstrap Validator -->
    <script src="js/bootstrapValidator.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="js/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="js/Chart.js"></script>
    <!-- iCheck -->
    <script src="iCheck/icheck.js"></script>
    <!-- Datatables -->
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/dataTables.buttons.js"></script>
    <script src="js/buttons.bootstrap.js"></script>
    <script src="js/buttons.flash.js"></script>
    <script src="js/buttons.html5.js"></script>
    <script src="js/buttons.print.js"></script>
    <script src="js/dataTables.fixedHeader.js"></script>
    <script src="js/dataTables.keyTable.js"></script>
    <script src="js/dataTables.responsive.js"></script>
    <script src="js/responsive.bootstrap.js"></script>
    <script src="js/datatables.scroller.js"></script>
    <script src="js/jszip.js"></script>
    <script src="js/pdfmake.js"></script>
    <script src="js/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <!-- Chart.js -->
    <script>
      /*Chart.defaults.global.legend = {
        enabled: false
      };*/
      //Get Data

      <?php
      if(isset($_POST['submit1'])){
        $ID = $_POST['ID'];

        $stmt_ip_1=$dbcon->prepare("SELECT Faculty_Activity, COUNT(Faculty_Activity)*2 FROM Class_Activity_Two_Hour WHERE ID = '$ID' GROUP BY Faculty_Activity");
        $stmt_ip_1->execute();
        $json_ip_1_1 =[];
        $json_ip_1_2 = [];
        while ($row=$stmt_ip_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_ip_1_1[] = $row['Faculty_Activity'];
          $json_ip_1_2[] = (int)$row['COUNT(Faculty_Activity)*2'];} 
        
        $stmt_sp_1=$dbcon->prepare("SELECT Student_Activity, COUNT(Student_Activity)*0.25132, AVG(Student_Engagement)*100 FROM Class_Activity_Two_Hour WHERE ID = '$ID' GROUP BY Student_Activity");
        $stmt_sp_1->execute();
        $json_sp_1_1 =[];
        $json_sp_1_2 = [];
        $json_sp_1_3 = [];
        while ($row=$stmt_sp_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_sp_1_1[] = $row['Student_Activity'];
          $json_sp_1_2[] = (float)$row['COUNT(Student_Activity)*0.25132'];
          $json_sp_1_3[] = round((float)$row['AVG(Student_Engagement)*100'],2);} 
        
        
        $stmt_ss_1=$dbcon->prepare("SELECT Time_Slot, Num_Students FROM Class_Activity_Two_Hour WHERE ID = '$ID'");
        $stmt_ss_1->execute();
        $json_ss_1_1 =[];
        $json_ss_1_2 = [];
        while ($row=$stmt_ss_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_ss_1_1[] = $row['Time_Slot'];
          $json_ss_1_2[] = $row['Num_Students'];} 

        
        $stmt_se_1=$dbcon->prepare("SELECT Time_Slot, (Student_Engagement)*100 FROM Class_Activity_Two_Hour WHERE ID = '$ID'");
        $stmt_se_1->execute();
        $json_se_1_1 =[];
        $json_se_1_2 = [];
        while ($row=$stmt_se_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_se_1_1[] = $row['Time_Slot'];
          $json_se_1_2[] = $row['(Student_Engagement)*100'];} 

        }
      ?>

      // Bar chart
      var ctx = document.getElementById("mybarChart1");
      var mybarChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($json_ss_1_1); ?>,
          datasets: [{
            label: 'Student Attendance',
            backgroundColor: "#4575bc",
            data: <?php echo json_encode($json_ss_1_2); ?>
          }]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

      // Bar chart
      var ctx = document.getElementById("mybarChart2");
      var mybarChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($json_se_1_1); ?>,
          datasets: [{
            label: 'Student Engagement(%)',
            backgroundColor: "#4575bc",
            data: <?php echo json_encode($json_se_1_2); ?>
          }]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

      // Doughnut chart
      var ctx = document.getElementById("canvasDoughnut1");
      var data = {
        labels: <?php echo json_encode($json_ip_1_1); ?>,
        datasets: [{
          data: <?php echo json_encode($json_ip_1_2); ?>,
          backgroundColor: [
            "#ff2600",
            "#40bf51",
            "#ffdd00",
            "#00a6ff",
            "#f46c0b",
            "#b025da",
            "#13ecec",
            "#008080",
            "#cf8530",
            "#800000",
            "#808000",
            "#ffd8b1",
            "#000080",
            "#808080",
            "#e2b3ff"
          ],
          hoverBackgroundColor: [
            "#cc1f00",
            "#339941",
            "#ccb100",
            "#0085cc",
            "#c35709",
            "#8d1eae",
            "#0fbdbd",
            "#004d4d",
            "#a56a27",
            "#4d0000",
            "#4d4d00",
            "#ffbf80",
            "#00004d",
            "#666666",
            "#ce80ff"
          ]

        }]
      };

      var canvasDoughnut1 = new Chart(ctx, {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: data
      });

      // PolarArea chart
      var ctx = document.getElementById("polarArea1");
      var data = {
        datasets: [{
          data: <?php echo json_encode($json_sp_1_3); ?>,
          backgroundColor: [
            "#ff2600",
            "#40bf51",
            "#ffdd00",
            "#00a6ff",
            "#f46c0b",
            "#b025da",
            "#13ecec",
            "#008080",
            "#cf8530",
            "#800000",
            "#808000",
            "#ffd8b1",
            "#000080",
            "#808080",
            "#e2b3ff"
          ],
          label: 'My dataset'
        }],
        labels: <?php echo json_encode($json_sp_1_1); ?>
      };

      var polarArea1 = new Chart(ctx, {
        data: data,
        type: 'polarArea',
        options: {
          elements: {
            arc: {
              angle: <?php echo json_encode($json_sp_1_2); ?>
            }
          },
          scale: {
            ticks: {
            beginAtZero: true
            }
          }
        }
      }  
      );

    </script>
    <!-- /Chart.js -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
                {
                  extend: "pdf",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-responsive2').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- Validate Forms -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('#validateForm').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            Course_Code: {
              validators: {
                notEmpty: {
                  message: 'Choose a course code'
                }
              }
            },
            Year: {
              validators: {
                notEmpty: {
                  message: 'Choose a Year'
                }
              }
            },
            Semester: {
              validators: {
                notEmpty: {
                  message: 'Choose a Semester'
                }
              }
            },
            Teaching_Week: {
              validators: {
                notEmpty: {
                  message: 'Choose a teaching week'
                }
              }
            },
            Instructor: {
              validators: {
                notEmpty: {
                  message: 'Choose a faculty'
                }
              }
            },
            Date: {
              validators: {
                notEmpty: {
                  message: 'Choose a Date'
                }
              }
            },
            Start_Time: {
              validators: {
                notEmpty: {
                  message: 'Choose a Start_Time'
                }
              }
            },
            ID: {
              validators: {
                notEmpty: {
                  message: 'Choose a session'
                }
              }
            },              
          }
        });
      });
    </script>
    <!-- /Validate Forms -->

  </body>
</html>
