<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //Get data from database
        //Block 1: lấy lít tours
        $dataListTours = DB::table('tourlist')->select()->get();
        //BLock 2: Lấy list tour noi bat
        $dataListToursTop = DB::table('tourlist')
            ->join('destination','tourlist.destination_id','=','destination.id')->where('tourlist.is_top','=',1)
        ->selectRaw('tourlist.name, tourlist.content, tourlist.duration, tourlist.price,destination.image')->get();
        $dataPrefecture = DB::table('city')->select()->get();
        $countDataTop = count($dataListTours);
        $countDataPrefecture = count($dataPrefecture);
        return view("home",compact('dataListTours','dataListToursTop','dataPrefecture','countDataTop','countDataPrefecture'));
    }

}