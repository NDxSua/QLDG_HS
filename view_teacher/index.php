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
    <title>Trang chủ giáo viên</title>
</head>
<body>
    <h3 style="text-align: center;">Welcome <?= $name?></h3>
    <div>
        <table>
            <div>
                <a href="#">Quản lý báo cáo</a>
                <a href="#">Thống kê</a>
            <?php
                if(isset($_SESSION['user']) && $_SESSION['user']){?>
                <a href="#">Thông tin cá nhân</a>
                <a href="../logout.php">Đăng xuất</a>
               <?php } else{?>
                <a href="../login.php">Đăng nhập</a>
            <?php }?>
            </div>
        </table>
    </div>
</body>
</html>