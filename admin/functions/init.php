<?php ob_start();

session_start();

include("db.php");
include("functions.php");

//get database name
$sql = "SELECT * FROM `login`";
$rsl = query($sql);
$GLOBALS['call'] = mysqli_fetch_array($rsl);
?>