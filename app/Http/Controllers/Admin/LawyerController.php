<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    /**
     * Tampilkan daftar semua pengacara
     */
    public function index()
    {
        $lawyers = Lawyer::all();
        return view('admin.pengacara.index', compact('lawyers'));
    }

    /**
     * Form tambah pengacara baru
     */
    public function create()
    {
        return view('admin.pengacara.create');
    }

    /**
     * Simpan pengacara baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'tarif' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|url',
        ]);

        Lawyer::create($request->all());

        return redirect()->route('admin.pengacara.index')->with('success', 'Pengacara berhasil ditambahkan');
    }

    /**
     * Form edit pengacara
     */
    public function edit($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('admin.pengacara.edit', compact('lawyer'));
    }

    /**
     * Update pengacara di database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'tarif' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|url',
        ]);

        $lawyer = Lawyer::findOrFail($id);
        $lawyer->update($request->all());

        return redirect()->route('admin.pengacara.index')->with('success', 'Pengacara berhasil diupdate');
    }

    /**
     * Hapus pengacara
     */
    public function destroy($id)
    {
        Lawyer::destroy($id);
        return redirect()->route('admin.pengacara.index')->with('success', 'Pengacara berhasil dihapus');
    }
}
