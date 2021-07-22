<?php
include("functions/init.php");
if(!isset($_GET['txt']) && !isset($_GET['inst']) && !isset($_GET['fcg']) && !isset($_GET['dept']) &&
!isset($_GET['level'])) {

redirect("./pdf");

} else {

$txt = clean(escape($_GET['txt']));
$inst = clean(escape($_GET['inst']));
$fcg = clean(escape($_GET['fcg']));
$dept = clean(escape($_GET['dept']));
$level = clean(escape($_GET['level']));

}
?>
<div class="container">

    <div class="row">


        <div class="col-md-8">

            <div class="row mb-3 align-items-stretch">

                <?php
$sql = "SELECT * FROM pq WHERE `title` LIKE '%$txt%' AND `inst` LIKE '%$inst%' AND `dept` LIKE '%$dept%' AND `level` LIKE '%$level%' AND `fcg` LIKE '%$fcg%' AND `approve` = 'Yes'";
$rsl = query($sql);

if(row_count($rsl) != '') {

while($row = mysqli_fetch_array($rsl)) {

    //echo $txt." ".$inst." ".$dept." ".$level." ".$fcg;

?>
                <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">

                    <div class="h-entry">
                        <div class="h-entry-inner">
                            <a href="blog-single.html"><img src="images/pdff.png" alt="" class="img-fluid"></a>
                            <h2 style="color: #ff0000" class="font-size-regular font-weight-bold">
                                <?php echo $row['title']; ?>
                            </h2>
                            <div style="color: #000" class="meta mb-4">Uploaded by <a
                                    href="./<?php echo $row['upld'] ?>"><?php echo $row['upld'] ?>


                                </a>
                                <span class="mx-2">&bullet;</span> <?php echo $row['level'] ?><br />
                                <span class="mx-2">&bullet;</span> <?php echo $row['dept'] ?>
                                <span class="mx-2">&bullet;</span> <?php echo $row['dwnld'] ?>
                                Downloads
                                <br /><br />
                                <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                        href="https://twitter.com/home?status=https://dotpedia.com.ng/preview/<?php echo $row['title'] ?>"><i
                                            class="icon-twitter"></i></a></span>
                                <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                        href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/preview/<?php echo $row['title'] ?>"><i
                                            class="icon-facebook"></i></a></span>
                                <span class="mx-2"><a target="_blank" data-action="share/whatsapp/share"
                                        data-media="images/ico.png"
                                        href="https://api.whatsapp.com/send?text=https://teensyouths.com.ng/preview/<?php echo $row['title'] ?>"><i
                                            class="icon-whatsapp"></i></a></span>
                            </div>



                            <div class="col-md-12 ">
                                <a href="./pqpreview?pdf=<?php echo $row['pedia'] ?>"><input
                                        style="width: 100%; background: #FFE9E6; color: #ff0000;" type="submit"
                                        value="Preview/Download" class="btn btn-pill btn-md" id="download"></a><br />
                            </div>
                        </div>
                    </div>

                </div>



                <?php
}
} else {

    //echo "<p>No related result found!</p>";
}
?>


            </div>
        </div>


        <div class="col-md-3 ml-auto">


            <div class="mb-5">
                <h3 class="h5 text-black mb-3">Related PDF(s)</h3>
                <ul class="list-unstyled post-lists">
                    <?php 
$sql = "SELECT * FROM pdf WHERE `title` LIKE '%$txt%' AND `inst` LIKE '%$inst%' AND `dept` LIKE '%$dept%' AND `level` LIKE '%$level%' AND `fcg` LIKE '%$fcg%' AND `approve` = 'Yes' ORDER BY RAND() LIMIT 5";
$rsl = query($sql);

while($row = mysqli_fetch_array($rsl)) {
?>
                    <li class="mb-2"><a href="./pq?txt=<?php echo $row['filer'] ?>"><?php echo $row['title'] ?></a>
                    </li>
                    <?php
}
?>
                </ul>
            </div>

            <div class="mb-5">
                <h3 class="h5 text-black mb-3">Available Tutors</h3>
                <ul class="list-unstyled post-lists">
                    <?php 
     $sql = "SELECT * FROM tutor WHERE `title` LIKE '%$txt%' AND `inst` LIKE '%$inst%' AND `dept` LIKE '%$dept%' AND `level` LIKE '%$level%' AND `fcg` LIKE '%$fcg%' AND `approve` = 'Yes' ORDER BY RAND() LIMIT 5";
     $rsl = query($sql);
     
     while($row = mysqli_fetch_array($rsl)) {
    ?>
                    <li class="mb-2"><a href="./tutors?txt=<?php echo $row['filer'] ?>"><?php echo $row['title'] ?></a>
                    </li>
                    <?php
        }
        ?>
                </ul>
            </div>

        </div>

    </div>