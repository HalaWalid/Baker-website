<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
  // print_r($_SESSION);
  header("location:..\index.php");
}
$conn = mysqli_connect("localhost","root","","baker");
?>
  <?php include("admin_header.php");?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
  <?php include("nav_header.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <?php include("nav_side.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <?php include("Title.php");?>
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->

                <!-- /.row -->
                <div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <?php
                                    $q="select count(ID) from payments";
                                    $res=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($res);
                                    // echo $row[0];
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php   echo $row[0];?></div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <?php
                                    $q="select count(ID) from products";
                                    $res=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($res);
                                    // echo $row[0];
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row[0];?></div>
                                        <div>Products!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <?php
                                    $q="select count(catID) from categories";
                                    $res=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($res);
                                    // echo $row[0];
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row[0];?></div>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                </div>

                <!-- /.row -->


                <!-- SECOND ROW WITH TABLES-->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order Time</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                          $q = "select * from payments";
                                          $res=mysqli_query($conn,$q);
                                          while ($row=mysqli_fetch_array($res)) {
                                            $tabel=<<<DELIMETER
                                            <tr>
                                                <td>$row[0]</td>
                                                <td>$row[7]</td>

                                                <td>3:20 PM</td>
                                                <td>$$row[3]</td>


                                            </tr>
                                            DELIMETER;
                                            echo $tabel;
                                          }



                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>







                     <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-desktop fa-fw"></i> Categories Available </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Category Name</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                          $q = "select * from categories";
                                          $res=mysqli_query($conn,$q);
                                          while ($row=mysqli_fetch_array($res)) {
                                            $tabel=<<<DELIMETER
                                            <tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>

                                            </tr>
                                            DELIMETER;
                                            echo $tabel;
                                          }



                                          ?>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


















                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("footer.php")?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
