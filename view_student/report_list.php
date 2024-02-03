<?php
    include_once '../lib/session.php';
    include '../classes/report.php';
    include '../classes/user.php';
    include '../classes/class.php';

    $id = Session::get('user_id');

    $report = new report();
    $list_report = $report->getReportByUser($id);

    $user = new user();
    $list_user = $user->getAll();

    $class = new classes();
    $list_class = $class->getAll();
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
    <title>Danh sách báo cáo</title>
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
        <?php $count = 1;
        if($list_report)
        {?>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Giáo viên đánh giá</th>
                    <th>Loại</th>
                    <th>Nhận xét</th>
                    <th>Ngày tạo</th>
                </tr>
            <?php foreach($list_report as $key => $value){?>
                <tr>
                    <td><?= $count++?></td>
                    <td><?= $value['fullname']?></td>
                <?php foreach($list_class as $key => $val){
                    if($val['id'] == $value['class_id']){?>
                    <td value = "<?= $val['id']?>"><?=$val['class_name']?></td>
                    <?php }?>
               <?php }?>
                <?php foreach($list_user as $key => $val){
                    if($val['role_id'] == $value['manager_id']){?>
                    <td value = "<?= $val['role_id']?>"><?=$val['fullname']?></td>
                    <?php }?>
               <?php }?>
                    <td><?= $value['rating_name']?></td>
                    <td><?= $value['comment']?></td>
                    <td><?= $value['created_at']?></td>
                </tr>
           <?php }?>
            </table>
       <?php }?>
    </div>
</body>
</html>