<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee/Student Attendance System PHP</title>
    <link rel="stylesheet" href="inc/boostrap.min.css">
    <script src="inc/jquery.min.js"></script>
    <script src="inc/boostrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="well text-center">
            <h2>Employee/Student Attendance(Roll Call) System PHP</h2>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a class="btn btn-success" href="add.php">Add Student</a>
                    <a class="btn btn-info pull-right" href="">View All</a>
                </h2>
            </div>
          
            <div class="panel-body">
                <div class="well text-center">
                <h4> <strong>Date: <?php $current_date = date('Y-m-d'); echo $current_date; ?></strong>    </h4>
                </div>

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
                                <input type="radio" name="attend" value="present" id="present"> <label for="present">Present</label> ||
                                <input type="radio" name="attend" value="absent" id="absent"> <label for="absent">Absent</label> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" >
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="well">
            <h3>Copyright © 2023. All rights reserved.</h3>
        </div>
    </div>
</body>

</html>