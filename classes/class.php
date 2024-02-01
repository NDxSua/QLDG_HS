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
}

?>