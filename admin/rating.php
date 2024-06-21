<!DOCTYPE html>
<html lang="en">

  <?php
  include("admin_header.php");
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

             <div class="row">


<table class="table table-hover">


    <thead>

      <tr>
        <th>User Name</th>
           <th>User Feedback</th>

      </tr>
    </thead>
    <tbody>

      <?php

      $q = "select * from users";
      $res=mysqli_query($conn,$q);
      while ($row=mysqli_fetch_array($res)) {
        if($row[1] && $row[5]){
          $feedBack=$row[5];
        }
        $tabel=<<<DELIMETER
        <tr>
          <td>$row[1]</td>
            <td>$feedBack</td>

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
