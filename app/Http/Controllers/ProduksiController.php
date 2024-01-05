<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use App\Models\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produksi::all();
        return view('produksi/view', ['data' => $data,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_barang = DB::table('barang')->get();
        return view('produksi/create', ['data_barang' => $data_barang,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_produksi' => 'required',
            'kode_produksi' => 'required',
            'id_barang' => 'required',
            'jumlah_produksi' => 'required',
        ]);

        $store = produksi::create([
            'tgl_produksi' => $request->tgl_produksi,
            'kode_produksi' => $request->kode_produksi,
            'jumlah_produksi' => $request->jumlah_produksi,
            'id_barang' => $request->id_barang,
        ]);

        $barang = DB::table('barang')->where('id_barang', $request->id_barang)->first();

        $persediaan = Persediaan::create([
            'tgl_persediaan' => $request->tgl_produksi,
            'keterangan' => 'Produksi' . $barang->nama_barang,
            'id_barang' => $request->id_barang,
            'kuantitas' => $request->jumlah_produksi,
        ]);

        return redirect()->route('produksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_produksi)
    {
        $data = produksi::all();
        $get = DB::table('produksi')->where('id_produksi', $id_produksi)->get();
        foreach ($get as $p) {
            $id_produksi = $p->id_produksi;
            $kode_produksi = $p->kode_produksi;
            $tgl_produksi = $p->tgl_produksi;
            $jumlah_produksi = $p->jumlah_produksi;
        }
        return view('produksi.edit', [
            'data' => $data,
            'id_produksi' => $id_produksi,
            'kode_produksi' => $kode_produksi,
            'tgl_produksi' => $tgl_produksi,
            'jumlah_produksi' => $jumlah_produksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produksi $produksi)
    {
        $validated = $request->validate([
            'tgl_produksi' => 'required',
            'kode_produksi' => 'required',
            'jumlah_produksi' => 'required',
        ]);

        $update = produksi::where('id_produksi', $request->id_produksi)
            ->update([
                'tgl_produksi' => $request->tgl_produksi,
                'kode_produksi' => $request->kode_produksi,
                'jumlah_produksi' => $request->jumlah_produksi,
            ]);
        return redirect()->route('produksi.index')
            ->with('success', 'Data Berhasil di Input');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_produksi)
    {
        $produksi = produksi::findOrFail($id_produksi);
        $produksi->delete();

        return redirect()->route('produksi.index')
            ->with('success', 'Data Berhasil di Hapus');
    }
}