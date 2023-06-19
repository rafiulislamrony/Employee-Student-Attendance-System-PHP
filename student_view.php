<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>
<script>  
    $(document).ready(function () {
        $("form").submit(function(){
            var roll = true;
            $(':radio').each(function(){
                var name = $(this).attr('name');
                if (roll && !$(':radio[name="'+name+'"]:checked').length){
                    // alert(name + " Roll Missing!");
                    $('.alt').show();
                    roll = false;
                }
            });
            return roll;
        });
    }); 

</script>
<?php
$stu = new Student();
$dt = $_GET['dt'];

// error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $attend = $_POST['attend'];
    $att_update = $stu->updateAttendance($dt, $attend);
}
?>
<?php
if (isset($att_update)) {
    echo $att_update; 
}
?>

<span class='error alt' style="display:none;">Student Attendance Missing...</span>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Student</a>
            <a class="btn btn-info pull-right" href="attendance_view.php">Back</a>
        </h2>
    </div>
    <br>
    <div class="panel-body">
        <br>
        <div class="phed text-center">
            <h4> <strong>Date:
                    <?php echo $dt; ?>
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
                $get_student = $stu->getAlldata($dt);

                if (isset($get_student)) {
                    $i = 0;
                    while ($result = $get_student->fetch_assoc()) {
                        $i++; ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $result['name']; ?>
                            </td>
                            <td>
                                <?php echo $result['roll']; ?>
                            </td>
                            <td>

                                <input type="radio" name="attend[<?php echo $result['roll']; ?>]" value="present" <?php if ($result['attend'] == 'present') {
                                       echo 'checked';
                                   } ?> id="present<?php echo $i + 1; ?>">
                                <label for="present<?php echo $i + 1; ?>">Present</label> ||
                                <input type="radio" name="attend[<?php echo $result['roll']; ?>]" value="absent" <?php if ($result['attend'] == 'absent') {
                                       echo 'checked';
                                   } ?>
                                    id="absent<?php echo "x" . $i + 1; ?>"> <label
                                    for="absent<?php echo "x" . $i + 1; ?>">Absent</label>

                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="4">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include 'inc/footer.php'; ?>