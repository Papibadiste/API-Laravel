<?php

namespace App\Http\Controllers;

use App\Http\Validation\LogValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Validation\RegisterValidation;


class ConnectionController extends Controller
{
    public function Register(Request $request, RegisterValidation $validation)
    {

        $validator = Validator::make($request->all(), $validation->rules() ,$validation->msg() );

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $user = User::create([
            "email" => $request->input('email'),
            "name" => $request->input('name'),
            "password" => bcrypt($request->input('password')),
            'api_token' => Str::random(60),
            "role" => 'user',
        ]);

        return response()->json($user);
    }
    public function Connection(Request $request, LogValidation $validation)
    {
        $validator = Validator::make($request->all(), $validation->rules() ,$validation->msg() );

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        if(Auth::attempt(["email" => $request->input('email'),
            "password" => $request->input('password')])){

            $user = User::where('email', $request->input('email'))->firstOrFail();
            return response()->json($user);
        }else{
            return response()->json(['errors' => "bad_credentials"], 401);
        }
    }

}
