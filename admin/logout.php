<?php
session_start();
include("functions/init.php");

session_unset();
header("location: ./login");

// redirect("login.php");
?>