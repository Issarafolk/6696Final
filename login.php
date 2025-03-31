<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* สีพื้นหลังดำ */
            margin: 0;
            padding: 0;
            color: #fff; /* สีข้อความขาว */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .login-container {
            background-color: #1e1e1e; /* สีพื้นหลังกล่องล็อกอิน */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2); /* เงาสีขาว */
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 2px solid #ffffff; /* ขอบสีขาว */
            text-align: center;
            position: relative;
            z-index: 2;
        }

        h1 {
            color: #ffffff; /* สีขาว */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #ffffff; /* เส้นใต้สีขาว */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.5rem; /* ขนาดตัวอักษร */
            text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff; /* เอฟเฟคเรืองแสง */
            animation: whiteGlow 1.5s ease-in-out infinite alternate;
        }

        @keyframes whiteGlow {
            from {
                text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff;
            }
            to {
                text-shadow: 0 0 15px #ffffff, 0 0 25px #ffffff, 0 0 35px #ffffff;
            }
        }

        .form-control {
            background-color: #2a2a2a;
            border-radius: 5px;
            border-color: #ffffff; /* ขอบสีขาว */
            color: #fff;
            margin-bottom: 20px;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            border-color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        .form-label {
            color: #ffffff; /* สีตัวอักษรขาว */
            font-weight: 500;
            text-align: left;
            display: block;
            margin-bottom: 8px;
        }

        .btn-custom {
            width: 100%;
            margin-top: 15px;
            background-color: #333333; /* สีปุ่มเทาเข้ม */
            border-color: #ffffff;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #ffffff; /* สีขาวเมื่อ hover */
            border-color: #ffffff;
            color: #000000;
            transform: scale(1.05);
        }

        .btn-outline {
            width: 100%;
            margin-top: 10px;
            background-color: transparent;
            border-color: #ffffff;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* สีขาว */
            font-size: 0.9em;
        }

        .decoration {
            position: absolute;
            opacity: 0.2;
            z-index: 1;
        }

        .decoration-top-left {
            top: 20px;
            left: 20px;
            transform: rotate(-45deg);
        }

        .decoration-bottom-right {
            bottom: 20px;
            right: 20px;
            transform: rotate(135deg);
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                margin: 15px;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
    
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <svg class="decoration decoration-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#ffffff" />
    </svg>
    
    <svg class="decoration decoration-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#ffffff" />
    </svg>

    <div class="login-container">
        <h1>เข้าสู่ระบบ</h1>
        <form action="chklogin.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="u_id" maxlength="30" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="u_passwd" maxlength="30" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">เข้าสู่ระบบ</button>
                <button type="reset" class="btn btn-outline">ยกเลิก</button>
            </div>
        </form>
        <div class="footer">
            พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>