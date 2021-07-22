<?php
include("../functions/init.php");
$data     = $_SESSION['subject'];
$e_id     = $_SESSION['examid'];
$sur    = $_SESSION['names'];
if(!isset($data) && !isset($e_id) && !isset($sur)) {
  header("location: ./");
}
 ?>
<!DOCTYPE html>
<html>
<title>Daglore Model School  | CBT</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">
<meta name="description" content="Daglore Model School  | CBT">
<meta name="keywords" content="Daglore Model School  | CBT">
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="css/w3.css">
<link rel="icon" type="image/png" href="../logo.png" />

<body>


    <div class="w3-container">
        <div class="w3-center">
            <h2><?php echo strtoupper($data); ?></h2>
        </div>

        <div class="w3-row">
            <div class="w3-col w3-container m4 w3-blue-grey">
                <p>YourExam ID: <strong> <?php echo $e_id?></strong></p>
            </div>
            <div class="w3-col w3-container m4 w3-blue">
                <p>Full Name:<strong> <?php echo $sur ?></strong></p>
            </div>
            <div class="w3-col w3-container m4 w3-red timer">
                <p>Time: <strong id="display"></strong></p>
            </div>
        </div>


        <hr>
        <p style="color: red">DO NOT REFRESH THIS PAGE!</p>
    </div>

    <div class="w3-row-padding">
        <div class="w3-half">
            <?php
extract($_POST);
extract($_GET);
extract($_SESSION);

$sql = "SELECT * FROM `$data`";
$result_set= query($sql);

if(!isset($_SESSION['qn']))
{
  $_SESSION['qn']=0;
  $_SESSION['trueans']=0;
  
} else {



    //next questions
   if(isset($_POST['submit']) =='Next Question' && isset($_POST['ans']))
    {
        mysqli_data_seek($result_set,$_SESSION['qn']);
        $row = mysqli_fetch_array($result_set);  
        if($_POST['ans'] == $row['correct'])
        {
              $_SESSION['trueans'] = $_SESSION['trueans']+1;
        }
        $_SESSION['qn'] = $_SESSION['qn']+1;
    }


    //submit questions
    if(isset($_POST['suber'])=='Submit' && isset($_POST['ans']))
    {
        mysqli_data_seek($result_set,$_SESSION['qn']);
        $rower = mysqli_fetch_array($result_set);  
        if($_POST['ans'] == $rower['correct'])
        {
              $_SESSION['trueans'] = $_SESSION['trueans']+1;
        }

        $sc = $_SESSION['trueans'];
        cbtexam();
        $sn = "UPDATE `result` SET `score` = '$sc' WHERE stud_id = '$e_id'";
        $fn = query($sn);
        echo "<h1 align=center> Your results Have been saved successfully.<a style=color:red; href=./logout>Click here to logout your session. </a> </h1>";
        session_destroy();
        exit;
    }


    //time up
    if(isset($_POST['sumit'])=='Submit')
    {
        mysqli_data_seek($result_set,$_SESSION['qn']);
        $rowed = mysqli_fetch_row($result_set);  

        $sct = $_SESSION['trueans'];
        cbtexam();
        $snt = "UPDATE `result` SET `score` = '$sct' WHERE stud_id = '$e_id'";
        $fnt = query($snt);
        echo "<h1 align=center> Your results Have been saved successfully.<a style=color:red; href=./logout>Click here to logout your session. </a> </h1>";
        session_destroy();
        exit;
    }

}

mysqli_data_seek($result_set,$_SESSION['qn']);
$row = mysqli_fetch_array($result_set);

$sn = $_SESSION['qn'] + 1;

echo '

  <form method="POST">
    <p style="font-size: 25px;"><b>Question '.$sn." : " .$row['question'].'</b></p>
    <div style="font-size: 30px;">
  A. <input type="radio" name="ans" value="'.$row['oa'].'"> '.ucfirst($row['oa']).'<br>
  B. <input type="radio" name="ans" value="'.$row['ob'].'"> '.ucfirst($row['ob']).'<br>
  C. <input type="radio" name="ans" value="'.$row['oc'].'"> '.ucfirst($row['oc']).'<br>
  D.  <input type="radio" name="ans" value="'.$row['od'].'"> '.ucfirst($row['od']).'<br><br/>
</div>';


if($_SESSION['qn'] < mysqli_num_rows($result_set)-1) {

echo '
  <input style="font-size: 25px;"  type=submit class="w3-btn w3-red"  name="submit" value="Next Question">
  <br/>';
} else {
  echo '
  <input style="font-size: 25px;" type=submit class="w3-btn w3-red"  name="suber" value="Submit">
</form>
 ';
}

?>


        </div>
    </div>

    <!--- modal timing---->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom w3-card-8">
            <header class="w3-container w3-red">
                <h2>You have less than 40 seconds left to complete this test</h2>
            </header>
            <footer class="w3-container w3-white w3-center">
                <button onclick="document.=getElementById('id01').style.display='none'" class="w3-btn">Ok,
                    Continue</button>
            </footer>
        </div>
    </div>
    <!---- end of modal --->


    <!---- modal time up --->
    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom w3-card-8">
            <header class="w3-container w3-red">
                <h2>Opps! Your time is up.</h2>
            </header>
            <footer class="w3-container w3-white w3-center">
                <form method="post">
                    <button type="submit" name=sumit value='Submit' class="w3-btn">Click me to Submit</button>
                </form>
            </footer>
        </div>
    </div>
    <!---- end of modal --->


    <script src="ajax.js"></script>
    <script src="jquery.js"></script>
    <script>
    setInterval(function() {

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "response.php", false);
        xhr.send(null);

        document.getElementById("display").innerHTML = xhr.responseText;


        var hms = xhr.responseText; // your input string
        var a = hms.split(':'); // split it at the colons

        // minutes are worth 60 seconds. Hours are worth 60 minutes.
        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);


        if (seconds == 40) {
            document.getElementById('id01').style.display = 'block';
        } else {

            if (seconds == 0) {

                clearInterval();
                document.getElementById('id02').style.display = 'block';
            }
        }

    }, 1000);
    </script>
</body>

</html>


</body>

</html>