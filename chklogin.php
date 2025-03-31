<?php
    include("conn.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            background-color: #000000; /* Pure black background */
            margin: 0;
            padding: 20px;
            color: #ffffff; /* White text for the body */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: #111111; /* Very dark gray, almost black */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1); /* White shadow */
            padding: 30px;
            border: 2px solid #ffffff; /* White border */
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #ffffff; /* White */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #ffffff; /* White */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.2rem; /* Adjusted font size */
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* White glow */
            animation: whiteGlow 1.5s ease-in-out infinite alternate;
        }

        @keyframes whiteGlow {
            from {
                text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
            }
            to {
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.5);
            }
        }

        .alert-success {
            background-color: #1a1a1a;
            color: #ffffff;
            border-color: #444444;
        }

        .alert-danger {
            background-color: #1a1a1a;
            color: #ffffff;
            border-color: #444444;
        }

        .alert-warning {
            background-color: #1a1a1a;
            color: #ffffff;
            border-color: #444444;
        }

        .login-message {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }

        .btn-redirect {
            background-color: #ffffff; /* White */
            border-color: #dddddd;
            color: #000000; /* Black text */
            padding: 10px 20px;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
            margin-top: 20px;
        }

        .btn-redirect:hover {
            background-color: #eeeeee; /* Light gray */
            border-color: #ffffff;
            transform: scale(1.05);
            color: #000000;
        }
    </style>
    
    <title>ตรวจสอบการเข้าสู่ระบบ</title>
</head>
<body>
    <div class="login-container">
        <h1>ตรวจสอบการเข้าสู่ระบบ</h1>
        
        <?php
            // เช็คค่า
            $u_id = $_POST['u_id'];
            $u_passwd = $_POST['u_passwd'];
            
            // เช็ค ชื่อผู้ใช้ กับ รหัสผ่านว่าตรงกับในฐานข้อมูลหรือไม่
            $lvsql = "SELECT * FROM userdata WHERE u_id='$u_id' and u_passwd='$u_passwd'";
            
            $result = $conn->query($lvsql);
            if($result->num_rows == 0){
                echo "<div class='login-message alert-danger'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ</div>";
                echo "<a href='login.php' class='btn-redirect'>กลับไปหน้าเข้าสู่ระบบ</a>";
            } else {
                //get user data
                $row = $result->fetch_assoc();
                
                // กำหนดตัวแปร session
                $_SESSION["u_id"] = $u_id;
                $_SESSION["u_passwd"] = $row['u_passwd'];
                $_SESSION["u_name"] = $row['u_name'];
                
                echo "<div class='login-message alert-success'>เข้าสู่ระบบสำเร็จ กำลังนำท่านไปยังระบบ...</div>";
                
                // Redirect with JavaScript for better user experience
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'show.php';
                    }, 1500);
                </script>";
                
                echo "<a href='show.php' class='btn-redirect'>ไปยังระบบทันที</a>";
            }
        ?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>