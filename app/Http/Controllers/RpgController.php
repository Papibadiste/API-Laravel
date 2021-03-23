<?php

namespace App\Http\Controllers;

use App\Http\Validation\NewRpgValidation;
use App\Models\rpg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class RpgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Rpg = Rpg::where('is_active', true)->cursor();
        return response() -> json($Rpg);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, NewRpgValidation $validation)
    {
        $validator  = Validator::make($request->all(), $validation->rules() ,$validation->msg() );

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $fullFileName = $request->file('src_img')->getClientOriginalName();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = $request->file('src_img')->getClientOriginalExtension();
        $file = $fileName."_".time().".".$extension;

        $request->file('src_img')->storeAs('public/pictures', $file);

        $rpg = Rpg::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'src_img' => $file,
            'note' => $request->input('note'),
            'is_active' => false
        ]);
        return response()->json([$rpg]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Rpg = Rpg::where('id', $id)->firstOrFail();

        if($Rpg->is_active == true){

            $Rpg->update(['is_active' => false]);

        }elseif($Rpg->is_active == false){

            $Rpg->update(['is_active' => true]);

        }


        echo $id;
    }

    public function admin()
    {
        $photos = rpg::all();
        return response() -> json($photos);
    }


}
