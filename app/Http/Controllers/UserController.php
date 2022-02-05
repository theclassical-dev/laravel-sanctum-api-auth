<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
}
