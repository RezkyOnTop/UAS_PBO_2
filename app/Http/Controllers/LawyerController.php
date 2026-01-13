<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::all();
        return view('admin.pengacara.index', compact('lawyers'));
    }

    public function create()
    {
        return view('admin.pengacara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'tarif' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        Lawyer::create($request->all());

        return redirect('/admin/pengacara')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('admin.pengacara.edit', compact('lawyer'));
    }

    public function update(Request $request, $id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $lawyer->update($request->all());

        return redirect('/admin/pengacara')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Lawyer::destroy($id);
        return redirect('/admin/pengacara')->with('success','Data berhasil dihapus');
    }
}
