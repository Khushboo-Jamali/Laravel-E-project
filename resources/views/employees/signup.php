<?php

include "config.php";
if (isset($_POST["signup"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = md5($_POST['password']);
    $contact = $_POST['phone'];

    $img_name = $_FILES["img"]["name"];
    $tmp_name = $_FILES["img"]["tmp_name"];
    $type = $_FILES["img"]["type"];
    $size = $_FILES["img"]["size"];
    $error = $_FILES["img"]["error"];
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $file_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    if (in_array($file_ext, $allowed_types)) {
        if ($size <= 2 * 1024 * 1024) {
            if ($error === 0) {
                $newName = uniqid('', true) . $file_ext;
                $folder = "images/" . $newName;
                move_uploaded_file($tmp_name, $folder);
                $stmt = $conn->prepare("INSERT INTO customers (first_name,last_name, email, password, phone, pic) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssss", $fname, $lname, $email, $password, $contact,  $folder);

                if ($stmt->execute()) {
                    header("Location: signup.php?msg=signup-successfully");
                    exit();
                } else {
                    header("Location:signup.php?msg=error!");
                    exit();
                }
                $stmt->close();
            } else {
                echo "error uploading file";
            }
        } else {
            echo "file size is not valid";
        }
    } else {
        echo "invalid file type!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Online Shop SignUp </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="images/logo.png" rel="icon">
    <link href="./images/logo2.png" rel="images/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Apr 20 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
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
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 p-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Add New Employee Account</h5>
                                        <!-- <p class="text-center small">Fill This Form</p> -->
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" enctype='multipart/form-data' novalidate>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId" placeholder="First Name" required />
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="lname" id="" aria-describedby="helpId" placeholder="Last Name" required />
                                        </div>

                                        <div class="col-12">
                                            <!-- <label for="yourUsername" class="form-label">Email</label> -->
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="yourUsername" placeholder="Email" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="mb-3 my-4">
                                            <input type="number" class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="Phone Number" required />
                                        </div>

                                        <div class="input-box my-3">
                                            <input type="password" class="form-control" name="password" required id="Password" placeholder="Password" />
                                            <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                                        </div>



                                        <div class="mb-3">
                                            <label for="" class="form-label">Choose file</label>
                                            <input type="file" class="form-control" name="img" id="" placeholder="" aria-describedby="fileHelpId" />
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" require value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="signup" type="submit">Sign UP</button>

                                            <?php
                                            if (isset($_GET['msg'])) {
                                                echo $_GET['msg'];
                                            }
                                            ?>
                                        </div>
                                        <span>Have An Account Already <a href="login.php">login</a></span>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        document.getElementById("eyeIcon").addEventListener("click", function() {
            var passwordInput = document.getElementById("Password");
            var eyeIcon = document.getElementById("eyeIcon");

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

</body>

</html>