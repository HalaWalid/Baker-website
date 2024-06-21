<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial, sans-serif;">


<?php

$conn = mysqli_connect("localhost","root","","baker");

function checkUserExist($username,$password){
  $hashedpass=md5($password);
  global $conn;
  $q="select * from users";
  $res=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($res);
  if($row[1]==$username){
    echo "Username already Exict !";
  }else {
    $q = "insert into  users (username,password,hashedPassword) values ('$username','$password','$hashedpass')";
    $res=mysqli_query($conn,$q);
    // if(mysqli_affected_rows($conn) > 0){
    //      echo "isert into DB was SUCCESSFUL";
    // }else {
    //   echo "<h1> NOT inserted  !!!!!!</h1>";
    //  }

  }
}

if(isset($_GET['submit'])){
checkUserExist($_GET['username'],$_GET['password']);
}
if(isset($_GET['submit2'])){
  global $conn;

$name=$_GET['username'];
$q = "update users set userType = 1 where username = '{$name}'";
$res=mysqli_query($conn,$q);
}

?>




<div style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center;">Add User</h2>
    <form method="get" action="" style="display: flex; flex-direction: column;">
        <label for="username" style="margin-bottom: 5px;">Username:</label>
        <input type="text" id="username" name="username" required style="margin-bottom: 15px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">

        <label for="password" style="margin-bottom: 5px;">Password:</label>
        <input type="password" id="password" name="password" required style="margin-bottom: 15px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">

        <input type="submit" name="submit" value="Add User" style="padding: 10px; border: none; border-radius: 4px; background-color: orange; color: white; cursor: pointer;">
<hr>
        <input type="submit" name="submit2" value="Admin" style="padding: 10px; border: none; border-radius: 4px; background-color: orange; color: white; cursor: pointer;">

    </form>
    <a href="index.php" style="display: block; margin: 20px auto 0 auto; width: fit-content; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 4px; orange: white;">Back to Home Page</a>

</div>
</body>
</html>
