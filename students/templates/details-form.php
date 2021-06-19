<div class="content-container">
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <div class="row justify-content-center">
                    <form action="/templates/details-form.php" method="POST">
                        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Edit Details</h1>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $student['name']; ?>">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $student['email']; ?>">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $student['phone']; ?>">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <select class="form-select" name="course" aria-label="Default select example">
                                        <?php foreach ($courses as $course) { ?>
                                            <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div> -->
                            <div class="row justify-content-start mt-4">
                                <div class="col">
                                    <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                                    </label>
                                </div> -->
                                    <input type="submit" name="submit" value="Save Changes" class="btn btn-primary mt-4">
                                    <!-- <button class="btn btn-primary mt-4">Submit</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>