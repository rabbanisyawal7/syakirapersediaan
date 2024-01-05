<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Persediaan;
use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('stok as a')
            ->leftJoin('barang as b', 'a.barang_id', '=', 'b.id_barang')
            ->leftJoin('persediaan as c', 'a.id_stok', '=', 'c.id_stok')
            ->get();
        return view('stok/view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = barang::all();
        return view('stok/create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'barang_id' => 'required',
        ]);

        $store = stok::create([
            'barang_id' => $request->barang_id,
            'stok_keluar' => $request->stok_keluar,
        ]);

        $stok = $request->stok_keluar * -1;

        $persediaan = Persediaan::create([
            'tgl_persediaan' => date('Y-m-d H:i:s'),
            'keterangan' => 'Stok Keluar',
            'id_barang' => $request->barang_id,
            'kuantitas' => $stok,
        ]);

        return redirect()->route('stok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_stok)
    {
        $data = barang::all();
        $get = DB::table('stok')->where('id_stok', $id_stok)->get();
        foreach ($get as $p) {
            $id_stok = $p->id_stok;
            $barang_id = $p->barang_id;
            $stok_keluar = $p->stok_keluar;
        }
        return view('stok.edit', [
            'data' => $data,
            'id_stok' => $id_stok,
            'barang_id' => $barang_id,
            'stok_keluar' => $stok_keluar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, stok $stok)
    {
        $validated = $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required',
        ]);

        $update = stok::where('id_stok', $request->id_stok)
            ->update([
                'barang_id' => $request->barang_id,
                'stok_keluar' => $request->stok_keluar,
            ]);
        return redirect()->route('stok.index')
            ->with('success', 'Data Berhasil di Input');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_stok)
    {
        $stok = stok::findOrFail($id_stok);
        $stok->delete();

        return redirect()->route('stok.index')
            ->with('success', 'Data Berhasil di Hapus');
    }
}