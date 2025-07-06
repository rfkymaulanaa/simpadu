<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'nama' => 'Rifky Maulana ',
            'foto' => 'avatar5.png'
        ];
        $prodi = Prodi::all();
        return view('prodi.index', compact('data', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'nama' => 'Rifky Maulana ',
            'foto' => 'avatar5.png'
        ];
        return view('prodi.create' , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kaprodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255'
        ],
        [
            'nama.required' => 'Nama Prodi harus diisi',
            'kaprodi.required' => 'Kaprodi harus diisi',
            'jurusan.required' => 'Jurusan harus diisi'
        ]
    );
        Prodi::create($validatedData);
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'nama' => 'Rifky Maulana',
            'foto' => 'avatar5.png'
        ];
        $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('data', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kaprodi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255'
        ],
        [
            'nama.required' => 'Nama Prodi harus diisi',
            'kaprodi.required' => 'Kaprodi harus diisi',
            'jurusan.required' => 'Jurusan harus diisi'
        ]
    );
        $prodi = Prodi::findOrFail($id);
        $prodi->update($validatedData);
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus');
    }
}
