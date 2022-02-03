<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Upload;


class UploadController extends Controller
{
    public function uploadold(Request $request){

        $request->validate([
            'image' => 'required',
        ]);

        $img = $request->file('image');
        if($request->hasFile('image')){
            $file = rand().'.'.$img->getClientOriginalName();
            $img->storeAs('uploads',$file, 'public');
        }

        return Upload::create([
            'image' => $file,
        ]);
    }

    public function upload(Request $request){

        $imgs = $request->file('image');
        $imgName = array();

        if($request->hasFile('image')){

           foreach($imgs as $img){
            $file = rand().'.'.$img->getClientOriginalExtension();
            $img->storeAs('uploads',$file, 'public');
            $imgName[] = $file;
            } 
        }
        
        $imgDb = $imgName;
        return Upload::create([
            'image' => implode('|', $imgName),
        ]);
    }
}
