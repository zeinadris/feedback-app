@extends('layouts.app')

@section('content')
    <h1>Detail Feedback</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Pengusul: {{ $feedback->nama_pengusul }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Kategori: {{ $feedback->kategori }}</h6>
            <p class="card-text">Pesan: {{ $feedback->pesan }}</p>

            @if($feedback->gambar)
                <img src="{{ asset('storage/' . $feedback->gambar) }}" alt="Gambar Feedback" class="img-fluid">
            @endif
            
            <p>Lokasi: {{ $feedback->lokasi }}</p>
            <p>Biaya: {{ $feedback->biaya }}</p>
            <p>Status: {{ $feedback->status }}</p>
            <p>Tanggapan: {{ $feedback->tanggapan }}</p>
        </div>
    </div>

    <a href="{{ route('feedback.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection