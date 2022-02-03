<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Upload;


class UploadController extends Controller
{
    public function upload(Request $request){

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
}
