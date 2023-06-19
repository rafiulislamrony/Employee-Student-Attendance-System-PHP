<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/Database.php'); 

?>


<?php
class Student
{
    private $db;
    public function __construct()
    {
        $this->db =new Database();
    }

    public function getStudents(){
        $query = "SELECT * FROM tbl_student";
        $result = $this->db->select($query);
        return $result; 
    }

}

?>