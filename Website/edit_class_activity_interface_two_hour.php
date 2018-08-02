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
                    <h2>Edit value and submit</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">

                      <?php

                          echo "<tr>";
                          echo "<th>Time Slot</th>";
                          echo "<th>Student Activity</th>";
                          echo "<th>Lecturer Activity</th>";
                          echo "<th>Student Engagement</th>";
                          echo "<th>Number of Students</th>";
                          echo "</tr>";

                          $id = $_POST['ID'];

                          $stmt_1=$dbcon->prepare("SELECT ID, Time_Slot, Student_Activity, Faculty_Activity, Student_Engagement, Num_Students FROM Class_Activity_Two_Hour WHERE ID = '$id'");       
                          $stmt_1->execute();

                          $stmt_2=$dbcon->prepare("SELECT Activity FROM Student_Activities");
                          $stmt_2->execute();

                          $stmt_3=$dbcon->prepare("SELECT Activity FROM Faculty_Activities");
                          $stmt_3->execute();

                          $stmt_4=$dbcon->prepare("SELECT Engagement FROM Student_Engagement");
                          $stmt_4->execute();


                          while($row1=$stmt_1->fetch(PDO::FETCH_ASSOC)  ){

                            echo "<tr><form action=update_class_activity_two_hour.php method=post>";
                            echo "<td><input type=text class=form-control name=ts_d disabled=disabled value='".$row1['Time_Slot']."'></td>";
                            echo "<td>
                            <select class=form-control name=sa>
                              <option value=".$row1['Student_Activity'].">".$row1['Student_Activity']." - Current Value</option>";   
                              while ($row2=$stmt_2->fetch(PDO::FETCH_ASSOC) ){
                                echo "<option value=".$row2['Activity'].">".$row2['Activity']."</option>";}
                            echo "</select>
                            </td>";
                            echo "<td>
                            <select class=form-control name=fa>
                              <option value=".$row1['Faculty_Activity'].">".$row1['Faculty_Activity']." - Current Value</option>";
                              while ($row3=$stmt_3->fetch(PDO::FETCH_ASSOC) ){
                                echo "<option value=".$row3['Activity'].">".$row3['Activity']."</option>";}
                            echo" </select>                          
                            </td>";
                            echo "<td>
                            <select class=form-control name=se>
                              <option value=".$row1['Student_Engagement'].">".$row1['Student_Engagement']." - Current Value</option>";
                              while ($row4=$stmt_4->fetch(PDO::FETCH_ASSOC) ){
                                echo "<option value=".$row4['Engagement'].">".$row4['Engagement']."</option>";}
                            echo" </select>                        
                            </td>";                                  
                            echo "<td><input type=text class=form-control name=ns value='".$row1['Num_Students']."'>
                            </td>";
                            echo "<input type=hidden name=id value='".$row1['ID']."'>";
                            echo "<input type=hidden name=ts value='".$row1['Time_Slot']."'>";
                            echo "<td><button type=submit class=btn btn-primary >Change</button></td>";
                            echo "</form></tr>";
                          }
                          
                         
                      ?>
                    </table> 


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
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>


  </body>
</html>
