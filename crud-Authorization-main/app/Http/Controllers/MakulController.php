<?php

namespace App\Http\Controllers;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul',
        ]);

        $makul = Makul::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return response()->json([
            'message' => 'Makul created successfully',
            'data' => $makul,
        ], 201);
    }

    public function read()
    {
        $makul = Makul::all();

        return response()->json([
            'data' => $makul,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul,kode,' . $id,
        ]);

        $makul = Makul::findOrFail($id);

        $makul->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return response()->json([
            'message' => 'Makul updated successfully',
            'data' => $makul,
        ], 200);
    }

    public function delete($id)
    {
        $makul = Makul::findOrFail($id);
        $makul->delete();

        return response()->json([
            'message' => 'Makul deleted successfully',
        ], 200);
    }
}
