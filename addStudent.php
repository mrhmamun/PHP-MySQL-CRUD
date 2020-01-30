<?php
require "vendor/autoload.php";
use App\classes\Student;
$message="";
$student = new Student();
if(isset($_POST['btn'])){
    $message = $student->addStudent();
}

?>
<hr>
    <a href="addStudent.php">Add Student</a> ||
    <a href="viewStudent.php">View Student</a>
<hr>

<h3 style="color: green"><?php echo $message; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="image_file"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Add Student"></td>
        </tr>
    </table>
</form>
