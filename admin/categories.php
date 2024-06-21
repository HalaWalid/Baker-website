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

<h1 class="page-header">
  Product Categories

</h1>
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
                     if(isset($_GET['submit'])){
                       // echo $_GET['newCat'];
                       $newCat=$_GET['newCat'];
                       $q = "insert into categories (CatName) values ('$newCat')";
                       $res=mysqli_query($conn,$q);

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


<div class="col-md-4">

    <form action="" method="get">

        <div class="form-group">
            <label for="category-title">New category</label>
            <input type="text"  name="newCat" class="form-control">
        </div>

        <div class="form-group">
          <input type="submit" name="submit" value="Add Category" class="btn btn-primary">


        </div>


    </form>


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
