<?php
include("config.php");

function login($email, $password)
{
    global $conn;

    $email_pattern = "/^([a-z\d\.-]+)@([a-z\d]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/";
    if (preg_match($email_pattern, $email) == 0) {
        return "Email is not valid";
    }
    $emailValue = $email;
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $result = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0) {
        setcookie("user", $result['id'], time() + (20 * 60 * 60 * 7));
        if ($result['isAdmin'] == 1) {
            header('location: students.php');
        } else {
            header('location: single-student.php');
        }
    } else {
        return "Invalid  Email or Password";
    }
}

function getUser($id)
{
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $result = mysqli_fetch_assoc($query);

    if ($result['isAdmin'] == 1) {
        return "admin";
    } else {
        return "student";
    }
}

function getAllStudents()
{
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM users WHERE isAdmin=0");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
}

function getOneStudent($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    return $result;
}

function removeStudent($id)
{
    global $conn;

    $sql = "DELETE FROM users WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location: students.php');
    } else {
        echo "<script>alert('Some Error')</script>";
    }
}

function getAllCourses()
{
    global $conn;

    $sql = "SELECT * FROM course";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
}

function editStudentInfo($id, $name, $email, $phone, $course)
{
    global $conn;

    $query = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', phone='$phone', course='$course'");
    if ($query && getUser($_COOKIE['user'] == "admin")) {
        header('location: students.php');
    } elseif ($query && getUser($_COOKIE['user'] == "student")) {
        header('location: single-student.php');
    } else {
        echo "<script>alert('Some Error')</script>";
    }
}

function addNewStudent($name, $email, $password, $phone, $course){
    global $conn;

    if(empty($name) || empty($email) || empty($password) || empty($phone) || $course == "none"){
        return "Invalid Attempt";
    }
    $email_pattern = "/^([a-z\d\.-]+)@([a-z\d]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/";

    if (preg_match($email_pattern, $email) == 0) {
        return "Email is not valid";
    }

    $sql = "INSERT INTO users (name, email, password, phone, course) VALUES ('$name','$email','$password','$phone', '$course')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: students.php');
    } else{
        echo "<script>alert('Some error')</script>";
    }
}

function removeCourse($id){
    global $conn;

    $query = mysqli_query($conn, "DELETE FROM course WHERE course_id='$id'");
    if($query){
        header('location: course.php');
    } else{
        echo "<script>alert('Some Error')</script>";
    }
}

function getOneCourse($id){
    global $conn;

    $sql = "SELECT * FROM course WHERE course_id='$id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    return $result;

}

function updateCourse($id, $name, $duration){
    global $conn;

    $query = mysqli_query($conn, "UPDATE course SET course_name='$name', course_duration='$duration'");
    if($query){
        header('location: course.php');
    } else{
        echo "<script>alert('Some Error')</script>";
    }
}

function addCourse($name, $duration){
    global $conn;
    
    $query = mysqli_query($conn, "INSERT INTO course (course_name, course_duration) VALUES ('$name','$duration')");
    if($query){
        header('location: course.php');
    } else{
        echo "<script>alert('Some Error')</script>";
    }
}

function logout()
{
    setcookie("user", "", time() - (20 * 60 * 60 * 7));
    header('location: index.php');
}
