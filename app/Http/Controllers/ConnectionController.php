<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConnectionController extends Controller
{
    public function Register(Request $request)
    {
        $user = User::create([
            "email" => $request->input('email'),
            "name" => $request->input('name'),
            "role" => $request->input('role'),
            "password" => bcrypt($request->input('password')),
            'api_token' => Str::random(60)
        ]);

        return response()->json($user);
    }
    public function Connection(Request $request)
    {
    }

}
