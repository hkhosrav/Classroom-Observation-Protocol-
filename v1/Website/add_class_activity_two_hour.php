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
                <a href="add_class_activity_two_hour.php" class="site_title">
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
            <div class="clearfix"></div> 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add class activities to a session <small>110 min session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add data</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Preview</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            
                            <form class="form-horizontal form-label-left" id="validateForm" action="add_class_activity_two_hour..php" method="post">
                              <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Year</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select class="form-control" name="Year">
                                    <option value="">Choose option</option>
                                    <?php
                                    $stmt_1=$dbcon->prepare("SELECT Year FROM Year");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Year']."\"";
                                      if(isset($_POST['Year']) == $row['Year'])
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
                                    $stmt_1=$dbcon->prepare("SELECT Semester FROM Semester");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Semester']."\"";
                                      if(isset($_POST['Semester']) == $row['Semester'])
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
                                    $stmt_1=$dbcon->prepare("SELECT Week_Number FROM Teaching_Week");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Week_Number']."\"";
                                      if(isset($_POST['Teaching_Week']) == $row['Week_Number'])
                                          echo 'selected';
                                      echo ">".$row['Week_Number']."</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Date</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input id="select_date1" class="date-picker form-control col-md-7 col-xs-12" type="text" name="Date" value="<?php if(isset($_POST['Date'])){echo htmlentities($_POST['Date']);}?>">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">CourseCode</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select class="form-control" name="Course_Code">
                                    <option value="">Choose option</option>
                                    <?php
                                    $stmt_1=$dbcon->prepare("SELECT Course_Code FROM Course");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Course_Code']."\"";
                                      if(isset($_POST['Course_Code']) == $row['Course_Code'])
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
                                    $stmt_1=$dbcon->prepare("SELECT Personal_No, First_Name, Last_Name FROM Instructor");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Personal_No']."\"";
                                      if(isset($_POST['Instructor']) == $row['Personal_No'])
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
                                    $stmt_1=$dbcon->prepare("SELECT Time FROM Session_Start_Time");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Time']."\"";
                                      if(isset($_POST['Start_Time']) == $row['Time'])
                                          echo 'selected';
                                      echo ">".$row['Time']."</option>";
                                    }
                                    ?>                         
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Duration</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select class="form-control" name="Duration_Minutes">
                                    <option value="">Choose option</option>
                                    <?php
                                    $stmt_1=$dbcon->prepare("SELECT Duration_Minutes FROM Class_Duration_Two_Hour");
                                    $stmt_1->execute();
                                    while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                      echo "<option value=\"".$row['Duration_Minutes']."\"";
                                      if(isset($_POST['Duration_Minutes']) == $row['Duration_Minutes'])
                                          echo 'selected';
                                      echo ">".$row['Duration_Minutes']."</option>";
                                    }
                                    ?>                         
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Enrolled Students</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type = "text" class="form-control" name="Enrolled_Students" value="<?php if(isset($_POST['Enrolled_Students'])){echo htmlentities($_POST['Enrolled_Students']);}?>">
                                </div>
                              </div>

                              <div class="ln_solid"></div>

                              <div class="row">

                                <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Time Slot : 00-02</label>

                                  <div class="col-md-3 col-sm-12 col-xs-12">
                                    <select class="form-control" name="sa_ts0">
                                      <option value="">Student Activity</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Activity FROM Student_Activities");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Activity']."\"";
                                        if(isset($_POST['sa_ts0']) == $row['Activity'])
                                            echo 'selected';
                                        echo ">".$row['Activity']."</option>";
                                      }
                                      ?> 
                                    </select>
                                  </div>

                                  <div class="col-md-3 col-sm-12 col-xs-12">
                                    <select class="form-control" name="la_ts0">
                                      <option value="">Lecturer/Instructor Activity</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Activity FROM Faculty_Activities");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Activity']."\"";
                                        if(isset($_POST['la_ts0']) == $row['Activity'])
                                            echo 'selected';
                                        echo ">".$row['Activity']."</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-md-2 col-sm-12 col-xs-12">
                                    <select class="form-control" name="se_ts0">
                                      <option value="">Student Engagement</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Engagement FROM Student_Engagement");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Engagement']."\"";
                                        if(isset($_POST['se_ts0']) == $row['Engagement'])
                                            echo 'selected';
                                        echo ">".$row['Engagement']."</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-md-2 col-sm-9 col-xs-12">
                                    <input type = "text" class="form-control" placeholder="Number of Students" name="ns_ts0" value="<?php if(isset($_POST['ns_ts0'])){echo htmlentities($_POST['ns_ts0']);}?>">
                                  </div>
                                </div>   

                                <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-12 col-xs-12">Time Slot : 02-04</label>
                                  <div class="col-md-3 col-sm-12 col-xs-12">
                                    <select class="form-control" name="sa_ts1">
                                      <option value="">Student Activity</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Activity FROM Student_Activities");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Activity']."\"";
                                        if(isset($_POST['sa_ts1']) == $row['Activity'])
                                            echo 'selected';
                                        echo ">".$row['Activity']."</option>";
                                      }
                                      ?> 
                                    </select>
                                  </div>
                      
                                  <div class="col-md-3 col-sm-12 col-xs-12">
                                    <select class="form-control" name="la_ts1">
                                      <option value="">Lecturer/Instructor Activity</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Activity FROM Faculty_Activities");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Activity']."\"";
                                        if(isset($_POST['la_ts1']) == $row['Activity'])
                                            echo 'selected';
                                        echo ">".$row['Activity']."</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                
                                  <div class="col-md-2 col-sm-12 col-xs-12">
                                    <select class="form-control" name="se_ts1">
                                      <option value="">Student Engagement</option>
                                      <?php
                                      $stmt_1=$dbcon->prepare("SELECT Engagement FROM Student_Engagement");
                                      $stmt_1->execute();
                                      while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=\"".$row['Engagement']."\"";
                                        if(isset($_POST['se_ts1']) == $row['Engagement'])
                                            echo 'selected';
                                        echo ">".$row['Engagement']."</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                
                                  <div class="col-md-2 col-sm-12 col-xs-12">
                                    <input type = "text" placeholder = "Number of Students" class="form-control" name="ns_ts1" value="<?php if(isset($_POST['ns_ts1'])){echo htmlentities($_POST['ns_ts1']);}?>">
                                  </div>
                                </div>



                                <div class="ln_solid"></div>

                              </div>

                              <div id="target">
                                  <!-- all divs will append here -->
                              </div>

                              <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                                  <button type="submit" class="btn btn-warning" name="preview_add_data_tab1">Preview</button>
                                  <button type="submit" class="btn btn-success" name="submit_add_data_tab1">Submit</button>
                                </div>
                              </div>
                            </form>

                            <?php
                              if(isset($_POST['preview_add_data_tab1'])){                               
                                $Year = $_POST['Year'];
                                $Semester = $_POST['Semester'];
                                $Teaching_Week = $_POST['Teaching_Week'];
                                $Date = $_POST['Date'];
                                $Course_Code = $_POST['Course_Code'];
                                $Instructor = $_POST['Instructor'];
                                $Start_Time = $_POST['Start_Time'];
                                $Duration_Minutes = $_POST['Duration_Minutes'];
                                $Enrolled_Students = $_POST['Enrolled_Students'];

                                $DateNew = strtotime($Date);
                                $Date = date('Y-m-d', $DateNew);

                                $stmt_session_creation=$dbcon->prepare("INSERT INTO `Session_One_Hour_Preview`(`Year`, `Semester`, `Teaching_Week`, `Date`, `Course_Code`, `Instructor`, `Start_Time`, `Duration_Minutes`, `Enrolled_Students`) VALUES  ('$Year','$Semester','$Teaching_Week','$Date','$Course_Code','$Instructor','$Start_Time','$Duration_Minutes','$Enrolled_Students');");       
                                $stmt_session_creation->execute();
                                $last_id = $dbcon->lastInsertId();
                                echo '<span style="color:#c9302c; text-align:center;">Session created for Preview. ' .$last_id;
                                echo '<br>';

                                $stmt_time_slot=$dbcon->prepare("SELECT Slot FROM Time_Slot_One_Hour");
                                $stmt_time_slot->execute();
                                $slots =[];
                                while ($row=$stmt_time_slot->fetch(PDO::FETCH_ASSOC)){
                                  extract($row);
                                  $slots[] = $row['Slot'];}

                                for ($i = 0; $i <= 24; $i++){$sa_array[$i] = $_POST["sa_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$la_array[$i] = $_POST["la_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$se_array[$i] = $_POST["se_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$ns_array[$i] = $_POST["ns_ts".$i];}                  

                                for($i = 0; $i < 25; $i++){
                                  $stmt_class_activity_preview=$dbcon->prepare("INSERT INTO `Class_activity_two_hour._Preview`(`ID`, `Time_Slot`, `Faculty_Activity`, `Student_Activity`, `Student_Engagement`, `Num_Students`) VALUES('$last_id', '$slots[$i]','$la_array[$i]','$sa_array[$i]','$se_array[$i]','$ns_array[$i]');");                                     
                                  $stmt_class_activity_preview->execute();
                                }
                                  
                                echo '<span style="color:#c9302c; text-align:center;">Class Activity data added for preview. ';
                                echo '<br>';
                                header("location:https://projectdemos.uqcloud.net/COPUS/add_class_activity_two_hour..php");
                              }
                            ?>
                          
                            <?php
                              if(isset($_POST['submit_add_data_tab1'])){                               
                                $Year = $_POST['Year'];
                                $Semester = $_POST['Semester'];
                                $Teaching_Week = $_POST['Teaching_Week'];
                                $Date = $_POST['Date'];
                                $Course_Code = $_POST['Course_Code'];
                                $Instructor = $_POST['Instructor'];
                                $Start_Time = $_POST['Start_Time'];
                                $Duration_Minutes = $_POST['Duration_Minutes'];
                                $Enrolled_Students = $_POST['Enrolled_Students'];

                                $DateNew = strtotime($Date);
                                $Date = date('Y-m-d', $DateNew);

                                $stmt_session_creation=$dbcon->prepare("INSERT INTO `Session_One_Hour`(`Year`, `Semester`, `Teaching_Week`, `Date`, `Course_Code`, `Instructor`, `Start_Time`, `Duration_Minutes`, `Enrolled_Students`) VALUES  ('$Year','$Semester','$Teaching_Week','$Date','$Course_Code','$Instructor','$Start_Time','$Duration_Minutes','$Enrolled_Students');");       
                                $stmt_session_creation->execute();
                                $last_id = $dbcon->lastInsertId();
                                echo '<span style="color:#c9302c; text-align:center;">Session created Successfully. ' .$last_id;
                                echo '<br>';

                                $stmt_time_slot=$dbcon->prepare("SELECT Slot FROM Time_Slot_One_Hour");
                                $stmt_time_slot->execute();
                                $slots =[];
                                while ($row=$stmt_time_slot->fetch(PDO::FETCH_ASSOC)){
                                  extract($row);
                                  $slots[] = $row['Slot'];}

                                for ($i = 0; $i <= 24; $i++){$sa_array[$i] = $_POST["sa_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$la_array[$i] = $_POST["la_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$se_array[$i] = $_POST["se_ts".$i];}                  
                                for ($i = 0; $i <= 24; $i++){$ns_array[$i] = $_POST["ns_ts".$i];}                  

                                for($i = 0; $i < 25; $i++){
                                  $stmt_class_activity_preview=$dbcon->prepare("INSERT INTO `Class_activity_two_hour.`(`ID`, `Time_Slot`, `Faculty_Activity`, `Student_Activity`, `Student_Engagement`, `Num_Students`) VALUES('$last_id', '$slots[$i]','$la_array[$i]','$sa_array[$i]','$se_array[$i]','$ns_array[$i]');");                                     
                                  $stmt_class_activity_preview->execute();
                                }
                                
                                echo '<span style="color:#c9302c; text-align:center;">Class Activity data successfully added. ';
                                echo '<br>';
                                header("location:https://projectdemos.uqcloud.net/COPUS/add_class_activity_two_hour..php");
                              }
                            ?>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

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
                                            $stmt_sa_1=$dbcon->prepare("SELECT Time_Slot, Student_Activity, Student_Engagement*100, Num_Students FROM Class_activity_two_hour._Preview");       
                                            $stmt_sa_1->execute();
                                            while ($row=$stmt_sa_1->fetch(PDO::FETCH_ASSOC)){
                                              echo "<tr>";
                                              echo "<td>".$row["Time_Slot"]."</td>";
                                              echo "<td>".$row["Student_Activity"]."</td>";
                                              echo "<td>".(int)$row["Student_Engagement*100"]."%</td>";
                                              echo "<td>".$row["Num_Students"]."</td>";
                                              echo "</tr>";
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
                                            $stmt_lp_1=$dbcon->prepare("SELECT Time_Slot, Faculty_Activity, Student_Engagement*100 FROM Class_activity_two_hour._Preview");       
                                            $stmt_lp_1->execute();
                                            while ($row=$stmt_lp_1->fetch(PDO::FETCH_ASSOC)){
                                              echo "<tr>";
                                              echo "<td>".$row["Time_Slot"]."</td>";
                                              echo "<td>".$row["Faculty_Activity"]."</td>";
                                              echo "<td>".(int)$row["Student_Engagement*100"]."%</td>";
                                              echo "</tr>";
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
  
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">                    
                                    <form class="form-horizontal form-label-left" action="add_class_activity_two_hour..php" method="post">
                                      <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5 col-sm-offset-6 col-xs-offset-6">
                                          <button type="submit" class="btn btn-primary" name="discard_add_data_tab2">Discard</button>
                                          <button type="submit" class="btn btn-success" name="submit_add_data_tab2">Submit</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div> 
        
                            <?php
                              if(isset($_POST['discard_add_data_tab2'])){

                                $stmt_op_1=$dbcon->prepare("DELETE FROM `Class_activity_two_hour._Preview`;");       
                                $stmt_op_1->execute();

                                $stmt_op_2=$dbcon->prepare("DELETE FROM `Session_One_Hour_Preview`");       
                                $stmt_op_2->execute();

                                header("location:https://projectdemos.uqcloud.net/COPUS/add_class_activity_two_hour..php");  
                                }
                              
                              if(isset($_POST['submit_add_data_tab2'])){

                                $stmt_0=$dbcon->prepare("SELECT `Year`, `Semester`, `Teaching_Week`, `Date`, `Course_Code`, `Instructor`, `Start_Time`, `Duration_Minutes`, `Enrolled_Students` FROM `Session_One_Hour_Preview`");
                                $stmt_0->execute();
                                while ($row=$stmt_0->fetch(PDO::FETCH_ASSOC)){
                                  extract($row);
                                  $Year = $row['Year'];
                                  $Semester = $row['Semester'];
                                  $Teaching_Week = $row['Teaching_Week'];
                                  $Date = $row['Date'];
                                  $Course_Code = $row['Course_Code'];
                                  $Instructor = $row['Instructor'];
                                  $Start_Time = $row['Start_Time'];
                                  $Duration_Minutes = $row['Duration_Minutes'];
                                  $Enrolled_Students = $row['Enrolled_Students'];
                                } 

                                $stmt_1=$dbcon->prepare("INSERT INTO Session_One_Hour ( `Year`, `Semester`, `Teaching_Week`, `Date`, `Course_Code`, `Instructor`, `Start_Time`, `Duration_Minutes`, `Enrolled_Students`) VALUES ('$Year','$Semester','$Teaching_Week','$Date','$Course_Code','$Instructor','$Start_Time','$Duration_Minutes','$Enrolled_Students')");                                
                                $stmt_1->execute();
                                $last_id = $dbcon->lastInsertId();

                                $stmt_2=$dbcon->prepare("SELECT Time_Slot, Faculty_Activity, Student_Activity, Student_Engagement, Num_Students FROM Class_Activity_One_Hour_Preview");
                                $stmt_2->execute();
                                $slots =[];
                                $sa_array = [];
                                $la_array =[];
                                $se_array = [];                                
                                $ns_array = [];
                                while ($row=$stmt_2->fetch(PDO::FETCH_ASSOC)){
                                  extract($row);
                                  $slots[] = $row['Time_Slot'];
                                  $sa_array[] = $row['Student_Activity'];
                                  $la_array[] = $row['Faculty_Activity'];
                                  $se_array[] = $row['Student_Engagement'];
                                  $ns_array[] = $row['Num_Students'];
                                }                                                 

                                for($i = 0; $i < 25; $i++){
                                  $stmt_class_activity=$dbcon->prepare("INSERT INTO `Class_Activity_One_Hour`(`ID`, `Time_Slot`, `Faculty_Activity`, `Student_Activity`, `Student_Engagement`, `Num_Students`) VALUES('$last_id', '$slots[$i]','$la_array[$i]','$sa_array[$i]','$se_array[$i]','$ns_array[$i]');");                                     
                                  $stmt_class_activity->execute();
                                }

                                $stmt_3=$dbcon->prepare("DELETE FROM `Class_Activity_One_Hour_Preview`;");       
                                $stmt_3->execute();

                                $stmt_4=$dbcon->prepare("DELETE FROM `Session_One_Hour_Preview`;");       
                                $stmt_4->execute();

                                header("location:https://projectdemos.uqcloud.net/COPUS/add_class_activity_two_hour.php");  
                                }
                            ?>

                          </div>

                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>         
            </div>
           
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
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#select_date1').daterangepicker({
          singleDatePicker: true,
          "startDate": "01/01/2018",
          "endDate": "12/31/2022",
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.format('YYYY-MM-DD'));
      });
      });
    </script>

    <!-- Repeat data entry rows -->
    <script>
    for(var i =1; i<= 10; i++){
      $('#target').append($('<div/>', { id: 'r' + i, 'class' : 'ansbox'}))
    }
    </script>
    <!-- /Repeat data entry rows -->

    <!-- Chart.js -->
    <script>
      /*Chart.defaults.global.legend = {
        enabled: false
      };*/
      //Get Data

      <?php
        $stmt_ip_1=$dbcon->prepare("SELECT Faculty_Activity, COUNT(Faculty_Activity)*2 FROM Class_Activity_One_Hour_Preview GROUP BY Faculty_Activity");
        $stmt_ip_1->execute();
        $json_ip_1_1 =[];
        $json_ip_1_2 = [];
        while ($row=$stmt_ip_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_ip_1_1[] = $row['Faculty_Activity'];
          $json_ip_1_2[] = (int)$row['COUNT(Faculty_Activity)*2'];} 
        
        $stmt_sp_1=$dbcon->prepare("SELECT Student_Activity, COUNT(Student_Activity)*0.25132, AVG(Student_Engagement)*100 FROM Class_Activity_One_Hour_Preview GROUP BY Student_Activity");
        $stmt_sp_1->execute();
        $json_sp_1_1 =[];
        $json_sp_1_2 = [];
        $json_sp_1_3 = [];
        while ($row=$stmt_sp_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_sp_1_1[] = $row['Student_Activity'];
          $json_sp_1_2[] = (float)$row['COUNT(Student_Activity)*0.25132'];
          $json_sp_1_3[] = round((float)$row['AVG(Student_Engagement)*100'],2);}        
        
        $stmt_ss_1=$dbcon->prepare("SELECT Time_Slot, Num_Students FROM Class_Activity_One_Hour_Preview ORDER by Time_Slot");
        $stmt_ss_1->execute();
        $json_ss_1_1 =[];
        $json_ss_1_2 = [];
        while ($row=$stmt_ss_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_ss_1_1[] = $row['Time_Slot'];
          $json_ss_1_2[] = $row['Num_Students'];} 

        
        $stmt_se_1=$dbcon->prepare("SELECT Time_Slot, (Student_Engagement)*100 FROM Class_Activity_One_Hour_Preview ORDER by Time_Slot");
        $stmt_se_1->execute();
        $json_se_1_1 =[];
        $json_se_1_2 = [];
        while ($row=$stmt_se_1->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $json_se_1_1[] = $row['Time_Slot'];
          $json_se_1_2[] = $row['(Student_Engagement)*100'];} 

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

    <!-- Validate Forms-->
    <script>
      $(document).ready(function(){
        var fieldsa = {
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
                  message: 'Choose a Teaching Week'
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
            Course_Code: {
              validators: {
                notEmpty: {
                  message: 'Choose a Course Code'
                }
              }
            },
            Instructor: {
              validators: {
                notEmpty: {
                  message: 'Choose an Instructor'
                }
              }
            },
            Start_Time: {
              validators: {
                notEmpty: {
                  message: 'Choose a Start time'
                }
              }
            },
            Duration_Minutes: {
              validators: {
                notEmpty: {
                  message: 'Choose Duration'
                }
              }
            },
            Enrolled_Students: {
              validators: {
                notEmpty: {
                  message: 'Enter the number of enrolled students'
                },
                integer: {
                  message: 'The count of enrolled students should be an integer'
                }
              }
            },
        }

        var fieldsToCheck = {};

        for (var i = 0; i <= 24; i++) {
          fieldsToCheck["sa_ts"+i] = {
            validators: {
              notEmpty: {
                message: 'Choose a student activity'
              }
            }
          };
          fieldsToCheck["la_ts"+i] = {
            validators: {
              notEmpty: {
                message: 'Choose a lecturer activity'
              }
            }
          };
          fieldsToCheck["se_ts"+i] = {
            validators: {
              notEmpty: {
                message: 'Choose a student Engagement'
              }
            }
          };
          fieldsToCheck["ns_ts"+i] = {
            validators: {
              notEmpty: {
                message: 'Enter the number of students present'
              },
              integer: {
                message: 'The count of students present should be an integer'
              }
            }
          };
          
          console.log(fieldsToCheck)
        }

        $('#validateForm').bootstrapValidator({
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: Object.assign({}, fieldsa, fieldsToCheck)
        });

      });


    </script>
    <!-- /Validate Form1-->

  </body>
</html>
