<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Dwiky</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('pegawai.index') }}">Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kelurahan.index') }}">Kelurahan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kecamatan.index') }}">Kecamatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('provinsi.index') }}">Provinsi</a>
        </li>
      </ul>
    </div>
  </nav>