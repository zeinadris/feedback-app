@extends('layouts.app')

@section('content')
    <h1>Edit Feedback</h1>

    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pengusul" class="form-label">Nama Pengusul:</label>
            <input type="text" class="form-control" id="nama_pengusul" name="nama_pengusul" value="{{ $feedback->nama_pengusul }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="sarana_prasarana" {{ $feedback->kategori == 'sarana_prasarana' ? 'selected' : '' }}>Sarana Prasarana</option>
                <option value="pelayanan_publik" {{ $feedback->kategori == 'pelayanan_publik' ? 'selected' : '' }}>Pelayanan Publik</option>
                <option value="lainnya" {{ $feedback->kategori == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan:</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" required>{{ $feedback->pesan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi:</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $feedback->lokasi }}">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            @if($feedback->gambar)
                <img src="{{ asset('storage/' . $feedback->gambar) }}" alt="Gambar Feedback" height="100">
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <label for="biaya" class="form-label">Estimasi Biaya (opsional):</label>
            <input type="number" class="form-control" id="biaya" name="biaya" step="0.01" value="{{ $feedback->biaya }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection