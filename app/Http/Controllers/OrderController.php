<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // menampilkan form booking
    public function create()
    {
        return view('booking.create');
    }

    // proses booking
    public function booking(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'pengacara_id' => 'required',
            'pesan' => 'required',
        ]);

        // Ambil data pengacara
        $pengacara = \App\Models\Lawyer::findOrFail($request->pengacara_id);

        // Buat pesan WhatsApp
        $message = "Booking Pengacara\n";
        $message .= "Nama: {$request->nama_user}\n";
        $message .= "Email: {$request->email}\n";
        $message .= "Telepon: {$request->telepon}\n";
        $message .= "Pengacara: {$pengacara->nama}\n";
        $message .= "Pesan: {$request->pesan}\n";

        // URL WA
        $wa_number = "628123456789"; // ganti dengan nomor admin
        $wa_url = "https://wa.me/{$wa_number}?text=" . urlencode($message);

        // Redirect ke WhatsApp
        return redirect($wa_url);
    }
}
