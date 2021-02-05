<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class TestController extends Controller
{
    public function getMethod(){
        $users = new stdClass();
        $users -> name = "oui";
        $users -> phone = "oui";
        return response()->json($users) ;
    }

    public function postMethod(Request $request){
        return $request->all() ;
    }

}
