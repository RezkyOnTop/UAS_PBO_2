<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Data Real-Time</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <style>
    :root {
      --sidebar-width: 260px;
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --bg-body: #f8fafc;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--bg-body);
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-width);
      height: 100vh;
      position: fixed;
      background: var(--primary-dark);
      color: white;
    }

    .sidebar-brand {
      padding: 30px;
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .nav-link {
      color: rgba(255,255,255,0.7);
      padding: 15px 30px;
      transition: 0.3s;
      display: flex;
      align-items: center;
    }

    .nav-link:hover, .nav-link.active {
      color: white;
      background: rgba(255,255,255,0.05);
      border-left: 4px solid var(--accent-gold);
    }

    .nav-link i {
      margin-right: 15px;
      color: var(--accent-gold);
    }

    /* Main Content */
    .main {
      margin-left: var(--sidebar-width);
      padding: 40px;
    }

    .stat-card {
      background: white;
      border-radius: 15px;
      padding: 25px;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .table-container {
      background: white;
      border-radius: 15px;
      padding: 30px;
      margin-top: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .logout-btn {
      background: none;
      border: none;
      color: #ff6b6b;
      font-weight: 600;
      width: 100%;
      text-align: left;
      padding: 15px 30px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-brand">PRIME<span style="color:var(--accent-gold)">LEGAL</span></div>
  <nav class="mt-4">
    <a href="#" class="nav-link active"><i class="fas fa-home"></i> Dashboard</a>
    <a href="{{ url('/admin/pengacara') }}" class="nav-link"><i class="fas fa-gavel"></i> Kelola Pengacara</a>
    
    <form action="{{ url('/admin/logout') }}" method="POST" class="mt-5">
      @csrf
      <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Keluar</button>
    </form>
  </nav>
</div>

<div class="main">
  <div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="fw-bold">Statistik Real-Time</h3>
    <div class="text-muted small">Hari ini: {{ date('d M Y') }}</div>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="stat-card">
        <h6 class="text-muted mb-2">Total Pengacara</h6>
        <h2 class="fw-bold m-0">{{ \App\Models\Lawyer::count() }}</h2>
        <div class="small text-success mt-2"><i class="fas fa-check-circle"></i> Terverifikasi</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="stat-card">
        <h6 class="text-muted mb-2">Booking Masuk</h6>
        <h2 class="fw-bold m-0">
          {{-- Pastikan Anda sudah punya model Booking --}}
          @if(class_exists('App\Models\Booking'))
            {{ \App\Models\Booking::count() }}
          @else
            0
          @endif
        </h2>
        <div class="small text-muted mt-2">Permintaan Konsultasi</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="stat-card">
        <h6 class="text-muted mb-2">Rata-rata Tarif</h6>
        <h2 class="fw-bold m-0">Rp {{ number_format(\App\Models\Lawyer::avg('tarif')) }}</h2>
        <div class="small text-muted mt-2">Harga Per Sesi</div>
      </div>
    </div>
  </div>

  <div class="table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="fw-bold m-0">Daftar Pengacara Aktif</h5>
      <a href="{{ url('/admin/pengacara') }}" class="btn btn-dark btn-sm px-4">Kelola Semua</a>
    </div>
    
    <div class="table-responsive">
      <table class="table align-middle">
        <thead class="table-light">
          <tr>
            <th>Nama Pengacara</th>
            <th>Spesialisasi</th>
            <th>Tarif Konsultasi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach(\App\Models\Lawyer::latest()->take(5)->get() as $lawyer)
          <tr>
            <td class="fw-bold">{{ $lawyer->nama }}</td>
            <td><span class="badge bg-info bg-opacity-10 text-info px-3">{{ $lawyer->spesialisasi }}</span></td>
            <td>Rp {{ number_format($lawyer->tarif) }}</td>
            <td><span class="text-success"><i class="fas fa-circle small me-2"></i> Aktif</span></td>
          </tr>
          @endforeach
          
          @if(\App\Models\Lawyer::count() == 0)
          <tr>
            <td colspan="4" class="text-center py-4 text-muted">Belum ada data pengacara di database.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>