<?php
include("functions/init.php"); 
if(!isset($_SESSION['login'])) {

    redirect("./signin");
    
} else {

    $data = $_SESSION['login'];
    $sql = "SELECT * FROM signup WHERE `usname` = '$data'";
    $rsl = query($sql);

    if(row_count($rsl) == 0) {

        redirect("./logout");
        
    } else{
    $row = mysqli_fetch_array($rsl);
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Profile</title>
    <?php include("include/header.php");
    
    if($row['pix'] == ''){

        echo '
        <div class="site-blocks-cover overlay" style="background-image: url(images/3.png);" data-aos="fade"
            data-stellar-background-ratio="0.5">';

    } else {

        echo '
        <div class="site-blocks-cover overlay" style="background-image: url(images/profilepix/'.$row['pix'].');" data-aos="fade"
            data-stellar-background-ratio="0.5">';
    }
    ?>
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10">

                <div class="row justify-content-center mb-4">
                    <div class="col-md-10 text-center">
                        <h1 data-aos="fade-up" class="mb-5 font-weight-bold"><span style="color: #FFE9E6;"
                                class="typed-words"></span></h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-5" data-aos="fade" data-aos-delay="100">

                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Full Name</p>
                        <p class="mb-4"><?php echo $row['fname'] ?>

                            <!-- verification tick --->
                            <?php 

                            global_check();                        
                            
                            if($row['vrf'] == 'Yes') {
                                echo '<i style="color: #ff0000" class="icon-check-circle"></i>';

                            } else {

                                echo '';
                            }
                            ?>
                        </p>

                        <p class="mb-0 font-weight-bold">Username</p>
                        <p class="mb-4"><?php echo $row['usname'] ?></a></p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><?php echo $row['tel'] ?></a></p>

                        <p class="mb-0 font-weight-bold">Email</p>
                        <p class="mb-4"><?php echo $row['email'] ?></a></p>

                        <p class="mb-0 font-weight-bold">Referred By;</p>
                        <p class="mb-4"><?php echo $row['ref'] ?></a></p>

                        <div class="col-md-12 ">
                            <input style="width: 100%; background: #FFE9E6; color: #ff0000;" type="submit"
                                value="Update Profile Picture" class="btn btn-pill btn-md " data-toggle="modal"
                                data-target="#profilePicModal"><br />
                        </div>
                    </div>


                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Available PDF Credit</p>
                        <p class="mb-4">NGN <?php echo number_format($row['pdfcredit']) ?> - <a href="#"
                                class="d-inline-flex align-items-center block-service-1-more"><span>Buy PDF
                                    Credit</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>

                        <?php      
                        $user = $_SESSION['login'];
                        
                        //add earn from pdf upload
                        $stl = "SELECT sum(sn) AS total, sum(earn) AS earning FROM pdf  WHERE `upld` = '$user'";
                        $rtl = query($stl); 
                        $rtw = mysqli_fetch_array($rtl);

                        //add earn from past questions uploads
                        $swl = "SELECT sum(sn) AS pqtotal, sum(earn) AS pqearning FROM pq WHERE `upld` = '$user'";
                        $rwl = query($swl); 
                        $rww = mysqli_fetch_array($rwl);

                        $a = $rtw['earning'] + $rww['pqearning'];


                        //get total referrals
                        $raf = "SELECT sum(id) AS reftotal FROM signup WHERE `ref` = '$user'";
                        $ras = query($raf);
                        

                        if(row_count($ras) == '') {
                            
                            $refff = 0;
                        } else {

                            $rao    = mysqli_fetch_array($ras);
                            $refff  = number_format($rao['reftotal']); 

                        }
                        

                        ?>

                        <p class="mb-0 font-weight-bold">Total PDF(s) Donated</p>
                        <p class="mb-4"><?php echo number_format($rtw['total']) ?></a> - <a data-toggle="modal"
                                data-target="#uploaded" href="#"
                                class="d-inline-flex align-items-center block-service-1-more"><span>View Uploaded
                                    PDFs</span>
                                <span class="icon-keyboard_arrow_right icon"></span></a></p>

                        <p class="mb-0 font-weight-bold">Total Earnings</p>
                        <p class="mb-4">NGN <?php echo number_format($a) ?></a> - <a href="#"
                                class="d-inline-flex align-items-center block-service-1-more"><span>Withdraw
                                    Funds</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>



                        <p class="mb-0 font-weight-bold">Total Referals</p>
                        <p class="mb-4"><?php echo $refff ?></a> - <a data-toggle="modal" data-target="#refLink"
                                href="#" class="d-inline-flex align-items-center block-service-1-more"><span>Share
                                    Referal
                                    Link</span>
                                <span class="icon-keyboard_arrow_right icon"></span></a>

                        </p>


                        <p class="mb-0 font-weight-bold">Earn Much More</p>
                        <p class="mb-4"><a data-toggle="modal" data-target="#tutor" href="#"
                                class="d-inline-flex align-items-center block-service-1-more"><span>Become a
                                    Tutor</span></a> &nbsp; | &nbsp; <a href="./uplpq"
                                class="d-inline-flex align-items-center block-service-1-more"><span>
                                    <?php echo number_format($rww['pqtotal']) ?> Uploaded
                                    PQs</span></a>

                        </p>


                        <div class="col-md-12 ">
                            <a href="./logout"><input style="width: 100%; background: #FFE9E6; color: #ff0000;"
                                    type="submit" value="Logout" class="btn btn-pill btn-md "></a><br />
                        </div>
                    </div>

                </div>

                <div class="col-md-7 mb-5 donatepdf" data-aos="fade" id="donor">


                    <?php uploadpdf() ?>
                    <br />
                    <form method="post" class="p-5 bg-white donatepdf" id="donor" enctype="multipart/form-data">

                        <h1>Donate PDF</h1>
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
                                <label class="text-black font-weight-bold" for="title">PDF Title</label>
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
                                <label class="text-black font-weight-bold" for="title">Select PDF File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="pdffile" id="pdffile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>


                            <div class="col-md-12 mb-3 mb-md-0">
                                <button type="submit" name="donatenow" id=""
                                    style="background: #FFE9E6; color: #ff0000; width: 100%;"
                                    class="btn btn-pill btn-primary btn-md">Upload PDF</button><br />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include("include/footer.php"); ?>
    </div>

    <!-- UPLOAD PROFILE PICTURE MODAL -->
    <div class="modal fade" id="profilePicModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div style="background: #FFE9E6; color: #ff0000; border-radius: 0px 40px 0px 40px; z-index: 999"
                class="modal-content">
                <div class="modal-body">
                    <form method="post">

                        <h3 class="text-center">Update Profile Picture</h3>
                        <br />
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="title">SELECT FILE</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="psfile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <p style="color: red;" id="msg"></p>
                            </div>

                        </div>



                        <div class="row form-group">
                            <div class="col-md-12">
                                <input style="background: #Fff; color: #ff0000" type="button" id=pupl
                                    value="Upload Picture" class="btn btn-pill btn-md"><br />
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- SHARE REFERAL LINK -->
    <div class="modal fade" id="refLink">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div style="background: #FFE9E6; color: #ff0000; border-radius: 0px 40px 0px 40px; z-index: 999"
                class="modal-content">
                <div class="modal-body">
                    <form action="mail.php" method="post">

                        <h3 class="text-center">Refer a Friend</h3>
                        <br />
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Referral Link</label>
                                <input id="myInput" type="text"
                                    value="https://dotpedia.com.ng/signup?link=<?php echo $data ?>"
                                    class="form-control">
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-lg-12">
                                <p id="copy"
                                    style="background: #Fff; color: #ff0000; border-radius: 40px 40px 40px 40px;"
                                    class="mb-0 btn font-weight-bold btn-block justify-content-center"
                                    onclick="myFunction()">Copy
                                    Referral
                                    Link</p>
                            </div>
                        </div>

                        <div class="col-md-12 mb-5 mb-lg-0 col-lg-12 text-center">
                            <a data-media="images/ico.png"
                                href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/refer?link=<?php echo $data ?>"
                                target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>

                            <a data-action="share/whatsapp/share" data-media="images/ico.png"
                                href="https://api.whatsapp.com/send?text=https://dotpedia.com.ng/refer?link=<?php echo $data ?>"
                                target="_blank" class="pl-3 pr-3"><span class="icon-whatsapp"></span></a>

                            <a data-media="images/ico.png"
                                href="https://twitter.com/home?status=https://dotpedia.com.ng/refer?link=<?php echo $data ?>"
                                target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Donate PDF Modal -->
    <div class="modal fade" id="donateModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: #FFE9E6; color: #ff0000; border-radius: 0px 40px 0px 40px;" class="modal-content">
                <div class="modal-body">
                    <div id="dntmsg" class="text-center"></div>
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
        strings: ["My Profile"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 4000,
        startDelay: 1000,
        loop: false,
        showCursor: false
    });
    </script>

    <script src="js/main.js"></script>
    <script src="ajax.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    </script>
    <script>
    //copy text to clipboard
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
    }
    </script>

    </body>

</html>