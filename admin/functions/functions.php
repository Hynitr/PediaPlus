<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}

function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}



function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}


function validator($error_message) {

$error_message = <<<DELIMITER
<div style="background: rgba(234, 114, 140, 0.9); color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p style="color: white;"><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}

/****** Helper Functions********/

function table_exist($conc) {
$sql = "SHOW TABLES LIKE '%$conc'";
$result = query($sql);
while ($row = mysqli_fetch_row($result)) {
	if($row[0] == $conc) {
	return true;
} else {

	return false;
}
}
mysqli_free_result($result);

}


function sn_exist($sn, $subj) {

	$sql = "SELECT * FROM `$subj` WHERE `sn` = '$sn'";
	$result = query($sql);

	if(row_count($result) == 1) {
		return true;
		
	}else {
		return false;
		
	} 
}




function sn_dexist($sn, $subj) {

	$sql = "SELECT * FROM `$subj` WHERE `sn` = '$sn'";
	$result = query($sql);

	if(row_count($result) == 1) {
		return false;
		
	}else {
		return true;
		
	} 
}


/**********************validate user login functions**********/

$errors = [];

 	if(isset($_POST['usrname']) && isset($_POST['password'])) {

			$user_name       = clean($_POST['usrname']);
			$password   	 = clean(md5($_POST['password']));

			
			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(login_user($user_name, $password)) {

					echo validator("Loading...Please wait!");												
				 echo '<script>window.location.href ="dashboard/./"</script>';

				} else {

					echo validator("Wrong Username or Password");
				}
			} 

		}


/************************ user login functions**********/

function login_user($user_name, $password) {

$sql = "SELECT `password` FROM `login` WHERE `username` = '".escape($user_name)."'";
$result = query($sql);
if(row_count($result) == 1) {
	$row = mysqli_fetch_array($result);

	$user_password = $row['password'];

	if($password == $user_password) {
		$_SESSION['cbt'] = $user_name;

	return true;
} else {

	return false;
}
}
}
 //end of function 


//---------------------//



//process category
$errors = [];

if(isset($_POST['catclass']) && isset($_POST['subject']) && isset($_POST['hour']) && isset($_POST['minutes']) && isset($_POST['quess']) && isset($_POST['instruct'])) {

	//set and clean variables
	$class 		=	clean($_POST['catclass']);
	$subject	= 	clean($_POST['subject']);
	$hour 		=   $_POST['hour'];
	$minutes 	=   $_POST['minutes'];
	$quess      = 	$_POST['quess'];
	$instruct   =   $_POST['instruct'];
	$conc 	 = 	strtolower($class."_".$subject);


	//check if table exit
	if(table_exist($conc)) {

			$errors[] = "This table database exit! <a style='color: white;' href='./uploaded?id=$conc'>Click here to edit or preview questions</a>";
		} else {


	if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(create_table($class, $subject, $conc, $hour, $minutes, $quess, $instruct)) {

			echo "Loading... Please wait";											
				echo "Uh oh! Something went wrong :(";

				} else {

					echo "Loading...Please wait!";												
				 echo '<script>window.location.href ="./questions?id='.$conc.'"</script>';
				}
			} 
		}

		}


/************************ create table basic functions**********/

function create_table($class, $subject, $conc, $hour, $minutes, $quess, $instruct) {

// sql to create table
$sql = "CREATE TABLE `".$conc."`
(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
sn text(255),
question text(255),
oa text(255),
ob text(255),
oc text(255),
od text(255),
correct text(255)
)";
$result = query($sql);
confirm($result);

//time allowed

$sqll = "INSERT INTO timer(`subject`, `hour`, `min`, `attempt`, `instruct`)";
$sqll.= " VALUES('$conc', '$hour', '$minutes', '$quess', '$instruct')";
$resullt = query($sqll);	
confirm($resullt);

}
 //end of function 


//---------------------//



//jssprocess category
$errors = [];

if(isset($_POST['jssclass']) && isset($_POST['jsssubject']) && isset($_POST['jsshour']) && isset($_POST['jssminutes']) && isset($_POST['jssquess']) && isset($_POST['jssedit'])) {

	//set and clean variables
	$class 		=	clean($_POST['jssclass']);
	$subject	= 	clean($_POST['jsssubject']);
	$jsshour	=   $_POST['jsshour'];
	$jssminutes = 	$_POST['jssminutes'];
	$jssquess   =   $_POST['jssquess'];
	$jssedit   =   $_POST['jssedit'];
	$conc 		 = 	strtolower($class."_".$subject);


	//check if table exit
	if(table_exist($conc)) {

			$errors[] = "This table database exit! <a style='color: white;' href='./uploaded?id=$conc'>Click here to edit or preview questions</a>";
		} else {


	if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(create_tablejss($class, $subject, $conc, $jsshour, $jssminutes, $jssquess, $jssedit)) {

					echo "Loading... Please wait";												
				echo "Uh oh! Something went wrong :(";

				} else {

					echo "Loading...Please wait!";												
				 echo '<script>window.location.href ="./questions?id='.$conc.'"</script>';
				}
			} 
		}

		}


/************************ create table jss functions**********/

function create_tablejss($class, $subject, $conc, $jsshour, $jssminutes, $jssquess, $jssedit) {

// sql to create table
$sql = "CREATE TABLE `".$conc."`
(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
sn text(255),
question text(255),
oa text(255),
ob text(255),
oc text(255),
od text(255),
correct text(255)
)";
$result = query($sql);
confirm($result);

//time allowed

$sqll = "INSERT INTO timer(`subject`, `hour`, `min`, `attempt`, `instruct`)";
$sqll.= " VALUES('$conc', '$jsshour', '$jssminutes', '$jssquess', '$jssedit')";
$resullt = query($sqll);
confirm($resullt);

}
 //end of function 




//---------------------//



//seniorprocess category
$errors = [];

if(isset($_POST['seniorclass']) && isset($_POST['seniorsubject']) && isset($_POST['sshour']) && isset($_POST['ssminutes']) && isset($_POST['ssquess']) && isset($_POST['ssedit'])) {

	//set and clean variables
	$class 		=	clean($_POST['seniorclass']);
	$subject	= 	clean($_POST['seniorsubject']);
	$sshour		= 	$_POST['sshour'];
	$ssminutes	= 	$_POST['ssminutes'];
	$ssquess    = 	$_POST['ssquess'];
	$ssedit    = 	$_POST['ssedit'];
	$conc 	 = 	strtolower($class."_".$subject);


	//check if table exit
	if(table_exist($conc)) {

			$errors[] = "This table database exit! <a style='color: white;' href='./uploaded?id=$conc'>Click here to edit or preview questions</a>";
		} else {


	if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(create_tablesss($class, $subject, $conc, $sshour, $ssminutes, $ssquess, $ssedit)) {

					echo "Loading...Please wait!";												
				echo "Uh oh! Something went wrong :(";

				} else {

					echo "Loading...Please wait!";												
				 echo '<script>window.location.href ="./questions?id='.$conc.'"</script>';
				}
			} 
		}

		}


/************************ create table sss functions**********/

function create_tablesss($class, $subject, $conc, $sshour, $ssminutes, $ssquess, $ssedit) {

// sql to create table
$sql = "CREATE TABLE `".$conc."`
(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
sn text(255),
question text(255),
oa text(255),
ob text(255),
oc text(255),
od text(255),
correct text(255)
)";
$result = query($sql);
confirm($result);

//time allowed

$sqll = "INSERT INTO timer(`subject`, `hour` , `min`, `attempt`, `instruct`)";
$sqll.= " VALUES('$conc', '$sshour' , '$ssminutes', '$ssquess', '$ssedit')";
$resullt = query($sqll);
confirm($resullt);

}
 //end of function 



//---------------------//



//onlineexamination process category
$errors = [];

if(isset($_POST['onlinesubject']) && isset($_POST['othour']) && isset($_POST['otminutes']) && isset($_POST['otquess'])  && isset($_POST['otedit'])) {

	//set and clean variables
	$conc	     = clean($_POST['onlinesubject']);
	$othour      = $_POST['othour'];
	$otminutes   = $_POST['otminutes'];
	$otquess     = $_POST['otquess'];
	$otedit     = $_POST['otedit'];


	//check if table exit
	if(table_exist($conc)) {

			$errors[] = "This table database exit! <a style='color: white;' href='./uploaded?id=$conc'>Click here to edit or preview questions</a>";
		} else {


	if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(create_tableOnline($conc, $othour, $otminutes, $otquess, $otedit)) {

					echo validator("Loading...Please wait!");												
				echo "Uh oh! Something went wrong :(";

				} else {

					echo "Loading...Please wait!";												
				 echo '<script>window.location.href ="./questions?id='.$conc.'"</script>';
				}
			} 
		}

		}


/************************ create table Online functions**********/

function create_tableOnline($conc, $othour, $otminutes, $otquess, $otedit) {

// sql to create table
$sql = "CREATE TABLE `".$conc."`
(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
sn text(255),
question text(255),
oa text(255),
ob text(255),
oc text(255),
od text(255),
correct text(255)
)";
$result = query($sql);
confirm($result);

//time allowed

$sqll = "INSERT INTO timer(`subject`, `hour`, `min`, `attempt`, `instruct`)";
$sqll.= " VALUES('$conc', '$othour', '$otminutes', '$otquess', 'otedit')";
$resullt = query($sqll);
confirm($resullt);

}
 //end of function 




//----------------------///

//questionaire process category
$errors = [];

if(isset($_POST['sn']) && isset($_POST['ques']) && isset($_POST['oa']) && isset($_POST['ob']) && isset($_POST['oc']) && isset($_POST['od']) && isset($_POST['option']) && isset($_POST['subj'])) {

	//assign variables
	$sn 		= $_POST['sn'];
	$ques 		= escape($_POST['ques']);
	$oa 		= escape($_POST['oa']);
	$ob 		= escape($_POST['ob']);
	$oc 		= escape($_POST['oc']);
	$od 		= escape($_POST['od']); 
	$cor 		= escape($_POST['option']);
	$subj 		= $_POST['subj'];

//check if question serial number exist

	if(sn_exist($sn, $subj)) {

			echo "That serial number already exits!";
		}  else {


	if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			}  else {

				if(upload_questionaire($sn, $ques, $oa, $ob, $oc, $od, $cor, $subj)) {

					echo "<script>$(toastr.error('Server Error'));</script>";												

				} else {
					echo "Loading... Please wait";
					echo '<script>window.location.href ="./questions?id='.$subj.'&quest='.$subj.'"</script>';												
				 
				}
			} 
		}

}

//upload questionaries

function upload_questionaire($sn, $ques, $oa, $ob, $oc, $od, $cor, $subj) {


$sql = "INSERT INTO `".$subj."`(`sn`, `question`, `oa`, `ob`, `oc`, `od`, `correct`)";
$sql.= " VALUES('$sn', '$ques', '$oa', '$ob', '$oc', '$od', '$cor')";
$result = query($sql);
confirm($result);

}



//----------------------///

//delete questions
$errors = [];

if(isset($_POST['delsn']) && isset($_POST['val'])) {

	//variables
	$dels 		= 	 clean($_POST['delsn']);
	$val 		= 	 clean($_POST['val']);

if(sn_dexist($dels, $val)) {

			echo "That serial number does not exits!";
		}  else {
	
if(!empty($errors)) {

		foreach ($errors as $error) {
	
            echo validation_errors($error); 

		}

	}  else {

		if(delete_question($dels, $val)) {

			echo "<script>$(toastr.error('Server Error'));</script>";												

		} else {
			echo "Loading... Please wait";
			echo '<script>window.location.href ="./questions?id='.$val.'&del='.$dels.'"</script>';												
		 
		}
	} 
}
}

//delete function

function delete_question($dels, $val) {

	$sql = "DELETE FROM `".$val."` WHERE sn = '".$dels."'";
	$result = query($sql);
	confirm($result);

}



//----------------------///

//delete subject
$errors = [];

if(isset($_POST['delsbj'])) {

	//variables
	$delsbj 		= 	 clean($_POST['delsbj']);

if(!empty($errors)) {

		foreach ($errors as $error) {
	
            echo validation_errors($error); 

		}

	}  else {

		if(delete_subject($delsbj)) {

			echo "<script>$(toastr.error('Server Error'));</script>";												

		} else {
			echo "Loading... Please wait";
			echo '<script>window.location.href ="./deletesubject?id=deleted"</script>';												
		 
		}
	} 
}

//delete subject function

function delete_subject($delsbj) {

	$sqll = "DELETE FROM `timer` where subject = '".$delsbj."'";
	$resullt = query($sqll);
	confirm($resullt);

	$sql = "DROP TABLE `".$delsbj."`";
	$result = query($sql);
	confirm($result);

}



//----------------------///

//reset subject question
$errors = [];

if(isset($_POST['subb'])) {

	//variables
	$subb 		= 	 clean($_POST['subb']);

if(!empty($errors)) {

		foreach ($errors as $error) {
	
            echo validation_errors($error); 

		}

	}  else {

		if(reset_subject($subb)) {

			echo "<script>$(toastr.error('Server Error'));</script>";												

		} else {
			echo "Loading... Please wait";
			echo '<script>window.location.href ="./questions?id='.$subb.'&res='.$subb.'"</script>';												
		 
		}
	} 
}

//reset subject function

function reset_subject($subb) {

	$sql  = "DELETE FROM `".$subb."`";
	$result = query($sql);
	confirm($result);

}


//-----------------//

//cbtstarted
$errors = [];

if (isset($_POST['sur']) && isset($_POST['nme']) && isset($_POST['sbj'])) {

		$sur		= 	clean($_POST['sur']);
		$nme 		=   clean($_POST['nme']);
		$sbj 		= 	clean($_POST['sbj']);

		$e_id 		= 	"CBT/".rand(0, 9999);

			
$det = "SELECT * from `login`";
$resw = query($det);
$nxt = mysqli_fetch_array($resw);
$uve = $nxt['acesscode'];

if ($uve != $nme) {
	echo "Invalid Access Code!";
} else {



$sqler = "SELECT * from timer WHERE `subject` = '".$sbj."'";
$resullt = query($sqler);
while($row_counted = mysqli_fetch_array($resullt))
{
$hr    =  $row_counted['hour'];
$min   =  $row_counted['min'];
}


		//convert time to minutes
		function minutes($time){
		$time = explode(':', $time);
		return ($time[0]*60) + ($time[1]) + ($time[2]/60);
		}
		$hour = $hr;
		$minutes = $min;
		$sec = 00;

		$all = $hour.":".$minutes.":".$sec;
		$saved = minutes($all);



     $timer    = $saved;

     $_SESSION["duration"] = $timer;
     $_SESSION["start_time"] = date("Y-m-d H:i:s");


     $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

     $_SESSION["end_time"] = $end_time;

			

			echo "Loading... Please wait <br/> Make sure you have a strong internet connection";
			$_SESSION['subject'] = $sbj;
			$_SESSION['examid']  = $e_id;
			$_SESSION['names']   = $sur;


															
		 	echo '<script>window.location.href ="./cbt"</script>';

}
		
}

//started exam

function cbtexam() {

$tstart 		= 		date("h:i:sa");
$year			= 		date("Y");

$data     = $_SESSION['subject'];
$e_id     = $_SESSION['examid'];
$names    = $_SESSION['names'];

$sql = "INSERT INTO result(`stud_id`, `names`, `year`, `tstart`, `subject`)";
$sql.= " VALUES('$e_id', '$names', '$year', '$tstart', '$data')";
$result = query($sql);
confirm($result);

}



//validate update access code
if(isset($_POST['ascode'])) {

	$ascode = clean($_POST['ascode']);

	updateaccess($ascode); 
} 


//update updatedata
function updateaccess($ascode) {

$nww 	= md5(rand(0,99999999));

$sql = "UPDATE `login` SET `acesscode` = '$ascode'";
$result = query($sql);
echo '<script>window.location.href ="./access?id='.$nww.'"</script>';	

}


if(isset($_POST['idc']) && isset($_POST['hourc']) && isset($_POST['minutesc']) && isset($_POST['quessc']) && isset($_POST['editc'])) {

	//set and clean variables
	$id			=	$_POST['idc'];
	$hour		= 	$_POST['hourc'];
	$minutes	=   $_POST['minutesc'];
	$quessc     =   $_POST['quessc'];
	$editc 		=	$_POST['editc'];


	
	$sql = "UPDATE `timer` SET `hour` = '$hour', `min` = '$minutes', `attempt` = '$quessc', `instruct` = '$editc' WHERE `subject` = '$id'";
	$result = query($sql);
	echo "Loading... Please wait";
	echo '<script>window.location.href ="./questions?id='.$id.'"</script>';
		}

?>