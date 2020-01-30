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
                        <h2>ツアー一覧</h2>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php if($countDataTour>0){ ?>
            <?php for($i = 0;$i < $countDataTour;$i++){ ?>
            <!-- Single Post Area item 1-->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="300ms"
                         style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <a href="{{route('detail')}}?idtour={{$dataListTours[$i]->id}}" class="post-thumbnail"><img src="{{\App\Helpers\CommonHelper::getImageUrl($dataListTours[$i]->image)}}" alt="" height="300" width="300"></a>
                        <!-- Post Meta -->
                        <!-- <div class="post-meta"> -->
                        <h2><?php echo $dataListTours[$i]->name; ?> <br></h2>
                           <!-- <a href="#" class="post-date"></a>
                            <a href="#" class="post-catagory">Event</a>
                        </div> -->
                        <!-- Post Title -->
                        <!--<a href="#" class="post-title">Learn How To Motivate Yourself</a>
                        <p>How many free autoresponders have you tried? And how many emails did you get through using
                            them?</p> -->

                        <?php echo " 出発日:" ?> <?php echo $dataListTours[$i]->start; ?> <br>
                        <?php echo " 値段:" ?> <?php echo $dataListTours[$i]->price; ?><?php echo "円" ?> <br>

                        <div class="col-12 col-md-3">
                            <a href="{{route('detail')}}?idtour={{$dataListTours[$i]->id}}"><button type="submit" class="form-control btn roberto-btn w-100">詳細</button> </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php }else{?>
                    <div>
                        <h4>該当するツアーが見つけません。</h4>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section>
@endsection
