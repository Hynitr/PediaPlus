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

function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}

function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" class="col-md-12 close sucess-op" data-dismiss="alert" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}

function validator($error_message) {

$error_message = <<<DELIMITER
<div style="background: #FFE9E6; color: #ff0000;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}



									/****** Helper Functions********/

function email_exist($email) {

	$sql = "SELECT * FROM signup WHERE `email` = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}

function username_exist($usname) {

	$sql = "SELECT * FROM signup WHERE `usname` = '$usname'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}





/** VALIDATE USER REGISTRATION **/

if(isset($_POST['fname']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['inst']) && isset($_POST['ref'])) {

$fname 			= clean($_POST['fname']);
$tel	 		= clean($_POST['tel']);
$email	 		= clean($_POST['email']);
$uname	 		= clean($_POST['user']);
$pword    		= clean($_POST['pword']);
$cpword 		= clean($_POST['cpword']);
$inst			= clean($_POST['inst']);
$ref            = clean(escape($_POST['ref']));

if(email_exist($email)) {

			echo "Sorry! That email already has an account";
		} else {

if(username_exist($uname)) {

			echo "That username has been taken!";
		} else {


if($pword != $cpword) {

			echo "Password doesn`t match!";
			
		} else {
			register($fname, $tel, $email, $uname, $pword, $inst, $ref);
		}
	}
	}
	} // post request


	

/** REGISTER USER **/
function register($fname, $tel, $email, $uname, $pword, $inst, $ref) {

	$fnam = escape($fname);
	$emai = escape($email);
	$unam = escape($uname);
	$inst = escape($inst);
	$pwor = md5($pword);

	$datereg = date("Y-m-d");

	$activator = token_generator();
	
$sql = "INSERT INTO signup(`id`, `fname`, `usname`, `email`, `pword`, `datereg`, `active`, `tel`, `inst`, `activator`, `vrf`, `ref`, `pvf`)";
$sql.= " VALUES('1', '$fnam', '$unam', '$emai', '$pwor', '$datereg', '0', '$tel', '$inst', '$activator', 'No', '$ref', '0')";
$result = query($sql);

//redirect to verify function
$subj = "VERIFY YOUR EMAIL";
$link = "https://dotpedia.com.ng/./activate?vef=".$activator;

$_SESSION['usemail'] = $email;

mail_mailer($email, $activator, $subj, $link);

//redirect to verify page
echo 'Loading...Please Wait!';
echo '<script>window.location.href ="./verify"</script>';
	 }



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $link) {

$to 		= $email;
$from 		= "noreply@dotpedia.com.ng";
$cmessage 	= "Best Regards<br/> <i>Team DotPedia</i>";

$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = 'https://dotpedia.com.ng/images/cover.png';
$url  = 'https://dotpedia.com.ng';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotpedia.com.ng/css/bootstrap.min.css'><body style='text-align: center;'>";
$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FFE9E6; color: #000;'>";
$body .= "<img style='margin-top: 35px; width: 280px; height: 105px;' src='{$logo}' alt='DotPedia'>";
$body .= "<h1 style='margin-top: 45px; color: #ff0000'>Activate your email to continue</h1>
<br/>";
$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for signing up.;</p>";
$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>We've credited you free 5 PDFs Credit to get started.;</p>
<br/>";
$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to activate your email Address</b></a></p>
<br/>";
$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
$body .= "<p text-align: center;'><a href='https://dotpedia.com.ng/contact'><img src='https://dotpedia.com.ng/images/6.png'></a>";
$body .= "<p style='text-align: center;'>Email.: <span style='color: #ff0000'>pdf@dotpedia.com.ng</span></p>";	
$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #ff0000'>+234(0) 810 317 1902</span></p>";	
$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotPedia from DotEightPlus</p>";	
$body .= "<script src='https://dotpedia.com.ng/js/bootstrap.min.js'></script>";
$body .= "</section>";	
$body .= "</body></html>";
$send = mail($to, $subject, $body, $headers);
}



/** SIGN IN USER **/
 	if(isset($_POST['username']) && isset($_POST['password'])) {

			$username        = clean(escape($_POST['username']));
			$password   	 = md5($_POST['password']);

			$sql = "SELECT * FROM `signup` WHERE `usname` = '$username' AND `pword` = '$password'";
			$result = query($sql);
			if(row_count($result) == 1) {

				$row 	= mysqli_fetch_array($result);
				$user 	= $row['usname'];
				$active = $row['active'];
				$email 	= $row['email'];

				if ($active == 0) {

					$activator = token_generator();

					$_SESSION['usemail'] = $email;

					//update activation link
					$ups = "UPDATE signup SET `activator` = '$activator' WHERE `usname` = '$username'";
					$ues = query($ups);

					//redirect to verify function
					$subj    = "VERIFY YOUR EMAIL";
					$link 	 = "https://dotpedia.com.ng/./activate?vef=".$activator;

					mail_mailer($email, $activator, $subj, $link);

					//redirect to verify page
					echo '<script>window.location.href ="./verify"</script>';	
					
				}  else {

					if($username == $user) {
						
						$_SESSION['login'] = $username;

						echo 'Loading...Please Wait';	

						echo '<script>window.location.href ="./pdf"</script>';	
					} else {

						echo "This username doesn't have an account.";
					}

			} 

		}else {

			echo "Invalid Login";
		}
	}



/** FORGOT PASSWORD **/
if(isset($_POST['fgeml'])) {
	
	$email  = clean(escape($_POST['fgeml']));

	if(!email_exist($email)) {

		echo "Sorry! This email doesn't exit";
		
	} else {

	$activator = token_generator();

	$ssl = "UPDATE signup SET `activator` = '$activator' WHERE `email` = '$email'";
	$rsl = query($ssl);

	//redirect to verify function
	$subj = "RESET YOUR PASSWORD";
	$link = "https://dotpedia.com.ng/./reset?vef=".$activator;

	$_SESSION['fgeml'] = $email;

	fgmail_mailer($email, $activator, $subj, $link);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./recover"</script>';

	}
}


/** FORGOT PASSWORD EMAIL **/
function fgmail_mailer($email, $activator, $subj, $link) {
	
$to 		= $email;
$from 		= "noreply@dotpedia.com.ng";
$cmessage 	= "Best Regards<br/> <i>Team DotPedia</i>";

$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = 'https://dotpedia.com.ng/images/cover.png';
$url  = 'https://dotpedia.com.ng';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotpedia.com.ng/css/bootstrap.min.css'><body style='text-align: center;'>";
$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FFE9E6; color: #000;'>";
$body .= "<img style='margin-top: 35px; width: 280px; height: 105px;' src='{$logo}' alt='DotPedia'>";
$body .= "<h1 style='margin-top: 45px; color: #ff0000'>Recover Your Password</h1>
<br/>";
$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> You requested for a password reset</p><br/>";

$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to recover your password</b></a></p>
<br/>";
$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Kindly ignore this mail if this wasn't from you.</p>";	
$body .= "<p text-align: center;'><a href='https://dotpedia.com.ng/contact'><img src='https://dotpedia.com.ng/images/6.png'></a>";
$body .= "<p style='text-align: center;'>Email.: <span style='color: #ff0000'>pdf@dotpedia.com.ng</span></p>";	
$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #ff0000'>+234(0) 810 317 1902</span></p>";	
$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotPedia from DotEightPlus</p>";	
$body .= "<script src='https://dotpedia.com.ng/js/bootstrap.min.js'></script>";
$body .= "</section>";	
$body .= "</body></html>";
$send = mail($to, $subject, $body, $headers);
}



/** RESET PASSWORD **/
if(isset($_POST['fgpword']) && isset($_POST['fgcpword']) && isset($_POST['act'])) {

	$fgpword = md5($_POST['fgpword']);

	$sql = "UPDATE signup SET `pword` = '$fgpword', `activator` = '$act' WHERE `activator` = '$activator'";
	$rsl = query($sql);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./updated"</script>';
}




/** UPLOAD PROFILE PICTURE **/
if (!empty($_FILES["fle"]["name"])) {
	
	$target_dir = "../images/profilepix/";
	$target_file =  basename($_FILES["fle"]["name"]);
	$targetFilePath = $target_dir . $target_file;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	   
		// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
		echo "Sorry, this image format is not allowed";
		$uploadOk = 0;
	} else {
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	   echo "Sorry, your profile picture was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	   
	   move_uploaded_file($_FILES["fle"]["tmp_name"], $targetFilePath);
	   img_prod($target_file);

	  echo 'Loading...Please Wait!';
	  echo '<script>window.location.href ="./profile"</script>';
}
}	    	
}



/** UPDATE PROFILE PICTURE SCRIPT **/
function img_prod($target_file) {

	$proid    = $_SESSION['login'];

	$sql = "UPDATE signup SET `pix` = '$target_file' WHERE `usname` = '$proid'";
	$res = query($sql);
}



/** GLOBAL CHECK **/
function global_check() {

	$idl = $_SESSION['login'];
	
	$sql = "SELECT * FROM signup WHERE `usname` = '$idl'";
	$rsl = query($sql);

	if(row_count($rsl) == '') {

		redirect("./signup");
		
	} else {

		$row = mysqli_fetch_array($rsl);

	}
	
}


/** DEDUCT PDF CREDIT FOR PQ */
function pqpdfcredit() {

	$user = $_SESSION['login'];
    
    $dds = "SELECT * FROM signup WHERE `usname` = '$user'";
    $rds = query($dds);

    $dws = mysqli_fetch_array($rds);

    $pdd = $dws['pdfcredit'];

    //check if user have enough pdf credit
    if($pdd <= 1) {

        //alert
        echo '<script>
        if(confirm("You do not have sufficient PDF Credit!")){
            txt = window.location.href = "./credit";
        } else {
            txt = window.location.href = "./credit";
        }
        </script>';
        
    } else {

    $a = (int)$pdd - 1;

    $pds = "UPDATE signup SET `pdfcredit` = '$a' WHERE `usname` = '$user'";
    $psl = query($pds);


    }
}




/** DEDUCT PDF CREDIT FOR TAKE A TEST - CBT */
function cbtpdfcredit() {

	$user = $_SESSION['login'];
    
    $dds = "SELECT * FROM signup WHERE `usname` = '$user'";
    $rds = query($dds);

    $dws = mysqli_fetch_array($rds);

    $pdd = $dws['pdfcredit'];

    //check if user have enough pdf credit
    if($pdd <= 2) {

        //alert
        echo '<script>
        if(confirm("You do not have sufficient PDF Credit!")){
            txt = window.location.href = "./credit";
        } else {
            txt = window.location.href = "./credit";
        }
        </script>';
        
    } else {

    $a = (int)$pdd - 3;

    $pds = "UPDATE signup SET `pdfcredit` = '$a' WHERE `usname` = '$user'";
    $psl = query($pds);

	redirect("admin/cbt/");
    }
}



/** UPLOAD PDF */
function uploadpdf() {
	

if(isset($_POST['donatenow'])) {

	$inst 	= $_POST['inst'];
	$typ 	= $_POST['typ'];
	$title 	= $_POST['coursetitle'];
	$ccode 	= $_POST['coursecode'];
	$fcg	= $_POST['fcg'];
	$dept   = $_POST['dept'];
	$level  = $_POST['level'];

	$upl    = $_SESSION['login'];

	$pedia  = "pedia".rand(0, 9999);

	//check if the uploader is verified
	$sql = "SELECT * FROM signup WHERE `usname` = '$upl'";
	$rsl = query($sql);

	if(row_count($rsl) == '') {

		redirect("./signup");
		
	} else {

		$row = mysqli_fetch_array($rsl);
		
			$target_dir = "pdfs/";
			$target_file =  basename($_FILES["pdffile"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
			   
			// Allow certain file formats
			if($imageFileType != "pdf") {
				echo validator("Sorry, only .pdf file format is allowed");
				$uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   echo validator("Sorry, your file was not uploaded.");
			// if everything is ok, try to upload file
			} else {
			   
			   move_uploaded_file($_FILES["pdffile"]["tmp_name"], $targetFilePath);
	
	if($row['pvf'] == '1') {
				
		//approve PDF and upload details
		$ssl = "INSERT INTO pdf(`sn`, `inst`, `typ`, `title`, `code`, `fcg`, `dept`, `level`, `upld`, `dwnld`, `approve`, `earn`, `pedia`, `filer`)";
		$ssl.= "VALUES('1', '$inst', '$typ', '$title', '$ccode', '$fcg', '$dept', '$level', '$upl', '0', 'Yes', '1', '$pedia', '$target_file')";
		$result = query($ssl);

		$_SESSION['uploaded'] = "Your PDF was approved and uploaded successfully";

		echo 'Loading...Please Wait!';
		echo '<script>window.location.href ="./pdf#latest"</script>';

	} else {

		//disapprove pdf
		$ssl = "INSERT INTO pdf(`sn`, `inst`, `typ`, `title`, `code`, `fcg`, `dept`, `level`, `upld`, `approve`, `earn`, `pedia`, `filer`)";
		$ssl.= "VALUES('1', '$inst', '$typ', '$title', '$ccode', '$fcg', '$dept', '$level', '$upl', 'No', '1', '$pedia', '$target_file')";
		$result = query($ssl);

		echo validator("Your PDF has been uploaded. A mail will be sent to you once your PDF is reviewed and approved.");
		echo '<script>window.location.href ="./profile#upddate"</script>';
	}

}
}
}
}
}


/** UPLOAD PQ */
function uploadpq() {
	

	if(isset($_POST['pqupl'])) {
	
		$inst 	= $_POST['inst'];
		$typ 	= $_POST['typ'];
		$title 	= $_POST['title'];
		$fcg	= $_POST['fcg'];
		$dept   = $_POST['dept'];
		$level  = $_POST['level'];
	
		$upl    = $_SESSION['login'];
	
		$pedia  = "pedia".rand(0, 9999);
	
		//check if the uploader is verified
		$sql = "SELECT * FROM signup WHERE `usname` = '$upl'";
		$rsl = query($sql);
	
		if(row_count($rsl) == '') {
	
			redirect("./signup");
			
		} else {
	
			$row = mysqli_fetch_array($rsl);
			
				$target_dir = "pqs/";
				$target_file =  basename($_FILES["pdffile"]["name"]);
				$targetFilePath = $target_dir . $target_file;
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
				   
				// Allow certain file formats
				if($imageFileType != "pdf") {
					echo validator("Sorry, only .pdf file format is allowed");
					$uploadOk = 0;
				} else {
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				   echo validator("Sorry, your file was not uploaded.");
				// if everything is ok, try to upload file
				} else {
				   
				   move_uploaded_file($_FILES["pdffile"]["tmp_name"], $targetFilePath);
		
		if($row['pvf'] == '1') {
					
			//approve PDF and upload details
			$ssl = "INSERT INTO pq(`sn`, `inst`, `typ`, `title`, `fcg`, `dept`, `level`, `upld`, `dwnld`, `approve`, `earn`, `pedia`, `filer`)";
			$ssl.= "VALUES('1', '$inst', '$typ', '$title', '$fcg', '$dept', '$level', '$upl', '0', 'Yes', '1', '$pedia', '$target_file')";
			$result = query($ssl);
	
			$_SESSION['pquploaded'] = "Your Past Questions was approved and uploaded successfully";
	
			echo 'Loading...Please Wait!';
			echo '<script>window.location.href ="./pq#latest"</script>';
	
		} else {
	
			//disapprove pdf
			$ssl = "INSERT INTO pq(`sn`, `inst`, `typ`, `title`, `fcg`, `dept`, `level`, `upld`, `approve`, `earn`, `pedia`, `filer`)";
			$ssl.= "VALUES('1', '$inst', '$typ', '$title', '$fcg', '$dept', '$level', '$upl', 'No', '1', '$pedia', '$target_file')";
			$result = query($ssl);
	
			echo validator("Your Past Questions has been uploaded. A mail will be sent to you once your PDF is reviewed and approved.");
			//echo '<script>window.location.href ="./profile"</script>';
		}
	
	}
	}
	}
	}
	}


/** TOTAL NUMBER OF PDF DOWNLOADED */
function countpdld() {

	$sql = "SELECT sum(`dwnld`) AS totpdf FROM pdf";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);

	$ssl = "SELECT sum(`dwnld`) AS totpq FROM pq";
	$res = query($ssl);
	$rwl = mysqli_fetch_array($res);

	echo $a = $row['totpdf'] + $rwl['totpq'];
}

/** TOTAL PDFs UPLOADED */
function countupl() {

	$sql = "SELECT sum(`sn`) AS totpdf FROM pdf WHERE `approve` = 'Yes'";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);

	$ssl = "SELECT sum(`sn`) AS totpq FROM pq WHERE `approve` = 'Yes'";
	$res = query($ssl);
	$rwl = mysqli_fetch_array($res);

	echo $a = $row['totpdf'] + $rwl['totpq'];
}


/** COUNT USERS */
function countusers() {

	$sql = "SELECT sum(`id`) as totuser FROM signup WHERE `active` = '1'";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);
	
	echo $row['totuser'];
}


/** EARNINGS MADE */
function earning() {
                      
	//add earn from pdf upload
	$stl = "SELECT sum(sn) AS total, sum(earn) AS earning FROM pdf WHERE `approve` = 'Yes'";
	$rtl = query($stl); 
	$rtw = mysqli_fetch_array($rtl);

	//add earn from past questions uploads
	$swl = "SELECT sum(sn) AS pqtotal, sum(earn) AS pqearning FROM pq WHERE `approve` = 'Yes'";
	$rwl = query($swl); 
	$rww = mysqli_fetch_array($rwl);

   
	//get total referrals
	$raf = "SELECT sum(id) AS reftotal FROM signup";
	$ras = query($raf);
	

	if(row_count($ras) == '') {
		
		$refff = 0;
	} else {

		$rao    = mysqli_fetch_array($ras);
		$refff  = number_format($rao['reftotal']);                             

	}
	
	
	$a = $rtw['earning'] + $rww['pqearning'] + $refff;
	echo $a;
}
?>