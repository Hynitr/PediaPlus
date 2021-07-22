<?php
function minutes($time){
$time = explode(':', $time);
return ($time[0]*60) + ($time[1]) + ($time[2]/60);
}
$hour = 03;
$minutes = 00;
$sec = 00;

$all = $hour.":".$minutes.":".$sec;
echo minutes($all);
?>