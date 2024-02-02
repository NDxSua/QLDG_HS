<?php   
    include './classes/user.php';

    $user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $user->login($username, $password);
    }

    session_start();

    if (isset($_SESSION['message']))
    {
        echo '<script>alert("' . $_SESSION['message'] . '")</script>';
        unset($_SESSION['message']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <div>
        <table>
            <div>
                <a href="./view_student/">Báo cáo</a>
                <a href="#">Bảng điểm thi đua</a>
                <a href="./login.php">Đăng nhập</a>
            </div>
        </table>
    </div><br/>
    <div>
        <div>
            <form action="login.php" method="POST">
                <?php
                    if(isset($login))
                    {
                        echo '<script>alert("' . $login . '")</script>';
                    }
                ?>
                <input type="text" name="username" placeholder="Tên đăng nhập"/>
                <input type="text" name="password" placeholder="Mật khẩu"/>
                <input type="submit" value="Đăng nhập"/>
            </form>
        </div>
    </div>
</body>
</html>