<?php
  ob_start();

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

    <title>ITaLI COPUS </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="copus.html" class="site_title">
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
                <h3>Edit activities in a session </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Choose a session to edit <small>50 min session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm" action="edit_class_activity_interface_one_hour.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Year</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Year">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Year FROM Session_One_Hour GROUP BY Year");
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Semester</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Semester">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Semester FROM Session_One_Hour GROUP BY Semester");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Teaching Week</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Teaching_Week">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Teaching_Week FROM Session_One_Hour GROUP BY Teaching_Week");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Date">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Date FROM Session_One_Hour GROUP BY Date");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">CourseCode</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Course_Code">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Course_Code FROM Session_One_Hour GROUP BY Course_Code");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Instructor</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Instructor">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Personal_No, First_Name, Last_Name FROM Instructor WHERE Personal_No IN (SELECT Instructor FROM Session_One_Hour GROUP BY Instructor)");
                            $stmt_1->execute();

                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Start Time</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="Start_Time">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_3=$dbcon->prepare("SELECT Start_Time FROM Session_One_Hour GROUP BY Start_Time");
                            $stmt_3->execute();
                            while ($row=$stmt_3->fetch(PDO::FETCH_ASSOC)){
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Record</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="ID">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_3=$dbcon->prepare("SELECT ID FROM Session_One_Hour GROUP BY ID");
                            $stmt_3->execute();
                            while ($row=$stmt_3->fetch(PDO::FETCH_ASSOC)){
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
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                          <button type="submit" class="btn btn-success" name="submit1">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>         
            </div>


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
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

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
            Instructor: {
              validators: {
                notEmpty: {
                  message: 'Choose an Instructor'
                }
              }
            },
            Year: {
              validators: {
                notEmpty: {
                  message: 'Choose a year'
                }
              }
            },
            Semester: {
              validators: {
                notEmpty: {
                  message: 'Choose a semester'
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
            Date: {
              validators: {
                notEmpty: {
                  message: 'Choose a date'
                }
              }
            },
            Start_Time: {
              validators: {
                notEmpty: {
                  message: 'Choose a start time'
                }
              }
            },
            Course_Code: {
              validators: {
                notEmpty: {
                  message: 'Choose a course code'
                }
              }
            },
            ID: {
              validators: {
                notEmpty: {
                  message: 'Choose a record'
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
