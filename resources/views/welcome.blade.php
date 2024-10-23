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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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

    <section class="hero">
        <div class="container">
            <h1>Sampaikan Aspirasi Anda</h1>
            <p> Bantu kami membangun [Nama Daerah/Instansi] yang lebih baik dengan memberikan feedback dan saran Anda. </p>
            <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-lg">Kirim Feedback</a>
        </div>
    </section>

    <section class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="bi bi-lightbulb feature-icon"></i>
                    <h3>Ide & Inovasi</h3>
                    <p>Berbagi ide cemerlang untuk kemajuan bersama.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-megaphone feature-icon"></i>
                    <h3>Kritik & Saran</h3>
                    <p>Sampaikan kritik dan saran membangun Anda kepada kami.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-hand-thumbs-up feature-icon"></i>
                    <h3>Apresiasi</h3>
                    <p>Berikan apresiasi atas layanan yang memuaskan.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>© {{ date('Y') }}  Feedback Masyarakat. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>