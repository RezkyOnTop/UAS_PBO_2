<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal | Prime Legal Login</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <style>
    :root {
      --primary-dark: #0a192f;
      --accent-gold: #c5a059;
      --deep-blue: #050c16;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      /* Background Image dengan Overlay */
      background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(5, 12, 22, 0.9)), 
                  url('https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') center/cover no-repeat;
    }

    .login-container {
      width: 100%;
      max-width: 450px;
      padding: 20px;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 50px 40px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
      color: white;
      text-align: center;
    }

    .brand-logo {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 5px;
      letter-spacing: 2px;
    }

    .brand-logo span {
      color: var(--accent-gold);
    }

    .login-subtitle {
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: rgba(255, 255, 255, 0.5);
      margin-bottom: 40px;
    }

    /* Input Styling */
    .form-group {
      position: relative;
      margin-bottom: 25px;
      text-align: left;
    }

    .form-group i {
      position: absolute;
      left: 15px;
      top: 45px;
      color: var(--accent-gold);
      font-size: 1.1rem;
    }

    .form-label {
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      color: var(--accent-gold);
      margin-bottom: 8px;
      display: block;
      margin-left: 5px;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 12px 15px 12px 45px;
      color: white;
      transition: all 0.3s;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--accent-gold);
      box-shadow: none;
      color: white;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.2);
    }

    /* Error Alert */
    .error-box {
      background: rgba(220, 53, 69, 0.1);
      border: 1px solid rgba(220, 53, 69, 0.2);
      color: #ff8e97;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 25px;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* Button */
    .btn-login {
      background: var(--accent-gold);
      color: white;
      border: none;
      width: 100%;
      padding: 14px;
      border-radius: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: 0.4s;
      margin-top: 10px;
    }

    .btn-login:hover {
      background: #a38445;
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(197, 160, 89, 0.3);
    }

    .back-link {
      margin-top: 25px;
      display: block;
      color: rgba(255, 255, 255, 0.4);
      text-decoration: none;
      font-size: 0.85rem;
      transition: 0.3s;
    }

    .back-link:hover {
      color: var(--accent-gold);
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <div class="brand-logo">PRIME<span>LEGAL</span></div>
    <div class="login-subtitle">Management Portal</div>

    @if(session('error'))
      <div class="error-box">
        <i class="fas fa-exclamation-circle"></i>
        <span>{{ session('error') }}</span>
      </div>
    @endif

    <form action="{{ url('/admin/login') }}" method="POST">
      @csrf

      <div class="form-group">
        <label class="form-label">Email Address</label>
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" class="form-control" placeholder="admin@primelegal.com" required>
      </div>

      <div class="form-group">
        <label class="form-label">Security Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn-login">Authorize Access</button>
    </form>

    <a href="/" class="back-link">
      <i class="fas fa-arrow-left me-1"></i> Kembali ke Website Utama
    </a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>