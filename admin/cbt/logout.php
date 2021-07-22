<?php
include("../functions/init.php");

$e_id = $_SESSION['examid'];

//drop the virtual table
$snl = "DROP TABLE `$e_id`";
$frd = query($snl);

session_destroy();
header("location: ./");

// redirect("login.php");
?>