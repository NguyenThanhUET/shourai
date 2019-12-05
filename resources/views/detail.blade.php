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
                        <h2>ツアー詳細</h2>
                        <div id='container'>
                            <img src="img/bg-img/vn-image/phuquoc1.jpg" alt="image">
                            <?php echo " "?>
                            <?php echo "出発日:" ?> <?php echo $dataListTours->start; ?> <br>
                            <?php echo "値段:" ?> <?php echo $dataListTours->price; ?> <br>
                            <?php echo "レビュー:★★★★★" ?>

                            <div class="col-12 col-md-3">
                                <a href="{{route('booking')}}?idtour={{$dataListTours->id}}"><button type="submit" class="form-control btn roberto-btn w-100">予約</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection