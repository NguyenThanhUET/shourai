<?php

namespace App\Http\Controllers\Backend;


use App\Entities\DataResultCollection;
use App\Entities\SDBStatusCode;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ToursController extends Controller
{
    public function index()
    {
        $dataTour = DB::table('tourlist')
            ->leftJoin('destination','destination.id','tourlist.destination_id')
            ->leftJoin('city','city.id','tourlist.city_id')
            ->leftJoin('city as c2','c2.id','destination.prefecture')
            ->select('tourlist.*','destination.name as destination_name','destination.prefecture','destination.image','destination.content as destination_content',
                'city.name as location_start','c2.name as location_end')->orderBy('tourlist.id','DESC')->paginate(10);
        if(!empty($dataTour)){
            foreach ($dataTour as &$data)
                $data->image = CommonHelper::getImageSrc($data->image);
        }
        $totalTour = $dataTour->total();
        return view('admin.tour_list',compact('dataTour','totalTour'));
    }
    public function edit(Request $request)
    {
        $idTour = $request->input('tour',null);
        $dataTour = DB::table('tourlist')
        ->where('tourlist.id',$idTour)
            ->first();
        $des = DB::table('destination')->select('id','name','prefecture')->get();
        $dataPrefecture = DB::table('city')->select()->get();
        return view('admin.tour_edits',compact('dataTour','dataPrefecture','des'));
    }
    public function doEdit(UpdateTour $request){
        $result = new DataResultCollection();
        $desData = array();

        $idTour = $request->input("tour_id");
        $desData["name"] = $request->input("tour_name");
        $desData["city_id"] = $request->input("city_id");
        $desData["destination_id"] = $request->input("destination");
        $desData["start"] = $request->input("start_time");
        $desData["end"] = $request->input("end_time");
        $desData["price"] = $request->input("price");
        $desData["is_top"] = $request->input("is_top");
        $desData["content"] = $request->input("page_content");
        try {
            DB::beginTransaction();
            DB::table("tourlist")
                ->where("id", $idTour)
                ->update($desData);
            DB::commit();
            $result->status = SDBStatusCode::OK;
            $result->message = trans("Update success full");
        } catch (\Exception $exception) {
            DB::rollBack();
            $result->status = SDBStatusCode::Excep;
            $result->message = $exception->getMessage();
        }

        return response()->json($result);
    }
    public function add(Request $request)
    {
        $des = DB::table('destination')->select('id','name','prefecture')->get();
        $dataPrefecture = DB::table('city')->select()->get();
        return view('admin.tour_add',compact('dataPrefecture','des'));
    }
    public function doAdd(UpdateTour $request){
        $result = new DataResultCollection();
        $desData = array();

        $desData["name"] = $request->input("tour_name");
        $desData["city_id"] = $request->input("city_id");
        $desData["destination_id"] = $request->input("destination");
        $desData["start"] = $request->input("start_time");
        $desData["end"] = $request->input("end_time");
        $desData["price"] = $request->input("price");
        $desData["is_top"] = $request->input("is_top");
        $desData["content"] = $request->input("page_content");
        try {
            DB::beginTransaction();
            DB::table("tourlist")
                ->insert($desData);
            DB::commit();
            $result->status = SDBStatusCode::OK;
            $result->message = trans("Create success full");
        } catch (\Exception $exception) {
            DB::rollBack();
            $result->status = SDBStatusCode::Excep;
            $result->message = $exception->getMessage();
        }

        return response()->json($result);
    }
}
