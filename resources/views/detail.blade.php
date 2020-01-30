@extends('layouts.frontend')
@section('content')
    <style>
        .col-title{
            width: 100px;
        }
        .height-full{
            height: 240px;
        }
        .content{
            padding-top: 50px;
            padding-bottom:50px;
            width:1166px;
        }
        .button-booking{
            border-radius: 8px;
            padding-top: 287px;
        }
        .tour-detail{
            padding-top: 0px;
        }
        .detail{
            padding-top: 50px;
        }
    </style>
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <!-- <h6>Our Blog</h6> -->
                    <h2>ツアー詳細</h2>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-8"><h3> <?php echo $dataListTours->name; ?><?php echo "へようこそ"?></h3></div>

                <div class="col-md-6">
                    <img src="{{\App\Helpers\CommonHelper::getImageUrl($dataListTours->image) }}" alt="image" height="500px">
                </div>
                <div class="col-md-6 tour-detail">
                    <div class="row">
                        <div class="col-title">出発日:</div>
                        <div class="col-md-8"><?php echo $dataListTours->start; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-title">到着日:</div>
                        <div class="col-md-8"><?php echo $dataListTours->end; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-title">値段:</div>
                        <div class="col-md-8"><?php echo $dataListTours->price; ?><?php echo "円" ?></div>
                    </div>
                    <div class="row button-booking">
                        <a href="{{route('booking')}}?idtour={{$dataListTours->id}}">
                            <button type="submit" class="form-control btn roberto-btn w-100">予約</button>
                        </a>
                    </div>

                </div>
            <div class="row detail">
                <div class="col-title" ><h3><strong>日程</strong></h3></div></br>
                <div class="col-md-8" ><?php echo $dataListTours->TContent; ?></div>
            </div>
            <div class="row content"><h3><strong><?php echo $dataListTours->name ?> <?php echo "の紹介" ?></br></strong></h3>
                    <?php echo $dataListTours->content; ?>
            </div>
        </div>
    </div>

@endsection
