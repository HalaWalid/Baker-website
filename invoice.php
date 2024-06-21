<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('header.php');
?>


<body>

    <?php
    require_once('topBar.php');
    // require_once('navBar.php');
    ?>


    <?php
    //st=Completed&
    //tx=5WB083514G524781R&
    //cc=USD&
    //amt=95.92&

    //st=Completed&
    //tx=74919198D6319214S&
    //cc=USD&
    //amt=24.00&
    //first_name=walid
    //last_name=Khalid

// cols in DB
// ID	first_name	last_name	amount	status	transaction	currency

// to save transaction data into DataBase
if(isset($_GET['st'])){
  if($_GET['st'] == "Completed"){
    $status = "Completed";
    $currency = $_GET['cc'];
    $amount = $_GET['amt'];
    $trans = $_GET['tx'];
    $fName =  $_GET['first_name'];
    $lName =  $_GET['last_name'];
    $paymentdatewithtime =  $_GET['payment_date'];
    $paymentdate=substr($paymentdatewithtime,0,10);

    $q =  "insert into payments(first_name,last_name,amount,status,transaction,currency,paymentDate) values ('$fName','$lName','$amount','$status','$trans','$currency','$paymentdate')";
// Run the qury
    $res = query($q);
    // if($res > 0){
    //     echo "Trans is saved to DB SUCCESSFUL";
    // }else {
    //   echo "<h1> NOT saved  !!!!!!</h1>";
    // }
    // if(mysqli_affected_rows($conn) > 0){
    //     echo "Trans is saved to DB SUCCESSFUL";
    // }else {
    //   echo "<h1> NOT saved  !!!!!!</h1>";
    // }

  }
}


    if (isset($_GET["st"]) && ($_GET["st"] == "Completed")) {

        echo "<div style='background-color: orange; padding-top: 50px;'><h1 style='text-align: center;'>YOUR PAYMENT WAS SUCCESSFUL</h1><h2 style='text-align: center;'>FOLLOWING IS YOUR INVOICE:</h2></div><center>";
        $table = "";

        $table .= <<<DELIMETER
        <hr>
<table border='1' width='50%' class='table-style'><tr><th>Item Name</th><th>Item Unit Price</th>
<th>Item Qty</th><th>Item Total</th><th></th></tr>
DELIMETER;

        $itemGrandTotal = 0;
        $counter = 0;
        foreach ($_SESSION as $key => $value) {

            if (substr($key, 0, 5) != "prod_") continue;

            $prodID = explode("_", $key)[1];
          //  $prodID = 6;
            $itemInfo = getItemByID($prodID);
            $ItemInfoArray = explode(",", $itemInfo);
            $itemTotal = $ItemInfoArray[4] * $value;
            $itemGrandTotal += $itemTotal;
            $counter++;

            $table .= <<<DELIMETER
<tr>
<td>$ItemInfoArray[2]</td>
<td>$ItemInfoArray[4]</td>
<td>$value</td>
<td>$itemTotal</td>
<td>
</td>
</tr>
DELIMETER;
        }

        $table .= <<<DELIMETER
<tr style='border-width:1px'><th colspan='3'>Total</th><th>$itemGrandTotal</th></tr>
<tr><td colspan='3'></td><td><h1 class="bi bi-printer" onClick="pr();"></h1></td></tr></table>
DELIMETER;

        echo $table;

        echo "</center>";
    }
// <a claa="btn btn-lg-square" href="index.php?paid=1"> return to home page </a>
    ?>
    <!-- <input type ="image" src="" onClick="pr();" />-->

<a class="btn btn-primary" href="index.php?paid=1"> Return to home page </a>
    <script>
        function pr() {
            window.print();
        }
    </script>

    <?php
    // require_once('footer.php');
    // require_once('javascript.php');
    ?>


    <!-- /.container -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
