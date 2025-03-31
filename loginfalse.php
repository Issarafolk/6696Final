<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Itim', cursive;
        }
        .login-page {
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .error-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(255,255,255,0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 2px solid #333333;
        }
        .btn-back {
            width: 100%;
            margin-top: 15px;
            background-color: #000000;
            border-color: #000000;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #333333;
            transform: scale(1.02);
        }
        .decoration {
            position: absolute;
            opacity: 0.15;
            z-index: 1;
        }
        .decoration-top-left {
            top: 20px;
            left: 20px;
        }
        .decoration-bottom-right {
            bottom: 20px;
            right: 20px;
            transform: rotate(45deg);
        }
        h1 {
            color: #000000 !important;
            font-weight: bold;
        }
        h2 {
            color: #333333 !important;
        }
        .text-muted {
            color: #666666 !important;
        }
    </style>
    <title>ตรวจสอบ Login</title>
</head>
<body>
    <div class="login-page">
        <svg class="decoration decoration-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
            <rect x="10" y="10" width="80" height="80" stroke="#fff" stroke-width="5" fill="none" />
        </svg>
        <svg class="decoration decoration-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
            <rect x="10" y="10" width="80" height="80" stroke="#fff" stroke-width="5" fill="none" />
        </svg>
        <div class="error-container">
            <h1 class="mb-4">Login ผิดพลาด</h1>
            <h2 class="mb-4">กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
            <a href="login.php" class="btn btn-dark btn-back">กลับสู่หน้าจอ Login</a>
            <div class="text-center mt-3 text-muted small">
                พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>