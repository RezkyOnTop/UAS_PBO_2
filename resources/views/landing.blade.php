<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sewa Pengacara Profesional | Law & Justice</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    :root {
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --text-gray: #64748b;
      --glass: rgba(255, 255, 255, 0.95);
    }

    body {
      font-family: 'Montserrat', sans-serif;
      color: #333;
      overflow-x: hidden;
    }

    h1, h2, .playfair {
      font-family: 'Playfair Display', serif;
    }

    /* --- Navbar Modern --- */
    .navbar {
      transition: all 0.4s ease;
      padding: 20px 0;
    }
    .navbar.scrolled {
      background: var(--glass);
      backdrop-filter: blur(10px);
      padding: 12px 0;
      box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-size: 1.5rem;
      color: white !important;
      letter-spacing: 1px;
    }
    .navbar.scrolled .navbar-brand, .navbar.scrolled .nav-link {
      color: var(--primary-dark) !important;
    }

    /* --- Hero Section dengan Overlay --- */
    .hero {
      height: 100vh;
      background: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.7)), 
                  url('https://images.pexels.com/photos/416320/pexels-photo-416320.jpeg') center/cover no-repeat;
      display: flex;
      align-items: center;
      color: white;
    }
    .hero h1 {
      font-size: 4rem;
      margin-bottom: 20px;
      line-height: 1.2;
    }
    .btn-gold {
      background-color: var(--accent-gold);
      color: white;
      padding: 15px 35px;
      border-radius: 0;
      font-weight: 600;
      transition: 0.3s;
      border: none;
    }
    .btn-gold:hover {
      background-color: #a38445;
      transform: translateY(-3px);
      color: white;
    }

    /* --- Section Title --- */
    .section-title {
      position: relative;
      margin-bottom: 60px;
      font-weight: 700;
    }
    .section-title::after {
      content: '';
      width: 80px;
      height: 3px;
      background: var(--accent-gold);
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
    }

    /* --- Lawyer Cards Modern --- */
    .lawyer-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: 0.4s;
      background: #fff;
    }
    .lawyer-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .card-img-container {
      height: 300px;
      overflow: hidden;
    }
    .card-img-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: 0.5s;
    }
    .lawyer-card:hover img {
      transform: scale(1.1);
    }
    .specialty {
      color: var(--accent-gold);
      font-size: 0.9rem;
      font-weight: 600;
      text-transform: uppercase;
    }

    /* --- Stats Section --- */
    .stats-section {
      background: var(--primary-dark);
      color: white;
      padding: 80px 0;
    }

    /* --- Footer --- */
    footer {
      background: #050c16;
      color: #94a3b8;
      padding: 60px 0 20px;
    }
    
    /* --- Custom Scrollbar --- */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: var(--accent-gold); }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold playfair" href="#">PRIME<span style="color: var(--accent-gold)">LEGAL</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link px-3" href="#hero">Home</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="#about">Tentang</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="#pengacara">Pengacara</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="#contact">Kontak</a></li>
        <li class="nav-item ms-lg-3">
          <a class="btn btn-outline-warning btn-sm px-4" href="{{ route('admin.login') }}">Portal Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section id="hero" class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1200">
        <span class="text-uppercase fw-bold" style="color: var(--accent-gold); letter-spacing: 2px;">Keadilan Adalah Prioritas</span>
        <h1 class="display-3 fw-bold">Pendamping Hukum Profesional Untuk Anda.</h1>
        <p class="lead mb-5 opacity-75">Kami menghubungkan Anda dengan pakar hukum bersertifikat untuk memastikan hak-hak Anda terlindungi secara hukum.</p>
        <div class="d-flex gap-3">
          <a href="#pengacara" class="btn btn-gold">Konsultasi Sekarang</a>
          <a href="#about" class="btn btn-outline-light px-4 d-flex align-items-center">Pelajari Lebih Lanjut</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="stats-section text-center">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-3" data-aos="zoom-in">
        <h2 class="fw-bold" style="color: var(--accent-gold)">10+</h2>
        <p class="mb-0 opacity-75">Tahun Pengalaman</p>
      </div>
      <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
        <h2 class="fw-bold" style="color: var(--accent-gold)">500+</h2>
        <p class="mb-0 opacity-75">Kasus Selesai</p>
      </div>
      <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
        <h2 class="fw-bold" style="color: var(--accent-gold)">50+</h2>
        <p class="mb-0 opacity-75">Pengacara Ahli</p>
      </div>
      <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
        <h2 class="fw-bold" style="color: var(--accent-gold)">98%</h2>
        <p class="mb-0 opacity-75">Kepuasan Klien</p>
      </div>
    </div>
  </div>
</section>

<section id="about" class="py-5">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right">
        <div class="position-relative">
          <img src="https://images.pexels.com/photos/4427506/pexels-photo-4427506.jpeg" class="img-fluid rounded-3 shadow-lg" alt="Tentang Kami">
          <div class="position-absolute bottom-0 end-0 bg-white p-4 shadow-lg d-none d-lg-block" style="transform: translate(20px, 20px);">
             <h5 class="fw-bold mb-0">Terverifikasi & Aman</h5>
             <small class="text-muted">Legalitas Terjamin</small>
          </div>
        </div>
      </div>
      <div class="col-md-6 ps-md-5" data-aos="fade-left">
        <h2 class="playfair display-5 mb-4 mt-4">Memberikan Solusi Hukum yang Berintegritas</h2>
        <p class="text-secondary mb-4">
          Sewa Pengacara adalah platform digital yang mentransformasi cara Anda mengakses bantuan hukum. Kami memahami bahwa setiap masalah hukum membutuhkan penanganan yang unik dan personal.
        </p>
        <ul class="list-unstyled mb-5">
          <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Pengacara Spesialis di Bidangnya</li>
          <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Transparansi Biaya Tanpa Biaya Tersembunyi</li>
          <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Kerahasiaan Dokumen Klien Terjamin</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="pengacara" class="py-5 bg-light">
  <div class="container py-5">
    <h2 class="section-title text-center">Pakar Hukum Kami</h2>
    <p class="text-center text-secondary mb-5">Pilih pengacara terbaik berdasarkan spesialisasi yang Anda butuhkan.</p>
    
    <div class="row g-4">
      @foreach($lawyers as $lawyer)
      <div class="col-md-4" data-aos="fade-up">
        <div class="card lawyer-card shadow-sm h-100">
          <div class="card-img-container">
            <img src="{{ $lawyer->foto ?? 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $lawyer->nama }}">
          </div>
          <div class="card-body p-4">
            <span class="specialty">{{ $lawyer->spesialisasi }}</span>
            <h5 class="card-title fw-bold my-2">{{ $lawyer->nama }}</h5>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <span class="text-muted"><i class="fas fa-tag me-1"></i> Mulai dari</span>
              <span class="fw-bold text-dark">Rp {{ number_format($lawyer->tarif) }}</span>
            </div>
            <a href="{{ route('pengacara.detail', $lawyer->id) }}" class="btn btn-outline-dark w-100 rounded-0 py-2">Lihat Profil & Booking</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="contact" class="py-5">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card border-0 shadow-lg overflow-hidden">
          <div class="row g-0">
            <div class="col-md-4 bg-primary text-white p-5 d-flex flex-column justify-content-center" style="background: var(--primary-dark) !important;">
              <h3 class="playfair mb-4">Hubungi Kami</h3>
              <p class="small opacity-75 mb-4">Tim kami siap melayani konsultasi awal Anda kapan saja.</p>
              <div class="d-flex mb-3">
                <i class="fa fa-map-marker-alt me-3 mt-1"></i>
                <span>Jl. A YANI KM 1 No. 45, Banjarbaru Selatan</span>
              </div>
              <div class="d-flex mb-3">
                <i class="fa fa-phone me-3 mt-1"></i>
                <span>+62 812 3456 7890</span>
              </div>
              <div class="d-flex">
                <i class="fa fa-envelope me-3 mt-1"></i>
                <span>hello@primelegal.com</span>
              </div>
            </div>
            <div class="col-md-8 p-5">
              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <input type="text" class="form-control border-0 bg-light p-3" placeholder="Nama Lengkap">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control border-0 bg-light p-3" placeholder="Email">
                  </div>
                  <div class="col-12">
                    <textarea class="form-control border-0 bg-light p-3" rows="4" placeholder="Ceritakan masalah hukum Anda secara singkat"></textarea>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-gold w-100">Kirim Pesan Sekarang</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="text-center text-md-start">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h4 class="playfair text-white fw-bold mb-4">PRIME<span style="color: var(--accent-gold)">LEGAL</span></h4>
        <p>Solusi hukum terpercaya untuk keadilan yang merata di seluruh Indonesia.</p>
      </div>
      <div class="col-md-4 mb-4 text-md-center">
        <h5 class="text-white mb-4">Navigasi</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-decoration-none text-reset mb-2 d-block">Layanan</a></li>
          <li><a href="#" class="text-decoration-none text-reset mb-2 d-block">Karir Pengacara</a></li>
          <li><a href="#" class="text-decoration-none text-reset mb-2 d-block">Syarat & Ketentuan</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-4 text-md-end">
        <h5 class="text-white mb-4">Ikuti Kami</h5>
        <div class="d-flex justify-content-md-end gap-3">
          <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-instagram"></i></a>
          <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
    <hr class="mt-5 border-secondary">
    <div class="text-center pt-3 small">
      &copy; 2026 Prime Legal Indonesia. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Inisialisasi AOS
  AOS.init({
    duration: 800,
    once: true
  });

  // Efek Navbar Saat Scroll
  window.addEventListener('scroll', function() {
    const nav = document.querySelector('.navbar');
    if (window.scrollY > 50) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  });
</script>
</body>
</html>