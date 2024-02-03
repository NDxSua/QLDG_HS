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
                <a href="./report_list.php">Danh sách báo cáo</a>
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