<?php

namespace App\Http\Controllers;

use App\tb_pekerjaan;
use Illuminate\Http\Request;

class TbPekerjaanController extends Controller
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
        $data = new tb_pekerjaan([
            'id_kategori' => $request->input('id_kategori'),
            'id_perusahaan' => $request->input('id_perusahaan'),
            'pekerjaan'=>$request->input('pekerjaan'),
            'gaji_min'=>$request->input('gaji_min'),
            'gaji_max'=>$request->input('gaji_max'),
            'detail_pekerjaan'=>$request->input('detail_pekerjaan'),
            'syarat_pekerjaan'=>$request->input('syarat_pekerjaan'),
            'syarat_cv'=>$request->input('syarat_cv'),
            'status_validasi'=>'non_valid'
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
     * @param  \App\tb_pekerjaan  $tb_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        $data_jasa = tb_pekerjaan::where('id_kategori','=',$id_kategori)->where('status_validasi','=','valid')->get();

        return response()->json([
                'dataJasa'=>$data_jasa
            ]);
    }

    public function showDataJasaforAdmin($id_kategori)
    {
        $data_jasa = tb_pekerjaan::where('id_kategori','=',$id_kategori)->where('status_validasi','!=','delete')->get();

        return response()->json([
                'dataJasa'=>$data_jasa
            ]);
    }

    public function showDataJasaUser($id_user){
        $data_jasa = tb_pekerjaan::where('id_user','=',$id_user)->where('status_validasi','!=','delete')->get();

        return response()->json($data_jasa
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tb_pekerjaan  $tb_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tb_pekerjaan::find($id);
        $data->status_validasi='delete';
        if ($data->save()){
            return response()->json([
                'status'=>true
            ],201);
        }
        return response()->json(['message'  => 'failed to create ketagori']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tb_pekerjaan  $tb_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = tb_pekerjaan::find($id);
        $data->status_validasi='valid';
        if ($data->save()) {
            $data_jasa = tb_pekerjaan::find($id);
            return response()->json($data_jasa);
        }
        return response()->json(['message'  => 'failed to create ketagori']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tb_pekerjaan  $tb_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_pekerjaan $tb_pekerjaan)
    {
        //
    }
}
