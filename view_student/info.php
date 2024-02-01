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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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