<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    public function index()
    {
        $dataDes = DB::table('destination')->select()->paginate(10);
        $totalDes = $dataDes->total();
        return view('admin.destination_list',compact('dataDes','totalDes'));
    }
    public function edit(Request $request)
    {
        $idDes = $request->input('des',null);
        $dataDes = DB::table('destination')->where('id',$idDes)->first();
        return view('admin.destination_edits',compact('dataDes'));
    }
    public function doEdit(Request $request){
        return response()->json();
    }
}
