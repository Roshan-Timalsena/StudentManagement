<?php
    include "./assets/include/functions.php";

    if(isset($_COOKIE['user'])){
        if(getUser($_COOKIE['user']) == "admin"){
            header('location: students.php');
        } else{
            header('location: single-student.php');
        }
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = login($email, $password);
    }
?>
<body class="px-4">

    <?php include('templates/header.php'); ?>

    <div class="container" style="margin-top:25px;">
        <form method="POST" action="index.php">
            <h2>Login</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" style="margin-left: 100%;">Email</label>
                        <input type="email" style="margin-left: 50%;" name="email" value="<?php echo $email ?? "";?>" class="form-control" placeholder="Email" id="email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" style="margin-left: 100%;">Password</label>
                        <input type="password" style="margin-left: 50%;" value="<?php echo $password ?? "";?>"  name="password" class="form-control" placeholder="Password" id="password">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        <!-- <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 25px;">Login</button> -->
        </form>
        <a href="register.php">Register Here</a>
        <p style="color: red;"><?php echo $error ?? "";?></p>
    </div>


    <?php include('templates/footer.php'); ?>

</body>

</html>