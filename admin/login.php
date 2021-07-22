<?php include("functions/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $call['school'] ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="#ffffff">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/logo.png" />
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
                <img src="images/logo.png" alt="<?php echo $call['school'] ?>">
            </span>
            <form method="post" class="contact100-form validate-form flex-sb flex-w">
                <span class="contact100-form-title">
                    <?php echo $call['school'] ." ". date("Y") ?>
                </span>
                <p style="color: red">Please login to continue. Kindly contact the database administrator for login
                    details.</p>
                <br /><br />
                <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" id="usrname" name="usrname" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Please input password">
                    <input class="input100" id="password" type="password" name="pword" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button type="button" id="login" name="login" class="contact100-form-btn">
                        Login
                    </button>
                </div>
            </form>
            <br />
            <p align="center">&copy; <?php echo $call['school'] ." ". date("Y") ?> | Developed by: <a target="_blank"
                    href="https://doteightplus.com"><span style="color: red;"> DotEightPlus</span> </p>
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
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="ajax.js"></script>



</body>

</html>