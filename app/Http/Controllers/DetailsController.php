<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Illuminate\Http\Response;


class DetailsController extends Controller
{
    public function getAllDetails(Request $request){
        $details = Detail::all();
        if($details->isEmpty()) {
            return response( ['message' => 'no details'], 200);
        }else{
            return $details;
        }
    }

    public function createDetail(Request $request){
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'address' => 'required',
        ]);

          return Detail::create($request->all());
    }

    public function getDetail($id){
        $d = Detail::find($id);

        return $d;
    }

    public function updateDetail(Request $request, $id) {
        $d = Detail::find($id);
        $d->update($request->all());
        return $d;
    }

    public function searchDetail($name){
        $d = Detail::where('name', 'like', '%'.$name.'%')->get();
        return $d;
    }

    public function deleteDetail($id) {
        $d = Detail::find($id);
        $d->delete($id);
        return [
            
            'message' => 'Details has been deleted',
        ];
    }

    public function deleteAll(Detail $detial) {
        $d = $detial->truncate();

        return [
            'message' => 'All Details Has Been Deleted From The Datebase',
        ];
    }
}
