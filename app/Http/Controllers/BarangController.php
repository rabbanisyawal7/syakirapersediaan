<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = barang::all();
        return view('barang/view', ['barang' => $barang,]);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jenis_barang' => 'required',
        ]);

        $store = barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jenis_barang' => $request->jenis_barang,
        ]);
        return redirect()->route('barang.index');
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
    public function edit($id_barang)
    {
        $data = barang::all();
        $get = DB::table('barang')->where('id_barang', $id_barang)->get();
        foreach ($get as $p) {
            $id_barang = $p->id_barang;
            $nama_barang = $p->nama_barang;
            $kode_barang = $p->kode_barang;
            $harga_barang = $p->harga_barang;
            $jenis_barang = $p->jenis_barang;
        }
        return view('barang.edit', [
            'data' => $data,
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
            'kode_barang' => $kode_barang,
            'harga_barang' => $harga_barang,
            'jenis_barang' => $jenis_barang,
        ]);
    }

    public function update(Request $request, barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jenis_barang' => 'required',
        ]);

        $update = barang::where('id_barang', $request->id_barang)
            ->update([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'jenis_barang' => $request->jenis_barang,
            ]);
        return redirect()->route('barang.index')
            ->with('success', 'Data Berhasil di Input');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function destroy($id_barang)
    {
        $barang = barang::findOrFail($id_barang);
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Data Berhasil di Hapus');
    }
}