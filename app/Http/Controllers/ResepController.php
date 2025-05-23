<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $pasien = Pasien::where('id', $request->input('pasien'))->first();
        $resepList = Resep::where('pasien_id', $request->input('pasien'))
        ->leftJoin('obat as obat', 'obat.id', '=', 'resep.obat_id')
        ->select('resep.*', 'obat.namaobat', 'obat.harga') // tambahkan kolom obat yang ingin diambil
        ->get();
    
        $listDataObat = Obat::get();
        return view('resep.input', compact('pasien','resepList','listDataObat'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
        ]);
        $pasien= new Resep();
        $pasien->pasien_id = $request->input('id');
        $pasien->obat_id = $request->input('obat_id');
        $pasien->jumlah = $request->input('jumlah');
        $pasien->keterangan = $request->input('keterangan'); 
        $pasien->save();
        return redirect()->route('resep.create', ['pasien' => $request->input('id')])
        ->with('success', 'Data resep berhasil disimpan!');    }

    /**
     * Display the specified resource.
     */
    public function show(Resep $resep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resep $resep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();
    
        return redirect()->back()->with('success', 'Data resep berhasil dihapus.');
    }
}
