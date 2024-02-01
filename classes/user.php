<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../lib/database.php');
?>

<?php
class user
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        if(empty($username) || empty($password))
        {
            $alert = "Tên đăng nhập và mật khẩu không được để trống!";
            return $alert;
        }
        else
        {
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = $this->db->select($query);
            if($result)
            {
                $value = $result->fetch_assoc();
                Session::set('user', $value['fullname']);
                Session::set('user_id', $value['id']);
                Session::set('role_id', $value['role_id']);
                Session::set('class', $value['class_id']);
                if($value['role_id'] == '1')
                {
                    header("Location: ./view_student/index.php");
                }
                else
                {
                    header("Location: ./view_teacher/index.php");
                }
            }
            else
            {
                $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
                return $alert;
            }
        }
    }

    public function getinfor($id)
    {
        $query = "SELECT * FROM user WHERE id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
}

?>