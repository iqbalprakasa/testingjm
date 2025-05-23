<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    //
    public function create($pasien)
    {
        $pasien = Pasien::where('id', $pasien)->firstOrFail();
        return view('diagnosa.input', compact('pasien'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'diagnosa' => 'required|string|max:1000',
        ]);
        $pasien = Pasien::findOrFail($request->input('id'));
        $pasien->diagnosa = $request->input('diagnosa');
        $pasien->save();
        return redirect()->route('dashboard')->with('success', 'Diagnosa berhasil diperbarui.');
    }
    public function sistolik(Request $request)
    {
        $request->validate([
            'beratbadan' => 'required|string|max:1000',
            'tekanandarah' => 'required|string|max:1000',
        ]);
        $pasien = Pasien::findOrFail($request->input('id'));
        $pasien->beratbadan = $request->input('beratbadan');
        $pasien->tekanandarah = $request->input('tekanandarah');
        $pasien->save();
        return redirect()->route('dashboard')->with('success', 'Sistolik dan Diastolik berhasil diperbarui.');
    }
}
