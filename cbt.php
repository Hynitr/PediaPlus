<?php
include("functions/init.php");

if(!isset($_SESSION['login'])) {
	redirect("./signup");
    
	} else {

		//check if there is enough PDF credit to take test
        cbtpdfcredit();
	}
?>