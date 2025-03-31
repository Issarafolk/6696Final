<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
    font-family: "Kanit", sans-serif;
    background-color: #121212; /* Dark background */
    margin: 0;
    padding: 20px;
    color: #fff; /* White text for the body */
}

.page-container {
    background-color: #1e1e1e; /* Dark container */
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Darker shadow */
    padding: 30px;
    border: 2px solid #555; /* Gray border */
}

h1 {
    color: #fff; /* White */
    font-weight: 800;
    margin-bottom: 30px;
    border-bottom: 3px solid #555; /* Gray */
    padding-bottom: 15px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 2.8rem; /* Increased font size */
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.3); /* White glowing effect */
    animation: whiteGlow 1.5s ease-in-out infinite alternate;
    line-height: 1.3;
}

@keyframes whiteGlow {
    from {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.3);
    }
    to {
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.6), 0 0 25px rgba(255, 255, 255, 0.4), 0 0 35px rgba(255, 255, 255, 0.2);
    }
}

.form-control, .form-select {
    background-color: #2a2a2a;
    border-radius: 5px;
    border-color: #555; /* Gray */
    color: #fff;
}

.form-control:focus, .form-select:focus {
    background-color: #2a2a2a;
    border-color: #fff;
    box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    color: #fff;
}

label {
    color: #fff; /* White */
    font-weight: 500;
    margin-bottom: 8px;
}

.btn-primary {
    background-color: #333; /* Dark gray */
    border-color: #222;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #555; /* Light gray */
    border-color: #333;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #111; /* Very dark gray */
    border-color: #000;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background-color: #333;
    border-color: #111;
    transform: scale(1.05);
}

.footer {
    text-align: center;
    margin-top: 20px;
    color: #fff; /* White */
    font-size: 0.9em;
}

.alert-success {
    background-color: #2a2a2a;
    color: #fff;
    border-color: #777;
}

.alert-danger {
    background-color: #2a2a2a;
    color: #fff;
    border-color: #555;
}

.alert-warning {
    background-color: #2a2a2a;
    color: #ddd;
    border-color: #777;
}

/* ส่วนของ User Info Box */
.user-info-container {
    margin-bottom: 25px;
}

.user-info-box {
    display: flex;
    align-items: center;
    background-color: #2a2a2a;
    border: 2px solid #555;
    border-radius: 8px;
    padding: 12px 20px;
    margin: 20px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.user-info-title {
    font-weight: 600;
    color: #fff;
    margin-right: 10px;
    white-space: nowrap;
}

.user-info-data {
    color: #fff;
    border-left: 2px solid #555;
    padding-left: 15px;
    margin-left: 5px;
}

.edit-form {
    background-color: #2a2a2a;
    border-radius: 10px;
    border: 1px solid #555;
    padding: 25px;
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.player-id-badge {
    background-color: #555;
    color: #fff;
    font-weight: 600;
    padding: 5px 15px;
    border-radius: 5px;
    display: inline-block;
}

@media (max-width: 768px) {
    .page-container {
        padding: 15px;
    }
    h1 {
        font-size: 2.2rem; /* Slightly smaller on mobile */
    }
}

@media (min-width: 992px) {
    h1 {
        font-size: 3.2rem; /* Even larger on desktops */
    }
}
    </style>

    <title>แก้ไขข้อมูลนักฟุตบอล 7ฟิว</title>
</head>

<body>
    <div class="container page-container">
        <div class="user-info-container">
            <h1 class="text-center">แก้ไขข้อมูลนักฟุตบอล</h1>
            
            <div class="user-info-box">
                <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
                <div class="user-info-data">พัฒนาโดย ระบบจัดการนักฟุตบอล 7ฟิว</div>
            </div>
        </div>

        <?php
        if(isset($_GET['action']) && $_GET['action']=='edit'){
            $id = $_GET['id'];
            $sql = "SELECT * FROM ฟุตบอล_7ฟิว WHERE id=$id";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger text-center'>ไม่ได้ระบุข้อมูลที่ต้องการแก้ไข</div>";
            echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
            exit();
        }
        ?>

        <div class="edit-form">
            <form action="edit_update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">รหัสนักฟุตบอล</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="player-id-badge"><?php echo $row['id']; ?></div>
                    </div>
                </div>
               
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ชื่อนักฟุตบอล</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ชื่อ_นักฟุตบอล" class="form-control" maxlength="100" value="<?php echo $row['ชื่อ_นักฟุตบอล']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">อายุ</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name="อายุ" class="form-control" min="15" max="50" value="<?php echo $row['อายุ']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ตำแหน่ง</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="ตำแหน่ง" class="form-select" required>
                            <option>กรุณาระบุตำแหน่ง</option>
                            <option value="กองหน้า" <?php if ($row['ตำแหน่ง']=='กองหน้า'){ echo "selected";} ?>>กองหน้า</option>
                            <option value="กองหลัง" <?php if ($row['ตำแหน่ง']=='กองหลัง'){ echo "selected";} ?>>กองหลัง</option>
                            <option value="มิดฟิลด์" <?php if ($row['ตำแหน่ง']=='มิดฟิลด์'){ echo "selected";} ?>>มิดฟิลด์</option>
                            <option value="กองกลาง" <?php if ($row['ตำแหน่ง']=='กองกลาง'){ echo "selected";} ?>>กองกลาง</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ทีม</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="ทีม" class="form-select" required>
                            <option>กรุณาระบุทีม</option>
                            <option value="ทีมฟุตบอลกรุงเทพ" <?php if ($row['ทีม']=='ทีมฟุตบอลกรุงเทพ'){ echo "selected";} ?>>ทีมฟุตบอลกรุงเทพ</option>
                            <option value="ทีมฟุตบอลขอนแก่น" <?php if ($row['ทีม']=='ทีมฟุตบอลขอนแก่น'){ echo "selected";} ?>>ทีมฟุตบอลขอนแก่น</option>
                            <option value="ทีมฟุตบอลภูเก็ต" <?php if ($row['ทีม']=='ทีมฟุตบอลภูเก็ต'){ echo "selected";} ?>>ทีมฟุตบอลภูเก็ต</option>
                            <option value="ทีมฟุตบอลนครราชสีมา" <?php if ($row['ทีม']=='ทีมฟุตบอลนครราชสีมา'){ echo "selected";} ?>>ทีมฟุตบอลนครราชสีมา</option>
                            <option value="ทีมฟุตบอลอยุธยา" <?php if ($row['ทีม']=='ทีมฟุตบอลอยุธยา'){ echo "selected";} ?>>ทีมฟุตบอลอยุธยา</option>
                            <option value="ทีมฟุตบอลระยอง" <?php if ($row['ทีม']=='ทีมฟุตบอลระยอง'){ echo "selected";} ?>>ทีมฟุตบอลระยอง</option>
                            <option value="ทีมฟุตบอลบุรีรัมย์" <?php if ($row['ทีม']=='ทีมฟุตบอลบุรีรัมย์'){ echo "selected";} ?>>ทีมฟุตบอลบุรีรัมย์</option>
                            <option value="ทีมฟุตบอลพัทยา" <?php if ($row['ทีม']=='ทีมฟุตบอลพัทยา'){ echo "selected";} ?>>ทีมฟุตบอลพัทยา</option>
                            <option value="ทีมฟุตบอลสุพรรณบุรี" <?php if ($row['ทีม']=='ทีมฟุตบอลสุพรรณบุรี'){ echo "selected";} ?>>ทีมฟุตบอลสุพรรณบุรี</option>
                            <option value="ทีมฟุตบอลสระบุรี" <?php if ($row['ทีม']=='ทีมฟุตบอลสระบุรี'){ echo "selected";} ?>>ทีมฟุตบอลสระบุรี</option>
                            <option value="ทีมฟุตบอลนครปฐม" <?php if ($row['ทีม']=='ทีมฟุตบอลนครปฐม'){ echo "selected";} ?>>ทีมฟุตบอลนครปฐม</option>
                            <option value="ทีมฟุตบอลราชบุรี" <?php if ($row['ทีม']=='ทีมฟุตบอลราชบุรี'){ echo "selected";} ?>>ทีมฟุตบอลราชบุรี</option>
                            <option value="ทีมฟุตบอลอุดรธานี" <?php if ($row['ทีม']=='ทีมฟุตบอลอุดรธานี'){ echo "selected";} ?>>ทีมฟุตบอลอุดรธานี</option>
                            <option value="ทีมฟุตบอลสงขลา" <?php if ($row['ทีม']=='ทีมฟุตบอลสงขลา'){ echo "selected";} ?>>ทีมฟุตบอลสงขลา</option>
                            <option value="ทีมฟุตบอลเชียงราย" <?php if ($row['ทีม']=='ทีมฟุตบอลเชียงราย'){ echo "selected";} ?>>ทีมฟุตบอลเชียงราย</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ประสบการณ์ (ปี)</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name="ประสบการณ์" class="form-control" min="0" max="35" value="<?php echo $row['ประสบการณ์']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ประเทศ</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ประเทศ" class="form-control" maxlength="50" value="<?php echo $row['ประเทศ']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ประเภทฟุตบอล</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="ประเภท_ฟุตบอล" class="form-select" required>
                            <option>กรุณาระบุประเภทฟุตบอล</option>
                            <option value="ฟุตบอลลีก" <?php if ($row['ประเภท_ฟุตบอล']=='ฟุตบอลลีก'){ echo "selected";} ?>>ฟุตบอลลีก</option>
                            <option value="ฟุตบอลทีมชาติ" <?php if ($row['ประเภท_ฟุตบอล']=='ฟุตบอลทีมชาติ'){ echo "selected";} ?>>ฟุตบอลทีมชาติ</option>
                            <option value="ฟุตบอลถ้วย" <?php if ($row['ประเภท_ฟุตบอล']=='ฟุตบอลถ้วย'){ echo "selected";} ?>>ฟุตบอลถ้วย</option>
                            <option value="ฟุตบอลอาชีพ" <?php if ($row['ประเภท_ฟุตบอล']=='ฟุตบอลอาชีพ'){ echo "selected";} ?>>ฟุตบอลอาชีพ</option>
                            <option value="ฟุตบอลเยาวชน" <?php if ($row['ประเภท_ฟุตบอล']=='ฟุตบอลเยาวชน'){ echo "selected";} ?>>ฟุตบอลเยาวชน</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary flex-grow-1 me-2">
                            <i class="bi bi-check-circle me-2"></i>บันทึกข้อมูล
                        </button>
                        <a href="show.php" class="btn btn-danger flex-grow-1">
                            <i class="bi bi-x-circle me-2"></i>ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer mt-4">
            พัฒนาโดย ระบบจัดการนักฟุตบอล 7ฟิว
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>