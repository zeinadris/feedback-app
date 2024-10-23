<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pengusul' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048', 
        ]);
    
        // Simpan data feedback 
        $feedback = new Feedback();
        $feedback->nama_pengusul = $request->nama_pengusul;
        $feedback->kategori = $request->kategori; // Mengisi field kategori
        $feedback->pesan = $request->pesan;
        $feedback->lokasi = $request->lokasi; // Optional, tergantung input form
        $feedback->biaya = $request->biaya; // Optional, tergantung input form
    
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('feedback_images', 'public');
            $feedback->gambar = $imagePath;
        }
    
        $feedback->save();
    
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dikirim!');
    }

    // ... (Tambahkan method lain seperti show, edit, update, destroy sesuai kebutuhan)
}
