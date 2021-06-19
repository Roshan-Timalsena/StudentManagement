<?php
include('./assets/include/functions.php');
if (!isset($_COOKIE['user'])) {
    header('location: index.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = getOneStudent($id);
}
$courses = getAllCourses();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    editStudentInfo($_GET['id'], $name, $email, $phone, $course);
}
$style = "display:none;";
?>

<?php include('./templates/header.php'); ?>

<body>
    <?php if (getUser($_COOKIE['user']) == "admin") { ?>
        <?php include('./templates/admin-sidebbar.php'); ?>
    <?php } ?>
    <?php if (getUser($_COOKIE['user']) == "student") { ?>
        <?php include('./templates/student-sidebar.php'); ?>
    <?php } ?>
    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="container">
                    <div class="row justify-content-center">
                        <form action="edit-student.php?id=<?php echo $id; ?>" method="POST">
                            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                                <div class="row">
                                    <div class="col text-center">
                                        <h1>Edit Details</h1>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $student['name'] ?? ""; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $student['email'] ?? ""; ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $student['phone'] ?? ""; ?>">
                                    </div>
                                </div>
                                <?php if (getUser($_COOKIE['user']) == "admin") { ?>
                                    <div class="row align-items-center mt-4">
                                        <div class="col">
                                            <select class="form-select" name="course" aria-label="Default select example">
                                                <?php foreach ($courses as $course) { ?>
                                                    <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (getUser($_COOKIE['user']) == "student") { ?>
                                    <div class="row align-items-center mt-4" style="<?php echo $style ?>">
                                        <div class="col">
                                            <select class="form-select" name="course" aria-label="Default select example">
                                                <?php foreach ($courses as $course) { ?>
                                                    <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
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