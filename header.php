<?php session_start();?>
<!DOCTYPE html>
<html class="no-js" lang="en-US">

<?php include("conDB.php");?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>My Food Dog</title>
    <meta name="description" content="My Food Dog" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
        type="text/css" media="all">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/vendor/linearicon.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">


    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="newstyle.css?v=<?=date('YmdHi')?>">


    

</head>

<body>
    <!-- Header Section Start From Here -->
    <header class="header-wrapper">
        <!-- Header Nav Start -->
        <div class="header-nav bg-white d-lg-block d-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                        <div class="header-nav-wrapper">
                            <div class="header-menu-nav">
                                <div class="menu-nav ">

                                    <div class="dropdown float-right">
                                        <?php
                                    if(empty($_SESSION['user-id']))
                                    {
                                        ?>
                                        <button onclick="window.location='login.php'" type="button"><i
                                                class="las la-user-circle"></i> <span>เข้าสู่ระบบ</span> </button>
                                        <?php
                                    }else{
                                        ?>
                                        <button type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="las la-user-circle"></i> <span><?=$_SESSION['user-name']?></span>
                                            <i class="las la-angle-down"></i></button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php
                                            if($_SESSION['user-position']=="user")
                                            {
                                                ?>
                                                  <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                                                <li><a href="myrecipe.php">เมนูอาหารของฉัน</a></li>
                                                <li><a href="wishlist.php">เมนูโปรด</a></li>
                                                <li><a href="logout.php">ออกจากระบบ</a></li>
                                                <?php

                                            }else{
                                                ?>
                                                  <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                                                  <li><a href="myrecipe.php">เมนูอาหารของฉัน</a></li>
                                                <li><a href="wishlist.php">เมนูโปรด</a></li>
                                                    <li><a href="manage_news.php">จัดการข่าวสาร</a></li>

                                                <li><a href="logout.php">ออกจากระบบ</a></li>
                                                <?php
                                            }
                                            ?>
                                          
                                        </ul>
                                        <?php

                                    }
                                    ?>


                                    </div>
                                    <div class="search-element-wrap">
                                        <!-- <a href="javascript:void(0)"><i class="las la-search"></i></a> -->
                                        <div class="search-element">
                                            <form action="recipes.php" method="get">
                                                <input type="text" placeholder="ค้นหาเมนูอาหาร ที่นี่ ..." name="keyword" />
                                                <button type="submit"><i class="las la-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Nav End -->
        <div class="header-menu bg-indigo sticky-nav d-lg-block d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 d-flex">
                        <div class="logo align-self-center">
                            <a href="index.php"><img class="img-responsive" src="assets/images/logo/logo.png"
                                    alt="logo.png" /></a>
                        </div>
                    </div>
                    <div class="col-md-9  d-flex">
                        <div class="header-horizontal-menu align-self-center">
                            <ul class="menu-content">
                                <li><a href="index.php">หน้าหลัก</a></li>
                                <li><a href="recipes.php">เมนูอาหาร</a></li>
                                <li><a href="news.php">บทความข่าวสาร</a></li>
                                <li><a href="contact.php">ติดต่อเรา</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Header Nav End -->
    </header>
    <!-- Header Section End Here -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header d-lg-none sticky-nav bg-indigo ptb-10px">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col d-flex">
                    <div class="header-logo">
                        <a href="index.php"><img class="img-responsive" src="assets/images/logo/logo.png"
                                alt="logo.png" /></a>
                    </div>
                    <div class="mobile-menu-toggle align-self-center">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <i class="las la-bars"></i>
                        </a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="cart-info d-flex align-self-center">

                            <?php
                                    if(empty($_SESSION['user-id']))
                                    {
                                        ?>
                            <div class="dropdown float-right">
                                <button type="button" id="dropdownMenuButton-4" onclick="window.location='login.php'"><i
                                        class="las la-user"></i></button>
                            </div>
                            <?php
                                    }else{
                                        ?>
                            <div class="dropdown float-right">
                                <button type="button" id="dropdownMenuButton-4" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="las la-user"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-4">
                                <?php
                                            if($_SESSION['user-position']=="user")
                                            {
                                                ?>
                                                  <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                                                <li><a href="myrecipe.php">เมนูอาหารของฉัน</a></li>
                                                <li><a href="wishlist.php">เมนูโปรด</a></li>
                                                <li><a href="logout.php">ออกจากระบบ</a></li>
                                                <?php

                                            }else{
                                                ?>
                                                  <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                                                  <li><a href="myrecipe.php">เมนูอาหารของฉัน</a></li>
                                                <li><a href="wishlist.php">เมนูโปรด</a></li>
                                                    <li><a href="manage_news.php">จัดการข่าวสาร</a></li>

                                                <li><a href="logout.php">ออกจากระบบ</a></li>
                                                <?php
                                            }
                                            ?>
                                </ul>
                            </div>
                            <?php

                                    }
                                    ?>



                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>

    <!-- Search Category Start -->
    <div class="mobile-search-area d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-element">
                        <form class="d-flex" action="recipes.php" method="get">
                            <input type="text" name="keyword" placeholder="ค้นหาเมนูอาหาร ที่นี่ ... " />
                            <button type="submit"><i class="las la-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="head">
                <span class="title">&nbsp;</span>
                <button class="offcanvas-close">×</button>
            </div>


            <div class="menu-close">
                menu <i class="las la-arrow-left"></i>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="index.php">หน้าหลัก</a></li>
                    <li><a href="recipes.php">เมนูอาหาร</a></li>
                    <li><a href="news.php">บทความข่าวสาร</a></li>
                    <li><a href="contact.php">ติดต่อเรา</a></li>
                </ul>
            </div>
            
        </div>
    </div>


    <div class="offcanvas-overlay"></div>