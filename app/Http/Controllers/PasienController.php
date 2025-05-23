<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Resep;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        
        $pasienList = Pasien::all();        
        return view('dashboard',compact('pasienList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
 
        $pasien = Pasien::where('id', $request->input('pasien'))->first();
        return view('pasien.input', compact('pasien'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->input('id') == null){
            $pasien= new Pasien();

        }else{
            $pasien = Pasien::findOrFail($request->input('id'));

        }
        $pasien->namapasien = $request->input('namapasien');
        $pasien->jeniskelamin = $request->input('jeniskelamin');
        $pasien->nohp = $request->input('nohp');
        $pasien->tanggal_lahir = $request->input('tanggal_lahir'); 
        $pasien->save();
        return redirect()->route('dashboard')->with('success', 'Berhasil menambahkan data pasien');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }

    public function hasil(Request $request)
    {
        //
 
        $pasien = Pasien::where('id', $request->input('pasien'))->first();
        $resepList = Resep::where('pasien_id', $request->input('pasien'))
        ->leftJoin('obat as obat', 'obat.id', '=', 'resep.obat_id')
        ->select('resep.*', 'obat.namaobat', 'obat.harga') // tambahkan kolom obat yang ingin diambil
        ->get();
        return view('pasien.hasil', compact('pasien','resepList'));
        
    }
}
