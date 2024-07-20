<?php
session_start();
$_SESSION['userId'] = null;
$_SESSION['userName']  =null;
$_SESSION['email'] = null;
$_SESSION['password'] = null;
$_SESSION['type'] = null;
echo "<script>window.location='index.php';</script>";
?>