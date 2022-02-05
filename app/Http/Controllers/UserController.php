<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use App\Models\User;
use App\Models\Upload;

class UserController extends Controller
{
    public function index(){
        return Auth::user()->upload;
    }

    public function getDetails(){
        $user = Auth::user()->detail;

        if($user->isEmpty()){

            return [
                'message' => 'no details'
            ];
        }
        return $user;
    }

    public function dUpload($id) {

        $d = auth()->user()->upload()->find($id);
        if($d) {
            $path = public_path('storage/uploads/'.$d->image);
            $imgs = explode("|", $path);
            Storage::delete($imgs);

            return [
                'message' => 'Deleted'
            ];
            
        }

        // if($d){
        //     foreach($imgs as $img) {
        //         $path = public_path('storage/uploads/'.$img);
        //         // if($path){

        //             Storge::delete($path);
        //             $d->delete($path);

        //             return [
        //                 'message' => 'Deleted'
        //             ];
        //         // }

        //         return [
        //             'message' => 'not found'
        //         ];
                
        //     }
            
        // }

        return [
            'message' => 'not found'
        ];
    }
}
