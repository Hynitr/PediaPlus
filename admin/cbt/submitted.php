    <?php
include("../functions/init.php");
$e_id = $_SESSION['examid'];

if($e_id == "") {

    redirect("./logout");
}

$max = $_SESSION['maxl'];

$score = "SELECT sum(score) AS scored  FROM `$e_id`";
$rsd   = query($score);

if(row_count($rsd) == ''){
    redirect("./logout");
} else {
$roww  = mysqli_fetch_array($rsd);

$sc  = $roww['scored'];

//calculate the percentage of user score
$perc = ($sc/$max) * 100;

//save user result on submit
$sn = "UPDATE `result` SET `score` = '$perc' WHERE stud_id = '$e_id'";
$fn = query($sn);

//drop the virtual table
$snl = "DROP TABLE `$e_id`";
$frd = query($snl);

echo '<h1 align=center> You Scored.: '.$perc.'%  <br/>  <a href="./logout" class="w3-button w3-white w3-border w3-border-red w3-round-large"
style="text-decoration: none;">Click here to end this exam</a></h1>';
}
?>
    <title><?php echo $call['school'] ?></title>
    <link rel="stylesheet" href="css/w3.css">

    <body style="background: #E9ECEF;">';