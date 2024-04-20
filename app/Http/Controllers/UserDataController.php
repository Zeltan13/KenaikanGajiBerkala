<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class UserDataController extends Controller
{
    function getAllUserData(){
        $datas = UserData::all();
        return view('userData',['datas'=>$datas]);
    }
}
