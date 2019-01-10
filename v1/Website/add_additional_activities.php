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
                <h3>Add new Instructor and Student activities for a class </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a new Instructor Actvity<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm1"  action="add_additional_activities.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Activity</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="faculty_activity" value="<?php if(isset($_POST['faculty_activity'])){echo htmlentities($_POST['faculty_activity']);}?>">
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
                  $faculty_activity = $_POST['faculty_activity'];

                  $stmt_1=$dbcon->prepare("INSERT INTO `Faculty_Activities`(`Activity`) VALUES ('$faculty_activity')");       
                  $stmt_1->execute();
                  }
              ?> 


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a new Student Actvity<small>#Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left" id="validateForm2"  action="add_additional_activities.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Activity</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type = "text" class="form-control" name="student_activity" value="<?php if(isset($_POST['student_activity'])){echo htmlentities($_POST['student_activity']);}?>">
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


              <?php
                if(isset($_POST['submit2'])){
                  $student_activity = $_POST['student_activity'];

                  $stmt_1=$dbcon->prepare("INSERT INTO `Student_Activities`(`Activity`) VALUES ('$student_activity')");       
                  $stmt_1->execute();
                  }
              ?>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Instructor Activities <small>#Comment</small></h2>
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
                          <th>Faculty_Activity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $stmt_1=$dbcon->prepare("SELECT Activity FROM Faculty_Activities");       
                          $stmt_1->execute();
                          while ($row=$stmt_1->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>".$row["Activity"]."</td>";
                            echo "</tr>";}
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Student Activities <small>#Comment</small></h2>
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
                          <th>Student_Activity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $stmt_2=$dbcon->prepare("SELECT Activity FROM Student_Activities");       
                          $stmt_2->execute();
                          while ($row=$stmt_2->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>".$row["Activity"]."</td>";
                            echo "</tr>";}
                        ?>
                      </tbody>
                    </table>
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
            faculty_activity: {
              validators: {
                notEmpty: {
                  message: 'Enter an Activity'
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
            student_activity: {
              validators: {
                notEmpty: {
                  message: 'Enter an Activity'
                }
              }
            },      
          }
        });
      });
    </script>
    <!-- /Validate Forms -->

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


  </body>
</html>
