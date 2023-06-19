<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>

<?php
$stu = new Student();
$current_date = date('Y-m-d');

error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attend = $_POST['attend']; 
    $insertAttendance  = $stu->insertAttendance($current_date, $attend);
} 
?>

<?php 
if(isset($insertAttendance)){
    echo $insertAttendance;  
}
?>
 
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Student</a>
            <a class="btn btn-info pull-right" href="attendance_view.php">View All</a>
        </h2>
    </div>

    <div class="panel-body">
        <br>
        <div class="phed text-center">
            <h4> <strong>Date:
                    <?php echo $current_date; ?>
                </strong>
            </h4>
        </div>
        <br>

        <form action="" method="post">
            <table class="table table-striped">
                <tr>
                    <th width="25%">Serial</th>
                    <th width="25%">Student Name</th>
                    <th width="25%">Student Roll</th>
                    <th width="25%">Attendance </th>
                </tr>

                <?php
                $getStudent = $stu->getStudents();
                if (isset($getStudent)) {
                    $i = 0;
                    while ($result = $getStudent->fetch_assoc()) {
                        $i++; ?> 
                        <tr>
                            <td><?php echo $i ;?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['roll'];?></td>
                            <td>
                                <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="present" id="present<?php echo $i+1;?>"> <label
                                    for="present<?php echo $i+1;?>">Present</label> ||
                                <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="absent" id="absent<?php echo "x". $i+1;?>"> <label for="absent<?php echo "x". $i+1;?>">Absent</label>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
                <tr>
                    <td colspan="4">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include 'inc/footer.php'; ?>