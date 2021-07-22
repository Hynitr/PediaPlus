<?php
include("../functions/init.php");
if(!isset($_GET['id'])) {
  header("location: ./");
}

$data = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $call['school'] ?> | CBT </title>
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
                <img src="../images/logo.png" alt=" <?php echo $call['school'] ?>">
            </span>

            <form name="cbter" class="contact100-form validate-form flex-sb flex-w">
                <span class="contact100-form-title">
                    <?php echo ucfirst($data); ?> - Computer Based Test
                </span>

                <p style="color: red;">Register your details to get started. Make sure you recheck before clicking next!
                </p> <br /><br />

                <div class="wrap-input100 rs1 validate-input" data-validate="Please input your first name">
                    <input class="input100" type="text" id="sur" name="sur" placeholder="Enter your Full Name">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 rs1 validate-input" data-validate="Please input your lastname">
                    <input class="input100" type="password" id="nme" name="nme" placeholder="Input Exam Access Code"
                        required>
                    <span class="focus-input100"></span>
                </div>


                <input class="input100" type="text" id="sbj" value="<?php echo $data ?>" hidden>



                <div class="container-contact100-form-btn">
                    <button type="button" id="cbtstart" name="btn-start" class="contact100-form-btn">
                        START
                    </button>
                </div>

            </form>
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