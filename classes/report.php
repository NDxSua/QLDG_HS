<?php   
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath . '/../lib/session.php');
    include_once($filepath . '/../lib/database.php');
?>

<?php
class report
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getReportByUser($id)
    {
        $query =
        "SELECT report.id as report_id, user.id as user_id, class_id, fullname, manager_id, rating_name, comment, created_at
        FROM rating INNER JOIN report ON rating.id = report.rating_id INNER JOIN user on report.user_id = user.id
        WHERE user.id = '$id'";
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

    public function reportList($page = 1, $total = 10)
    {
        if($page <= 0)
        {
            $page = 1;
        }
        $tmp = ($page -1) * $total;   
        $manager_id = Session::get('role_id');

        $query ="SELECT report.id, fullname, class_name, rating_name, comment, created_at
        FROM class INNER JOIN user ON class.id = user.class_id INNER JOIN report ON user.id = report.user_id INNER JOIN rating ON report.rating_id = rating.id
        WHERE manager_id = '$manager_id'
        GROUP BY report.id ASC
        LIMIT $tmp, $total";
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

    public function getCountPaging($row = 10)
    {
        $manager = Session::get('role_id');
        $query = "SELECT COUNT(*) FROM report INNER JOIN user ON report.user_id = user.id WHERE manager_id = '$manager'";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $totalrow = intval((mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC)[0])['COUNT(*)']);
            $result = ceil($totalrow / $row);
            return $result;
        }
        return false;
    }
}

?>