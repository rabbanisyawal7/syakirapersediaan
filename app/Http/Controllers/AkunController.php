<?php

namespace App\Http\Controllers;

use App\Models\akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = akun::all();
        return view('akun/view', ['akun' => $akun]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun/create');
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
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'header_akun' => 'required',
        ]);

        $store = akun::create(['kode_akun' => $request->kode_akun, 'nama_akun' => $request->nama_akun, 'header_akun' => $request->header_akun]);
        return redirect()->route('akun.index');
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
    public function edit($id_akun)
    {
        $data = Akun::all();
        $get = DB::table('akun')->where('id_akun', $id_akun)->get();
        foreach ($get as $p) {
            $id_akun = $p->id_akun;
            $nama_akun = $p->nama_akun;
            $kode_akun = $p->kode_akun;
            $header_akun = $p->header_akun;
        }
        return view('akun.edit', [
            'data' => $data,
            'id_akun' => $id_akun,
            'nama_akun' => $nama_akun,
            'kode_akun' => $kode_akun,
            'header_akun' => $header_akun
        ]);
    }

    public function update(Request $request, akun $akun)
    {
        $validated = $request->validate([
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'header_akun' => 'required',
        ]);

        $update = akun::where('id_akun', $request->id_akun)
            ->update([
                'kode_akun' => $request->kode_akun,
                'nama_akun' => $request->nama_akun,
                'header_akun' => $request->header_akun,
            ]);
        return redirect()->route('akun.index')
            ->with('success', 'Data Berhasil di Input');
    }


    public function destroy($id_akun)
    {
        $akun = akun::findOrFail($id_akun);
        $akun->delete();

        return redirect()->route('akun.index')
        ->with('success', 'Data Berhasil di Hapus');
    }
}