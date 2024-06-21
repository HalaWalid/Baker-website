<!DOCTYPE html>
<html lang="en">

  <?php include("admin_header.php");?>
  <?php

  // header("location:..\index.php");
  // include("..\congfig.php");
  $conn = mysqli_connect("localhost","root","","baker");

   ?>
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





        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Full Name</th>
           <th>Amount</th>
           <th>Status</th>
           <th>Transaction Number</th>
           <th>Order Date</th>
           <th>Items</th>
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
            <td>$row[1]   $row[2]</td>


            <td>$$row[3] $row[6]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[7]</td>
            <td>Items</td>

        </tr>
        DELIMETER;
        echo $tabel;
      }



      ?>



    </tbody>
</table>
</div>











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
