<?php

namespace App\Http\Controllers\Backend;


use App\Entities\DataResultCollection;
use App\Entities\SDBStatusCode;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdatePrefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $dataDes = DB::table('destination')
            ->leftJoin('city','city.id','destination.prefecture')
            ->select('destination.*','city.name as prefecture')->orderBy('id','DESC')->paginate(10);
        if(!empty($dataDes)){
            foreach ($dataDes as &$data)
                $data->image = CommonHelper::getImageSrc($data->image);
        }
        $totalDes = $dataDes->total();
        return view('admin.destination_list',compact('dataDes','totalDes'));
    }
    public function edit(Request $request)
    {
        $idDes = $request->input('des',null);
        $dataDes = DB::table('destination')->where('id',$idDes)->first();
        if(!empty($dataDes)){
            $dataDes->src = $dataDes->image;
            $dataDes->image = CommonHelper::getImageSrc($dataDes->image);
        }
        $dataPrefecture = DB::table('city')->select()->get();
        return view('admin.destination_edits',compact('dataDes','dataPrefecture'));
    }
    public function doEdit(UpdatePrefecture $request){
        $result = new DataResultCollection();
        $desData = array();
        $image = $request->file("image");
        $must_delete_old_image = $request->input('must_delete_old_image', 0);
        $newUploadedFileURI = null;
        $diskLocalName = CommonHelper::getDefaultStorageDiskName();
        $desData["name"] = $request->input("des_name");
        $desData["prefecture"] = $request->input("prefecture");
        $desData["content"] = $request->input("page_content");
        $desId = $request->input('des_id',null);
        try {
            DB::beginTransaction();
            //check file image, if have process and save image
            if ($image != NULL) {
                $arrImage = CommonHelper::uploadFile(array($image), $diskLocalName, 'destination', 'public');
                $newUploadedFileURI = $arrImage->data[0]["uri"];
            }
            DB::table("destination")
                ->where("id", $desId)
                ->update($desData);
            if ($newUploadedFileURI != null || $must_delete_old_image == 1) {
                DB::table("destination")
                    ->where("id", $desId)
                    ->update(["image" => $newUploadedFileURI]);
            }
            DB::commit();
            if ($must_delete_old_image == 1) {
                Storage::disk($diskLocalName)->delete($request->oldImgSrc);
            }
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
        $dataPrefecture = DB::table('city')->select()->get();
        return view('admin.destination_add',compact('dataPrefecture'));
    }
    public function doAdd(UpdatePrefecture $request){
        $result = new DataResultCollection();
        $desData = array();
        $image = $request->file("image");
        $must_delete_old_image = $request->input('must_delete_old_image', 0);
        $newUploadedFileURI = null;
        $diskLocalName = CommonHelper::getDefaultStorageDiskName();
        $desData["name"] = $request->input("des_name");
        $desData["prefecture"] = $request->input("prefecture");
        $desData["content"] = $request->input("page_content");
        try {
            DB::beginTransaction();
            //check file image, if have process and save image
            if ($image != NULL) {
                $arrImage = CommonHelper::uploadFile(array($image), $diskLocalName, 'destination', 'public');
                $newUploadedFileURI = $arrImage->data[0]["uri"];
            }
            $desId = DB::table("destination")
                ->insertGetId($desData);
            if ($newUploadedFileURI != null || $must_delete_old_image == 1) {
                DB::table("destination")
                    ->where("id", $desId)
                    ->update(["image" => $newUploadedFileURI]);
            }
            DB::commit();
            if ($must_delete_old_image == 1) {
                Storage::disk($diskLocalName)->delete($request->oldImgSrc);
            }
            $result->status = SDBStatusCode::OK;
            $result->message = trans("Update success full");
        } catch (\Exception $exception) {
            DB::rollBack();
            $result->status = SDBStatusCode::Excep;
            $result->message = $exception->getMessage();
        }

        return response()->json($result);
    }
}
