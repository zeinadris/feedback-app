@extends('layouts.app')

@section('content')
    <h1>Kirim Feedback</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_pengusul" class="form-label">Nama Pengusul:</label>
            <input type="text" class="form-control" id="nama_pengusul" name="nama_pengusul" value="{{ old('nama_pengusul') }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="sarana_prasarana" {{ old('kategori') == 'sarana_prasarana' ? 'selected' : '' }}>Sarana Prasarana</option>
                <option value="pelayanan_publik" {{ old('kategori') == 'pelayanan_publik' ? 'selected' : '' }}>Pelayanan Publik</option>
                <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan:</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" required>{{ old('pesan') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi:</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <label for="biaya" class="form-label">Estimasi Biaya (opsional):</label>
            <input type="number" class="form-control" id="biaya" name="biaya" step="0.01" value="{{ old('biaya') }}">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endsection