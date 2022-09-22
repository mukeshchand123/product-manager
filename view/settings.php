<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!==true){
    header("location:login.php");
    exit;
  }
?>
<li class="nav-item">
<a class="nav-link" href="password.php">Change Password</a>
</li>