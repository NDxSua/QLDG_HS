<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath . '/../lib/session.php');
    include_once($filepath . '/../lib/database.php');
?>

<?php
class classes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getAll()
    {
        $query = "SELECT * FROM class";
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
    public function getClassbyTeacher()
    {
        $manager = Session::get('role_id');
        $query = "SELECT class.id, class_name
                FROM class INNER JOIN user ON class.id = user.class_id
                WHERE manager_id = '$manager'
                GROUP BY class.id";
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