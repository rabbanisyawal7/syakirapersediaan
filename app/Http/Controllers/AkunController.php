<?php

namespace App\Http\Controllers;

use App\Models\akun;
use illuminate\http\request;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = akun::all();
        return view('akun/view', 
                        [
                            'akun' => $akun,
                        ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun/create',
                   
                  );
    }
        
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StoreAkunRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_akun' => 'required|unique:akun,kode_akun',
            'nama_akun' => 'required',
            'header_akun' => 'required'
        ]);
    
        $store = akun::create(['kode_akun' => $request->kode_akun, 'nama_akun'=> $request->nama_akun,'header_akun' => $request->header_akun]);
        return redirect()->route('akun');
    }
    
        

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\akun  $akun
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function show(akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(akun $akun)
    {
        $akun = Akun::find($id);
        if($akun)
        {
            return response()->json([
                'status'=>200,
                'akun'=> $akun,
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
     * @param  \App\Http\Requests\UpdateAkunRequest  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
    public function update(UpdateakunRequest $request, akun $akun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function destroy(akun $akun)
    {
         //hapus dari database
         $akun = Akun::findOrFail($id);
         $aakun->delete();
         return view('akun/view',
             [
                 'akun' => $akun,
                 'status_hapus' => 'Sukses Hapus'
             ]
         );
    }
}
