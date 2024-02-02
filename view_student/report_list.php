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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Danh sách báo cáo</title>
</head>
<body>
    <div class="container">
        <?php $count = 1;
        if($list_report)
        {?>
            <table class="table table-bordered table-striped table-hover table-responsive">
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