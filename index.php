<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Student</a>
            <a class="btn btn-info pull-right" href="">View All</a>
        </h2>
    </div>

    <div class="panel-body">
        <br>
        <div class="phed text-center">
            <h4> <strong>Date:
                    <?php $current_date = date('Y-m-d');
                    echo $current_date; ?>
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
                <tr>
                    <td>01</td>
                    <td>Ariful</td>
                    <td>1</td>
                    <td>
                        <input type="radio" name="attend" value="present" id="present"> <label
                            for="present">Present</label> ||
                        <input type="radio" name="attend" value="absent" id="absent"> <label for="absent">Absent</label>
                    </td>
                </tr>
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