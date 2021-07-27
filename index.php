<?php include("functions/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Home</title>
    <meta name="description" content="DotPedia | Home">
    <meta name="keywords" content="DotPedia, Pdf">
    <meta property="og:title" content="DotPedia" />
    <meta property="og:image" content="images/ico.png" />
    <meta property="og:url" content="https://dotpedia.com.ng" />
    <meta property="og:site_name" content="DotPedia from DotEightPlus" />
    <meta property="og:description" content="Read, Earn, Share" />
    <?php include("include/header.php"); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(images/bg_4.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up" class="mb-5 font-weight-bold text-head">READ, <span
                                    style="background: #FFE9E6; color: #ff0000; border-radius: 0px 20px 0px 20px;"
                                    class="typed-words"></span> <br />AND
                                SHARE </h1>
                            <p data-aos="fade-up" data-aos-delay="100"><a href="./pdf"
                                    class="btn btn-primary btn-pill">Download PDFs</a></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <div class="block-services-1 py-5">
        <div class="container">
            <div class="row">
                <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                    <h3 style="color: #ff0000" class="mb-3">Getting Started</h3>
                    <p>Follow our three pretty simple steps in order to download your lecture PDFs</p>

                </div>
                <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                    <div class="block-service-1-card">
                        <div class="number-behind">01</div>
                        <a href="#" class="thumbnail-link d-block mb-4"></a>
                        <h3 style="font-size: 25px;" class="block-service-1-heading mb-3"><a href="#">Create an
                                Account</a></h3>
                        <div class="block-service-1-excerpt">
                            <p>Begin by signing up on DotPedia. Activate and verify your email in order to unlock your
                                5 free pdf credit. </p>
                        </div>
                        <p><a href="./signup" class="d-inline-flex align-items-center block-service-1-more"><span>Sign
                                    up now</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>
                    </div>
                </div>
                <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                    <div class="block-service-1-card">
                        <div class="number-behind">02</div>
                        <a href="#" class="thumbnail-link d-block mb-4"></a>
                        <h3 style="font-size: 25px;" class="block-service-1-heading mb-3"><a href="#">Get Pedia
                                Credits</a></h3>
                        <div class="block-service-1-excerpt">
                            <p>Use your PDF Credit to download Past Questions from DotPedia. Once your Pedia Credit is
                                exhausted, you`ll be required to buy PDF credits</p>
                        </div>
                        <p><a href="./credit" class="d-inline-flex align-items-center block-service-1-more"><span>Get
                                    Pedia
                                    Credit</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>
                    </div>
                </div>
                <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                    <div class="block-service-1-card">
                        <div class="number-behind">03</div>
                        <a href="#" class="thumbnail-link d-block mb-4"></a>
                        <h3 style="font-size: 25px;" class="block-service-1-heading mb-3"><a
                                href="./profile#upddate">Donate PDFs</a>
                        </h3>
                        <div class="block-service-1-excerpt">
                            <p>You can help donate unavailable PDFs on DotPedia. We award donators who donates PDFs,
                                Past Questions and refer friends on
                                DotPedia with 1 point. Once you reach a total of 100points, you will
                                be awarded with NGN1,000.</p>
                        </div>
                        <p><a href="./profile#upddate"
                                class="d-inline-flex align-items-center block-service-1-more"><span>Doante PDFs</span>
                                <span class="icon-keyboard_arrow_right icon"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-half-content-1 d-block d-lg-flex mt-5">
        <div class="block-half-content-img" style="background-image: url('images/5.png')">

        </div>
        <div class="block-half-content-text bg-bg">
            <div class="block-half-content-text-inner">
                <h2 class="block-half-content-heading mb-4"></h2>
                <div class="block-half-content-excerpt">
                    <p class="lead"><b class="font-weight-bold">READ .:</b> Expand your knowledge bank with PDF's and
                        Books uploaded by contributors on DotPedia
                    </p>
                    <br />
                    <p>
                        <b class="font-weight-bold">EARN .:</b> You can make money by uploading unavailable PDF's on
                        DotPedia.
                    </p>
                    <br />
                    <p>
                        <b class="font-weight-bold">SHARE .:</b> Make even much more money when you refer to a new
                        student, aspirant, undergraduate or graduate to DotPedia.
                    </p>
                </div>
            </div>



            <div class="block-counter-1 section-counter">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="counter">
                            <div class="number-wrap">
                                <span class="block-counter-1-number" data-number="<?php countpdld() ?>">0</span><span
                                    class="append"></span>
                            </div>
                            <span class="block-counter-1-caption">PDFs Downloaded</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="counter">
                            <div class="number-wrap">
                                <span class="block-counter-1-number" data-number="<?php countupl() ?>">0</span><span
                                    class="append"></span>
                            </div>
                            <span class="block-counter-1-caption">Academic Materials</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="counter">
                            <div class="number-wrap">
                                <span class="block-counter-1-number" data-number="<?php earning() ?>">0</span><span
                                    class="append"></span>
                            </div>
                            <span class="block-counter-1-caption">Earnings Made</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-0 block-cta-1 primary-overlay" style="background-image: url('images/bg_4.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h2 class="mb-3 mt-0 text-white">Free 5 PDF Credits for First Comers</h2>
                    <p class="mb-0 text-white lead"></p>
                </div>
                <div class="col-lg-4">
                    <p class="mb-0"><a href="./signup"
                            class="btn btn-outline-white text-white btn-md btn-pill px-5 font-weight-bold btn-block">Create
                            an Account Now</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="block-quick-info-2">
        <div class="container">
            <div class="block-quick-info-2-inner">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex quick-info-2">
                            <span class="icon icon-google mr-3"></span>
                            <div class="text">
                                <strong class="d-block heading">Google</strong>
                                <span class="excerpt"><a target="_blank" href="https://g.page/r/Cb03X8PaQkzYEBA">Let`s
                                        Connect</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex quick-info-2">
                            <span class="icon icon-phone mr-3"></span>
                            <div class="text">
                                <strong class="d-block heading">Need Help</strong>
                                <span class="excerpt"><a href="tel: +2349121087509">+234 912 1087 509</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex quick-info-2">
                            <span class="icon icon-envelope mr-3"></span>
                            <div class="text">
                                <strong class="d-block heading">Send us a message</strong>
                                <span class="excerpt"><a
                                        href="mailto: pdf@dotpedia.com.ng">pdf@dotpedia.com.ng</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex quick-info-2">
                            <span class="icon icon-whatsapp mr-3"></span>
                            <div class="text">
                                <strong class="d-block heading">WhatsApp</strong>
                                <span class="excerpt"><a
                                        href="https://wa.me/2349121087509?text=Hello%2c%20I`m%20_____%0AI%20need%20help%20with%20DotPedia"
                                        target="_blank">Chat us up</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        strings: ["&nbsp;EARN&nbsp;", "&nbsp;SAVE&nbsp;", "&nbsp;SOLVE&nbsp;"],
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
    if ('serviceWorker' in navigator) {
        console.log("Will the service worker register?");
        navigator.serviceWorker.register('service-worker.js')
            .then(function(reg) {
                console.log("Yes, it did.");
            }).catch(function(err) {
                console.log("No it didn't. This happened: ", err)
            });
    }
    </script>
    <script src="service-worker.js">
    // Service worker for Progressive Web App
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js', {
            scope: '.' // THIS IS REQUIRED FOR RUNNING A PROGRESSIVE WEB APP FROM A NON_ROOT PATH
        }).then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    }
    </script>

    </body>

</html>