<?php include("functions/init.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DotPedia | Download PDF's</title>
    <meta name="description" content="DotPedia | Download PDF's">
    <meta name="keywords" content="DotPedia, Download Pdf">
    <meta property="og:title" content="DotPedia" />
    <meta property="og:image" content="images/ico.png" />
    <meta property="og:url" content="https://dotpedia.com.ng" />
    <meta property="og:site_name" content="DotPedia from DotEightPlus" />
    <meta property="og:description" content="Read, Earn, Share" />
    <style>
        .link {padding: 10px 15px;background: transparent;border:#FFE9E6 1px solid;border-left:0px;cursor:pointer;color:#607d8b}
        .disabled {cursor:not-allowed;color: #bccfd8;}
        .current {background: #FFE9E6;}
        .first{border-left:#FFE9E6 1px solid;}
        .question {font-weight:bold;}
        .answer{padding-top: 10px;}
        #pagination{margin-top: 20px;padding-top: 30px;border-top: #ffe9e6 1px solid;}
        .dot {padding: 10px 15px;background: transparent;border-right: #bccfd8 1px solid;}
        #overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
        #overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
        .page-content {padding: 20px;margin: 0 auto;}
        .pagination-setting {padding:10px; margin:5px 0px 10px;border:#bccfd8  1px solid;color:#607d8b;}
    </style>
    
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script>
        function latest(url) {
        $.ajax({
            url: url,
            type: "GET",
            data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
            beforeSend: function(){$("#overlay").show();},
            success: function(data){
            $("#pagination-result").html(data);
            setInterval(function() {$("#overlay").hide(); },500);
            },
            error: function() 
            {}          
       });
    }
    function changePagination(option) {
        if(option!= "") {
            latest("latest.php");
        }
    }
    </script>
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
            <div class="block-quick-info-2-inner">
                <div class="row">

                    <form class="form-contact contact_form col-lg-12" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">

                            <div class="col-sm-12">
                                <label><b style="color: #ff0000; font-size: 18px;" class="font-weight-bold">Search PDF
                                        .:</b></label>
                                <div class="form-group">

                                    <input type="text" name="srctxt" id="srctxt" class="form-control"
                                        placeholder="Search PDF and click on apply...">

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label><b style="color: #ff0000; font-size: 18px;" class="font-weight-bold">Institution
                                        .:</b></label>
                                <div class="form-group">
                                    <select class="form-control" id="inst">
                                        <?php
                                    $gt = "SELECT * FROM pdf WHERE `approve` = 'Yes' GROUP BY `inst`";
                                    $rt = query($gt);
                                    
                                    while($rw = mysqli_fetch_array($rt)) {
                                    
                                    echo '<option id="inst" name="inst">'.$rw['inst'].'</option>';
                                    }
                                    ?>


                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label><b style="color: #ff0000; font-size: 18px;"
                                        class="font-weight-bold">Faculty/College
                                        .:</b></label>
                                <div class="form-group">
                                    <select name="fcg" id="fcg" class="form-control" required>

                                        <?php
                                    $gt = "SELECT * FROM pdf WHERE `approve` = 'Yes' GROUP BY `fcg`";
                                    $rt = query($gt);
                                    
                                    while($rw = mysqli_fetch_array($rt)) {
                                    
                                    echo '<option id="fcg" name="fcg">'.$rw['fcg'].'</option>';
                                    }
                                    ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label><b style="color: #ff0000; font-size: 18px;" class="font-weight-bold">Department
                                        .:</b></label>
                                <div class="form-group">
                                    <select name="dept" id="dept" class="form-control" required>
                                        <?php
                                    $gt = "SELECT * FROM pdf WHERE `approve` = 'Yes' GROUP BY `dept`";
                                    $rt = query($gt);
                                    
                                    while($rw = mysqli_fetch_array($rt)) {
                                    
                                    echo '<option id="inst" name="inst">'.$rw['dept'].'</option>';
                                    }
                                    ?>
                                    </select>

                                </div>
                            </div>


                            <div class="col-sm-2">
                                <label><b style="color: #ff0000; font-size: 18px;" class="font-weight-bold">Level
                                        .:</b></label>
                                <div class="form-group">
                                    <select id="level" class="form-control" required>
                                        <?php
                                    $gt = "SELECT * FROM pdf WHERE `approve` = 'Yes' GROUP BY `level`";
                                    $rt = query($gt);
                                    
                                    while($rw = mysqli_fetch_array($rt)) {
                                    
                                    echo '<option id="level" name="level">'.$rw['level'].'</option>';
                                    }
                                    ?>
                                    </select>

                                </div>
                            </div>


                            <div class="col-sm-2">

                                <div class="form-group">
                                    <div class="col-md-12 mt-4">
                                        <button id="filterr" style="width: 100%; background: #FFE9E6; color: #ff0000;"
                                            type="button" class="btn btn-md ">APPLY</button><br />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>




    <div class="site-section" id="resl">
        <div class="container">

            <div class="row">



                <div class="col-md-12">

                    <h2 style="color: #ff0000" class="mb-4"><b>Most Downloaded PDF(s) </b></h2>
                    <div class="row mb-3 align-items-stretch">

                        <?php
    $ssl = "SELECT * FROM pdf WHERE `approve` = 'Yes' AND `dwnld` BETWEEN 5 AND 1000000000000000 ORDER BY dwnld desc";
    $rls = query($ssl); 

    while($row = mysqli_fetch_array($rls)) {
    
    ?>
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-4">
                            <div class="h-entry">
                                <div class="h-entry-inner">
                                    <a href="./preview?pdf=<?php echo $row['pedia'] ?>"><img src="images/pdff.png"
                                            alt="" class="img-fluid"></a>
                                    <h2 style="color: #ff0000" class="font-size-regular font-weight-bold">
                                        <?php echo ucwords($row['title']); ?>
                                    </h2>
                                    <div style="color: #000" class="meta mb-4">Uploaded by <a href="#">

                                            <?php echo $row['upld']; 

                            //verification tick
                            $paa  = $row['upld'];    
                                        
                            $psql = "SELECT * FROM signup WHERE `usname` = '$paa'";
                            $prsl = query($psql); 
                            
                            //if user account is deleted
                            if(row_count($prsl) == 0) {
                                
                            //convert user account to default
                            $pusl = "UPDATE pdf SET `upld` = 'DotPedia' WHERE `upld` = '$paa'";
                            $purl = query($pusl);   
                                
                                
                            } else {

                            $pdf = mysqli_fetch_array($prsl);

                                
                            if($pdf['vrf'] == 'Yes') {
                                echo ' <i style="color: #ff0000" class="icon-check-circle"></i>';

                            } else {

                                echo '';
                            }

                            
                        }
                            ?>


                                        </a>
                                        <span class="mx-2">&bullet;</span> <?php echo $row['code'] ?><br />
                                        <span class="mx-2">&bullet;</span> <?php echo $row['level'] ?>
                                        <span class="mx-2">&bullet;</span> <?php echo $row['dept'] ?>
                                        <span class="mx-2">&bullet;</span> <?php echo $row['dwnld'] ?>
                                        Downloads
                                        <br /><br />
                                        <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                                href="https://twitter.com/home?status=https://dotpedia.com.ng/preview?pdf=<?php echo $row['pedia'] ?>"><i
                                                    class="icon-twitter"></i></a></span>
                                        <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                                href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/preview?pdf=<?php echo $row['pedia'] ?>"><i
                                                    class="icon-facebook"></i></a></span>
                                        <span class="mx-2"><a target="_blank" data-action="share/whatsapp/share"
                                                data-media="images/ico.png"
                                                href="https://api.whatsapp.com/send?text=Read/Download *<?php echo ucwords($row['title']) ?>* via: https://dotpedia.com.ng/preview?pdf=<?php echo $row['pedia'] ?> - *Uploaded by: <?php echo $row['upld'] ?>*"><i
                                                    class="icon-whatsapp"></i></a></span>
                                    </div>



                                    <div class="col-md-12 ">
                                        <a href="./preview?pdf=<?php echo $row['pedia'] ?>"><input
                                                style="width: 100%; background: #FFE9E6; color: #ff0000;" type="submit"
                                                value="Preview/Download" class="btn btn-pill btn-md "></a><br />
                                    </div>
                                </div>
                            </div>

                        </div>



                        <?php
    }
    ?>

                    </div>
                </div>





                <div class="col-md-12" id="latest">

                    <h2 style="color: #ff0000" class="mb-4"><b>Latest PDF(s) </b></h2>
                    <div class="page-content">
                            <div>
                            <br> <select hidden name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
                            <option value="all-links">Display All Page Link</option>
                            <option value="prev-next">Display Prev Next Only</option>
                            </select>
                            </div>
                            
                            <div id="pagination-result" class="row">
                            <input type="hidden" name="rowcount" id="rowcount" />
                            
                        </div>  
                   
                </div>
                        


            </div>
        </div>
    </div>

    <?php include("include/footer.php"); ?>
    </div>

    <script>latest("latest.php");</script>
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
        strings: ["&nbsp;GET&nbsp;", "&nbsp;SHARE&nbsp;", "&nbsp;SAVE&nbsp;  "],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 400,
        startDelay: 400,
        loop: true,
        showCursor: false
    });
    </script>

    <script src="js/main.js"></script>

    <script src="ajax.js"></script>

    </body>

</html>