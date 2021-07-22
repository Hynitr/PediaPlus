<?php
include("../functions/init.php");


$score = "SELECT sum(score) AS scored  FROM `CBT/4424`";
$rsd   = query($score);
$roww  = mysqli_fetch_array($rsd);

echo $roww['scored'];
?>