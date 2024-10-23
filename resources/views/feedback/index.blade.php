<!DOCTYPE html>
<html>
<head>
    <title>Form Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Kirim Feedback</h1>
        <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_pengusul" class="form-label">Nama Pengusul:</label>
                <input type="text" class="form-control" id="nama_pengusul" name="nama_pengusul" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select class="form-select" id="kategori" name="kategori" required>
                    <option value="sarana_prasarana">Sarana Prasarana</option>
                    <option value="pelayanan_publik">Pelayanan Publik</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="pesan" class="form-label">Pesan:</label>
              <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi:</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
              <label for="biaya" class="form-label">Estimasi Biaya (opsional):</label>
              <input type="number" class="form-control" id="biaya" name="biaya" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>