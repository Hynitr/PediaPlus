    <meta charset="utf-8" />
    <meta name="title" content="DotPedia" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <!--  Social tags      -->
    <meta name="keywords"
        content="DotPedia, pdf, DotEightPlus, Lecture notes, past questions, cbt practice exams, project research" />
    <meta name="description" content="Africa's leading academic resources bank for undergraduates" />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="DotPedia" />
    <meta itemprop="description" content="Africa's leading academic resources bank for undergraduates" />
    <meta itemprop="image" content="https://dotpedia.com.ng/images/ico.png" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="DotPedia" />
    <meta name="twitter:site" content="@doteightplus" />
    <meta name="twitter:title" content="DotPedia" />
    <meta name="twitter:description" content="Africa's leading academic resources bank for undergraduates" />
    <meta name="twitter:creator" content="@doteightplus" />
    <meta name="twitter:image" content="hhttps://twitter.com/doteightplus/photo" />

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="doteightplus" />
    <meta property="og:title" content="DotPedia" />
    <meta property="og:type" content="Software Company" />
    <meta property="og:url" content="https://dotpedia.com.ng" />
    <meta property="og:image" content="https://dotpedia.com.ng/images/ico.png" />
    <meta property="og:description" content="Africa's leading academic resources bank for undergraduates" />
    <meta property="og:site_name" content="DotPedia" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta name="description" content="DotPedia" />
    <meta name="keywords"
        content="DotPedia, pdf, DotEightPlus, Lecture notes, past questions, cbt practice exams, project research" />
    <meta property="og:title" content="DotPedia" />
    <meta property="og:image" content="https://dotpedia.com.ng/images/ico.png" />
    <meta property="og:url" content="https://dotpedia.com.ng" />
    <meta property="og:site_name" content="DotPedia" />
    <meta property=" og:description" content="Africa's leading academic resources bank for undergraduates" />
    <meta name="theme-color" content="#FFE9E6">


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="manifest" href="manifest.json">


    <link type="image/x-icon" rel="shortcut icon" href="images/ico.png">

    </head>

    <body>

        <!--CSS Spinner
       <div class="spinner-wrapper">
           <div class="spinner"></div>
       </div>-->

        <div class="site-wrap">

            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>

            <header class="site-navbar" role="banner">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-8 col-xl-4">
                            <h1 class="mb-0 site-logo"><a href="./" class="text-white mb-0"><img
                                        style="width: ; height: 90px;" class="img-fluid" src="images/logo.png"></a>
                            </h1>
                        </div>
                        <div class="col-12 col-md-8 d-none d-xl-block">
                            <nav class="site-navigation position-relative text-right" role="navigation">

                                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block font-weight-bold">
                                    <li><a href="./"><span><b>Home</b></span></a></li>
                                    <li><a href="./pdf"><span><b>PDF(s)</b></span></a></li>
                                    <li><a href="./pq"><span><b>Past Questions</b></span></a></li>
                                    <li><a href="./tutors"><span><b>Tutors</b></span></a></li>
                                    <li><a href="./cbt"><span><b>CBT</b></span></a></li>
                                    <?php
                                   if(isset($_SESSION['login'])) {
                                       echo '<li><a style="color: #000;" href="./profile"><span><b>My Profile</b></span></a></li>';
                                   } else {
                                      echo '<li><a href="./signup"><span><b>Sign Up</b></span></a></li>'; 
                                   }
                                   ?>

                                </ul>
                            </nav>
                        </div>


                        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3"
                            style="position: relative; top: 3px; left: 2.5rem;"><a style="color: #ff0000;" href="#"
                                class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a>
                        </div>

                    </div>

                </div>
        </div>

        </header>