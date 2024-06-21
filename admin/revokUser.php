
<!DOCTYPE html>
<html>
<head>
    <title>Control User</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial, sans-serif;">


<?php

$conn = mysqli_connect("localhost","root","","baker");

function RevokeUser($Username){
  global $conn;
  $q = "select * from users where username = {'$Username'}";
  $res=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($res);
  print_r($row);
  if($row[4] == 1){
    $q="update users set userType = 0";
    $res=mysqli_query($conn,$q);
  }else {
    echo "the user is already a normal user Revoked";
  }
}


if(isset($_GET['submit'])){
RevokeUser($_GET['username']);
// echo $_GET['username'];
}


?>




<div style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center;">Enter the Username</h2>
    <form method="get" action="" style="display: flex; flex-direction: column;">
        <label for="username" style="margin-bottom: 5px;">Username:</label>
        <input type="text" id="username" name="username" required style="margin-bottom: 15px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">



        <input type="submit" name="submit" value="Revoke" style="padding: 10px; border: none; border-radius: 4px; background-color: orange; color: white; cursor: pointer;">
    <input type="submit" name="submit2" value="Grant" style="padding: 10px; border: none; border-radius: 4px; background-color: orange; color: white; cursor: pointer;">

    </form>
    <a href="index.php" style="display: block; margin: 20px auto 0 auto; width: fit-content; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 4px; orange: white;">Back to Home Page</a>

</div>
</body>
</html>
