<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Shouraiへよこそう</title>

    <!-- Favicon -->
    <link rel="icon" href="{{@asset('img/core-img/favicon.png')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{@asset('css/frontend/style.css')}}">

</head>
<style>
    ul.list {
        width: 100%;
    }
    .power{
        text-align: center;
    }
    .thanh{
        font-size:30px;
        color:darkslategray;
    }
</style>
<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- /Preloader -->

<!-- Header Area Start -->
<header class="header-area">
    <!-- Search Form -->
    <!-- <div class="search-form d-flex align-items-center">
        <div class="container">
            <form action="index.html" method="get">
                <input type="search" name="search-form-input" id="searchFormInput" placeholder="キーワードをご入力ください">
                <button type="submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>-->

    <!-- Top Header Area Start -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="top-header-content">
                        <a><i class="icon_phone"></i> <span>(81)080-2148-9395</span></a>
                        <a><i class="icon_mail"></i> <span>shouraitour@gmail.com</span></a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Top Social Area -->
                        <div class="top-social-area ml-auto">

                            <a href="www.facebook.com/shouraitour"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                            <a href="https://twitter.com/shouraitour"><i class="fa fa-twitter"
                                                                         aria-hidden="true"></i></a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{route('home')}}"><img src="{{@asset('img/core-img/shourailogo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav thanh">
                            <ul id="nav">
                                <li class="active "><a href="{{route('home')}}">ホームページ</a></li>
                                <li class="active"><a href="{{route('listtour')}}">ツアー一覧</a></li>
                                <li class="active"><a href="#">ニュース</a></li>
                                <li class="active"><a href="#">お客様の声</a></li>
                                <li class="active"><a href="{{route('contact')}}">お問い合わせ</a></li>
                            </ul>
                            <!-- Search -->
                            <!--<div class="search-btn ml-4">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div> -->
                            <!-- <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="http://shouraitour/booknow.html">予約 <i class="fa fa-long-arrow-right"
                                                                                aria-hidden="true"></i></a>

                            </div> -->
                        </div>
                        <!-- Nav End -->
                     </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Header Area End -->
@include('includes.flash-message')
@yield('content')
<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <!-- <a href="#" class="footer-logo"><img src="{{@asset('img/core-img/shourailogo.png')}}" alt=""></a> -->

                        <!-- <h4>+12 345-678-9999</h4>
                        <span>Info.colorlib@gmail.com</span>
                        <span>856 Cordia Extension Apt. 356, Lake Deangeloburgh, South Africa</span>
                    </div>
                </div> -->

                <!-- Single Footer Widget Area -->
              <!--  <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80"> -->
                        <!-- Widget Title -->
                       <!-- <h5 class="widget-title">Our Blog</h5> -->

                        <!-- Single Blog Area -->
                         <!-- <div class="latest-blog-area">
                            <a href="#" class="post-title">Freelance Design Tricks How</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div> -->

                        <!-- Single Blog Area -->
                        <!--<div class="latest-blog-area">
                            <a href="#" class="post-title">Free Advertising For Your Online</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>
                    </div>
                </div> -->

                <!-- Single Footer Widget Area -->
                <!-- <div class="col-12 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">-->
                        <!-- Widget Title -->
                       <!-- <h5 class="widget-title">Links</h5> -->

                        <!-- Footer Nav -->
                      <!--  <ul class="footer-nav">
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Our Room</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Career</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> FAQs</a></li>
                        </ul>
                    </div>
                </div> -->

                <!-- Single Footer Widget Area -->
               <!-- <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80"> -->
                        <!-- Widget Title -->
                        <!-- <h5 class="widget-title">Subscribe Newsletter</h5>
                        <span>Subscribe our newsletter gor get notification about new updates.</span> -->

                        <!-- Newsletter Form -->
                        <!-- <form action="index.html" class="nl-form">
                            <input type="email" class="form-control" placeholder="Enter your email...">
                            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Copywrite Area -->
   <!-- <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12 col-md-8"> -->
                    <!-- Copywrite Text -->
                    <div class="copywrite-text power">
                        <p>PowerbyThom@LabWu</p>
                    </div>
                <!-- </div> -->
               <!-- <div class="col-12 col-md-4"> -->
                    <!-- Social Info -->
                    <!-- <div class="social-info">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div> -->
                </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="{{@asset('js/jquery.min.js')}}"></script>
<!-- Popper -->
<script src="{{@asset('js/popper.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{@asset('js/bootstrap.min.js')}}"></script>
<!-- All Plugins -->
<script src="{{@asset('js/roberto.bundle.js')}}"></script>
<!-- Active -->
<script src="{{@asset('js/default-assets/active.js')}}"></script>
@stack("js")
</body>

</html>
