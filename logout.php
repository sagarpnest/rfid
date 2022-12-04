<?php

session_start();
echo 'logout';
//unset($_SESSION['UserName']);
//session_abort();
session_destroy();
header("location:Login.php");

?>