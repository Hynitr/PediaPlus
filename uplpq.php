<?php
include("functions/init.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Upload Past Questions</title>
    <meta name="description" content="DotPedia | Upload Past Questions">
    <meta name="keywords" content="DotPedia, Upload Past Questions">
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
                    <?php uploadpq() ?>
                    <br />
                    <form method="post" class="p-5 bg-white donatepdf" id="donor" enctype="multipart/form-data">

                        <h1>Upload Past Question(s)</h1>
                        <br />

                        <div class="row form-group">

                            <div class="col-md-12 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="inst">Institution</label>
                                <input type="text" id="inst" name="inst"
                                    placeholder="e.g Federal University Oye Ekiti.." class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="typ">Institution Type</label>
                                <select name="typ" id="typ" class="custom-select form-control">
                                    <option name="typ" id="typ">University</option>
                                    <option name="typ" id="typ">Polytechnic</option>
                                    <option name="typ" id="typ">College of Education</option>
                                    <option name="typ" id="typ">Technical Schools</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="title">PQ(s) Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="e.g GST 101" required>
                            </div>


                            <div class="col-md-12 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="lname">Faculty/College</label>
                                <input type="text" id="fcg" name="fcg"
                                    placeholder="e.g Faculty of Engineering, College of Science" class="form-control"
                                    required>
                            </div>

                            <div class="col-md-12 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="email">Department</label>
                                <input type="text" id="dept" name="dept"
                                    placeholder="e.g Electrical Engineering, Mass Communication..." class="form-control"
                                    required>
                            </div>

                            <div class="col-md-12 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="subject">Level</label>
                                <select name="level" id="level" class="custom-select form-control">
                                    <option name="level" id="level">100 Level</option>
                                    <option name="level" id="level">200 Level</option>
                                    <option name="level" id="level">300 Level</option>
                                    <option name="level" id="level">400 Level</option>
                                    <option name="level" id="level">500 Level</option>
                                    <option name="level" id="level">ND 1</option>
                                    <option name="level" id="level">ND 2</option>
                                    <option name="level" id="level">HND 1</option>
                                    <option name="level" id="level">HND 2</option>
                                    <option name="level" id="level">NCE</option>
                                </select>
                            </div>


                            <div class="col-md-12 mb-3 mb-md-4">
                                <label class="text-black font-weight-bold" for="title">Select PQ File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="pdffile" id="pdffile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>


                            <div class="col-md-12 mb-3 mb-md-0">
                                <button type="submit" name="pqupl" id="" style="background: #FFE9E6; color: #ff0000;"
                                    class="btn btn-pill btn-primary btn-md">Upload Past Questions</button><br />
                            </div>
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

    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    </script>


    <script src="js/typed.js"></script>
    <script>
    var typed = new Typed('.typed-words', {
        strings: ["Upload PQ"],
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