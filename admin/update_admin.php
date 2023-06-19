<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "AdminLogin.php";
    </script>
    <?php
}
//if form submit

$page = 'profile';
include 'include/config.php';
include 'include/AdminHead.php';
if (isset($_POST["update"])) {
    //validate inputs
    $filepath = "uploads/" . $_FILES["image"]["name"];
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    //update query
    $sql = "UPDATE admin SET username = '$username',age='$age',gender='$gender',phone='$phone',email='$email',password='$password',pro_img='$filepath' WHERE email = '" . $_SESSION["admin"] . "'";
    if (mysqli_query($con, $sql)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) {
            //nothing to output
        } else {
            echo "Error !!";
        }

    } else {
        echo "<script>alert('Update not success!')</script>";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8;
        }

        .profile-button {
            background: #BA68C8;
            box-shadow: none;
            border: none;
        }

        .profile-button:hover {
            background: #682773;
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none;
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none;
        }

        .back:hover {
            color: #682773;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    // $id = $_GET['id'];
    $sql1 = "SELECT * FROM admin WHERE email = '" . $_SESSION["admin"] . "'";
    $result1 = mysqli_query($con, $sql1) or die("SQL query failed.");
    if (mysqli_num_rows($result1) > 0) {

        while ($row = mysqli_fetch_assoc($result1)) { ?>
            <form action="./update_admin.php" method="POST" enctype="multipart/form-data">

                <div class="container rounded bg-white mt-5 mr-3 form-author" data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img src="<?php echo $row["pro_img"]; ?> " height="100" width="100" alt=""
                                    class="rounded-circle"> <span class="font-weight-bold">
                                    <div class="input-text">
                                        <div class="input-div">
                                            Select your Image
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <?php echo 'Username:' . $row['username']; ?>
                                </span><span class="text-black-50">
                                    <?php echo 'Phone Number:' . $row['phone']; ?>
                                </span><span>
                                    <?php echo 'Email:' . $row['email']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back"><i
                                            class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <h6><a href="Dashboard.php">Back to home</a> </h6>
                                    </div>
                                    <h6 class="text-right">Update Profile</h6>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="hidden" name="id" class="form-control"
                                            placeholder="id" value="<?php echo $row['id']; ?>">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" name="username" class="form-control"
                                            value="<?php echo $row['username']; ?>" placeholder="student Name"></div>
                                    <div class="col-md-6"><input type="text" name="gender" class="form-control"
                                            placeholder="gender" value="<?php echo $row['gender']; ?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" name="age" class="form-control"
                                            placeholder="age" value="<?php echo $row['age']; ?>"></div>
                                  <div class="col-md-6"><input type="text" name="phone" class="form-control"
                                            placeholder="phone" value="<?php echo $row['phone']; ?>"></div>
                                    
                                        </div>
                                        <div class="row mt-3">
                                   
                                            <div class="col-md-6"><input type="text" name="email" class="form-control"
                                                    value="<?php echo $row['email']; ?>" placeholder="email">
                                    </div>
                                    <div class="col-md-6"><input type="password" name="password" class="form-control"
                                            placeholder="Password" value="<?php echo $row['password']; ?>">
                                            </div>                                </div>

                                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit"
                                                name="update">Update</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

            <?php

        }
    }
    ?>



</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>