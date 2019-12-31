@extends('layouts.frontend')
@section('content')
    <style>
        .book-group {
            margin-bottom: 10px;
        }

        .book-group label {
            margin-bottom: 0px;
        }
        .btn-book{
            width: 200px;
        }
    </style>
    <section class="roberto-blog-area section-padding-100-0">

        <!-- <div class="container"> -->
        <!--<div class="row"> -->
        <!-- Section Heading -->
        <!--<div class="col-12"> -->
        <!--<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
             style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;"> -->
        <!-- <h6>Our Blog</h6> -->

        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- <h6>Our Blog</h6> -->
                        <h2>予約</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('do_booking')}}" method="post">
                @csrf
                <input type="hidden" name="idtour" size="30" value="{{$idTour}}">
                <div class="col-12">
                    <div class="col-12 book-group">
                        <label for="name"> 名前(*)</label>
                        <input type="text" class="form-control" name="username" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="phonenumber"> 電話番号(*)</label>
                        <input type="tel" class="form-control" name="tel" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="mail">メール(*)</label>
                        <input type="email" class="form-control" name="email" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="address">住所</label>
                        <input type="text" class="form-control" name="address" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="note">備考</label>
                        <input type="text" class="form-control" name="note" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="adult">大人</label>
                        <input type="number" class="form-control" name="adult" size="5">
                    </div>
                    <div class="col-12 book-group">
                        <label for="child">子供</label>
                        <input type="number" class="form-control" name="child" size="5">
                    </div>
                    <div class="col-12 book-group text-center">
                        <input type="submit" class="form-control btn roberto-btn  btn-book" value="予約">
                    </div>
                </div>
            </form>
            <!-- stop PHP Code -->
            <?php
            if (isset($msg)) { // Check if $msg is not empty
                echo '<div class="statusmsg">' . $msg . '</div>'; // Display our message and add a div around it with the class statusmsg
            } ?>
        </div>
        <!-- </div>
</div>

    </div> -->
    </section>
@endsection