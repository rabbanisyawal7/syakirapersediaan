<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = barang::all();
        return view('barang/view', 
                        [
                            'barang' => $barang,
                        ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
        
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StorebarangRequest  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(StorebarangRequest $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'ID_barang' => 'required',
                'kode_barang' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required',
                'jenis_barang' => 'required',
            ]
        );

        if($validator->fails()){
            // gagal
            return response()->json(
                [
                    'status' => 400,
                    'errors' => $validator->messages(),
                ]
            );
        }else{
            // berhasil

            // cek apakah tipenya input atau update
            // input => tipeproses isinya adalah tambah
            // update => tipeproses isinya adalah ubah
            
            if($request->input('tipeproses')=='tambah'){
                // simpan ke db
                barang::create($request->all());
                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'Sukses Input Data',
                    ]
                );
            }else{
                // update ke db
                $barang = barang::find($request->input('idbaranghidden'));
            
                // proses update dari inputan form data
                $barang->ID_barang = $request->input('ID_barang');
                $barang->kode_barang = $request->input('kode_barang');
                $barang->nama_barang = $request->input('nama_barang');
                $barang->harga_barang = $request->input('harga_barang');
                $barang->jenis_barang = $request->input('jenis_barang');
                $barang->update(); //proses update ke db

                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'Sukses Update Data',
                    ]
                );
            }
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barang $barang)
    {
        $barang = barang::find($id);
        if($barang)
        {
            return response()->json([
                'status'=>200,
                'barang'=> $barang,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Tidak ada data ditemukan.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\UpdatebarangRequest  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
    public function update(UpdatebarangRequest $request, barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function destroy(barang $barang)
    {
         //hapus dari database
         $barang = barang::findOrFail($id);
         $abarang->delete();
         return view('barang/view',
             [
                 'barang' => $barang,
                 'status_hapus' => 'Sukses Hapus'
             ]
         );
    }
}
