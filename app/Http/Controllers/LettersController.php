<?php

namespace App\Http\Controllers;

use App\Models\letters;
use Illuminate\Http\Request;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = letters::all();
        return view('datasurat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $surat = letters::all();
        return view('datasurat.create', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_type_id'  => 'required',
            'letter_perihal'   => 'required',
            'recipients'   => 'required',
            'content'   => 'required',
            'attachment'   => 'required',
            'notulis'   => 'required',
        ]);

        letters::create($request->all());
        
        return redirect()->route('datasurat.index')->with('success', 'Berhasil menambahkan data User!');
    }

    /**
     * Display the specified resource.
     */
    public function show(letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letters $letters)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letters $letters)
    {
        letters::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil mengahapus data!');
    }
}
