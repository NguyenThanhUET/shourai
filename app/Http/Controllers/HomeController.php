<?php


namespace App\Http\Controllers;


use App\Entities\DataResultCollection;
use App\Entities\SDBStatusCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        
        $dataListTours = DB::table('tourlist')
            ->limit(6)->orderBy('start', 'asc')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')
            ->join('city','tourlist.city_id','=','city.id')
            ->selectRaw('tourlist.id, tourlist.name, tourlist.content as TContent, tourlist.start,tourlist.end, tourlist.price,tourlist.note,destination.image,destination.content,destination.name as Dname,city.name as Cname')
            ->get();
        //BLock 2: Lấy list tour noi bat
        $dataListToursTop = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.is_top', '=', 1)
            ->selectRaw('tourlist.id, tourlist.name, tourlist.content, tourlist.start,tourlist.end, tourlist.price,destination.image')->get();
        $dataPrefecture = DB::table('city')->select()->get();
        //list destination
        $dataDestination = DB::table('destination')->select()->get();

        $countDataTop = count($dataListToursTop);
        $countDataPrefecture = count($dataPrefecture);
        $countDataDestination = count($dataDestination);
        $countDataTour = count($dataListTours);

        return view("home", compact('dataListTours', 'dataListToursTop'
            , 'dataPrefecture', 'countDataTop', 'countDataPrefecture', 'countDataTour',
            'countDataDestination', 'dataDestination'));
    }

    public function listtour(Request $request)
    {
        $from = $request->input('from', null);
        $to = $request->input('to', null);
        $departDate = $request->input('depart-date', null);
        $dt = Carbon::now();
        $query = DB::table('tourlist')
            ->orderBy('start', 'asc')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')
            ->join( 'city', 'tourlist.city_id','=','city.id');

        //tu day tro xuong vo tac dugn

        if ($from != '' && $from != null) {
            $query = $query->where('tourlist.city_id', '=', $from);
        }
        if ($to != '' && $to != null) {
            $query = $query->where('tourlist.destination_id', '=', $to);
        }
        if ($departDate != '' && $departDate != null) {
            $query = $query->where('tourlist.start', '=', $departDate);
        }
        if ($departDate > $dt) {
            //nothing
        } else {
            $query = $query->where('tourlist.start', '>', $dt);
        }
        //query la thang mang toan bo thong tin where nhung data lít tou phai lay = queryt-> 1 dong các cai select thi moi dc
        $dataListTours = $query ->selectRaw('tourlist.id, tourlist.name,tourlist.city_id,tourlist.destination_id, tourlist.content, tourlist.start,tourlist.end, tourlist.price,tourlist.note,destination.image, destination.content,city.name as Cname')
            ->get();// tại day thi datalist tour da dc lay ra
        $countDataTour = count($dataListTours);
        return view("listtour", compact('dataListTours', 'countDataTour', 'from', 'to', 'departDate', 'dt','query'));
    }

    public function detail(Request $request)
    {
        $idtour = $request->input('idtour', null);
        $dataListTours = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.id', '=', $idtour)
            ->join('city','tourlist.city_id','=','city.id')
            ->selectRaw('tourlist.id, tourlist.name, tourlist.content as TContent, tourlist.start,tourlist.end, tourlist.price,tourlist.note,destination.image,destination.content,destination.name as Dname,city.name as Cname')
            ->first();
//dd($dataListTours);
        return view("detail", compact('dataListTours'));
    }

    public function booking(Request $request)
    {
        $idTour = $request->input('idtour', null);
        $inbound = $request->input('inbound', null);
        $dataListTours = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.id', '=', $inbound)
            ->selectRaw('tourlist.name, tourlist.content, tourlist.start,tourlist.end, tourlist.price,destination.image')
            ->first();
        $databooking = DB::table('bookingtour')
            ->join('tourlist', 'tourlist.id', '=', 'bookingtour.idtour')
            ->selectRaw('bookingtour.id, bookingtour.idtour, bookingtour.username, bookingtour.email, bookingtour.adult, bookingtour.child')
            ->first();

        return view("booking", compact('dataListTours', 'databooking', 'idTour'));

    }

    public function doBooking(Request $request)
    {
        $result = new DataResultCollection();
        $validatedData = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
            'email' => 'required'
        ]);
        //insert
        //$idtour=$request -> input('idtour', 'null');
        // return view("do_booking", compact('idtour' ));
        if ($validatedData->fails()) {
            $result =  new DataResultCollection();
            $result->status = SDBStatusCode::ApiError;
            $result->data = $validatedData->errors();
            return response()->json($result);
        } else {
            $idtour = $request->input('idtour');
            //dd($idtour);dd la ko chay cac cau lenh phia duoi dau@@ dd co nghia la in ra roi thoat luon, anh comment, em chay lai la ok
            $username = $request->input('username');
            $address = $request->input('address');
            $note = $request->input('note');
            $tel = $request->input('tel');
            $email = $request->input('email');
            $adult = $request->input('adult');

            $child = $request->input('child');
            DB::table('bookingtour')->insert(
                array(
                    "idtour" => $idtour,
                    "username" => $username,
                    "address" => $address,
                    "note" => $note,
                    "tel" => $tel,
                    "email" => $email,
                    "adult" => $adult,
                    "child" => $child,

                )

            );
            $result =  new DataResultCollection();
            $result->status = SDBStatusCode::OK;
            $result->message = "予約が完了しました！";
            return response()->json($result);
        }
    }
    public function editbooking (Request $request)
    {
        $idTour = $request->input('idtour', null);
        $dataListTours = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.id', '=', $inbound)
            ->selectRaw('tourlist.name, tourlist.content, tourlist.start,tourlist.end, tourlist.price,destination.image')
            ->first();
        $databooking = DB::table('bookingtour')
            ->join('tourlist', 'tourlist.id', '=', 'bookingtour.idtour')
            ->selectRaw('bookingtour.id, bookingtour.idtour, bookingtour.username, bookingtour.email, bookingtour.adult, bookingtour.child')
            ->first();

        return view("edit_booking", compact('dataListTours', 'databooking', 'idTour'));
    }
    //->with($message);
    public function contact(Request $request)
    {
        $dataListContacts = DB::table('contact')
            ->select()->get();

        return view("contact", compact('dataListContacts'));

    }

    public function docontact(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required'
        ]);
        //insert
        //$idtour=$request -> input('idtour', 'null');
        // return view("do_booking", compact('idtour' ));
        if ($validatedData->fails()) {
            return redirect('contact')
                ->withErrors($validatedData)
                ->withInput();
        } else {
            $username = $request->input('username');
            $contact = $request->input('contact');
            $tel = $request->input('tel');
            $email = $request->input('email');
            DB::table('contact')->insert(
                array(
                    "username" => $username,
                    "tel" => $tel,
                    "email" => $email,
                    "contact" => $contact,

                )

            );
        }

    }
}



