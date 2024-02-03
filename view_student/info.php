<?php
    include_once '../lib/session.php';
    include '../classes/class.php';
    include '../classes/user.php';

    $id = Session::get('user_id');
    $user = new user();
    $list_user = $user->getinfor($id);

    $classes = new classes();
    $list_class = $classes->getAll();

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
    <title>Thông tin cá nhân</title>

    <style>
        table,
        tr,
        td {
            border: none;
            /* background-color: #fff; */
            margin: 0;
            padding: 0;
            text-align: left;
            font-size: 18px;
        }

        td {
            margin: 10px;
            padding: 10px;
        }

        .container-info {
            width: 60%;
            display: flex;
            justify-content: center;
            flex: 1;
        }
        .container-single {
            display: flex;
            margin: 30px 100px;
        }
    </style>
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
    <div class="container-single">
        <div class="container-info">
            <div class="img-info">
                <?php   
                    foreach($list_user as $key => $value){?>
                        <img src="../img/<?= $value['avatar'] ?>">
                <?php }?>
            </div>
            <div class="info">
                <table>
                    <?php
                    foreach($list_user as $key => $value){?>
                        <tr>
                            <td>Họ tên: </td>
                            <td><?= $value['fullname'] ?></td>
                        </tr>

                        <tr>
                            <td>Tên đăng nhập: </td>
                            <td><?= $value['username'] ?></td>
                        </tr>

                        <tr>
                            <td>Mật khẩu: </td>
                            <td><?= $value['password'] ?></td>
                        </tr>

                        <tr>
                            <td>Lớp: </td>
                            <?php
                            foreach($list_class as $key => $val)
                            {
                                if($val['id'] == $value['class_id'])
                                {?>
                                    <td value = "<?= $val['id'] ?>"><?=$val['class_name'] ?></td>
                                <?php } ?>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>Địa chỉ: </td>
                            <td><?= $value['address'] ?></td>
                        </tr>

                        <tr>
                            <td>Số điện thoại: </td>
                            <td><?= $value['phone'] ?></td>
                        </tr>

                        <tr>
                            <td>Ngày sinh: </td>
                            <td><?= $value['date'] ?></td>
                        </tr>

                        <tr>
                            <td>Điểm thi đua: </td>
                            <td><?= $value['point'] ?></td>
                        </tr>
                <?php }?>
                </table>
                <a style="text-align: center;" href="./edit_info.php">Đổi mật khẩu</a>
            </div>
        </div>
    </div>
    
</body>
</html>