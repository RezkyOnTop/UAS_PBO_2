<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;

class UserLawyerController extends Controller
{
    // menampilkan daftar pengacara
    public function list()
    {
        $lawyers = Lawyer::all();
        return view('user.lawyer.index', compact('lawyers'));
    }

    // menampilkan detail pengacara + form booking otomatis
    public function detail($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('user.lawyer.detail', compact('lawyer'));
    }
}
