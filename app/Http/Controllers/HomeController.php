<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        //Get data from database
        //Block 1: lấy lít tours
        $dataListTours = DB::table('tourlist')->select()->get();
        //BLock 2: Lấy list tour noi bat
        $dataListToursTop = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.is_top', '=', 1)
            ->selectRaw('tourlist.id, tourlist.name, tourlist.content, tourlist.start,tourlist.end, tourlist.price,destination.image')->get();
        $dataPrefecture = DB::table('city')->select()->get();
        $countDataTop = count($dataListTours);
        $countDataPrefecture = count($dataPrefecture);
        $countDataTour = count($dataListTours);
        return view("home", compact('dataListTours', 'dataListToursTop', 'dataPrefecture', 'countDataTop', 'countDataPrefecture', 'countDataTour'));
    }

    public function listtour(Request $request)
    {
        $from = $request->input('from', null);
        $to = $request->input('to', null);
        $departDate = $request->input('depart-date', null);
        $dataListTours = DB::table('tourlist')
            ->select()->get();
        $countDataTour = count($dataListTours);
        return view("listtour", compact('dataListTours', 'countDataTour', 'from', 'to', 'departDate'));
    }

    public function detail(Request $request)
    {
        $idtour = $request->input('idtour', null);
        $dataListTours = DB::table('tourlist')
            ->join('destination', 'tourlist.destination_id', '=', 'destination.id')->where('tourlist.id', '=', $idtour)
            ->selectRaw('tourlist.id, tourlist.name, tourlist.content, tourlist.start,tourlist.end, tourlist.price,destination.image')
            ->first();

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

        $validatedData = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
            'email' => 'required'
        ]);
        //insert
        //$idtour=$request -> input('idtour', 'null');
        // return view("do_booking", compact('idtour' ));
        if ($validatedData->fails()) {
            return redirect('booking')
                ->withErrors($validatedData)
                ->withInput();
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

            return redirect('booking-success');
        }
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
    public function search(Request $request){
        $from = $request->input('from', null);
        $to = $request->input('to', null);
        $departDate = $request->input('depart-date', null);
        //$search = $request->input()
    }
}

