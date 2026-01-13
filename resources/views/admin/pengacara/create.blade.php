<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pengacara | Admin Panel</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <style>
    :root {
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --bg-light: #f8fafc;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Montserrat', sans-serif;
      padding: 40px 0;
    }

    .form-card {
      background: white;
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      overflow: hidden;
    }

    .card-header-custom {
      background: var(--primary-dark);
      padding: 30px;
      text-align: center;
      color: white;
    }

    .card-header-custom h2 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      margin-bottom: 5px;
      letter-spacing: 1px;
    }

    .card-header-custom p {
      color: var(--accent-gold);
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin: 0;
    }

    .card-body-custom {
      padding: 40px;
    }

    /* Form Label & Input */
    .form-label {
      font-weight: 600;
      color: var(--primary-dark);
      font-size: 0.85rem;
      margin-bottom: 8px;
    }

    .input-group-text {
      background: #f8f9fa;
      border-right: none;
      color: var(--accent-gold);
      padding-left: 20px;
    }

    .form-control {
      background: #f8f9fa;
      border: 1px solid #e2e8f0;
      padding: 12px 15px;
      font-size: 0.95rem;
      border-radius: 8px;
    }

    .form-control:focus {
      background: white;
      border-color: var(--accent-gold);
      box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.1);
    }

    /* Error Alert */
    .alert-danger-custom {
      background: #fff5f5;
      border: 1px solid #feb2b2;
      color: #c53030;
      border-radius: 12px;
      padding: 15px 25px;
      margin-bottom: 30px;
    }

    /* Buttons */
    .btn-save {
      background: var(--primary-dark);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 10px;
      font-weight: 700;
      letter-spacing: 1px;
      transition: 0.3s;
      width: 100%;
    }

    .btn-save:hover {
      background: var(--accent-gold);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(197, 160, 89, 0.3);
    }

    .btn-cancel {
      color: #64748b;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.9rem;
      transition: 0.3s;
    }

    .btn-cancel:hover {
      color: var(--primary-dark);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      <div class="mb-4">
        <a href="{{ url('/admin/pengacara') }}" class="btn-cancel">
          <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Pengacara
        </a>
      </div>

      <div class="card form-card">
        <div class="card-header-custom">
          <p>Registration Form</p>
          <h2>Tambah Pengacara Baru</h2>
        </div>

        <div class="card-body-custom">
          @if ($errors->any())
            <div class="alert-danger-custom">
              <div class="d-flex align-items-center mb-2">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong class="small">Mohon perbaiki kesalahan berikut:</strong>
              </div>
              <ul class="mb-0 small ps-4">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('admin.pengacara.store') }}" method="POST">
            @csrf
            
            <div class="row">
              <div class="col-md-12 mb-4">
                <label class="form-label">Nama Lengkap & Gelar</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                  <input type="text" name="nama" class="form-control" placeholder="Contoh: Andi Wijaya, S.H., M.H." value="{{ old('nama') }}" required>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Bidang Spesialisasi</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                  <input type="text" name="spesialisasi" class="form-control" placeholder="Contoh: Hukum Pidana" value="{{ old('spesialisasi') }}" required>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Tarif Konsultasi (Rp)</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-coins"></i></span>
                  <input type="number" name="tarif" class="form-control" placeholder="Contoh: 500000" value="{{ old('tarif') }}" required>
                </div>
              </div>

              <div class="col-12 mb-4">
                <label class="form-label">Profil & Biografi Singkat</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Tuliskan pengalaman dan keahlian pengacara secara mendalam..." required>{{ old('deskripsi') }}</textarea>
              </div>

              <div class="col-12 mb-5">
                <label class="form-label">URL Foto Profil</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-image"></i></span>
                  <input type="text" name="foto" class="form-control" placeholder="https://example.com/foto-anda.jpg" value="{{ old('foto') }}">
                </div>
                <small class="text-muted mt-2 d-block px-1">Gunakan link gambar dari hosting foto atau Google Drive yang dipublikasikan.</small>
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn-save shadow-sm">
                  <i class="fas fa-save me-2"></i> Daftarkan Pengacara
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>