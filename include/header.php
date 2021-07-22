   <meta charset="UTF-8">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
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

           <header style="position: fixed; background: #FFE9E6; top: 0rem; height: 90px;" class="site-navbar"
               role="banner">

               <div class="container">
                   <div class="row align-items-center">

                       <div class="col-11 col-xl-4">
                           <h1 class="mb-0 site-logo"><a href="./" class="text-white mb-0"><img
                                       style="width: ; height: 90px;" class="img-fluid" src="images/cover.png"></a>
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
                           style="position: relative; top: 3px; right: 20px;"><a style="color: #ff0000;" href="#"
                               class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a>
                       </div>

                   </div>

               </div>
       </div>

       </header>