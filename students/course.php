<?php
include('./assets/include/functions.php');
if (!isset($_COOKIE['user'])) {
    header('location: index.php');
}
if (getUser($_COOKIE['user']) != "admin") {
    header('location: index.php');
}

$courses = getAllCourses();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    removeCourse($id);
}
?>

<body>
    <?php include('./templates/header.php'); ?>
    <?php include('./templates/admin-sidebar.php'); ?>

    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="container table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Course Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($courses as $course) { ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td class="down"><?php echo $course['course_name'] ?></td>
                                    <td class="down"><?php echo $course['course_duration'] ?></td>
                                    <td>
                                        <a href="edit-course.php?id=<?php echo $course['course_id'] ?>">Edit</a> &nbsp;
                                        <a href="course.php?delid=<?php echo $course['course_id'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>