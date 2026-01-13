<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Pengacara Profesional | Prime Legal</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <style>
    :root {
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --bg-soft: #f4f7f6;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--bg-soft);
      color: #333;
    }

    /* --- Navbar --- */
    .navbar {
      background: var(--primary-dark);
      padding: 15px 0;
    }
    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: white !important;
      letter-spacing: 1px;
    }

    /* --- Booking Card Section --- */
    .booking-section {
      padding: 80px 0;
    }

    .booking-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.1);
      overflow: hidden;
      background: #fff;
    }

    .booking-header {
      background: var(--primary-dark);
      color: white;
      padding: 50px 40px;
      text-align: center;
    }

    .booking-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      margin-bottom: 10px;
    }

    .booking-header p {
      opacity: 0.8;
      font-weight: 300;
    }

    .form-container {
      padding: 50px;
    }

    /* --- Form Styling --- */
    .form-label {
      font-weight: 600;
      color: var(--primary-dark);
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .input-group {
      margin-bottom: 25px;
    }

    .input-group-text {
      background-color: #f8f9fa;
      border-right: none;
      color: var(--accent-gold);
      padding-left: 20px;
      padding-right: 15px;
    }

    .form-control, .form-select {
      background-color: #f8f9fa;
      border: 1px solid #e2e8f0;
      padding: 14px;
      border-radius: 8px;
      transition: all 0.3s;
      font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
      background-color: #fff;
      border-color: var(--accent-gold);
      box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.1);
    }

    /* --- WhatsApp Button --- */
    .btn-wa {
      background: #25d366; /* WhatsApp Green */
      color: white;
      border: none;
      padding: 18px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 12px;
      transition: 0.4s;
      width: 100%;
      font-size: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
    }

    .btn-wa:hover {
      background: #1eb957;
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(37, 211, 102, 0.3);
      color: white;
    }

    footer {
      background: var(--primary-dark);
      color: rgba(255,255,255,0.6);
      padding: 30px 0;
      text-align: center;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">PRIME<span style="color: var(--accent-gold)">LEGAL</span></a>
  </div>
</nav>

<section class="booking-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <div class="card booking-card">
          <div class="booking-header">
            <h2>Reservasi Konsultasi</h2>
            <p>Silakan lengkapi formulir untuk terhubung dengan tim hukum kami</p>
          </div>

          <div class="form-container">
            <form id="bookingForm">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Nama Lengkap</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="nama_user" class="form-control" placeholder="Nama Anda" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Alamat Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" class="form-control" placeholder="email@contoh.com" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Nomor WhatsApp</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                    <input type="text" id="telepon" class="form-control" placeholder="08123456789" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Pilih Pengacara</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                    <select id="pengacara_id" class="form-select" required>
                      <option value="" disabled selected>Pilih Spesialis...</option>
                      @foreach(\App\Models\Lawyer::all() as $lawyer)
                        <option value="{{ $lawyer->id }}">{{ $lawyer->nama }} ({{ $lawyer->spesialisasi }})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label">Deskripsi Kasus / Pesan</label>
                  <div class="input-group">
                    <textarea id="pesan" class="form-control" rows="4" placeholder="Jelaskan kebutuhan hukum Anda secara singkat..." required></textarea>
                  </div>
                </div>

                <div class="col-12 mt-3">
                  <button type="button" onclick="sendWhatsApp()" class="btn-wa">
                    <i class="fab fa-whatsapp fa-lg"></i> Lanjutkan ke WhatsApp
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    &copy; 2026 Prime Legal Indonesia. All rights reserved.
  </div>
</footer>

<script>
  function sendWhatsApp() {
    // 1. Ambil data dari elemen input
    const nama = document.getElementById('nama_user').value;
    const email = document.getElementById('email').value;
    const telepon = document.getElementById('telepon').value;
    const pesan = document.getElementById('pesan').value;
    
    // Ambil teks dari pengacara yang dipilih (bukan cuma ID-nya)
    const selectPengacara = document.getElementById('pengacara_id');
    const namaPengacara = selectPengacara.options[selectPengacara.selectedIndex].text;

    // 2. Validasi Sederhana
    if (!nama || !email || !telepon || !pesan || selectPengacara.value === "") {
      alert("Mohon lengkapi semua data formulir sebelum mengirim.");
      return;
    }

    // 3. Atur Nomor WhatsApp Tujuan (Gunakan kode negara 62 di depan)
    const nomorAdmin = "6281234567890"; // <-- GANTI DENGAN NOMOR WHATSAPP ANDA

    // 4. Rangkai Pesan (Gunakan %0A untuk baris baru)
    const teksPesan = 
      "*RESERVASI PENGACARA BARU*%0A" +
      "------------------------------------%0A" +
      "*Data Klien:" +
      "• Nama: " + nama + "%0A" +
      "• Email: " + email + "%0A" +
      "• No. WA: " + telepon + "%0A%0A" +
      "• Nama: " + namaPengacara + "%0A%0A" +
      "*Deskripsi Kasus:*%0A" +
      "_" + pesan + "_%0A" +
      "------------------------------------%0A" +
      "Sent from: *PrimeLegal Website*";

    // 5. Buat URL WhatsApp
    const urlWA = "https://api.whatsapp.com/send?phone=" + nomorAdmin + "&text=" + teksPesan;

    // 6. Buka Tab Baru ke WhatsApp
    window.open(urlWA, '_blank');
  }
</script>

</body>
</html>