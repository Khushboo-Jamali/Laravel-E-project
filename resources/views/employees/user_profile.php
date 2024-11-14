<?php include "header.php"; ?>


<style>
    .input-box {
        position: relative;
    }


    .input-box i {
        position: absolute;
        right: 20px;
        /* Adjust as needed */
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
        color: #463e4b;
        /* Adjust color as needed */
    }
</style>
<section class="section profile">
    <div class="row">
        <?php

        include "config.php";
        $id = $_SESSION['userId'];
        $sel = "SELECT * FROM employees WHERE employee_id = '$id'";
        $res = mysqli_query($conn, $sel);

        while ($data = mysqli_fetch_array($res)) {
            $_SESSION['userId'] = $data['employee_id'];
            $_SESSION['userpic'] = $data['pic'];
            $_SESSION['firstname'] = $data['first_name'];
            $_SESSION['lastname'] = $data['last_name'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['email'] = $data['email'];


        ?>
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?php echo $_SESSION['userpic'] ?>" alt="Profile" class="rounded-circle">
                        <h2><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></h2>

                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview " id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['firstname'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['lastname'] ?></div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['phone'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'] ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="function.php" method="post" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="<?php echo $_SESSION['userpic'] ?>" class="rounded-circle" alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" name="img" class="btn btn-primary btn-sm" title="Upload new profile image">
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['userId'] ?>">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fname" type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['firstname'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lname" type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['lastname'] ?>">
                                        </div>
                                    </div>






                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $_SESSION['phone'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="<?php echo $_SESSION['email'] ?>">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <a href="function.php?user=<?php echo $_SESSION['userId'] ?>">
                                            <button type="submit" name="up_emp" class="btn btn-primary">Save Changes</button>
                                        </a>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <?php
                            if (isset($_POST['change_pass'])) {

                                $id = $_POST['usersid'];
                                $currentpass = $_POST['password'];
                                $newpass = md5($_POST['newpassword']);
                                $Cpass = md5($_POST['cpassword']);
                                $sql = "SELECT password FROM employees WHERE employee_id = '$id'";
                                $res = mysqli_query($conn, $sql);

                                if ($res) {
                                    $data = mysqli_fetch_assoc($res);

                                    if ($data && $data['password'] === md5($currentpass)) {
                                        if ($Cpass === $newpass) {
                                            $updateSql = "UPDATE employees SET password='$newpass' WHERE employee_id='$id'";
                                            if (mysqli_query($conn, $updateSql)) {
                                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong>Password changed successfully!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>';
                                            } else {
                                                echo "Error updating password: " . mysqli_error($conn);
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  <strong>Error!</strong>New password and confirm password do not match
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                             <strong>Error!</strong>Enter the correct current password
                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                             </div>';
                                    }
                                } else {
                                    echo "Error fetching customer data: " . mysqli_error($conn);
                                }
                            }

                            ?>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="" method="post">
                                    <div class="row mb-3 ">
                                        <input type="hidden" name="usersid" value='<?php echo $data['employee_id'] ?>' />
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9 input-box">

                                            <input name="password" type="password" required class="form-control" id="currentpassword">
                                            <i class="bi bi-eye-slash-fill" id="currenteyeIcon"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9 input-box">
                                            <input name="newpassword" type="password" class="form-control" required id="newPassword">

                                            <i class="bi bi-eye-slash-fill" id="eyeIcon2"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-md-8 col-lg-9 input-box">
                                            <input name="cpassword" type="password" class="form-control" required id="cpassword">
                                            <i class="bi bi-eye-slash-fill" id="eyeIcon3"></i>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href='admin_profile.php?pass=<?php echo $data['employee_id'] ?>'>
                                            <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
                                        </a>
                                    </div>
                                </form>

                                <!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
    </div>
</section>
<?php

        }
?>
<script src="./assets/js/main.js"></script>
<script>
    document.getElementById("currenteyeIcon").addEventListener("click", function() {
        var passwordInput = document.getElementById("currentpassword");
        var eyeIcon = document.getElementById("currenteyeIcon");

        if (passwordInput.type === "password") {

            passwordInput.type = "text";
            eyeIcon.classList.remove("bi-eye-slash-fill");
            eyeIcon.classList.add("bi-eye-fill");

        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bi-eye-fill");
            eyeIcon.classList.add("bi-eye-slash-fill");


        }
    });

    document.getElementById("eyeIcon2").addEventListener("click", function() {
        var passwordInput = document.getElementById("newPassword");
        var eyeIcon = document.getElementById("eyeIcon2");

        if (passwordInput.type === "password") {

            passwordInput.type = "text";
            eyeIcon.classList.remove("bi-eye-slash-fill");
            eyeIcon.classList.add("bi-eye-fill");

        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bi-eye-fill");
            eyeIcon.classList.add("bi-eye-slash-fill");


        }
    });

    document.getElementById("eyeIcon3").addEventListener("click", function() {
        var passwordInput = document.getElementById("cpassword");
        var eyeIcon = document.getElementById("eyeIcon3");

        if (passwordInput.type === "password") {

            passwordInput.type = "text";
            eyeIcon.classList.remove("bi-eye-slash-fill");
            eyeIcon.classList.add("bi-eye-fill");

        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bi-eye-fill");
            eyeIcon.classList.add("bi-eye-slash-fill");


        }
    });
</script>

<?php include "footer.php"; ?>