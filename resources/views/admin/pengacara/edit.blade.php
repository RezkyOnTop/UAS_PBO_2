<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil Pengacara | Admin Panel</title>
  
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
      padding: 50px 0;
    }

    .edit-card {
      background: white;
      border: none;
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .edit-header {
      background: var(--primary-dark);
      padding: 40px;
      text-align: center;
      color: white;
    }

    .edit-header h2 {
      font-family: 'Playfair Display', serif;
      margin-bottom: 5px;
    }

    .card-body-custom { padding: 45px; }

    .form-label {
      font-weight: 600;
      color: var(--primary-dark);
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .form-control {
      background: #fdfdfd;
      border: 1px solid #e2e8f0;
      padding: 14px;
      border-radius: 10px;
      transition: 0.3s;
    }

    .form-control:focus {
      border-color: var(--accent-gold);
      box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.1);
    }

    /* Foto Preview Styling */
    .photo-preview-container {
      background: #f8f9fa;
      border: 2px dashed #e2e8f0;
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      margin-bottom: 30px;
    }

    .preview-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      border: 3px solid white;
    }

    .btn-update {
      background: var(--accent-gold);
      color: white;
      border: none;
      padding: 16px;
      border-radius: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      width: 100%;
      transition: 0.4s;
    }

    .btn-update:hover {
      background: #a38445;
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(163, 132, 69, 0.3);
      color: white;
    }

    .alert-error-custom {
      background: #fff5f5;
      border-left: 5px solid #fc8181;
      color: #c53030;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-xl-8">
      
      <div class="mb-4">
        <a href="{{ route('admin.pengacara.index') }}" class="text-decoration-none text-secondary fw-bold">
          <i class="fas fa-chevron-left me-2"></i> Kembali ke Daftar
        </a>
      </div>

      <div class="card edit-card">
        <div class="edit-header">
          <h2>Perbarui Profil</h2>
          <p class="text-white-50 m-0 small">ID Pengacara: #LAW-{{ $lawyer->id }}</p>
        </div>

        <div class="card-body-custom">
          @if ($errors->any())
            <div class="alert-error-custom">
              <h6 class="fw-bold"><i class="fas fa-exclamation-circle me-2"></i> Kesalahan Validasi:</h6>
              <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('admin.pengacara.update', $lawyer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-4">
                <div class="photo-preview-container">
                  <label class="form-label d-block mb-3">Foto Saat Ini</label>
                  <img id="imgPreview" src="{{ $lawyer->foto ?? 'https://ui-avatars.com/api/?name='.urlencode($lawyer->nama).'&size=150' }}" alt="Preview" class="preview-img">
                  <p class="small text-muted mt-3 mb-0">Pratinjau otomatis ketika link foto diubah</p>
                </div>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-12 mb-4">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $lawyer->nama) }}" required>
                  </div>

                  <div class="col-md-6 mb-4">
                    <label class="form-label">Spesialisasi</label>
                    <input type="text" name="spesialisasi" class="form-control" value="{{ old('spesialisasi', $lawyer->spesialisasi) }}" required>
                  </div>

                  <div class="col-md-6 mb-4">
                    <label class="form-label">Tarif (Rp)</label>
                    <input type="number" name="tarif" class="form-control" value="{{ old('tarif', $lawyer->tarif) }}" required>
                  </div>

                  <div class="col-12 mb-4">
                    <label class="form-label">Link URL Foto Baru</label>
                    <input type="text" id="fotoInput" name="foto" class="form-control" value="{{ old('foto', $lawyer->foto) }}" placeholder="https://..." oninput="updatePreview()">
                  </div>
                </div>
              </div>

              <div class="col-12 mb-5">
                <label class="form-label">Deskripsi Lengkap</label>
                <textarea name="deskripsi" class="form-control" rows="6" required>{{ old('deskripsi', $lawyer->deskripsi) }}</textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn-update">
                  <i class="fas fa-sync-alt me-2"></i> Simpan Perubahan Profil
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  // Fungsi untuk mengupdate foto secara real-time saat link diketik
  function updatePreview() {
    const input = document.getElementById('fotoInput');
    const preview = document.getElementById('imgPreview');
    
    if (input.value) {
      preview.src = input.value;
    } else {
      preview.src = "https://ui-avatars.com/api/?name=User&size=150";
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>