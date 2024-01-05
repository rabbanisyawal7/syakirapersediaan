<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('persediaan as a')
            ->leftjoin('barang as b', 'a.id_barang', '=', 'b.id_barang')
            ->groupBy('a.id_barang', 'b.nama_barang', 'b.jenis_barang', 'b.satuan')
            ->select('a.id_barang', 'b.nama_barang', 'b.jenis_barang', 'b.satuan', DB::raw('sum(a.kuantitas) as total_persediaan'))
            ->get();

        return view('persediaan.index', ['data' => $data, 'title' => 'Persediaan']);
    }

    public function detail($id)
    {
        $data = DB::table('persediaan as a')
            ->leftjoin('barang as b', 'a.id_barang', '=', 'b.id_barang')
            ->leftJoin(DB::raw('(select id_persediaan, sum(kuantitas) as total_pengambilan from stok group by id_persediaan) as c'), 'a.id_persediaan', '=', 'c.id_persediaan')
            ->where('a.id_barang', '=', $id)
            ->orderBy('a.tgl_persediaan', 'asc')
            ->select('a.*', 'b.*', DB::raw('COALESCE(c.total_pengambilan, 0) as total_pengambilan'))
            ->get();

        return view('persediaan.detail', ['data' => $data, 'title' => 'Detail Persediaan']);
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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Persediaan $persediaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persediaan $persediaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persediaan $persediaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persediaan $persediaan)
    {
        //
    }
}