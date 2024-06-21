<!DOCTYPE html>
<html lang="en">
<?php
require_once('config.php');
require_once('header.php');
?>
<?php
if(isset($_GET['paid'])){
// i have to update the QTY on the DB so it decreses in the amount bouth by the user
foreach ($_SESSION as $key => $value) {
  // extracting the product ID from the session key
  $prodID=substr($key,5);
  $q = "select prodQty from products where ID = {$prodID}";
  $res = query($q);
  $row = mysqli_fetch_array($res);
  $stock = $row[0];
  $diff =$stock - $value;
  $q = "update products set prodQty = {$diff} where ID = {$prodID}";
  $res = query($q);// Run the Query on DB
  if(mysqli_affected_rows($conn) == 0){
    echo "Failed to update $key";
  }
}

  session_destroy();
}

?>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <?php
    require_once('topbar.php');
    require_once('navbar.php');
    ?>
    <!-- Carousel Start -->
    <?php
    require_once('carousel.php');
    ?>
    <!-- Carousel End -->
    <!-- Facts Start -->
    <?php
    require_once('facts.php');
    ?>
    <!-- Facts End -->
    <!-- About Start -->
    <?php
    require_once('about.php');
    ?>
    <!-- About End -->
    <!-- Product Start -->
    <?php
  require_once('items.php');
   ?>
    <!-- Product End -->
    <!-- Service Start -->
    <?php
    require_once('service.php');
    ?>

    <!-- Service End -->
    <!-- Team Start -->
    <?php
    require_once('team.php');
    ?>
    <!-- Team End -->
    <!-- Testimonial Start -->
    <?php
    require_once('testimonial.php');
    ?>
    <!-- Testimonial End -->
    <!-- Footer Start -->
    <?php
    require_once('footer.php');
    // require_once('JavaScript.php');
    ?>
    <!-- Footer End -->
</body>

</html>
