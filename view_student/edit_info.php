<?php
    include_once '../lib/session.php';
    include '../classes/user.php';

    $user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $result = $user->update_pass($_POST);
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
    <title>Cập nhật mật khẩu</title>
</head>
<body>
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
    <div class="container">
        <div class="col-md-4">
            <form action="edit_info.php" method="POST">
                <?php
                if(isset($result))
                {
                    echo '<script>alert("' . $result . '")</script>';
                }
                ?>
                <br/>
                <label>Nhập mật khẩu cũ</label>
                <input type="text" class="form-control" name="old_pass" placeholder="Mật khẩu cũ"/>

                <label>Nhập mật khẩu mới</label>
                <input type="text" class="form-control" name="new_pass" placeholder="Mật khẩu mới"/>
                <br/>
                <input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
            </form>
        </div>
    </div>
</body>
</html>