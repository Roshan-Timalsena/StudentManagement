<?php
include "./assets/include/functions.php";
$courses = getAllCourses();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $new = addNewStudent($name,$email,$password,$phone,$course);
}
?>

<body>
    <?php include('./templates/header.php'); ?>

    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="container">
                    <div class="row justify-content-center">
                        <form action="register.php" method="POST">
                            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                                <div class="row">
                                    <div class="col text-center">
                                        <h1>Register Here</h1>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phone ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <select class="form-select" name="course" aria-label="Default select example">
                                            <option value="none">Choose A Course</option>
                                            <?php foreach ($courses as $course) { ?>
                                                <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4">
                                    <div class="col">
                                        <input type="submit" name="submit" value="Enroll" class="btn btn-primary mt-4">
                                    </div>
                                </div>
                            </div>
                            <p style="color: red; margin-left:20px; margin-top:10px;"><?php echo $new ?? ""; ?></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>