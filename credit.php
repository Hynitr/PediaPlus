<?php
include("functions/init.php");

if(isset($_SESSION['login'])) {

    redirect("./signin");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Buy Pedia Credit</title>
    <meta name="description" content="DotPedia | Buy Pedia Credit">
    <meta name="keywords" content="DotPedia, Buy Pedia Credit">
    <?php include("include/header.php"); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(images/bg_4.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up" class="mb-5 font-weight-bold"><span style="color: white;"
                                    class="typed-words"></span>
                            </h1>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div style="background:  #FFE9E6" class="block-quick-info-2">
        <div class="container">
            <div class="block-quick-info-2-inner">
                <div class="col-md-12">
                    <form>

                        <div class="col-md-12 mt-4">
                            <label for="credit">Enter Pedia Credit Code</label>
                            <input type="number" id="crd" class="form-control" placeholder="283 08 0 4 800 89">
                        </div>
                </div>


                <div class="mt-5">
                    <p class="text-center font-weight-bold"><a style="color: #ff0000; cursor: pointer;"
                            id="pediacredit">Validate Voucher
                        </a></p>
                </div>




                </form>
            </div>
        </div>
    </div>




    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: #FFE9E6; color: #ff0000; border-radius: 0px 40px 0px 40px;" class="modal-content">
                <div class="modal-body">
                    <div id="msg" class="text-center"></div>
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

    <script src="ajax.js"></script>

    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/rangeslider.min.js"></script>


    <script src="js/typed.js"></script>
    <script>
    var typed = new Typed('.typed-words', {
        strings: ["Buy Pedia <br/> Credit"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 400,
        startDelay: 400,
        loop: false,
        showCursor: true
    });
    </script>

    <script src="js/main.js"></script>
    </body>

</html>