<?php
    include '../classes/report.php';
    include '../classes/class.php';

    $report = new report();
    $classes = new classes();
    $pageCount = $report->getCountPaging();
    $list_report = $report->reportList(isset($_GET['page']) ? $_GET['page'] : 1);
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
                <a class="nav-link" href="#">Quản lý báo cáo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Thống kê</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Thông tin cá nhân</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Đăng xuất</a>
            </li>
        </ul>
    </div>
</nav><br/>
    <div class="container">
        <?php $count = 1;
        if($list_report){?>
        <table class="table table-bordered table-striped table-hover">
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
        <div style="text-align: center;">
            <a href="./report_list.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>">&laquo;</a>
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                if (isset($_GET['page'])) {
                    if ($i == $_GET['page']) { ?>
                        <a href="./report_list.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php } else { ?>
                        <a href="./report_list.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  }
                } else {
                    if ($i == 1) { ?>
                        <a href="./report_list.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  } else { ?>
                        <a href="./report_list.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php   } ?>
                <?php  } ?>
            <?php }
            ?>
            <a href="./report_list.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>">&raquo;</a>
        </div>
    </div>
</body>
</html>