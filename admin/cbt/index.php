<?php include("../functions/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $call['school'] ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="#ffffff">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="manifest" href="manifest.json">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-contact100">
        <div class="wrap-contact100">
            <span class="contact100-form-symbol">
                <img src="../images/logo.png" alt="<?php echo $call['school'] ?>">
            </span>


            <form class="contact100-form validate-form flex-sb flex-w">
                <span class="contact100-form-title">
                    <?php echo $call['school'] ." ". date("Y") ?>
                </span>

                <?php
$sql = "SHOW TABLES";
$result = query($sql);
while ($row = mysqli_fetch_row($result)) {
  if($row[0] == "login" || $row[0] == "timer") {
    echo '
    		<span class="contact100-form-title text-danger">
					No Exam to take 
				</span>

            ';
  } else {
  	?>

                <select id="cbtsbj" class="form-control btn-primary text-center">
                    <option>Select Subject</option>
                    <?php
$sql = "SHOW TABLES";
$result = query($sql);
while ($row = mysqli_fetch_row($result)) {
  if($row[0] == "login" || $row[0] == "timer" || $row[0] == "result") {
    echo '
            ';
  } else {
          ?>
                    <option id="cbtsbj"><?php echo $row[0] ?></option>
                    <?php
  }
}
?>
                </select>
                <br /><br /><br />
                <button type="button" id="startcbt" class="btn btn-dark">Start CBT</button>

            </form>
            <?php
		}
		}
		?>
            <br />
            <p align="center">&copy; <?php echo $call['school'] ?> | <span style="color: red;"> <a style="color: red"
                        target="_blank" href="https://doteightplus.com"> DotEightPlus
                        <?php echo date("Y"); ?></a></span> </p>
        </div>

    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="ajax.js"></script>
    <!--===============================================================================================-->

</body>

</html>