@extends('layouts.frontend')
@section('content')
    <style>
        .listtour{
            margin-top: 50px;
            font-size:40px;
            color:darkgreen;
        }
        .roberto-btn{
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-detail{
            padding:0;
        }
        .footer-contact{
            margin-bottom: 20px;
        }
        .button-contact{
            margin-bottom: 40px;
        }
        .contact-text{
           color: white;
        }
        .tourname{
            font-weight:bold;
            color:forestgreen;
            font-size:32px;
        }
        .price{
            color:orangered;
            font-size:28px;
            padding-left:0px;
        }
        .tour-day{
            background:hotpink;
            box-shadow:papayawhip ;
            line-height: 1.2;
            font-family: "Trebuchet MS", sans-serif;
            border-radius: 3px;
            font-size:16px;
        }
        .detail{
            padding-left: 0px;
        }
        .note{
            font-size:13px;
        }
        .search{
            color:darkgreen;
        }
    </style>
        <!-- Welcome Area Start -->
        <section class="welcome-area">
            <div class="welcome-slides owl-carousel">
                <!-- Background image slide -->
                <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url({{@asset('img/bg-img/kyoto1.jpg')}});"
                     data-img-url="img/bg-img/kyoto1.jpg">
                    <!-- Welcome Content -->
                    <div class="welcome-content h-100">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <!-- Welcome Text -->
                                <div class="col-12">
                                    <div class="welcome-text text-center">
                                        <h6 data-animation="fadeInLeft" data-delay="200ms">旅行 &amp; 体験</h6>
                                        <h2 data-animation="fadeInLeft" data-delay="500ms">Shouraiへよこそう</h2>
                                        <!--<a href="#" class="btn roberto-btn btn-2" data-animation="fadeInLeft"
                                           data-delay="800ms">Discover Now</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Background image slide -->
                <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/kyoto2.jpg);"
                     data-img-url="img/bg-img/kyoto2.jpg">
                    <!-- Welcome Content -->
                    <div class="welcome-content h-100">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <!-- Welcome Text -->
                                <div class="col-12">
                                    <div class="welcome-text text-center">
                                        <h6 data-animation="fadeInUp" data-delay="200ms">旅行 &amp; 体験</h6>
                                        <h2 data-animation="fadeInUp" data-delay="500ms">Shouraiへよこそう</h2>
                                        <!--<a href="#" class="btn roberto-btn btn-2" data-animation="fadeInUp" data-delay="800ms">Discover
                                            Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Background image slide -->
                <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/vn-image/4.jpg);"
                     data-img-url="img/bg-img/vn-image/4.jpg">
                    <!-- Welcome Content -->
                    <div class="welcome-content h-100">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <!-- Welcome Text -->
                                <div class="col-12">
                                    <div class="welcome-text text-center">
                                        <h6 data-animation="fadeInDown" data-delay="200ms" weight="200px">旅行 &amp; 経験</h6>
                                        <h2 data-animation="fadeInDown" data-delay="500ms">Shouraiへよこそう</h2>
                                        <!--<a href="#" class="btn roberto-btn btn-2" data-animation="fadeInDown"
                                           data-delay="800ms">Discover Now</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Welcome Area End -->

        <!-- About Us Area Start -->
        <section class="shourai-about-area section-padding-100-0">
            <!-- Hotel Search Form Area -->
            <div class="hotel-search-form-area">
                <div class="container-fluid">
                    <div class="hotel-search-form">
                        <form action="{{route('listtour')}}" method="get">
                            <div class="row justify-content-between align-items-end search">
                                <div class="col-6 col-md-2 col-lg-3">
                                    <label for="from">出発地</label>
                                    <select name="from" id="from" class="form-control">
                                        <option value="">選択してください</option>
                                        <?php for($i = 0;$i < $countDataPrefecture ;$i++) { ?>
                                        <option value="{{$dataPrefecture[$i]->id}}">{{$dataPrefecture[$i]->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!--
                                <div class="col-4 col-md-1">
                                    <label for="type">ツアタイプ</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="01">国内</option>
                                        <option value="02">国際</option>
                                    </select>
                                </div>
                                -->

                                <div class="col-6 col-md-2 col-lg-3">
                                    <label for="to">行先</label>
                                    <select name="to" id="to" class="form-control">
                                        <option value="">選択してください</option>
                                        <?php for($i = 0;$i < $countDataDestination;$i++) { ?>
                                        <option value="<?php echo $dataDestination[$i]->id; ?>"><?php echo $dataDestination[$i]->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="date" class="form-control" id="checkOut" name="checkout-date"> -->
                                </div>
                                <!--<div class="col-4 col-md-1">
                                    <label for="room">Room</label>
                                    <select name="room" id="room" class="form-control">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div>
                                <div class="col-4 col-md-1">
                                    <label for="adults">Adult</label>
                                    <select name="adults" id="adults" class="form-control">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div>
                                <div class="col-4 col-md-2 col-lg-1">
                                    <label for="children">Children</label>
                                    <select name="children" id="children" class="form-control">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div> -->
                                <div class="col-6 col-md-2 col-lg-3">
                                    <label for="Depart">出発日</label>
                                    <input type="date" class="form-control" id="depart" name="depart-date">
                                </div>
                                <div class="col-12 col-md-3">
                                    <button type="submit" class="form-control btn roberto-btn w-100">検索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="container mt-100">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6"> -->
                        <!-- Section Heading -->
                        <!-- <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                            <h6>About Us</h6>
                            <h2>Welcome to <br>Roberto Hotel Luxury</h2>
                        </div>
                        <div class="about-us-content mb-100">
                            <h5 class="wow fadeInUp" data-wow-delay="300ms">With over 340 hotels worldwide, NH Hotel Group
                                offers a wide variety of hotels catering for a perfect stay no matter where your
                                destination.</h5>
                            <p class="wow fadeInUp" data-wow-delay="400ms">Manager: <span>Michen Taylor</span></p>
                            <img src="img/core-img/signature.png" alt="" class="wow fadeInUp" data-wow-delay="500ms">
                        </div>
                    </div> -->
                    <div class="col-12 col-lg-6">
                        <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <!-- <div class="row no-gutters">
                                <div class="col-6">
                                    <div class="single-thumb">
                                        <img src="img/bg-img/13.jpg" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="img/bg-img/14.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-thumb">
                                        <img src="img/bg-img/15.jpg" alt="">
                                    </div>
                                </div>

                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Room Area Start -->
        <section class="roberto-rooms-area">
            <div class="rooms-slides owl-carousel">
                <!-- Single Room Slide -->
               <!-- <div class="single-room-slide d-flex align-items-center"> -->
                    <!-- Thumbnail -->
                   <!-- <div class="room-thumbnail h-100 bg-img" style="background-image: url(img/bg-img/16.jpg);"></div> -->

                    <!-- Content -->

                    <!-- <div class="room-content">-->
                        <!--<h2 data-animation="fadeInUp" data-delay="100ms">Premium King Room</h2>
                        <h3 data-animation="fadeInUp" data-delay="300ms">400$ <span>/ Day</span></h3>
                        <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                            <li><span><i class="fa fa-check"></i> Size</span> <span>: 30 ft</span></li>
                            <li><span><i class="fa fa-check"></i> Capacity</span> <span>: Max persion 5</span></li>
                            <li><span><i class="fa fa-check"></i> Bed</span> <span>: King Beds</span></li>
                            <li><span><i class="fa fa-check"></i> Services</span> <span>: Wifi, Television, Bathroom</span></li>
                        </ul>
                        -->

                       <!-- <a href="#" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms">View Details</a> -->
                   <!-- </div>-->
                </div>
        </section>
            <section class="roberto-rooms-area">
                <div class="rooms-slides owl-carousel">
                <!-- Single Room Slide -->
                <?php for($i = 0;$i < $countDataTop;$i++){ ?>
                        <!-- Single Room Slide -->
                        <div class="single-room-slide d-flex align-items-center">
                    <!-- Thumbnail -->
                    <div class="room-thumbnail h-100 bg-img"
                         style="background-image: url({{\App\Helpers\CommonHelper::getImageUrl($dataListToursTop[$i]->image)}});"></div>

                    <!-- Content -->
                    <div class="room-content">

                        <h2 data-animation="fadeInUp" data-delay="100ms"><?php echo $dataListToursTop[$i]->name;?></h2>
                        <h3 data-animation="fadeInUp" data-delay="300ms"><?php echo $dataListToursTop[$i]->price;?> <span>円/ Day</span>
                        </h3>
                        <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                            <li><span><i class="fa fa-check"></i> 出発日</span> <span>: <?php echo $dataListToursTop[$i]->start;?></span></li>
                            <li><span><i class="fa fa-check"></i> 値段</span> <span>: <?php echo $dataListToursTop[$i]->price;?></span></li>
                            <li><span><i class="fa fa-check"></i> レビュー</span> <span>: </span></li>
                            <!-- <li><span><i class="fa fa-check"></i> Services</span> <span>: Wifi, Television, Bathroom</span></li>
                            -->
                        </ul>
                        <a href="{{route('detail')}}?idtour={{$dataListToursTop[$i]->id}}" class="btn roberto-btn detail" data-animation="fadeInUp" data-delay="700ms">詳細</a>

                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- Our Room Area End -->

        <!-- Testimonials Area Start -->
        <!--<section class="roberto-testimonials-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="testimonial-thumbnail owl-carousel mb-100">
                            <img src="img/bg-img/10.jpg" alt="">
                            <img src="img/bg-img/11.jpg" alt="">
                        </div>
                    </div> -->

                    <!-- <div class="col-12 col-md-6"> -->
                        <!-- Section Heading -->
                        <!-- <div class="section-heading">
                            <h6>Testimonials</h6>
                            <h2>Our Guests Love Us</h2>
                        </div> -->
                        <!-- Testimonial Slide -->
                        <!-- <div class="testimonial-slides owl-carousel mb-100">-->

                            <!-- Single Testimonial Slide -->
                           <!--  <div class="single-testimonial-slide">
                                <h5>“This can be achieved by applying search engine optimization or popularly known as SEO. This
                                    is a marketing strategy which increases the quality and quantity of traffic flow to a
                                    particular website via search engines.”</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <h6>Robert Downey <span>- CEO Deercreative</span></h6>
                                </div>
                            </div> -->
                            <!-- Single Testimonial Slide -->
                            <!-- <div class="single-testimonial-slide">
                                <h5>“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus delectus facilis
                                    molestias, error vitae praesentium quos eaque qui ea, tempore blanditiis sint reprehenderit,
                                    quaerat. Commodi ab architecto sit suscipit exercitationem!”</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <h6>Akash Downey <span>- CEO Deercreative</span></h6>
                                </div>
                            </div> -->

                            <!-- Single Testimonial Slide -->
                           <!-- <div class="single-testimonial-slide">
                                <h5>“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, ex quos. Alias a rem
                                    maiores, possimus dicta sit distinctio quis iusto!”</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <h6>Downey Sarah <span>- CEO Deercreative</span></h6>
                                </div>
                            </div> -->

                            <!-- Single Testimonial Slide -->
                            <!-- <div class="single-testimonial-slide">
                                <h5>“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore sequi laboriosam fugit
                                    suscipit aspernatur, minima minus voluptatum, id ab atque similique ex earum. Magni.”</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <h6>Robert Brown <span>- CEO Deercreative</span></h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Testimonials Area End -->

        <!-- Projects Area Start -->
        <!-- <section class="roberto-project-area"> -->
            <!-- Projects Slide -->
            <!-- <div class="projects-slides owl-carousel"> -->
                <!-- Single Project Slide -->
                <!-- <div class="single-project-slide active bg-img" style="background-image: url(img/bg-img/5.jpg);"> -->
                    <!-- Project Text -->
                    <!-- <div class="project-content">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                        </div>
                    </div> -->
                    <!-- Hover Effects -->
                    <!-- <div class="hover-effects">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                            <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and
                                confident...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                    </div>
                </div> -->

                <!-- Single Project Slide -->
                <!-- <div class="single-project-slide bg-img" style="background-image: url(img/bg-img/6.jpg);">-->
                    <!-- Project Text -->
                    <!--<div class="project-content">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                        </div>
                    </div> -->
                    <!-- Hover Effects -->
                    <!-- <div class="hover-effects">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                            <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and
                                confident...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                    </div>
                </div> -->

                <!-- Single Project Slide -->
                <!-- <div class="single-project-slide bg-img" style="background-image: url(img/bg-img/7.jpg);"> -->
                    <!-- Project Text -->
                    <!-- <div class="project-content">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                        </div>
                    </div> -->
                    <!-- Hover Effects -->
                    <!-- <div class="hover-effects">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                            <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and
                                confident...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                    </div>
                </div> -->

                <!-- Single Project Slide -->
               <!-- <div class="single-project-slide bg-img" style="background-image: url(img/bg-img/8.jpg);"> -->
                    <!-- Project Text -->
                    <!-- <div class="project-content">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                        </div>
                    </div> -->
                    <!-- Hover Effects -->
                    <!-- <div class="hover-effects">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                            <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and
                                confident...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                    </div>
                </div> -->

                <!-- Single Project Slide -->
                <!-- <div class="single-project-slide bg-img" style="background-image: url(img/bg-img/9.jpg);"> -->
                    <!-- Project Text -->
                    <!--<div class="project-content">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                        </div>
                    </div> -->
                    <!-- Hover Effects -->
                    <!-- <div class="hover-effects">
                        <div class="text">
                            <h6>Entertaiment</h6>
                            <h5>Racing Bike</h5>
                            <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and
                                confident...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Projects Area End -->

        <!-- Blog Area Start -->
        <!-- <section class="roberto-blog-area section-padding-100-0"> -->
            <div class="container">
                <div class="row">
                    <!-- Section Heading -->
                    <div class="col-12">
                        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                            <!--<h6>List Tour</h6> -->
                            <div class="listtour"> ツアー一覧</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <?php for($i = 0;$i < $countDataTour;$i++){ ?>
                <!-- Single Post Area item 1-->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="300ms"
                             style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                            <a href="{{route('detail')}}?idtour={{$dataListTours[$i]->id}}" class="post-thumbnail"><img src="{{\App\Helpers\CommonHelper::getImageUrl($dataListTours[$i]->image)}}" alt="" height="300" width="300"></a>
                            <div class="tourname"><?php echo $dataListTours[$i]->name; ?> <br></div>
                            <?php echo " 出発日:" ?> <?php echo $dataListTours[$i]->start; ?> <br>
                            <span class="tour-day">３泊４日</span>
                            <div class="depart"><?php echo $dataListTours[$i]->Cname;?><?php echo "発" ?> </div>
                            <div class="col-md-8 price"><?php echo $dataListTours[$i]->price; ?><?php echo "円" ?></div>
                            <div class="note"><?php echo $dataListTours[$i]->note; ?></div>

                            <div class="col-12 col-md-3 detail">
                                <a href="{{route('detail')}}?idtour={{$dataListTours[$i]->id}}"><button type="submit" class="form-control btn roberto-btn w-100">詳細</button> </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-3">
                    <a href="{{route('listtour')}}"><button type="submit"class="btn roberto-btn mt-30" >もっと見る</button></a>
                </div>
            </div>
        <!-- </section> -->
                <!-- Single Post Area item 2 -->
                    <!--<div class="col-12 col-md-6 col-lg-4">
                        <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <a href="#" class="post-thumbnail"><img src="img/bg-img/3.jpg" alt=""></a> -->
                            <!-- Post Meta -->
                           <!-- <div class="post-meta">
                                <a href="#" class="post-date">Jan 02, 2019</a>
                                <a href="#" class="post-catagory">Event</a>
                            </div> -->
                            <!-- Post Title -->
                           <!-- <a href="#" class="post-title">What If Let You Run The Hubble</a>
                            <p>My point here is that if you have no clue for the answers above you probably are not operating a
                                followup.</p>
                            <a href="index.html" class="btn continue-btn"><i class="fa fa-long-arrow-right"
                                                                             aria-hidden="true"></i></a>
                        </div>
                    </div> -->

                    <!-- Single Post Area -->
                   <!-- <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <a href="#" class="post-thumbnail"><img src="img/bg-img/4.jpg" alt=""></a> -->
                            <!-- Post Meta -->
                           <!-- <div class="post-meta">
                                <a href="#" class="post-date">Jan 02, 2019</a>
                                <a href="#" class="post-catagory">Event</a>
                            </div> -->
                            <!-- Post Title -->
                           <!-- <a href="#" class="post-title">Six Pack Abs The Big Picture</a>
                            <p>Some good steps to take to ensure you are getting what you need out of a autoresponder
                                include…</p>
                            <a href="index.html" class="btn continue-btn"><i class="fa fa-long-arrow-right"
                                                                             aria-hidden="true"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->
        <!-- Blog Area End -->

        <!-- Call To Action Area Start -->
        <section class="roberto-cta-area">
            <div class="container footer-contact">
                <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg);">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-7">
                            <div class="cta-text mb-50 contact-text">
                                <a><i class="icon_phone"></i> <span>(81)080-2148-9395</span><br></a>
                                <a><i class="icon_mail"></i> <span>shouraitour@gmail.com</span></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 text-right button-contact">
                            <a href="{{route("contact")}}" class="btn roberto-btn mb-50">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Area End -->

        <!-- Partner Area Start -->
       <!-- <div class="partner-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp"
                             data-wow-delay="300ms"> -->
                            <!-- Single Partner Logo -->
                            <!-- <a href="#" class="partner-logo"><img src="img/core-img/p1.png" alt=""></a> -->
                            <!-- Single Partner Logo -->
                            <!-- <a href="#" class="partner-logo"><img src="img/core-img/p2.png" alt=""></a> -->
                            <!-- Single Partner Logo -->
                            <!-- <a href="#" class="partner-logo"><img src="img/core-img/p3.png" alt=""></a> -->
                            <!-- Single Partner Logo -->
                            <!-- <a href="#" class="partner-logo"><img src="img/core-img/p4.png" alt=""></a> -->
                            <!-- Single Partner Logo -->
                           <!-- <a href="#" class="partner-logo"><img src="img/core-img/p5.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Partner Area End -->
@endsection
