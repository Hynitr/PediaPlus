<?php
include("../functions/init.php");
$data     = $_SESSION['subject'];
$e_id     = $_SESSION['examid'];
$sur      = $_SESSION['names'];

$sl = "SELECT * FROM timer WHERE `subject` = '$data'";
$rdl = query($sl);
$rdw = mysqli_fetch_array($rdl);

$a = $rdw['hour'];
$b = $rdw['min'];

//convert hour to minutes
$a = $a * 60 + $b;


if(!isset($data) && !isset($e_id) && !isset($sur)) {
  header("location: ./");
} else {

    //create a table to save the echoed dataset
$ssl = "CREATE TABLE `".$e_id."`
(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
sn text(255),
question text(255),
oa text(255),
ob text(255),
oc text(255),
od text(255),
correct text(255),
userans text(255),
score text(255)
)";
$resul = query($ssl);
confirm($resul);




//display and random values from db
$spl = "SELECT * FROM  `".$data."` GROUP BY `question` ORDER BY RAND()"; 
$rpsult = query($spl);
while($row = mysqli_fetch_array($rpsult)) {
    
    //echo $row['question']."<br>";
    

    //set the result to a variable
    $b = $row['sn'];
    $c = escape($row['question']);
    $d = escape($row['oa']);
    $e = escape($row['ob']);
    $f = escape($row['oc']);
    $g = escape($row['od']);
    $h = escape($row['correct']);


//insert into virtual table
$sol = "INSERT INTO `".$e_id."`(`sn`, `question`, `oa`, `ob`, `oc`, `od`, `correct`)";
$sol.= " VALUES('$b', '$c', '$d', '$e', '$f', '$g', '$h')";
$result = query($sol);
confirm($result);
    
}
}
 ?>
<!DOCTYPE html>
<html>
<title><?php echo $call['school'] ?> | CBT</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="css/w3.css">

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
<style>
.blink_me {

    animation: blinker 1s linear infinite;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}
</style>

<body>

    <div class="container-contact100" id="mens">
        <div class="wrap-contact100" style="width: 99%; border-radius: 20px 20px 20px 20px">
            <div class="jumbotron" style="margin-bottom: 0px; height: 1000px;">


                <div class=" container" style="margin-top:30px">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4">
                            <p><strong><?php echo strtoupper($data); ?></strong></p>
                            <br>
                            <img src="../images/logo.png" style="height: 150px" alt="<?php echo $call['school'] ?>">
                            <br><br>
                            <p>Full Name.:<strong> <?php echo $sur ?></strong></p>
                            <p>Your Exam ID.: <strong> <?php echo $e_id?></strong></p>
                            <p style="color: red;"><strong>Don`t refresh this page</strong></p>


                            <hr class="d-sm-none">
                        </div>


                        <div style="padding-right: 0px;" class="col-md-8 col-sm-12">

                            <div class="">
                                <div class="w3-bar">
                                    <a href="./logout" class="w3-button w3-white w3-border w3-border-red w3-round-large"
                                        style="text-decoration: none;">Click here to end this exam</a>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-danger "><strong>Time.: &nbsp;

                                    <strong id="clockdiv">
                                        <span class="days" hidden></span>

                                        <span class="hours" id="hours"></span>
                                        :
                                        <span class="minutes" id="minutes"></span>
                                        :
                                        <span class="seconds" id="seconds"></span>


                                    </strong>
                                </strong>
                            </h5>

                            <br>

                            <!--- <div id="cbt">
                            </div> --->

                            <strong>
                                <p class="blink_me" id="id01" style="color: red;"></p>
                            </strong>

                            <br>

                            <iframe id="caller" style="padding-right: 0px; padding-left: 0px;" src="call.php"
                                class="col-sm-12" height="550px"></iframe>
                        </div>

                    </div>

                </div>
                <p align="center">&copy; <?php echo $call['school'] ?> | <span style="color: red;"> <a
                            style="color: red" target="_blank" href="https://doteightplus.com"> DotEightPlus
                            <?php echo date("Y"); ?></a></span> </p>
            </div>
        </div>
    </div>




    <!-- Modal timing -->
    <div id="ido1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div style="background: #E9ECEF;" class="modal-content modal-centered">

                <div class="modal-body">
                    <h4 class="modal-title text-black">Time Up</h4>
                    <a href="./submitted"><button type="button" class="btn btn-primary">Submit Exam</button></a>
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
    <!--==============================================================================================-->
    <script src="ajax.js"></script>
    <!--===============================================================================================-->

    <!---<script>
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./time", true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            //document.write(this.responseText);
            document.getElementById("display").innerHTML = xhr.responseText;
        } else {

            document.getElementById('display').innerHTML =
                "Your internet connection is poor";
        }
    }

    xhr.send();
    </script>-->
    <?php echo "
    <script>
    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes,
            seconds
        };
    }

    function initializeClock(id, endtime) {
        const clock = document.getElementById(id);
        const daysSpan = clock.querySelector('.days');
        const hoursSpan = clock.querySelector('.hours');
        const minutesSpan = clock.querySelector('.minutes');
        const secondsSpan = clock.querySelector('.seconds');

       
        function updateClock() {
            const t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
               
            }
        
        }

        updateClock();
        const timeinterval = setInterval(updateClock, 1000);
    }

    const deadline = new Date(Date.parse(new Date()) + ".$a." * 60 * 1000);
    initializeClock('clockdiv', deadline);
    </script>";
    ?>

    <script>
    setInterval(function() {
        var a = document.getElementById('hours').innerHTML;
        var b = document.getElementById('minutes').innerHTML;
        var c = document.getElementById('seconds').innerHTML;


        if (a == 00 && b == 01 && c == 00) {
            document.getElementById('id01').innerHTML = 'Less than 1 minutes remaining';
        } else {
            if (a == 00 && b == 00 && c == 20) {
                document.getElementById('id01').innerHTML = 'Less than 20 seconds remaining';
            } else {

                if (a == 00 && b == 00 && c == 00) {
                    $("#ido1").modal({
                        backdrop: "static"
                    });
                    clearInterval();
                }

            }
        }
        clearInterval();

    }, 1000);
    </script>

</body>

</html>