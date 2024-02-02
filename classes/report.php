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
}

?>