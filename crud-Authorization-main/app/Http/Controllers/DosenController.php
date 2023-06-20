<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosen',
            'password' => 'required',
        ]);

        $dosen = Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Dosen created successfully',
            'data' => $dosen,
        ], 201);
    }

    public function read()
    {
        $dosen = Dosen::all();

        return response()->json([
            'data' => $dosen,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosen,nip,' . $id,
            'password' => 'required',
        ]);

        $dosen = Dosen::findOrFail($id);

        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Dosen updated successfully',
            'data' => $dosen,
        ], 200);
    }

    public function delete($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return response()->json([
            'message' => 'Dosen deleted successfully',
        ], 200);
    }
}