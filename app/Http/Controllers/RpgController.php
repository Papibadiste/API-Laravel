<?php

namespace App\Http\Controllers;

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
        $photos = rpg::all();
        return response() -> json($photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        echo "oui";
        $validator  = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'src_img' => 'required',
            'note' => 'required'
        ]);

        if($validator -> fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        Rpg::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'src_img' => $request->input('src_img'),
            'note' => $request->input('note')
        ]);
        return response()->json(['reussite']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
