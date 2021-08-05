<?php
include("functions/init.php");
class DBController {
	
	
	function runQuery($query) {
		global $con;
		$result = mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($sql) {
			global $con;
			$result  = mysqli_query($con,$sql);
			$rowcount = mysqli_num_rows($result);
			return $rowcount;
		}
	}
?>
