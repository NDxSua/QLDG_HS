<?php
    include '../classes/report.php';
    include '../classes/class.php';

    $report = new report();
    $classes = new classes();

    $list_report = $report->reportList();
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
    <title>Danh sách báo cáo</title>
</head>
<body>
    <div>
        <table>
            <div>
                <a href="./report_list.php">Quản lý báo cáo</a>
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
    </div><br/>
    <div class="container">
        <?php $count = 1;
        if($list_report){?>
        <table class="table table-bordered table-striped table-hover table-responsive">
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Loại</th>
                <th>Nhận xét</th>
                <th>Ngày tạo</th>
            </tr>
        <?php foreach($list_report as $key => $val){?>
            <tr>
                <td><?= $count++?></td>
                <td><?= $val['fullname']?></td>
                <td><?= $val['class_name']?></td>
                <td><?= $val['rating_name']?></td>
                <td><?= $val['comment']?></td>
                <td><?= $val['created_at']?></td>
            </tr>
       <?php }?>    
        </table>
      <?php }?>
    </div>
</body>
</html>