<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
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
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data', 'mahasiswa'));
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
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('data', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                'nim' => 'required|unique:mahasiswa|max:10',
                'password' => 'required',
                'nama' => 'required|max:100',
                'tanggalLahir' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|email|max:100',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'nim.required' => 'NIM Tidak Boleh Kosong',
                'nim.unique' => 'NIM Sudah Ada',
                'nim.max' => 'NIM Maksimal 10 Karakter',
                'password.required' => 'Password Tidak Boleh Kosong',
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'nama.max' => 'Nama Maksimal 100 Karakter',
                'tanggalLahir.required' => 'Tanggal Lahir Tidak Boleh Kosong',
                'telp.required' => 'No Telp Tidak Boleh Kosong',
                'telp.max' => 'No Telp Maksimal 20 Karakter',
                'email.required' => 'Email Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa image',
                'foto.mimes' => 'Foto Harus Berupa jpeg,png,jpg,gif,svg',
                'foto.max' => 'Foto Maksimal 2MB'
            ]
        );
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('images', 'public');
            $validateData['foto'] = basename($filePath);
        }
        $validateData['password'] = Hash::make($validateData['password']);
        $data = array_merge($validateData, $request->only('id_prodi'));
        Mahasiswa::create($data);
        return redirect('mahasiswa');
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
        $data = [
            'nama' => 'Rifky Maulana ',
            'foto' => 'avatar5.png'
        ];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('data', 'prodi', 'mahasiswa',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'password' => 'nullable',
                'nama' => 'required|max:100',
                'tanggalLahir' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|email|max:100',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'password.required' => 'Password Tidak Boleh Kosong',
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'nama.max' => 'Nama Maksimal 100 Karakter',
                'tanggalLahir.required' => 'Tanggal Lahir Tidak Boleh Kosong',
                'telp.required' => 'No Telp Tidak Boleh Kosong',
                'telp.max' => 'No Telp Maksimal 20 Karakter',
                'email.required' => 'Email Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa image',
                'foto.mimes' => 'Foto Harus Berupa jpeg,png,jpg,gif,svg',
                'foto.max' => 'Foto Maksimal 2MB'
            ]
        );
        $mahasiswa = Mahasiswa::find($id);
        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('images', 'public');
        } else {
            $validateData['foto'] = $mahasiswa->foto;
        }

        if ($request->input('password')) {
            $validateData['password'] = Hash::make($request->password);
        } else {
            $validateData['password'] = $mahasiswa->password;
        }

        $validateData['password'] = Hash::make($validateData['password']);
        $data = array_merge($validateData, $request->only('id_prodi'));
        Mahasiswa::where('nim', $id)->update($data);
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
