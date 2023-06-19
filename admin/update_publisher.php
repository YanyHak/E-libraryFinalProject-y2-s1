<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
        <script type="text/javascript">
            window.location = "AdminLogin.php";
        </script>
        <?php
}
$PublisherID = $_GET['PublisherID'];
$page = 'publisher';
include 'include/config.php';
include 'include/AdminHead.php';
//if form submit
if (isset($_POST["update"])) {
    //validate inputs
    
    $publisher_id = mysqli_real_escape_string($con, $_POST['PublisherID']);
    $publisher_name = mysqli_real_escape_string($con, $_POST['PublisherName']);
    //update query
    $sql = "UPDATE publisher SET PublisherName = '$publisher_name' WHERE PublisherID = '{$publisher_id}'";
    if (mysqli_query($con, $sql)) {
        ?>
        <script type="text/javascript">
            window.location = "publisher.php";
        </script>
        <?php
         // redirect
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
    <title>Update Author</title>
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
    $sql = "SELECT * FROM publisher WHERE PublisherID = '{$PublisherID}'";
    $result = mysqli_query($con, $sql) or die("SQL query failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <form action="./update_publisher.php" method="POST">

                <div class="container rounded bg-white mt-5 mr-3 form-author" data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <span class="font-weight-bold">Publisher's Name: <?php echo $row['PublisherName']; ?></span>
                                    
                                </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back"><i
                                            class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <h6><a href="publisher.php">Back to home</a> </h6>
                                    </div>
                                    <h6 class="text-right">Update Publisher Name</h6>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="hidden" name="PublisherID" class="form-control"
                                            placeholder="Publisher ID" value="<?php echo $row['PublisherID']; ?>">
                                    </div>
                                    <div class="col-md-6"><input type="text" name="PublisherName" class="form-control"
                                            value="<?php echo $row['PublisherName']; ?>" placeholder="Publisher Name"></div>
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