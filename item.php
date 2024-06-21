<!DOCTYPE html>
<html lang="en">

<?php
include('config.php');
include('header.php');
 ?>


<body>


  <?php
  include('topBar.php');
  // include('navBar.php');
   ?>

<?php
$item = Array();
if(isset($_GET['itemid'])){
//get Item information from the DB and fill this page
  $str = getItemByID($_GET['itemid']);
  //echo $str;
  $item = explode("," , $str);
  // echo $item[0];
  // echo $item[2];
  // echo $item[4];
  // echo $item[6];
  // echo $item[8];
  //echo $item[10];
  $_SESSION["prod_{$item[0]}"] = 1;
  //print_r($item);
}

 ?>
    <!-- Page Content -->
<div class="container">


<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row align-items-center" style="padding-top: 100px;"> <!-- Added padding top and align-items-center -->

    <div class="col-md-7">

       <img class="img-responsive" src="img/product-1.jpg" alt="IMG"  width="300px" height="300px">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">


    <div class="caption-full">
        <h2><a href="#"><?php echo $item[2]; ?></a> </h2>
        <hr>
        <p style="font-weight: bold; color: #000;">Price : &#36; <?php echo $item[4]; ?></p>



        <p>
        <?php echo $item[6]; ?>

        </p>


    <form action="cart.php" method="get">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="ADD TO CART" name="s">
        </div>
    </form>

    </div>

</div>

</div>


</div><!--Row For Image and Short Description-->

    </div>
        <?php
    // include('footer.php');
         ?>


    <!-- /.container -->



</body>

</html>
