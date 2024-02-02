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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Cập nhật mật khẩu</title>
</head>
<body>
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
                <input type="submit" class="btn btn-success" name="submit" value="Lưu"/><span> / </span>
                <a href="info.php">Quay lại</a>
            </form>
        </div>
    </div>
</body>
</html>