<?php
session_start();
if (!isset($_SESSION["user"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
//if form submit

$page = 'profile';
include 'include/config.php';
include 'include/Header_user.php';
if (isset($_POST["update"])) {
    //validate inputs
    $filepath = "uploads/" . $_FILES["image"]["name"];
    $studentID = mysqli_real_escape_string($con, $_POST['studentID']);
    $studentName = mysqli_real_escape_string($con, $_POST['studentName']);
    $studentGender = mysqli_real_escape_string($con, $_POST['studentGender']);
    $studentAge = mysqli_real_escape_string($con, $_POST['studentAge']);
    $studentCalss = mysqli_real_escape_string($con, $_POST['studentCalss']);
    $studentPhone = mysqli_real_escape_string($con, $_POST['studentPhone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    //update query
    $sql = "UPDATE student SET studentName = '$studentName',studentGender='$studentGender',studentAge='$studentAge',studentCalss='$studentCalss',studentPhone='$studentPhone',email='$email',pro_img='$filepath' WHERE studentID = '{$studentID}'";
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
    // $studentID = $_GET['studentID'];
    $sql1 = "SELECT * FROM student WHERE email = '" . $_SESSION["user"] . "'";
    $result1 = mysqli_query($con, $sql1) or die("SQL query failed.");
    if (mysqli_num_rows($result1) > 0) {

        while ($row = mysqli_fetch_assoc($result1)) { ?>
            <form action="./update_student.php" method="POST" enctype="multipart/form-data">

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
                                    <?php echo 'Student Name:' . $row['studentName']; ?>
                                </span><span class="text-black-50">
                                    <?php echo 'Phone Number:' . $row['studentPhone']; ?>
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
                                        <h6><a href="authors.php">Back to home</a> </h6>
                                    </div>
                                    <h6 class="text-right">Edit Student Information</h6>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="hidden" name="studentID" class="form-control"
                                            placeholder="studentID" value="<?php echo $row['studentID']; ?>">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" name="studentName" class="form-control"
                                            value="<?php echo $row['studentName']; ?>" placeholder="student Name"></div>
                                    <div class="col-md-6"><input type="text" name="studentGender" class="form-control"
                                            placeholder="studentGender" value="<?php echo $row['studentGender']; ?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" name="studentAge" class="form-control"
                                            placeholder="studentAge" value="<?php echo $row['studentAge']; ?>"></div>
                                    <div class="col-md-6"><input type="text" name="studentCalss" class="form-control"
                                            placeholder="studentCalss" value="<?php echo $row['studentCalss']; ?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" name="studentPhone" class="form-control"
                                            placeholder="studentPhone" value="<?php echo $row['studentPhone']; ?>"></div>
                                    <div class="col-md-6"><input type="text" name="email" class="form-control"
                                            value="<?php echo $row['email']; ?>" placeholder="email">
                                    </div>
                                </div>

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