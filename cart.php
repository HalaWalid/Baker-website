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
    require_once('topbar.php');
    // require_once('navBar.php');
     ?>


<?php

if(isset($_GET['itemid'])){
  echo $_GET['itemid'];

}

if(isset($_GET['s']) && isset($_GET['itemId']) && isset($_GET['action'])){
  if( $_GET['action'] == 'A')
    {
      addToCount($_GET['itemId']);
      header('Location:cart.php?s=1');
    }
  elseif ($_GET['action'] == 'S'){
      subFromCount($_GET['itemId']);
      header('Location:cart.php?s=1');
  }
  elseif ($_GET['action'] == 'T'){
      delFromCount($_GET['itemId']);
      header('Location:cart.php?s=1');
  }
}


if(isset($_GET['s'])){
  //$lastItem = $_SESSION['lastItem'];
  //if(!isset($_SESSION["prod_$lastItem"])) $_SESSION["prod_$lastItem"] = 1;

echo "<br/><br/><center>";
$form=""; $table ="";
$form .= <<<DELIMETER
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="sb-f6ssr30701053@business.example.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="upload" value="1">
DELIMETER;

$table .= <<<DELIMETER
<h2> Following is Your cart </h2>
<hr>
<table border='1' width='50%' style='margin-top: 20px;class='table-style'><tr><th>Item Name</th><th>Item Unit Price</th>
<th>Item Qty</th><th>Item Total</th><th></th></tr>
DELIMETER;

$itemGrandTotal = 0;
$counter = 0;
// the key is the var wich the ITEMID is stored in  &&&&& the value is the Requisted Qty
foreach($_SESSION as $key => $value){// go through each ele in the session if it is a product ele get the ID
// if the session variable is for a product get product // ID
if(substr($key,0,5) != "prod_") continue;
//$prodID = explode("_", $key);
$prodID = explode("_", $key)[1];
//$prodID=6;
//print_r($prodID);
// print_r($_SESSION);
$itemInfo = getItemByID($prodID);
$ItemInfoArray = explode(",", $itemInfo);// Turns the String returnd by the fun to Array!!!
$itemTotal = $ItemInfoArray[4] * $value;
$itemGrandTotal += $itemTotal;
$counter++;
$form .= <<<DELIMETER
<input type="hidden" name="item_name_{$counter}" value="{$ItemInfoArray[2]}">
<input type="hidden" name="item_number_{$counter}" value="{$prodID}">
<input type="hidden" name="amount_{$counter}" value="{$ItemInfoArray[4]}">
<input type="hidden" name="quantity_{$counter}" value="{$value}">
DELIMETER;
// comm on the next block of code
//Remember ASS ARRAY!!!
// or $.ItemInfoArray[prod_name] name of col in DB
//or $.ItemInfoArray[prod_price]
// $.value is the Qty ordered :)
$table .= <<<DELIMETER
<tr>
<td>$ItemInfoArray[2]</td>
<td>&#36;$ItemInfoArray[4]</td>
<td>$value</td>
<td>&#36;$itemTotal</td>
<td>
<a class='bi bi-plus-circle' name='A' href='cart.php?itemId={$prodID}&action=A&s=1'/>
<a class='bi bi-dash-circle' name='S' href='cart.php?itemId={$prodID}&action=S&s=1'/>
<a class="bi bi-trash" name='T' href='cart.php?itemId={$prodID}&action=T&s=1'/>
</td>
</tr>
DELIMETER;
}
// the top are Bootstrap classes
$table .= <<<DELIMETER
<tr style='border-width:2px'><th colspan='3'>Total</th><th>$itemGrandTotal</th></tr>
<tr><td colspan='3'></td><td><input type="image" name="submit" src="img/paypal_tiny.png" alt="PayPal - pay online" width="100px" height="50px"></td></tr>
</table>
DELIMETER;

echo $form;
echo $table;

$form .= <<<DELIMETER
<input type="image" name="submit" src="img/paypal_tiny.png" alt="PayPal - pay online">
DELIMETER;

echo "</center>";
}


 ?>

<a class="btn btn-primary" href="index.php"> Continue shopping  </a>


</body>

</html>
