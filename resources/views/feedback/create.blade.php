<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        /* Custom CSS */
        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #0079bf!important;
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            color: white !important;
        }

        .hero {
            background-color: #f5f5f5;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #0079bf;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
        }

        .feature-section {
            padding: 50px 0;
        }

        .feature-icon {
            font-size: 3rem;
            color: #0079bf;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Feedback App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bantuan / FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback.create') }}" style="background-color: #0079bf; color:white; border-radius: 5px; padding: 8px 15px;">Kirim Feedback</a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('feedback.index') }}">Riwayat Feedback</a></li>
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="#" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kirim Feedback') }}</div>

                    <div class="card-body">
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

                            <div class="row mb-3">
                                <label for="nama_pengusul" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pengusul') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_pengusul" type="text" class="form-control @error('nama_pengusul') is-invalid @enderror" name="nama_pengusul" value="{{ old('nama_pengusul') }}" required autocomplete="nama_pengusul" autofocus>

                                    @error('nama_pengusul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kategori" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>

                                <div class="col-md-6">
                                    <select id="kategori" class="form-select @error('kategori') is-invalid @enderror" name="kategori" required>
                                        <option value="sarana_prasarana" {{ old('kategori') == 'sarana_prasarana' ? 'selected' : '' }}>Sarana Prasarana</option>
                                        <option value="pelayanan_publik" {{ old('kategori') == 'pelayanan_publik' ? 'selected' : '' }}>Pelayanan Publik</option>
                                        <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>

                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="pesan" class="col-md-4 col-form-label text-md-end">{{ __('Pesan') }}</label>

                                <div class="col-md-6">
                                    <textarea id="pesan" type="text" class="form-control @error('pesan') is-invalid @enderror" name="pesan" required>{{ old('pesan') }}</textarea>

                                    @error('pesan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="lokasi" class="col-md-4 col-form-label text-md-end">{{ __('Lokasi') }}</label>

                                <div class="col-md-6">
                                    <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" >

                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('Gambar') }}</label>

                                <div class="col-md-6">
                                    <input id="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" >

                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="biaya" class="col-md-4 col-form-label text-md-end">{{ __('Biaya') }}</label>

                                <div class="col-md-6">
                                    <input id="biaya" type="number" class="form-control @error('biaya') is-invalid @enderror" name="biaya" value="{{ old('biaya') }}" >

                                    @error('biaya')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kirim') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <footer class="footer">
        <div class="container">
            <p>© {{ date('Y') }}  Feedback Masyarakat. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>