<?php
include("functions/init.php");

if(isset($_SESSION['login'])) {

    unset($_SESSION['login']);
}

if(!isset($_SESSION['fgeml'])) {

redirect("./opps");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia</title>
    <?php include("include/header.php"); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(images/bg_4.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 class="font-weight-bold" data-aos="fade-up" class="mb-5">PASSWORD<br /> <span
                                    class="typed-words"
                                    style="color: #FFE9E6; border-radius: 0px 20px 0px 20px;"></span>
                            </h1>
                        </div>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="100"><a href="./logout" class="btn btn-primary btn-pill">Sign
                            in
                            to continue</a></p>
                </div>
            </div>
        </div>
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
        strings: ["&nbsp;UPDATED&nbsp;"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 400,
        startDelay: 400,
        loop: false,
        showCursor: false
    });
    </script>

    <script src="js/main.js"></script>

    </body>

</html>
