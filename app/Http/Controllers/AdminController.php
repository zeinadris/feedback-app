<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Pastikan Anda mengimport model Feedback


class AdminController extends Controller
{
    //
    public function index()
    {
        $totalFeedbacks = Feedback::count();
        $newFeedbackCount = Feedback::where('status', 'pending')->count();
        $processedFeedbacks = Feedback::where('status', 'diproses')->count();
        $completedFeedbacks = Feedback::where('status', 'selesai')->count();
        $feedbacks = Feedback::latest()->get();

        return view('admin', [
            'feedbacks' => $feedbacks,
            'totalFeedbacks' => $totalFeedbacks,
            'newFeedbackCount' => $newFeedbackCount, // Perbaiki nama variabel
            'processedFeedbacks' => $processedFeedbacks,
            'completedFeedbacks' => $completedFeedbacks,
        ]); // Hapus ->dd()
    }

    
}
