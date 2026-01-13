<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Pengacara | Admin Panel</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <style>
    :root {
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --bg-body: #f8fafc;
    }

    body {
      background-color: var(--bg-body);
      font-family: 'Montserrat', sans-serif;
      padding: 30px;
    }

    /* --- Back Button Style --- */
    .btn-dashboard {
      color: var(--primary-dark);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 25px;
      transition: 0.3s;
      padding: 8px 15px;
      border-radius: 8px;
    }

    .btn-dashboard:hover {
      color: var(--accent-gold);
      background: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .main-card {
      background: white;
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
      overflow: hidden;
    }

    .card-header-flex {
      padding: 25px 30px;
      background: white;
      border-bottom: 1px solid #f1f1f1;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .table thead th {
      background: #f8f9fa;
      color: #64748b;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 15px 25px;
      border: none;
    }

    .table tbody td {
      padding: 18px 25px;
      vertical-align: middle;
      border-bottom: 1px solid #f1f5f9;
      color: #334155;
      font-size: 0.9rem;
    }

    .table tbody tr:hover {
      background-color: #fcfcfc;
    }

    .lawyer-profile {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .lawyer-avatar {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      object-fit: cover;
      background: #eee;
    }

    .specialty-badge {
      background: rgba(197, 160, 89, 0.1);
      color: var(--accent-gold);
      padding: 5px 12px;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .btn-add {
      background: var(--primary-dark);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.85rem;
      transition: 0.3s;
    }

    .btn-add:hover {
      background: var(--accent-gold);
      color: white;
      transform: translateY(-2px);
    }

    .btn-action {
      width: 32px;
      height: 32px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
      transition: 0.2s;
      border: none;
    }

    .btn-edit { background: #e0f2fe; color: #0369a1; margin-right: 5px; }
    .btn-edit:hover { background: #0369a1; color: white; }

    .btn-delete { background: #fee2e2; color: #b91c1c; }
    .btn-delete:hover { background: #b91c1c; color: white; }

    .alert-success-custom {
      background: #dcfce7;
      color: #15803d;
      border: none;
      border-radius: 10px;
      padding: 15px 25px;
      margin-bottom: 25px;
      font-weight: 600;
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  
  <div class="row">
    <div class="col-12">
      <a href="{{ url('/admin/dashboard') }}" class="btn-dashboard">
        <i class="fas fa-th-large"></i> Dashboard Admin
      </a>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-12">

      @if(session('success'))
        <div class="alert-success-custom">
          <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
      @endif

      <div class="main-card">
        <div class="card-header-flex">
          <div>
            <h4 class="fw-bold m-0" style="color: var(--primary-dark)">Database Pengacara</h4>
            <p class="text-muted small m-0">Total: {{ $lawyers->count() }} Personel Aktif</p>
          </div>
          <a href="{{ route('admin.pengacara.create') }}" class="btn btn-add">
            <i class="fas fa-plus me-2"></i> Tambah Pengacara
          </a>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Detail Pengacara</th>
                <th>Spesialisasi</th>
                <th>Tarif Konsultasi</th>
                <th class="text-end">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lawyers as $lawyer)
              <tr>
                <td>
                  <div class="lawyer-profile">
                    <img src="{{ $lawyer->foto ?? 'https://ui-avatars.com/api/?name='.urlencode($lawyer->nama).'&background=random' }}" class="lawyer-avatar" alt="Foto">
                    <div>
                      <div class="fw-bold">{{ $lawyer->nama }}</div>
                      <div class="small text-muted">ID: #LAW-00{{ $lawyer->id }}</div>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="specialty-badge">{{ $lawyer->spesialisasi }}</span>
                </td>
                <td>
                  <div class="fw-bold text-dark">Rp {{ number_format($lawyer->tarif) }}</div>
                  <div class="small text-muted">Per Sesi</div>
                </td>
                <td class="text-end">
                  <a href="{{ route('admin.pengacara.edit', $lawyer->id) }}" class="btn-action btn-edit text-decoration-none" title="Edit">
                    <i class="fas fa-pen-to-square"></i>
                  </a>

                  <form action="{{ route('admin.pengacara.destroy', $lawyer->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data pengacara ini?')" title="Hapus">
                      <i class="fas fa-trash-can"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach

              @if($lawyers->count() == 0)
              <tr>
                <td colspan="4" class="text-center py-5 text-muted">
                  <i class="fas fa-folder-open d-block mb-3 fa-3x opacity-25"></i>
                  Belum ada data pengacara yang terdaftar.
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        
        <div class="p-3 bg-light text-center">
          <small class="text-muted">Menampilkan seluruh pengacara aktif dalam database Prime Legal</small>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>