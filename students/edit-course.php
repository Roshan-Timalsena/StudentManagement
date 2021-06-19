<?php
include('./assets/include/functions.php');
if (!isset($_COOKIE['user'])) {
    header('location: index.php');
}
if (getUser($_COOKIE['user']) != "admin") {
    header('location: index.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $course = getOneCourse($id);
}
if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $duration = $_POST['duration']; 
    updateCourse($_GET['id'], $name, $duration);
}
?>

<body>
    <?php include('./templates/header.php'); ?>
    <?php include('./templates/admin-sidebar.php'); ?>

    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="container">
                    <div class="row justify-content-center">
                        <form action="edit-course.php?id=<?php echo $id; ?>" method="POST">
                            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                                <div class="row">
                                    <div class="col text-center">
                                        <h1>Edit Course Details</h1>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <input type="text" name="name" class="form-control" placeholder="Course Name" value="<?php echo $course['course_name'] ?? ""; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="duration" class="form-control" placeholder="Course Duration" value="<?php echo $course['course_duration'] ?? ""; ?>">
                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4">
                                    <div class="col">
                                        <input type="submit" name="submit" value="Save Changes" class="btn btn-primary mt-4">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>