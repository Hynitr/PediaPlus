<?php
session_start();
if(!isset($_SESSION['cbt'])) {
	 header("location: ./login");
	} else {

		header("location: dashboard/./");
	}
?>