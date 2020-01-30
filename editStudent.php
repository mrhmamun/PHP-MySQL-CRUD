<?php
require "vendor/autoload.php";
use App\classes\Student;

$student = new Student();
$queryResult = $student->getStudentInfoById($_GET['id']);
$data = mysqli_fetch_assoc($queryResult);
//echo "<pre>";
//print_r($data);
if(isset($_POST['btn'])){
    $student->updateStudentInfo();
}

?>
<!--<hr>-->
<!--<a href="addStudent.php">Add Student</a> ||-->
<!--<a href="viewStudent.php">View Student</a>-->
<!--<hr>-->

<!--<h3 style="color: green">--><?php //echo $message; ?><!--</h3>-->
<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $data['name'] ?>"></td>
            <td><input type="hidden" name="id" value="<?php echo $data['id'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $data['email'] ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $data['address'] ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo $data['phone'] ?>"></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image_file" value=""></td>
            <td><img src="<?php echo $data['image_file'] ?>" height="100"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="btn">Update Student</button></td>
        </tr>
    </table>
</form>
