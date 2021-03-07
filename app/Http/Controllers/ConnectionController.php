<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Validation\RegisterValidation;


class ConnectionController extends Controller
{
    public function Register(Request $request, RegisterValidation $validation)
    {

        $validator = Validator::make($request->all(), $validation->rules() ,$validation->msg() );

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
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
    public function Connection(Request $request)
    {
    }

}
