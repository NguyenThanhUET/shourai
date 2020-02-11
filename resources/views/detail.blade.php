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
            padding-left: 25px;
        }
        .button-booking{
            border-radius: 8px;
            padding-top: 237px;
        }
        .tour-detail{
            padding-top: 0px;
            padding-left: 10px;
        }
        .detail{
            padding-top: 50px;
            padding-left: 25px;
        }
        .price{
            color:Red;
            font-weight:bold;
            font-size:28px;

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
            padding-left:0px;
            border-radius: 4px;
        }
        .title{
            color:darkgreen;
            font-size:45px;
            font-weight: border: 2px solid #000;
        }
        .note{
            font-size:13px;
        }
        .introduce{
            color:darkred;
            font-size:40px;
            font-weight: inherit;
        }
        .nittei{
            color:black;
            font-size:30px;
        }
    </style>
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <!-- <h6>Our Blog</h6> -->
                    <div class="title">ツアー詳細</div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-8 introduce"><?php echo $dataListTours->name; ?><?php echo "へようこそ"?></div>

                <div class="col-md-6">
                    <img src="{{\App\Helpers\CommonHelper::getImageUrl($dataListTours->image) }}" alt="image" height="500px">
                </div>
                <div class="col-md-6 tour-detail">

                    <?php echo " 出発日:" ?> <?php echo $dataListTours->start; ?> <br>
                    <span class="tour-day">３泊４日</span>
                    <div class="depart"><?php echo $dataListTours->Cname;?><?php echo "発" ?> </div>
                    <div class="col-md-8 price"><?php echo $dataListTours->price; ?><?php echo "円" ?></div>
                    <div class="note"><?php echo $dataListTours->note; ?></div>
                    <div class="row button-booking">
                        <a href="{{route('booking')}}?idtour={{$dataListTours->id}}">
                            <button type="submit" class="form-control btn roberto-btn w-100">予約</button>
                        </a>
                    </div>

                </div>
            <div class="row detail">
                <div class="col-title nittei" ><h3><strong>日程</strong></h3></div></br>
                <div class="col-md-8 " ><?php echo $dataListTours->TContent; ?></div>
            </div>
                <div class="row content"><h3><strong><?php echo $dataListTours->name ?> <?php echo "の紹介" ?></br></strong></h3>
                    <?php echo $dataListTours->content; ?>
            </div>
        </div>
    </div>

@endsection
