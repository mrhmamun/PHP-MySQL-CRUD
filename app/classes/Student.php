<?php
namespace App\classes;

class Student
{
    public function addStudent(){
        $directory = 'images/';
        $imageUrl = $directory.$_FILES['image_file']['name'];
        $fileType = pathinfo($_FILES['image_file']['name'],PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['image_file']['tmp_name']);
        if($check){
            if($fileType != "jpg" && $fileType!="png"){
                die('File type is not supported. Please upload a jpg or png file');
            } else {
                if(file_exists($imageUrl)){
                    die('This image already exists. Please select another one.');
                } else {
                    if($_FILES['image_file']['size'] > 2000000){
                        die('Image file size too large');
                    } else {
                        move_uploaded_file($_FILES['image_file']['tmp_name'],$imageUrl);
                        $link = mysqli_connect('localhost','root','','demo');
                        $sql = "INSERT INTO students (name,email,address,phone,image_file) VALUES ('$_POST[name]','$_POST[email]','$_POST[address]','$_POST[phone]','$imageUrl')";

                        if(mysqli_query($link,$sql)){
                            return "Student Info Added Successfully";
                        } else {
                            die("Query Problem".mysqli_error($link));
                        }
                    }
                }
            }
        } else {
            die('Please choose a image file.');
        }


    }

    public function getStudentInfo(){
        $link = mysqli_connect('localhost','root','','demo');
        $sql = "SELECT * FROM students";

        if($queryResult = mysqli_query($link,$sql)){
//            $students = mysqli_fetch_assoc($queryResult);
            return $queryResult;
        } else {
            die("Query Problem".mysqli_error($link));
        }
    }

    public function getStudentInfoById($id){
        $link = mysqli_connect('localhost','root','','demo');
        $sql = "SELECT * FROM students WHERE id = '$id'";
        if($queryResult = mysqli_query($link,$sql)){
            return $queryResult;
        } else {
            die("Query Problem".mysqli_error($link));
        }
    }

    public function updateStudentInfo(){
        $link = mysqli_connect('localhost','root','','demo');
        $sql = "UPDATE students SET name = '$_POST[name]', email = '$_POST[email]', address = '$_POST[address]', phone = '$_POST[phone]' WHERE id = '$_POST[id]'";
        if(mysqli_query($link,$sql)){
//            return "Student info updated successfully";
            header('Location:viewStudent.php?message=Student Updated Successfully');
        } else {
            die("Query Problem".mysqli_error($link));
        }
    }

    public function deleteStudentInfo($id){
        $link = mysqli_connect('localhost','root','','demo');
        $sql = "DELETE FROM students WHERE id = '$id'";
        if(mysqli_query($link,$sql)){
//            return "Student info updated successfully";
            header('Location:viewStudent.php?message=Student Updated Successfully');
        } else {
            die("Query Problem".mysqli_error($link));
        }
    }

    public function searchStudentInfo(){
        $link = mysqli_connect('localhost','root','','demo');
        $sql = "SELECT * FROM students WHERE name LIKE '%$_POST[search_text]%' OR email LIKE '%$_POST[search_text]%' OR address LIKE '%$_POST[search_text]%' OR phone LIKE '%$_POST[search_text]%'";
        if($queryResult = mysqli_query($link,$sql)){
            return $queryResult;
        } else {
            die("Query Problem".mysqli_error($link));
        }
    }
}