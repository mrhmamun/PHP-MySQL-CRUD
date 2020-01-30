<?php
require "vendor/autoload.php";
use App\classes\Student;

$student = new Student();
$queryResult = $student->getStudentInfo();

if(isset($_GET['delete'])){
    $student->deleteStudentInfo($_GET['id']);
}

if(isset($_POST['btn'])){
    $queryResult = $student->searchStudentInfo();
}

//if(isset($_GET['message'])){
// echo   $_GET['message'];
//}
?>
<hr>
    <a href="addStudent.php">Add Student</a> ||
    <a href="viewStudent.php">View Student</a>
<hr>
<form action="" method="post">
    <tr>
        <td>Search:</td>
        <td><input type="text" name="search_text"></td>
        <td><button type="submit" name="btn">Search</button></td>
    </tr>
</form>
<!--<h3> echo $_GET['message'] ?></h3>-->
<?php
if(isset($_GET['message'])){
        echo   "<h3>".$_GET['message']."</h3>";
}
?>
<table border="1" width="500">
    <tr>
        <th>Sl.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone No.</th>
        <th>Action</th>
    </tr>
    <?php $i = 1 ?>
    <?php while($students = mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $students['name']; ?></td>
        <td><?php echo $students['email']; ?></td>
        <td><?php echo $students['address']; ?></td>
        <td><?php echo $students['phone']; ?></td>
        <td><img src="<?php echo $students['image_file']; ?>" height="50"></td>
        <td>
            <a href="editStudent.php?id=<?php echo $students['id']; ?>">Edit</a>||
            <a href="?delete&id=<?php echo $students['id']; ?>" onclick="return confirm('Are you sure to delete data?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
