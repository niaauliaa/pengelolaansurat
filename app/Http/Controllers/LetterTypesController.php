<?php

namespace App\Http\Controllers;

use App\Models\letter_types;
use Illuminate\Http\Request;
use App\Exports\ExportLetter;
use Maatwebsite\Excel\Facades\Excel;


class LetterTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasi = letter_types::all();
        return view('klasifikasi.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);

        letter_types::create([
            'letter_code' =>$request->letter_code,
            'name_type' =>$request->name_type,
        ]);

        return redirect()->route('klasifikasi.index')->with('success', 'Berhasil menambahkan data User!');
    }

    /**
     * Display the specified resource.
     */
    public function show(letter_types $letter_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $klasifikasi = letter_types::find($id);
        return view('klasifikasi.edit', compact('klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $klasifikasi = Letter_types::find($id);

        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
    ]);

        $ubah = [
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
    ];
    
    if ($request->password) {
        // Assuming you want to update specific fields if a password exists.
        $klasifikasi->update([
            'letter_code' => $request->kodesurat, // Make sure the key 'kodesurat' exists in your request.
            'name_type' => $request->name_type,
        ]);
    } else {
        $klasifikasi->update($ubah);
    }

    return redirect()->route('klasifikasi.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        letter_types::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil mengahapus data!');
    }

    public function exportExcel()
    {
        $klasifikasi = 'data_klasifikasi'.'.xlsx';
        return Excel::download(new ExportLetter, $klasifikasi);
    }
}
