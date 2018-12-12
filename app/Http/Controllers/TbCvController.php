<?php

namespace App\Http\Controllers;

use App\tb_cv;
use Illuminate\Http\Request;

class TbCvController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new tb_cv([
            'id_pekerjaan' => $request->input('id_pekerjaan'),
            'id_perusahaan' => $request->input('id_perusahaan'),
            'id_user'=>$request->input('id_user'),
            'nama_cv'=>$request->input('nama_cv')
        ]);

        // $data_jasa->save();

        if ($data->save()) {
            return response()->json([
                'message' => 'data jasa created successfully.'
            ], 201);
        }
        return response()->json(['message'  => 'failed to create data jasa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tb_cv  $tb_cv
     * @return \Illuminate\Http\Response
     */
    public function show(tb_cv $tb_cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tb_cv  $tb_cv
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_cv $tb_cv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tb_cv  $tb_cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_cv $tb_cv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tb_cv  $tb_cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_cv $tb_cv)
    {
        //
    }
}
