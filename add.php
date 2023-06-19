<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>

<?php
$stu = new Student();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $insertdata = $stu->insertStudent($name, $roll);
}
?>

<?php 
if(isset($insertdata)){
    echo $insertdata; 
}
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h2> 
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
    </div>

    <div class="panel-body">

        <form action="" method="post">
            <br>
            <div class="form-group">
                <h6><label for="name">Student Name</label></h6>
                <input class="form-control" type="text" name="name" placeholder="Enter Student Name" id="name">
            </div>
            <br>
            <div class="form-group">
                <h6><label for="roll">Student Roll</label></h6>
                <input class="form-control" type="text" name="roll" placeholder="Enter Student Roll" id="roll">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
            </div>
            <br>

        </form>



    </div>
</div>

<?php include 'inc/footer.php'; ?>