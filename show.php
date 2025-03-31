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

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #000000; /* ดำ */
            margin: 0;
            padding: 20px;
            color: #ffffff; /* ขาว */
        }

        .page-container {
            background-color: #121212; /* เทาเข้ม */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2); /* เงาขาว */
            padding: 30px;
            border: 2px solid #ffffff; /* ขอบขาว */
        }

        h1 {
            color: #ffffff; /* ขาว */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #ffffff; /* ขาว */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.8rem; /* ขนาดตัวอักษร */
            text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff; /* เงาขาว */
            animation: whiteGlow 1.5s ease-in-out infinite alternate;
            line-height: 1.3;
        }

        @keyframes whiteGlow {
            from {
                text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff;
            }
            to {
                text-shadow: 0 0 15px #ffffff, 0 0 25px #ffffff, 0 0 35px #ffffff;
            }
        }

        .form-control, .form-select {
            background-color: #2a2a2a;
            border-radius: 5px;
            border-color: #ffffff; /* ขาว */
            color: #ffffff;
        }

        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            border-color: #aaaaaa;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        .btn-primary {
            background-color: #333333; /* เทาเข้ม */
            border-color: #ffffff;
            transition: all 0.3s ease;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #555555; /* เทา */
            border-color: #ffffff;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #333333; /* เทาเข้ม */
            border-color: #ffffff;
            transition: all 0.3s ease;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #555555; /* เทา */
            border-color: #ffffff;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* ขาว */
            font-size: 0.9em;
        }

        .table {
            margin-top: 20px;
            color: #ffffff; /* ขาว */
        }

        .table thead {
            background-color: #333333; /* เทาเข้ม */
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #1a1a1a; /* เทาเข้ม */
            color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #0f0f0f; /* เทาเข้มมาก */
            color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: #2a2a2a; /* เทา */
            color: #ffffff;
        }

        .alert-success {
            background-color: #1a1a1a;
            color: #dddddd;
            border-color: #ffffff;
        }

        .alert-danger {
            background-color: #1a1a1a;
            color: #dddddd;
            border-color: #ffffff;
        }

        .alert-warning {
            background-color: #1a1a1a;
            color: #dddddd;
            border-color: #ffffff;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #ffffff !important;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: #2a2a2a;
            color: #ffffff;
            border: 1px solid #ffffff;
        }

        .page-link {
            background-color: #2a2a2a;
            color: #ffffff;
            border-color: #ffffff;
        }

        .page-link:hover {
            background-color: #555555;
            color: #ffffff;
        }

        .page-item.active .page-link {
            background-color: #555555;
            border-color: #ffffff;
        }

        /* ส่วนของ User Info Box */
        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: #1a1a1a;
            border: 2px solid #ffffff;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }
        
        .user-info-title {
            font-weight: 600;
            color: #ffffff;
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: #ffffff;
            border-left: 2px solid #ffffff;
            padding-left: 15px;
            margin-left: 5px;
        }

        .user-action-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
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

    <title>ข้อมูลนักฟุตบอล</title>
</head>

<body>
    <div class="container page-container">
        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'delete') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM ฟุตบอล_7ฟิว WHERE id=$id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM ฟุตบอล_7ฟิว WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success text-center'>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <div class="user-info-container">
            <h1 class="text-center">ข้อมูลรายชื่อนักฟุตบอล</h1>
            
            <div class="user-info-box">
                <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
                <div class="user-info-data">พัฒนาโดย 664485046 นายอิศรา ฮวดหอม</div>
            </div>
            
            <div class="user-action-container">
                <a href="add_player.php" class="btn btn-primary">เพิ่มข้อมูลนักฟุตบอล</a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อนักฟุตบอล</th>
                        <th>อายุ</th>
                        <th>ตำแหน่ง</th>
                        <th>ทีม</th>
                        <th>ประสบการณ์</th>
                        <th>ประเทศ</th>
                        <th>ประเภทฟุตบอล</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM ฟุตบอล_7ฟิว";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["ชื่อ_นักฟุตบอล"] . "</td>";
                            echo "<td>" . $row["อายุ"] . "</td>";
                            echo "<td>" . $row["ตำแหน่ง"] . "</td>";
                            echo "<td>" . $row["ทีม"] . "</td>";
                            echo "<td>" . $row["ประสบการณ์"] . "</td>";
                            echo "<td>" . $row["ประเทศ"] . "</td>";
                            echo "<td>" . $row["ประเภท_ฟุตบอล"] . "</td>";
                            echo '<td>
                                <div class="btn-group" role="group">
                                    <a href="show.php?action_even=delete&id=' . $row['id'] . '" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm(\'ต้องการจะลบข้อมูลนักฟุตบอล ' . $row['id'] . ' ชื่อ ' . $row['ชื่อ_นักฟุตบอล'] . '?\')"
                                    >
                                       ลบข้อมูล
                                    </a>
                                    <a href="edit_player.php?action_even=edit&id=' . $row['id'] . '" 
                                       class="btn btn-primary btn-sm"
                                       onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลนักฟุตบอล ' . $row['id'] . ' ชื่อ ' . $row['ชื่อ_นักฟุตบอล'] . '?\')"
                                    >
                                       แก้ไขข้อมูล
                                    </a>
                                </div>
                            </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer mt-4">
            
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                search: 'ค้นหา:',
                lengthMenu: 'แสดง _MENU_ รายการ',
                info: 'หน้า _PAGE_ จาก _PAGES_',
                infoEmpty: 'ไม่มีข้อมูล',
                zeroRecords: 'ไม่พบข้อมูล',
                paginate: {
                    first: 'หน้าแรก',
                    last: 'หน้าสุดท้าย',
                    next: 'ถัดไป',
                    previous: 'ก่อนหน้า'
                }
            }
        });
    </script>
</body>
</html>