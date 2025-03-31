<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักฟุตบอล | ระบบจัดการข้อมูลฟุตบอล 7ฟิว</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* พื้นหลังดำ */
            margin: 0;
            padding: 20px;
            color: #fff; /* ข้อความสีขาว */
        }

        .add-container {
            background-color: #1e1e1e; /* พื้นหลังกล่องดำเข้ม */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1); /* เงาสีขาว */
            padding: 30px;
            border: 2px solid #404040; /* ขอบสีเทาเข้ม */
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: #ffffff; /* สีขาว */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #404040; /* ขอบเส้นล่างสีเทาเข้ม */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.8rem; /* ขนาดตัวอักษรใหญ่ */
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3); /* เงาสีขาว */
            animation: whiteGlow 1.5s ease-in-out infinite alternate;
            line-height: 1.3;
        }

        @keyframes whiteGlow {
            from {
                text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
            }
            to {
                text-shadow: 0 0 15px rgba(255, 255, 255, 0.5), 0 0 25px rgba(255, 255, 255, 0.3);
            }
        }

        .form-label {
            color: #e0e0e0; /* สีเทาอ่อน */
            font-weight: 500;
        }

        .form-control, .form-select {
            background-color: #2a2a2a; /* สีเทาเข้ม */
            border-radius: 5px;
            border-color: #404040; /* ขอบสีเทาเข้ม */
            color: #fff; /* ข้อความสีขาว */
        }

        .form-control:focus, .form-select:focus {
            background-color: #333333;
            border-color: #808080;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .btn-custom-save {
            background-color: #404040; /* สีเทาเข้ม */
            border-color: #333333;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom-save:hover {
            background-color: #606060; /* สีเทาอ่อน */
            border-color: #404040;
            transform: scale(1.05);
        }

        .btn-custom-cancel {
            background-color: #1a1a1a; /* สีดำเข้ม */
            border-color: #333333;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom-cancel:hover {
            background-color: #333333;
            border-color: #1a1a1a;
            transform: scale(1.05);
        }

        .btn-custom-view {
            background-color: #2a2a2a; /* สีเทาเข้ม */
            border-color: #404040;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-custom-view:hover {
            background-color: #3a3a3a;
            border-color: #606060;
            color: #ffffff;
            transform: scale(1.05);
        }

        .alert-success {
            background-color: #1e2e1e;
            color: #4CAF50;
            border-color: #4CAF50;
        }

        .alert-danger {
            background-color: #2e1e1e;
            color: #f44336;
            border-color: #f44336;
        }

        .text-muted {
            color: #a0a0a0 !important; /* สีเทาอ่อน */
        }

        .invalid-feedback {
            color: #f44336;
        }

        /* ส่วนของ User Info Box */
        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: #2a2a2a;
            border: 2px solid #404040;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }
        
        .user-info-title {
            font-weight: 600;
            color: #ffffff;
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: #e0e0e0;
            border-left: 2px solid #404040;
            padding-left: 15px;
            margin-left: 5px;
        }

        @media (max-width: 768px) {
            .add-container {
                padding: 15px;
            }
            h1 {
                font-size: 2.2rem; /* ขนาดเล็กลงในมือถือ */
            }
        }

        @media (min-width: 992px) {
            h1 {
                font-size: 3.2rem; /* ขนาดใหญ่ขึ้นในเดสก์ท็อป */
            }
        }
    </style>
</head>

<body>
    <div class="container add-container">
        <h1>เพิ่มข้อมูลนักฟุตบอล</h1>
        
        <div class="user-info-box">
            <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
            <div class="user-info-data">ระบบจัดการข้อมูลฟุตบอล 7ฟิว</div>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate id="playerForm">
            <div class="row mb-3">
                <label for="ชื่อ_นักฟุตบอล" class="col-sm-3 col-form-label form-label">ชื่อนักฟุตบอล</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="ชื่อ_นักฟุตบอล" name="ชื่อ_นักฟุตบอล" required>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อนักฟุตบอล
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="อายุ" class="col-sm-3 col-form-label form-label">อายุ</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="อายุ" name="อายุ" min="15" max="50" required>
                    <div class="invalid-feedback">
                        กรุณากรอกอายุ (15-50 ปี)
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="ตำแหน่ง" class="col-sm-3 col-form-label form-label">ตำแหน่ง</label>
                <div class="col-sm-9">
                    <select name="ตำแหน่ง" id="ตำแหน่ง" class="form-select" required>
                        <option value="" selected disabled>เลือกตำแหน่ง</option>
                        <option value="กองหน้า">กองหน้า</option>
                        <option value="กองหลัง">กองหลัง</option>
                        <option value="กองกลาง">กองกลาง</option>
                        <option value="มิดฟิลด์">มิดฟิลด์</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกตำแหน่ง
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="ทีม" class="col-sm-3 col-form-label form-label">ทีม</label>
                <div class="col-sm-9">
                    <select name="ทีม" id="ทีม" class="form-select" required>
                        <option value="" selected disabled>เลือกทีม</option>
                        <option value="ทีมฟุตบอลกรุงเทพ">ทีมฟุตบอลกรุงเทพ</option>
                        <option value="ทีมฟุตบอลเชียงใหม่">ทีมฟุตบอลเชียงใหม่</option>
                        <option value="ทีมฟุตบอลขอนแก่น">ทีมฟุตบอลขอนแก่น</option>
                        <option value="ทีมฟุตบอลภูเก็ต">ทีมฟุตบอลภูเก็ต</option>
                        <option value="ทีมฟุตบอลนครราชสีมา">ทีมฟุตบอลนครราชสีมา</option>
                        <option value="ทีมฟุตบอลอยุธยา">ทีมฟุตบอลอยุธยา</option>
                        <option value="ทีมฟุตบอลระยอง">ทีมฟุตบอลระยอง</option>
                        <option value="ทีมฟุตบอลบุรีรัมย์">ทีมฟุตบอลบุรีรัมย์</option>
                        <option value="ทีมฟุตบอลพัทยา">ทีมฟุตบอลพัทยา</option>
                        <option value="ทีมฟุตบอลสุพรรณบุรี">ทีมฟุตบอลสุพรรณบุรี</option>
                        <option value="ทีมฟุตบอลสระบุรี">ทีมฟุตบอลสระบุรี</option>
                        <option value="ทีมฟุตบอลนครปฐม">ทีมฟุตบอลนครปฐม</option>
                        <option value="ทีมฟุตบอลราชบุรี">ทีมฟุตบอลราชบุรี</option>
                        <option value="ทีมฟุตบอลอุดรธานี">ทีมฟุตบอลอุดรธานี</option>
                        <option value="ทีมฟุตบอลสงขลา">ทีมฟุตบอลสงขลา</option>
                        <option value="ทีมฟุตบอลเชียงราย">ทีมฟุตบอลเชียงราย</option>
                        <option value="ทีมฟุตบอลชลบุรี">ทีมฟุตบอลชลบุรี</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกทีม
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="ประสบการณ์" class="col-sm-3 col-form-label form-label">ประสบการณ์ (ปี)</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="ประสบการณ์" name="ประสบการณ์" min="0" max="30" required>
                    <div class="invalid-feedback">
                        กรุณากรอกประสบการณ์ (0-30 ปี)
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="ประเทศ" class="col-sm-3 col-form-label form-label">ประเทศ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="ประเทศ" name="ประเทศ" value="ไทย" required>
                    <div class="invalid-feedback">
                        กรุณากรอกประเทศ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="ประเภท_ฟุตบอล" class="col-sm-3 col-form-label form-label">ประเภทฟุตบอล</label>
                <div class="col-sm-9">
                    <select name="ประเภท_ฟุตบอล" id="ประเภท_ฟุตบอล" class="form-select" required>
                        <option value="" selected disabled>เลือกประเภทฟุตบอล</option>
                        <option value="ฟุตบอลลีก">ฟุตบอลลีก</option>
                        <option value="ฟุตบอลทีมชาติ">ฟุตบอลทีมชาติ</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกประเภทฟุตบอล
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-custom-save me-2">
                    บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-custom-cancel me-2" onclick="window.location.href='index.php'">
                    ยกเลิก
                </button>
                <a href="show.php" class="btn btn-custom-view">
                    แสดงข้อมูลนักฟุตบอล
                </a>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data and sanitize inputs
            $ชื่อ_นักฟุตบอล = mysqli_real_escape_string($conn, $_POST['ชื่อ_นักฟุตบอล']);
            $อายุ = mysqli_real_escape_string($conn, $_POST['อายุ']);
            $ตำแหน่ง = mysqli_real_escape_string($conn, $_POST['ตำแหน่ง']);
            $ทีม = mysqli_real_escape_string($conn, $_POST['ทีม']);
            $ประสบการณ์ = mysqli_real_escape_string($conn, $_POST['ประสบการณ์']);
            $ประเทศ = mysqli_real_escape_string($conn, $_POST['ประเทศ']);
            $ประเภท_ฟุตบอล = mysqli_real_escape_string($conn, $_POST['ประเภท_ฟุตบอล']);
            
            // Insert data into database
            $sql = "INSERT INTO ฟุตบอล_7ฟิว (ชื่อ_นักฟุตบอล, อายุ, ตำแหน่ง, ทีม, ประสบการณ์, ประเทศ, ประเภท_ฟุตบอล) 
                    VALUES ('$ชื่อ_นักฟุตบอล', '$อายุ', '$ตำแหน่ง', '$ทีม', '$ประสบการณ์', '$ประเทศ', '$ประเภท_ฟุตบอล')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success mt-3 text-center">
                        บันทึกข้อมูลนักฟุตบอลเรียบร้อยแล้ว
                      </div>';
            } else {
                echo '<div class="alert alert-danger mt-3 text-center">
                        เกิดข้อผิดพลาด: ' . $conn->error . '
                      </div>';
            }
        }
        ?>

        <div class="text-center mt-3 text-muted small">
            ระบบจัดการข้อมูลฟุตบอล 7ฟิว &copy; 2025
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Form validation
        (function() {
            'use strict';
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>