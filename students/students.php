<?php
include('./assets/include/functions.php');
if (!isset($_COOKIE['user']) || getUser($_COOKIE['user']) != "admin") {
    header('Location: index.php');
}
$students = getAllStudents();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];

    removeStudent($id);
}
?>

<?php include('./templates/header.php'); ?>
<?php include('./templates/admin-sidebar.php') ?>

<div class="content-container">
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container table-responsive py-5">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count=1;?>
                    <?php foreach($students as $student){?>
                        <tr>
                            <th scope="row"><?php echo $count++?></th>
                            <td class="down"><?php echo $student['name']?></td>
                            <td class="down"><?php echo $student['email']?></td>
                            <td class="down"><?php echo $student['phone']?></td>
                            <td class="down"><?php echo $student['course']?></td>
                            <td>
                                <a href="edit-student.php?id=<?php echo $student['id']?>">Edit</a> &nbsp;
                                <a href="students.php?delid=<?php echo $student['id']?>">Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>