<?php
    include_once '../lib/session.php';
    $name = Session::get('user');

    if (!isset($_SESSION['user'])) {
        $_SESSION['message'] = 'Vui lòng đăng nhập.';
        header("Location: ../login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Trang chủ học sinh</title>
</head>
<body>
    <h3 style="text-align: center;">Welcome <?= $name?></h3>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="./report_list.php">Danh sách báo cáo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bảng thi đua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./info.php">Thông tin cá nhân</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Đăng xuất</a>
            </li>
        </ul>
    </div>
</nav><br/> 
</body>
</html>