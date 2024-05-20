<nav class="navbar navbar-expand-sm navbar-dark row" style="background-color: #E64946">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('profil') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Desa
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah Desa</a></li>
                        <!-- Tambahkan item dropdown lainnya di sini -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-kependudukan') }}">Data Kependudukan</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Layanan
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('surat-masuk') }}">Surat Masuk</a></li>
                        <li><a class="dropdown-item" href="{{ route('surat-keluar') }}">Surat Keluar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
