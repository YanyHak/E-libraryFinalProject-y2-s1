<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "AdminLogin.php";
    </script>
    <?php
}
$proName = $_POST['name'];
$page = 'student';
include 'include/config.php';
include 'include/AdminHead.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="./asset/css/style.css"> -->
    <style>
        /* =====table===== */
        .table-responsive {
            margin: 30px 0;
            padding-left: 40px;
        }

        th {
            color: white;
            font-size: bold;
            background-color: #004658;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #d3e1fd;
            box-shadow: 2px 2px 1px #004658;

        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }

        /* ====button add==== */
        .glow-button a {
            color: white;
            text-decoration: none;
        }

        .glow-button {
            width: 120px;
            height: 40px;
            border: none;
            outline: none;

            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .glow-button:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-button:active {
            color: #000
        }

        .glow-button:active:after {
            background: transparent;
        }

        .glow-button:hover:before {
            opacity: 1;
        }

        .glow-button:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #111;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        @keyframes glowing {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }


        /* =====table======= */



        /* ==========Author tamplate======= */
    </style>
</head>

<body>
    <form action="./viewstudent.php" method="POST" enctype="multipart/form-data">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <button class="glow-button" type="button"><a href="add_student.php">ADD STUDENT</a>
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons" type="submit" name="filter">&#xE8B6;</i>
                                    <input type="text" name="name" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Student_ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Class</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Pro_img</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!isset($POST['Filter'])) {
                                $sql = "select  studentID ,studentName,studentGender,studentAge,studentCalss,studentPhone,email,pro_img from student  where studentName like ('%$proName%') ";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>
                                                    <td>" . $row['studentID'] . "</td>
                                                    <td>" . $row['studentName'] . "</td>
                                                    <td>" . $row['studentGender'] . "</td>
                                                    <td>" . $row['studentAge'] . "</td>
                                                    <td>" . $row['studentCalss'] . "</td>
                                                    <td>" . $row['studentPhone'] . "</td>
                                                    <td>" . $row['email'] . "</td>
                                                     <td> <img src=' " . $row['pro_img'] . " ' height='100' width='100' alt=''>  </td>
                                                    <td>
                                                        <a href=\"viewStudentPro.php?studentID=$row[studentID];\" onclick=\"openPopup()\" class=\"view\" title=\"View\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE417;</i></a>
                                                        <a href=\"update_student.php?studentID=$row[studentID];\" class=\"edit\" title=\"Edit\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE254;</i></a>
                                                        <a href=\"delete_student.php?studentID=$row[studentID];\" onClick=\"javascript: return confirm('Please confirm deletion');\" class=\"delete\" title=\"Delete\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE872;</i></a>
                                                    </td>
                                                </tr>";

                                    }
                                }
                            }
                            //}
                            ?>

                        </tbody>
                    </table>
                    <div class="clearfix">
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i
                                        class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>