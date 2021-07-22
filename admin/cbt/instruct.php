<?php
include("../functions/init.php");
if(!isset($_GET['id'])) {
  header("location: ./");
}

$data = strtoupper($_GET['id']);

$sql = "SELECT * FROM timer WHERE `subject` = '$data'";
$rsl = query($sql);
$row = mysqli_fetch_array($rsl);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $call['school'] ?> | CBT</title>
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

            <p style="color: red; font-size: 20px;"><b>READ THE FOLLOWING INSTRUCTIONS CAREFULLY</b></p>
            <hr>

            <p style="font-size: 15px; float: right;" class="text-info"><b>No. of questions to be
                    attempted.:
                    <?php echo $row['attempt']; ?> Question(s)</b></p>
            <br><br>

            <p><?php echo $row['instruct']; ?></p>

            <br><br>
            <p style="color: red; font-size: 15px;"><b>ADDITIONAL INSTRUCTIONS</b></p>
            <hr>

            <p><b>- Ensure that you have a strong internet connection before taking this test</b></p>
            <p><b>- For a better experience, kindly use a laptop or a PC to take this test</b></p>
            <p><b>- Always pay attention to the time stipulated for your test</b></p>
            <p><b>- Do not refresh the browser while taking your test</b></p>


            <p id="cbbr" hidden><?php echo strtolower($data) ?></p> <br />
            <div class="container-contact100-form-btn">
                <button type="button" id="rcbtstart" name="btn-start" class="contact100-form-btn">
                    START
                </button>
            </div>

            <br />
            <p align="center">&copy; <?php echo $call['school'] ?> | <span style="color: red;"> <a style="color: red"
                        target="_blank" href="https://doteightplus.com"> DotEightPlus
                        <?php echo date("Y"); ?></a></span> </p>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="ModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: rgba(234, 114, 140, 0.9); color: white;" class="modal-content">
                <div class="modal-body">
                    <div id="msg" class="text-center"></div>
                </div>
            </div>
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

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="ajax.js"></script>
</body>

</html>