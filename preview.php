<?php include("functions/init.php");
if(!isset($_GET['pdf'])) {

    redirect("./pdf");
} else {

    $data = $_GET['pdf'];

    $sql = "SELECT * FROM pdf WHERE `pedia` = '$data'";
    $rsl = query($sql);

    if(row_count($rsl) == 0) {
        
        redirect("./pdf");
        
    } else {

    $row  = mysqli_fetch_array($rsl);

    $count = $row['dwnld'];

	if($count == 0){

		$new = 1;
        
	} else {

	$new = 1 + (int)$count;
    }

    //update new count
	$ssl = "UPDATE pdf SET `dwnld` = '$new' WHERE `pedia` = '$data'";
	$rsl = query($ssl);
       
    }
    $_SESSION['file'] = $row['filer'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Preview PDF's</title>
    <meta name="description" content="DotPedia | Preview PDF's">
    <meta name="keywords" content="DotPedia, Preview Pdf">
    <?php include("include/header.php"); ?>
    <div class="site-blocks-cover overlay" style="background-image: url(images/3.png);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up" class="mb-5 font-weight-bold text-head"><span
                                    style="background: #FFE9E6; color: #ff0000; border-radius: 0px 20px 0px 20px;"
                                    class="typed-words"></span> PDF's</h1>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="block-quick-info-2">
        <div class="container">
            <div style="height: 80vh;" class=" block-quick-info-2-inner">
                <div class="row">

                    <iframe src="pdfs/viewer.php" style="width: 100%; height: 75vh; z-index: 9999"></iframe>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4 mt-4">
        <p data-aos="fade-up" data-aos-delay="100"><a id="lopdf" onclick="loadpdf()" style="width: 100%"
                href="pdfs/<?php echo $row['filer'];?>" class="btn btn-primary btn-pill" download>Download PDF</a>
        </p>
    </div>

    <?php include("include/footer.php"); ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>

    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/rangeslider.min.js"></script>

    <script src="js/typed.js"></script>
    <script>
    var typed = new Typed('.typed-words', {
        strings: ["Preview", " Download", ],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 400,
        startDelay: 400,
        loop: true,
        showCursor: false
    });
    </script>

    <script src="js/main.js"></script>
    <script>
    function loadpdf() {
        var x = "Loading... Please Wait";

        document.getElementById("lopdf").innerHTML = "Loading... Please Wait";
    }
    </script>
    </body>

</html>