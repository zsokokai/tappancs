<?php
    // Alkalmazás logika:
    include('config.inc.php');

    // adatok összegyűjtése:
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

    // Megjelenítés logika:
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Archívum | Tappancs</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        div#galeria {margin: 0 auto; width: 620px;}
        div.kep { display: inline-block; }
        div.kep img { width: 200px; }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="img/core-img/salad.png" alt="">
    </div>

    <!-- Search Wrapper -->
    <div class="search-wrapper">
        <!-- Close Btn -->
        <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                  <form action="https://www.google.hu/search?hl=en-GB&source=hp&q=" method="get" role="search">
                      <input type="search" placeholder="Keresés..." name="q" id="s" autocomplete="off">
                      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Breaking News -->
                    <div class="col-12 col-sm-6">
                        <div class="breaking-news">
                        </div>
                    </div>

                    <!-- Top Social Info -->
                    <div class="col-12 col-sm-6">
                        <div class="top-social-info text-right">
                            <a href="https://www.facebook.com/Tappancs.Allatvedo.Alapitvany/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.tappancs.hu">Eredeti weboldal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="img/logo.jpg" alt="" width=40%></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.html">Gazdit keresünk!</a></li>
                                    <li><a href="#">Hogyan segíthet?</a>
                                      <ul class="dropdown">
                                          <li><a href="segit.html">Hogyan segíthet?</a></li>
                                          <li><a href="#">Adó 1 százalék</a></li>
                                          <li><a href="#">Tárgyi adományok</a></li>
                                          <li><a href="#">Önkéntes munka</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="#">Mit tegyek ha...</a>
                                      <ul class="dropdown">
                                          <li><a href="talalt.html">Találtam egy állatot</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="#">Rólunk</a>
                                        <ul class="dropdown">
                                            <li><a href="kapcsolat.html">Kapcsolatfelvétel</a></li>
                                            <li><a href="#">Támogatóink</a></li>
                                        </ul>
                                    </li>
                                    <li class="active"><a href="archivum.php">Archívum</a></li>
                                    <li><a href="feltolt.php">Képek feltöltése</a></li>
                                </ul>

                                <!-- Newsletter Form -->
                                <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb5.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Archívum</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Elements Area Start ##### -->
    <section class="elements-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- ********** Buttons ********** -->

                <!-- ********** Progress Bars & Accordions ********** -->
                <div class="col-12">
                </div>

                <!-- ##### Accordians ##### -->
                <div class="col-12 col-lg-6">
                  <div id="galeria">
                  <h1>Galéria</h1>
                  <?php
                  arsort($kepek);
                  foreach($kepek as $fajl => $datum)
                  {
                  ?>
                      <div class="kep">
                          <a href="<?php echo $MAPPA.$fajl ?>">
                              <img src="<?php echo $MAPPA.$fajl ?>">
                          </a>
                          <p>Név:  <?php echo $fajl; ?></p>
                          <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
                      </div>
                  <?php
                  }
                  ?>
                  </div>
                    </div>
                </div>

                <!-- ##### Tabs ##### -->

                <!-- ********** Milestones ********** -->


                <!-- ********** Loaders ********** -->

                <!-- ********** Icon Boxes ********** -->

    <!-- ***** Elements Area End ***** -->

    <!-- ##### Follow Us Instagram Area Start ##### -->

    <!-- ##### Follow Us Instagram Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info text-right">
                        <a href="https://www.facebook.com/Tappancs.Allatvedo.Alapitvany/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </div>
                    <!-- Footer Logo -->
                    <!-- Copywrite -->
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
