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
                <h3>Add details for a new course </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a faculty if not present<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm1"  action="add_new_course.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Dept_ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="dept_id1" value="<?php if(isset($_POST['dept_id1'])){echo htmlentities($_POST['dept_id1']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Department Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="dept_name1" value="<?php if(isset($_POST['dept_name1'])){echo htmlentities($_POST['dept_name1']);}?>">
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
            </div> 

            <?php
              if(isset($_POST['submit1'])){
                $dept_id1 = $_POST['dept_id1'];
                $dept_name1 = $_POST['dept_name1'];

                $stmt_op_1_1=$dbcon->prepare("INSERT INTO `Faculty`(`Dept_ID`, `Dept_Name`) VALUES ('$dept_id1','$dept_name1')");       
                $stmt_op_1_1->execute();
                }
            ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add an Instructor if not present<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm2" action="add_new_course.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Personal_No</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="personal_no2" value="<?php if(isset($_POST['personal_no2'])){echo htmlentities($_POST['personal_no2']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">First_Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="first_name2" value="<?php if(isset($_POST['first_name2'])){echo htmlentities($_POST['first_name2']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Last_Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="last_name2" value="<?php if(isset($_POST['last_name2'])){echo htmlentities($_POST['last_name2']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Designation</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="designation2" value="<?php if(isset($_POST['designation2'])){echo htmlentities($_POST['designation2']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Faculty</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="dept_id2">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Dept_ID FROM Faculty");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Dept_ID']."\"";
                              if($_POST['dept_id2'] == $row['Dept_ID'])
                                  echo 'selected';
                              echo ">".$row['Dept_ID']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5 col-sm-offset-6 col-xs-offset-6">
                          <button type="submit" class="btn btn-success" name="submit2">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 

            <?php
              if(isset($_POST['submit2'])){
                $personal_no2 = $_POST['personal_no2'];                
                $first_name2 = $_POST['first_name2'];
                $last_name2 = $_POST['last_name2'];
                $designation2 = $_POST['designation2'];
                $dept_id2 = $_POST['dept_id2'];

                $stmt_op_1_1=$dbcon->prepare("INSERT INTO `Instructor`(`Personal_No`, `First_Name`, `Last_Name`, `Designation`, `Dept_ID`) VALUES ('$personal_no2','$first_name2','$last_name2','$designation2','$dept_id2')");       
                $stmt_op_1_1->execute();
                }
            ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a Program if not present<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm3" action="add_new_course.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Program_Code</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="program_code3" value="<?php if(isset($_POST['program_code3'])){echo htmlentities($_POST['program_code3']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Program_Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="program_name3" value="<?php if(isset($_POST['program_name3'])){echo htmlentities($_POST['program_name3']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Faculty</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="faculty3">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_1=$dbcon->prepare("SELECT Dept_ID FROM Faculty");
                            $stmt_1->execute();
                            while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Dept_ID']."\"";
                              if($_POST['faculty3'] == $row['Dept_ID'])
                                  echo 'selected';
                              echo ">".$row['Dept_ID']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Program_Level</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="program_level3">
                            <option value="">Choose option</option>
                            <?php
                              $stmt_1=$dbcon->prepare("SELECT Level FROM Program_Level");
                              $stmt_1->execute();
                              while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=\"".$row['Level']."\"";
                                if($_POST['program_level3'] == $row['Level'])
                                    echo 'selected';
                                echo ">".$row['Level']."</option>";
                              }
                              ?>
                          </select>
                        </div>
                      </div>


                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5 col-sm-offset-6 col-xs-offset-6">
                          <button type="submit" class="btn btn-success" name="submit3">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 

            <?php
              if(isset($_POST['submit3'])){
                $program_code3 = $_POST['program_code3'];                
                $program_name3 = $_POST['program_name3'];
                $faculty3 = $_POST['faculty3'];
                $program_level3 = $_POST['program_level3'];

                $stmt_op_1_1=$dbcon->prepare("INSERT INTO `Program`(`Program_Code`, `Program_Name`, `Faculty`, `Program_Level`) VALUES ('$program_code3','$program_name3','$faculty3','$program_level3')");       
                $stmt_op_1_1->execute();
                }
            ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a Course<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm4" action="add_new_course.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Course_Code</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="course_code4" value="<?php if(isset($_POST['course_code4'])){echo htmlentities($_POST['course_code4']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Course_Title</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="course_title4" value="<?php if(isset($_POST['course_title4'])){echo htmlentities($_POST['course_title4']);}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Units</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="units4">
                            <option value="">Choose option</option>
                            <?php
                              $stmt_1=$dbcon->prepare("SELECT Units FROM Course_Units");
                              $stmt_1->execute();
                              while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=\"".$row['Units']."\"";
                                if($_POST['units4'] == $row['Units'])
                                    echo 'selected';
                                echo ">".$row['Units']."</option>";
                              }
                              ?>  
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Course_Coordinator</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="course_coordinator4">
                            <option value="">Choose option</option>
                            <?php
                            $stmt_3=$dbcon->prepare("SELECT Personal_No, First_Name, Last_Name FROM Instructor");
                            $stmt_3->execute();
                            while ($row=$stmt_3->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value=\"".$row['Personal_No']."\"";
                              if($_POST['course_coordinator4'] == $row['Personal_No'])
                                  echo 'selected';
                              echo ">".$row['First_Name']." ".$row['Last_Name']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Program_Code</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="program_code4">
                          <option value="">Choose option</option>
                            <?php
                              $stmt_1=$dbcon->prepare("SELECT Program_Code FROM Program");
                              $stmt_1->execute();
                              while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=\"".$row['Program_Code']."\"";
                                if($_POST['program_code4'] == $row['Program_Code'])
                                    echo 'selected';
                                echo ">".$row['Program_Code']."</option>";
                              }
                              ?>  
                          </select>
                        </div>
                      </div>


                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5 col-sm-offset-6 col-xs-offset-6">
                          <button type="submit" class="btn btn-success" name="submit4">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 

            <?php
              if(isset($_POST['submit4'])){
                $course_code4 = $_POST['course_code4'];                
                $course_title4 = $_POST['course_title4'];
                $units4 = $_POST['units4'];
                $course_coordinator4 = $_POST['course_coordinator4'];
                $program_code4 = $_POST['program_code4'];

                $stmt_op_1_1=$dbcon->prepare("INSERT INTO `Course`(`Course_Code`, `Course_Title`, `Units`, `Course_Coordinator`, `Program_Code`) VALUES ('$course_code4','$course_title4','$units4','$course_coordinator4','$program_code4')");       
                $stmt_op_1_1->execute();
                }
            ?>
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
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
    <!-- Validate Forms -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#validateForm1').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            dept_id1: {
              validators: {
                notEmpty: {
                  message: 'Enter a Department ID'
                }
              }
            },
            dept_name1: {
              validators: {
                notEmpty: {
                  message: 'Enter a Department name '
                }
              }
            },         
          }
        });
        $('#validateForm2').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            personal_no2: {
              validators: {
                notEmpty: {
                  message: 'Enter a Personal Number'
                }
              }
            },
            first_name2: {
              validators: {
                notEmpty: {
                  message: 'Enter First Name'
                }
              }
            },
            last_name2: {
              validators: {
                notEmpty: {
                  message: 'Enter a Last Name'
                }
              }
            }, 
            designation2: {
              validators: {
                notEmpty: {
                  message: 'Enter Designation'
                }
              }
            }, 
            dept_id2: {
              validators: {
                notEmpty: {
                  message: 'Choose a Department ID'
                }
              }
            }         
          }
        });
        $('#validateForm3').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            program_code3: {
              validators: {
                notEmpty: {
                  message: 'Enter a Program Code'
                }
              }
            },
            program_name3: {
              validators: {
                notEmpty: {
                  message: 'Enter Program Name'
                }
              }
            },
            faculty3: {
              validators: {
                notEmpty: {
                  message: 'Choose a Faculty'
                }
              }
            },
            program_level3: {
              validators: {
                notEmpty: {
                  message: 'Choose a Program level'
                }
              }
            }            
          }
        });
        $('#validateForm4').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            course_code4: {
              validators: {
                notEmpty: {
                  message: 'Enter Course Code'
                }
              }
            },
            course_title4: {
              validators: {
                notEmpty: {
                  message: 'Enter Course Tilte'
                }
              }
            },
            units4: {
              validators: {
                notEmpty: {
                  message: 'Choose the number of units'
                }
              }
            },
            course_coordinator4: {
              validators: {
                notEmpty: {
                  message: 'Choose a Course Coordinator'
                }
              }
            },
            program_code4: {
              validators: {
                notEmpty: {
                  message: 'Choose a Program Code'
                }
              }
            }            
          }
        });
      });
    </script>
    <!-- /Validate Forms -->


  </body>
</html>
