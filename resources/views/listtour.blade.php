@extends('layouts.frontend')
@section('content')
    <style>
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
            padding-left:0px;
            border-radius: 4px;
        }
        .title{
            color:darkgreen;
            font-size:55px;
            font-weight: border: 2px solid #000;
        }
        .note{
            font-size:13px;
        }
        .list-content{
            min-height: 424px;
        }
        @media only screen and (max-height: 768px) {
            .list-content{
                min-height: 135px !important;
            }
        }


    </style>
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12 ">
                    <div class="section-heading text-center wow fadeInUp title" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- <h6>Our Blog</h6> -->
                        ツアー一覧
                    </div>
                </div>
            </div>

            <div class="row list-content" >
            <?php if($countDataTour>0){ ?>
            <?php for($i = 0;$i < $countDataTour;$i++){ ?>
            <!-- Single Post Area item 1-->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="300ms"
                         style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <a href="{{route('detail')}}?idtour={{$dataListTours[$i]->id}}" class="post-thumbnail"><img src="{{\App\Helpers\CommonHelper::getImageUrl($dataListTours[$i]->image)}}" alt="" height="300" width="300"></a>
                        <!-- Post Meta -->
                        <!-- <div class="post-meta"> -->
                        <div class="tourname"><?php echo $dataListTours[$i]->name; ?> <br></div>
                           <!-- <a href="#" class="post-date"></a>
                            <a href="#" class="post-catagory">Event</a>
                        </div> -->
                        <!-- Post Title -->
                        <!--<a href="#" class="post-title">Learn How To Motivate Yourself</a>
                        <p>How many free autoresponders have you tried? And how many emails did you get through using
                            them?</p> -->

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
                <?php }else{?>
                    <div>
                        <h4>該当するツアーが見つけません。</h4>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section>
@endsection
