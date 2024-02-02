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

    public function update_pass($data)
    {
        $id = Session::get('user_id');
        $old_pass = $data['old_pass'];
        $new_pass = $data['new_pass'];
        if(empty($old_pass))
        {
            $alert = "Vui lòng nhập mật khẩu cũ!";
            return $alert;
        }
        else
        {
            $query = "SELECT * FROM user WHERE id = '$id' AND password = '$old_pass'";
            $result = $this->db->select($query);
            if(!$result)
            {
                $alert = "Mật khẩu cũ không chính xác!";
                return $alert;
            }
            else if($old_pass == $new_pass)
            {
                $alert = "Mật khẩu mới giống mật khẩu cũ";
                return $alert;
            }
            else
            {
                $update = "UPDATE user SET
                            password = '$new_pass'
                            WHERE id = '$id'";
                $result_sql = $this->db->update($update);
                if($result_sql)
                {
                    $alert = "Cập nhật mật khẩu thành công!";
                    return $alert; 
                }
                else
                {
                    $alert = "Cập nhật mật khẩu thất bại!";
                    return $alert; 
                }
            }
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM user";
        $mysqli_result = $this->db->select($query);
        if($mysqli_result)
        {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        else
        {
            return false;
        }
    }
}

?>