<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "AdminLogin.php";
    </script>
    <?php
}
$book_id = $_GET['book_id'];
$page = 'book';
include 'include/config.php';
include 'include/AdminHead.php';
// if form submit
if (isset($_POST['update'])) {
    //validate inputs
    $bookID = mysqli_real_escape_string($con, $_POST['book_id']);
    $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
    $book_category = mysqli_real_escape_string($con, $_POST['category']);
    $book_author = mysqli_real_escape_string($con, $_POST['author']);
    $book_publisher = mysqli_real_escape_string($con, $_POST['publisher']);

    $filepath = "uploads/" . $_FILES["image"]["name"];
    //insert query
    $sql = "UPDATE book SET book_name='$book_name',book_category='$book_category',book_author='$book_author',book_publisher='$book_publisher',books_image='$filepath ' WHERE book_id = '{$bookID}'";
    if (mysqli_query($con, $sql)) {
       
      
         ?>
    <script type="text/javascript">
        window.location = "book.php";
    </script>
    <?php
    } else {
        echo "<div class='alert alert-danger'>Insert not success!.</div>";
    }
}

// } else if (empty($_POST['book_name']) || empty($_POST['category']) || empty($_POST['author']) || empty($_POST['publisher'])) {
//     echo "<div class='alert alert-danger'>Please Fill All the Fields.</div>";
// }
?>
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



        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #5c6664;
            background-image: none;
            flex: 1;
            padding: 0 .5em;
            color: #fff;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Open Sans', sans-serif;
        }

        select::-ms-expand {
            display: none;
        }

        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background: #5c6664;
            overflow: hidden;
            border-radius: .25em;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #2b2e2e;
            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
        }

        .select:hover::after {
            color: #23b499;
        }
    </style>
</head>

<body>

    <?php
    //select query
    $sql1 = "SELECT book.book_id, book.book_status, book.book_name, book.book_category, book.book_author, book.book_publisher,book.books_image,
                                        category.CategoryName, author.AuthorName, publisher.PublisherName FROM book
                                        LEFT JOIN category ON book.book_category = category.CategoryID
                                        LEFT JOIN author ON book.book_author = author.AuthorID
                                        LEFT JOIN publisher ON book.book_publisher =publisher.PublisherID
                    WHERE  book.book_id ='{$book_id}'";
    $result1 = mysqli_query($con, $sql1) or die("Sql query failed.");
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) { ?>

            <form action="./update_book.php" method="POST" enctype="multipart/form-data">

                <div class="container rounded bg-white  mt-4 mr-2 form-author" data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img src="<?php echo $row["books_image"]; ?> " height="100" width="100" alt=""
                                    class="rounded-circle"> <span class="font-weight-bold">
                                    <div class="input-text">
                                        <div class="input-div">
                                            Select your Image
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <?php echo 'Book Name:' . $row['book_name']; ?>
                                </span><span class="text-black-50">
                                    <?php echo 'Category:' . $row['CategoryName']; ?>
                                </span><span>
                                    <?php echo 'Author:' . $row['AuthorName']; ?>
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
                                    <h6 class="text-right">Edit Book Information</h6>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="hidden" name="book_id" class="form-control" placeholder="book id"
                                            value="<?php echo $row['book_id']; ?>">
                                    </div>
                                </div>
                                <div class="row mt-2">

                                    <div class="col-md-6">
                                        <input type="text" name="book_name" class="form-control" placeholder="book Name"
                                            value="<?php echo $row['book_name']; ?>">
                                    </div>
                                    <div class="col-md-6">

                                        <div class="select">
                                            <select name="category" id="format">
                                                <option selected disabled>Choose category</option>
                                                <?php
                                                $sql = "SELECT * FROM category";
                                                $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['CategoryID']}'>{$row['CategoryName']}</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>



                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <select name="ex" type="hidden">
                                            <!-- <option type="hidden">Select book_publisher</option> -->
                                            <?php
                                            $sql = "SELECT * FROM author";
                                            $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                }
                                            } ?>


                                        </select>
                                    </div>



                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="select">
                                            <select name="author" id="format">
                                                <option selected disabled>Choose Author</option>
                                                <?php
                                                $sql = "SELECT * FROM author";
                                                $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['AuthorID']}'>{$row['AuthorName']}</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="select">
                                            <select name="publisher" id="format">
                                                <option selected disabled>Choose publisher</option>
                                                <?php
                                                $sql = "SELECT * FROM publisher";
                                                $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['PublisherID']}'>{$row['PublisherName']}</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
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