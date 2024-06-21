<?php
session_start();
// destroy_session();
session_destroy();
header("location:..\index.php");
?>
