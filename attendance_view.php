<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?> 
 
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Student</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
    </div>
<br>
    <div class="panel-body"> 
        <form action="" method="post">
            <table class="table table-striped">
                <tr>
                    <th>Serial</th>
                    <th>Attendance Date</th> 
                    <th>Action </th>
                </tr>

                <?php
                $stu = new Student();

                $get_date = $stu->getDateList();

                if (isset($get_date)) {
                    $i = 0;
                    while ($result = $get_date->fetch_assoc()) {
                        $i++; ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td> 
                            <td>
                                <?php echo $result['attend_time']; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="student_view.php?dt=<?php echo $result['attend_time']; ?>">View</a>
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