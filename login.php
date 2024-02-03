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
    <link rel="stylesheet" href="./css/style.css"/>
    <title>Đăng nhập</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div>
        <div class="login">
            <form action="login.php" method="POST">
                <?php
                    if(isset($login))
                    {
                        echo '<script>alert("' . $login . '")</script>';
                    }
                ?>
                <h1>Đăng nhập</h1>
                <div class="login-input">
                    <input type="text" name="username" placeholder="Tên đăng nhập"/>
                </div>
                <div class="login-input">
                    <input type="text" name="password" placeholder="Mật khẩu"/>
                </div>
                <button type="submit" class="btn">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>