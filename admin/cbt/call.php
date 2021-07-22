<?php
include("../functions/init.php");
$data     = $_SESSION['subject'];
$e_id     = $_SESSION['examid'];
$sur    = $_SESSION['names'];
if(!isset($data) && !isset($e_id) && !isset($sur)) {
  header("location: ./");
}
echo '
<link rel="stylesheet" href="css/w3.css">

<body style="background: #E9ECEF;">';


//get  distinct questions
$sql = "SELECT * FROM `$e_id`"; 
$result_set = query($sql);

//get attemoted questions
$ssl = "SELECT * FROM timer WHERE `subject` = '$data'";
$rsl = query($ssl);
$rqn = mysqli_fetch_array($rsl);

//max attenmpts
$max = $rqn['attempt'];

$_SESSION['maxl'] = $max; 


extract($_POST);
extract($_GET);
extract($_SESSION);

//set attempted questions to 0
if(!isset($_SESSION['qn']))
{
  $_SESSION['qn'] = 0;
  //$_SESSION['trueans'] = 0;
  
} else {

  //on next click with an answer
  if(isset($_POST['next']) =='Next' && isset($_POST['ans']) && isset($_POST['usrans']))
 {
     mysqli_data_seek($result_set,$_SESSION['qn']);
     $row = mysqli_fetch_array($result_set); 

     $ansr = $_POST['ans'];
     $idns = $_POST['usrans'];

     //save user answer
     $save = "UPDATE `$e_id` SET `userans` = '$ansr' WHERE `id` = '$idns'";
     $svrl = query($save);
     
      
     if($_POST['ans'] == $row['correct'])
     {
       //scored the user
     $save = "UPDATE `$e_id` SET `score` = 1 WHERE `id` = '$idns'";
     $svrl = query($save);
     
     // $_SESSION['trueans'] = $_SESSION['trueans']+1;
     } else {

     //do not score the user 
     $save = "UPDATE `$e_id` SET `score` = 0 WHERE `id` = '$idns'";
     $svrl = query($save);
     }
     
     $_SESSION['qn'] = $_SESSION['qn']+1;
     
    }


    //skip question
    if(isset($_POST['skip']) =='Skip')
 {
     mysqli_data_seek($result_set,$_SESSION['qn']);
     $row = mysqli_fetch_array($result_set);

     $_SESSION['qn'] = $_SESSION['qn']+1;
     
    }


    //submit question
    if(isset($_POST['submit'])=='Submit' && isset($_POST['ans']) && isset($_POST['usrans']))
    {
        mysqli_data_seek($result_set,$_SESSION['qn']);
        $rower = mysqli_fetch_array($result_set); 
        
        $ansr = $_POST['ans'];
        $idns = $_POST['usrans'];

        if($_POST['ans'] == $rower['correct'])
        {
          //scored the user
        $save = "UPDATE `$e_id` SET `score` = 1 WHERE `id` = '$idns'";
        $svrl = query($save);
        
        // $_SESSION['trueans'] = $_SESSION['trueans']+1;
        } else {
   
        //do not score the user 
        $save = "UPDATE `$e_id` SET `score` = 0 WHERE `id` = '$idns'";
        $svrl = query($save);
        }


        //get the total score of the 
        
        $score = "SELECT sum(score) AS scored  FROM `$e_id`";
        $rsd   = query($score);
        $roww  = mysqli_fetch_array($rsd);

        $sc = $roww['scored'];
        cbtexam();
        
        //calculate the percentage of user score
        $perc = ($sc/$max) * 100;

        //save user result on submit
        $sn = "UPDATE `result` SET `score` = '$perc' WHERE stud_id = '$e_id'";
        $fn = query($sn);

        //drop the virtual table
        $snl = "DROP TABLE `$e_id`";
        $frd = query($snl);
        
        echo '<h1 align=center> You Scored.: '.$perc.'%</h1>';
        exit;
    }


       //previous question without ans
       if(isset($_POST['prev']) =='Prev')
       {
        
        mysqli_data_seek($result_set,$_SESSION['qn']);
        $row = mysqli_fetch_array($result_set);
        
        $_SESSION['cocc']  = 1;
      
           $_SESSION['qn'] = $_SESSION['qn']-1;

           $sn = $_SESSION['qn'];
           
     
 }



 //if previous is clicked and an answer is set


 //previous question with ans
 if(isset($_POST['prev']) =='Prev' && isset($_POST['ans']) && isset($_POST['usrans']))
 {
  
  mysqli_data_seek($result_set,$_SESSION['qn']);
  $row = mysqli_fetch_array($result_set);
  
  $_SESSION['cocc']  = 1;

     $ansr = $_POST['ans'];
     $idns = $_POST['usrans'];

     //save user answer
     $save = "UPDATE `$e_id` SET `userans` = '$ansr' WHERE `id` = '$idns'";
     $svrl = query($save);
      
     /**if($_POST['ans'] == $row['correct'])
     {
      $_SESSION['trueans'] = $_SESSION['trueans']+1;
     } else {

      $_SESSION['trueans'] = $_SESSION['trueans']-1;
      
     }***/

     if($_POST['ans'] == $row['correct'])
     {
       //scored the user
     $save = "UPDATE `$e_id` SET `score` = 1 WHERE `id` = '$idns'";
     $svrl = query($save);
     
     // $_SESSION['trueans'] = $_SESSION['trueans']+1;
     } else {

     //do not score the user 
     $save = "UPDATE `$e_id` SET `score` = 0 WHERE `id` = '$idns'";
     $svrl = query($save);
     }
     
     //$_SESSION['qn'] = $_SESSION['qn']-1;
     //$sn = $_SESSION['qn'];    
     

}

}


     mysqli_data_seek($result_set,$_SESSION['qn']);
     $row = mysqli_fetch_array($result_set);


//add 1 to question sn
$sn = $_SESSION['qn'] + 1;


if(!isset($_SESSION['cocc'])) {


  echo '

  <form method="POST">
    <p style="font-size: 20px; color: black;">'.$sn." of ".$max.'. <b>'.ucfirst($row['question']).'</b></p>
    <div style="font-size: 22px; color: black;">
  A. <input type="radio" name="ans" value="'.$row['oa'].'"> '.ucfirst($row['oa']).'<br>
  B. <input type="radio" name="ans" value="'.$row['ob'].'"> '.ucfirst($row['ob']).'<br>
  C. <input type="radio" name="ans" value="'.$row['oc'].'"> '.ucfirst($row['oc']).'<br>
  D.  <input type="radio" name="ans" value="'.$row['od'].'"> '.ucfirst($row['od']).'<br><br/>

  <input type="text" name="usrans" value="'.$row['id'].'" hidden>
</div>';



} else {

  echo '

  <form method="POST">
    <p style="font-size: 20px; color: black;">'.$sn." of ".$max.'. <b>'.ucfirst($row['question']).'</b></p>
    <div style="font-size: 22px; color: black;">';

    //chck for radio on

    if($row['oa'] === $row['userans']) {

      echo 'A. <input type="radio" name="ans" value="'.$row['oa'].'" checked> '.ucfirst($row['oa']).'<br>';
    } else {

      echo 'A. <input type="radio" name="ans" value="'.$row['oa'].'"> '.ucfirst($row['oa']).'<br>';
    }

    if($row['ob'] === $row['userans']) {

      echo 'B. <input type="radio" name="ans" value="'.$row['ob'].'" checked> '.ucfirst($row['ob']).'<br>';
    } else {

      echo 'B. <input type="radio" name="ans" value="'.$row['ob'].'"> '.ucfirst($row['ob']).'<br>';
    }
  
    if($row['oc'] === $row['userans']) {

      echo 'C. <input type="radio" name="ans" value="'.$row['oc'].'" checked> '.ucfirst($row['oc']).'<br>';
    } else {

      echo 'C. <input type="radio" name="ans" value="'.$row['oc'].'"> '.ucfirst($row['oc']).'<br>';
    }
  
    if($row['od'] === $row['userans']) {

      echo ' 
      D.  <input type="radio" name="ans" value="'.$row['od'].'" checked> '.ucfirst($row['od']).'<br><br/>';
    } else {

      echo ' 
      D.  <input type="radio" name="ans" value="'.$row['od'].'"> '.ucfirst($row['od']).'<br><br/>';
    }
 

  echo '<input type="text" name="usrans" value="'.$row['id'].'" hidden>
</div>';

  //unset($_SESSION['cocc']);
  
  
}


//get total number of questions answered by users
if($_SESSION['qn'] < $max-1) {

    echo '
    <div class="w3-show-inline-block">

    '; 

    //do not show prev button in question 1
    if($_SESSION['qn'] == 0) {

      echo '
      <button style="font-size: 20px;" type="submit"  class="w3-btn w3-red"  name="skip"> Skip</button>
      <button style="font-size: 20px;" type="submit"  class="w3-btn w3-red"  name="next"> Next</button>
      
      ';
    
    } else {

      echo '     
    <button style="font-size: 20px;" type="submit"  class="w3-btn w3-red"  name="prev"> Prev</button>
    <button style="font-size: 20px;" type="submit"  class="w3-btn w3-red"  name="skip"> Skip</button>
    <button style="font-size: 20px;" type="submit"  class="w3-btn w3-red"  name="next"> Next</button>
    </div> 
      <br/>';
    }
   } else {
      echo '
    <div class="row">
    <button style="font-size: 20px;" type="submit" class="w3-btn w3-red"  name="prev"> Prev</button>
    <button style="font-size: 20px;" type="submit" class="w3-btn w3-red"  name="submit"> Submit</button>    
    </div>
    </form>
  ';
    }
?>

<br>