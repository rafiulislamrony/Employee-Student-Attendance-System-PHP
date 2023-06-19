<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/Database.php');
?>

<?php
class Student
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getStudents()
    {
        $query = "SELECT * FROM tbl_student";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertStudent($name, $roll)
    {
        $name = mysqli_real_escape_string($this->db->link, $name);
        $roll = mysqli_real_escape_string($this->db->link, $roll);

        if (empty($name) || empty($roll)) {
            $message = "<span class='error'>Field Must not be Empty.</span>";
            return $message;
        } else {
            $query = "INSERT INTO tbl_student(name, roll) VALUES('$name','$roll')";
            $result = $this->db->insert($query);

            $aquery = "INSERT INTO tbl_attendance(roll) VALUES('$roll')";
            $result = $this->db->insert($aquery);

            if ($result) {
                $message = "<span class='success'>Data Inserted Successfully.</span>";
                return $message;
            } else {
                $message = "<span class='error'>Data not Inserted.</span>";
                return $message;
            }
        }
    }
 

    public function insertAttendance($date, $attend = array())
    {
        $query = "SELECT DISTINCT attend_time FROM tbl_attendance";
        $getData = $this->db->select($query);

        while ($result = $getData->fetch_assoc()) {
            $dbDate = $result['attend_time'];
            if ($date == $dbDate) {
                $message = "<span class='error'>Attendance  Already taken today.</span>";
                return $message;
            }
        }

        foreach ($attend as $atnkey => $atnvalue) {
            if ($atnvalue == 'present') {
                $stu_query = "INSERT INTO tbl_attendance(roll, attend, attend_time) VALUES('$atnkey','present', now())";
                $dataInsert = $this->db->insert($stu_query);
            } else if ($atnvalue == 'absent') {
                $stu_query = "INSERT INTO tbl_attendance(roll, attend, attend_time) VALUES('$atnkey','absent', now())";
                $dataInsert = $this->db->insert($stu_query);
            }
        } 

        if ($stu_query) {
            $message = "<span class='success'>Data Inserted Successfully.</span>";
            return $message;
        } else {
            $message = "<span class='error'>Data not Inserted.</span>";
            return $message;
        }
    }

    public function getDateList(){
        $query = "SELECT DISTINCT attend_time FROM tbl_attendance";
        $result = $this->db->select($query);
        return $result;

    }
 
}

?>