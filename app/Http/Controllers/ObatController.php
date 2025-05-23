<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $obatList = Obat::all();        
        return view('masterobat',compact('obatList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        
        $obat = Obat::where('id', $request->input('obat'))->first();
        return view('obat.input', compact('obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('id') == null){
            $obat= new Obat();

        }else{
            $obat = Obat::findOrFail($request->input('id'));

        }
        $obat->namaobat = $request->input('namaobat');
        $obat->harga = $request->input('harga');
        $obat->save();
        return redirect()->route('masterobat')->with('success', 'Berhasil menambahkan data obat');

    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
    }
}
