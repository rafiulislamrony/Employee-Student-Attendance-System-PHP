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

            if($result){
                $message = "<span class='success'>Data Inserted Successfully.</span>";
                return $message;
            }else{
                $message = "<span class='error'>Data not Inserted.</span>";
                return $message;
            }
        }
    }

}

?>