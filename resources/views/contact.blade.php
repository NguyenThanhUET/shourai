@extends('layouts.frontend')
@section('content')
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- <h6>Our Blog</h6> -->
                        <h2>お問い合わせ</h2>
                        <div class="container">
                            <form action="{{route('docontact')}}" method="post">
                                @csrf

                                <label for="name"> ご氏名(*)</label>
                                <input type="text" name="username" size="30" >

                                <label for="mail">メール(*)</label>
                                <input type="email" name="email" size="30">

                                <label for="phonenumber"> 電話番号</label>
                                <input type="tel" name="tel" size="30">

                                <label for="contact">お問い合わせ</label>
                                <input type="text" name="contact" size="30">

                                <input type="submit" value="送信">
                            </form>
                            <!-- stop PHP Code -->
                            <?php
                            if(isset($msg)){ // Check if $msg is not empty
                                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and add a div around it with the class statusmsg
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
@endsection