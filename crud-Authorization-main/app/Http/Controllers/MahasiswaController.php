<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa',
            'password' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Mahasiswa created successfully',
            'data' => $mahasiswa,
        ], 201);
    }

    public function read()
    {
        $mahasiswa = Mahasiswa::all();

        return response()->json([
            'data' => $mahasiswa,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim,' . $id,
            'password' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Mahasiswa updated successfully',
            'data' => $mahasiswa,
        ], 200);
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return response()->json([
            'message' => 'Mahasiswa deleted successfully',
        ], 200);
    }
}