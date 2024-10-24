<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Pastikan Anda mengimport model Feedback


class AdminController extends Controller
{
    //
    public function index()
    {
        $feedbacks = Feedback::latest()->get(); 

        return view('admin', ['feedback' => $feedback]); // <-- Tambahkan baris ini
    }
}
