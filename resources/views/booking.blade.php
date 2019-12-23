@extends('layouts.frontend')
@section('content')
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <h2>予約</h2>
            <div class="row">

                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- <h6>Our Blog</h6> -->
                        <div class="container">
                            <form action="{{route('do_booking')}}" method="post">
                                @csrf
                                <input type="hidden" class="form-control" name="idtour" size="30" value="{{$idTour}}">
                                <label for="name"> 名前(*)</label>
                                <input type="text" class="form-control" name="username" size="30">

                                <label for="phonenumber"> 電話番号(*)</label>
                                <input type="tel" class="form-control" name="tel" size="30">

                                <label for="mail">メール(*)</label>
                                <input type="email" class="form-control" name="email" size="30">

                                <label for="address">住所</label>
                                <input type="text" class="form-control" name="address" size="30">

                                <label for="note">備考</label>
                                <input type="text" class="form-control" name="note" size="30">

                                <label for="adult">大人</label>
                                <input type="number" class="form-control" name="adult" size="5">

                                <label for="child">子供</label>
                                <input type="number"  class="form-control"name="child" size="5">

                                <input type="submit" class="btn roberto-btn" value="予約">
                            </form>
                            <!-- stop PHP Code -->
                            <?php
                            if (isset($msg)) { // Check if $msg is not empty
                                echo '<div class="statusmsg">' . $msg . '</div>'; // Display our message and add a div around it with the class statusmsg
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
