<?php

session_start();
ob_start();

$conn = mysqli_connect("localhost","root","","baker");

function addToCount($item){
  $x = "prod_{$item}";
  if(checkQty($x) > $_SESSION[$x])// if Qty in DB is larger than the value of $_SESSION[$x] ( witch is the Qty ordered)
  $_SESSION[$x] = $_SESSION[$x] + 1;
}
function subFromCount($item){
  $_SESSION["prod_{$item}"] -= 1;// or $_SESSION["prod_{$item}"]--;
  if($_SESSION["prod_{$item}"] < 1)
    unset($_SESSION["prod_{$item}"]);
}
function delFromCount($item){
    unset($_SESSION["prod_{$item}"]);
}

// echo checkQty("prod_2");
function checkQty($item){
$productid=substr($item,5); // form 5 to the end of the string
$q="select prodQty from products where ID = {$productid}";
$res = query($q);
$value = mysqli_fetch_array($res);
return $value[0] ;

}



/*function getItemByID($i) {
  global $conn;

  $q = "select * FROM products WHERE id=$i";
  $results = mysqli_query($conn, $q);

  // Check if the query returned any results
  if(mysqli_num_rows($results) > 0) {
    // Fetch the row
    $row = mysqli_fetch_assoc($results);
    // $row=implode(",",$row);
    return $row;
  } else {
    // Handle the case where no item is found with the given ID
    return null;
  }
}*/
// getItemByID(2);
function getItemByID($i){
  global $conn;

  $q = "select * from products where id=$i";
  //echo $q;
  $results = mysqli_query($conn, $q);
  $row = mysqli_fetch_array($results);
  $itemInfo = implode("," , $row);
    // echo $itemInfo;
   return $itemInfo;// returns a String
}


function getAllTabs(){
  global $conn;
  $q = "select catID from categories";
  $results = mysqli_query($conn,$q);
  $str = "";
  while($row = mysqli_fetch_array($results)){
    $tabNo = $row[0] + 1;
    $str .= <<<DELIMETER
    <div id="tab-{$tabNo}" class="tab-pane fade show p-0">
        <div class="row g-3">
    DELIMETER;

    $str .= getAllItemsFromDB("select * from products where category={$row[0]} AND prodQty > 0");

    $str .= <<<DELIMETER
        </div>
    </div>
    DELIMETER;
}
echo $str;
}
// echo getAllItemsFromDB(2);
function getAllItemsFromDB($q){
  global $conn;
  $items = "";

  $results = mysqli_query($conn, $q);
  while($row = mysqli_fetch_array($results)){
// print_r($row);
  $counter=2;
  $items .= <<<DELIMETER
  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
      <div class="text-center p-4">
          <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">&#36;$row[2]</div>
          <h3 class="mb-3">$row[1]</h3>
          <span>$row[4]</span>
      </div>
      <div class="position-relative mt-auto">
          <img class="img-fluid" src="img/product-3.jpg" alt="">
          <div class="product-overlay">
              <a class="btn btn-lg-square btn-outline-light rounded-circle" href="item.php?itemid=$row[0]"><i class="fa fa-eye text-primary"></i></a>
          </div>
      </div>
  </div>
  </div>
  DELIMETER;

  }

  return $items;


}


function getAllItems(){
  global $conn;
  $items = "";

  $q = "select * from products";
  $results = mysqli_query($conn, $q);
  while($row = mysqli_fetch_array($results)){

  $items .= <<<DELIMETER

  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
      <div class="text-center p-4">
          <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">$row[2]</div>
          <h3 class="mb-3">$row[1]</h3>
          <span>$row[4]</span>
      </div>
      <div class="position-relative mt-auto">
          <img class="img-fluid" src="img/product-1.jpg" alt="">
          <div class="product-overlay">
              <a class="btn btn-lg-square btn-outline-light rounded-circle" href="item.php?itemid=$row[0]"><i class="fa fa-eye text-primary"></i></a>
          </div>
      </div>
  </div>
  </div>
  DELIMETER;

  }

  return $items;

}

function connect()
{
    global $conn;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// login();
function login(){
  global $conn;
  if(isset($_POST['submit'])){
      $user=$_POST['username'];
      $pass=$_POST['password'];
      $q="select * from users where username = '{$user}' and password = '{$pass}'";
      $results = mysqli_query($conn, $q);


      if(mysqli_num_rows($results) == 0 ){
          setMsg("Wrong Username or Password !");
      }else{
        $row = mysqli_fetch_array($results);
        $_SESSION['username']=$user;


        if($row[4] == 1 ){
          header("Location:admin/index.php");  // looks for the index page inside the admin folder
        }

        if($row[4] == 0 ){
          header("location:index.php");
        }

      }
  }


}

function setMsg($msg){// so i can reuse this fun to set and show any Other  Error msg
  $_SESSION['message'] = $msg;
}

function showMsg(){
 echo $_SESSION['message'] ;
 unset($_SESSION['message']);
}


// Function to perform a query with a parameter to specify the SQL query
function query($sql)
{
  global $conn;
  if (!$conn) {
      connect();  // Ensure there is a connection
  }
  $result = mysqli_query($conn, $sql);  // Execute the passed SQL query
  check($result);
  return $result;  // Return the result to be used elsewhere
}

// Function to check and report query errors
function check($results)
{
  global $conn;
  if (!$results) {
      echo "Database query failed: " . mysqli_error($conn);  // Report error using the connection object
      exit;  // Optionally exit if the query fails
  }
}

// Function to retrieve all products

 ?>
