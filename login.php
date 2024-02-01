<?php   
    include './classes/user.php';

    $user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $user->login($username, $password);
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
        <div>
            <form action="login.php" method="POST">
                <?php
                    if(isset($login))
                    {
                        echo $login;
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