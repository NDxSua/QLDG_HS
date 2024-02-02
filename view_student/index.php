<?php
    include_once '../lib/session.php';
    $name = Session::get('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ học sinh</title>
</head>
<body>
    <h3>Welcome <?= $name?></h3>
    <div>
        <table>
            <div>
                <a href="./info.php">Thông tin cá nhân</a>
                <a href="./report_list.php">Báo cáo</a>
                <a href="#">Bảng điểm thi đua</a>
            </div>
        </table>
    </div>
</body>
</html>