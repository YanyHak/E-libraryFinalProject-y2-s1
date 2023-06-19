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

$page = 'request_book';
include 'include/config.php';
include 'include/AdminHead.php';
//if form submit
if (isset($_POST['save'])) {
    $sql = "SELECT * FROM settings";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $return_days = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $return_days = $row['return_days'];
        }
    }
    $request_id = $_GET['iid'];
    // $book_id = $_POST['book-id'];
    // $date = date('Y-m-d');
    //update book issue table
    $sql1 = "UPDATE request_book SET request_status = 'Y'  WHERE request_id  = '{$request_id}'"; //Y=receive request
    //Relationsh
    if (mysqli_query($con, $sql1)) {
        header("location:request_book_stu.php"); // redirect
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- =====link css======= -->
    <style>
        /* ======================== */
        /*   Syed Sahar Ali Raza   	*/
        /* ========================	*/
        @import url(https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);

        body {
            background-color: #eee;
        }

        #generic_price_table {
            background-color: #f0eded;
        }

        /*PRICE COLOR CODE START*/
        #generic_price_table .generic_content {
            background-color: #fff;
        }

        #generic_price_table .generic_content .generic_head_price {
            background-color: #f6f6f6;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg {
            border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span {
            color: #525252;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign {
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency {
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent {
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month {
            color: #414141;
        }

        #generic_price_table .generic_content .generic_feature_list ul li {
            color: #a7a7a7;
        }

        #generic_price_table .generic_content .generic_feature_list ul li span {
            color: #414141;
        }

        #generic_price_table .generic_content .generic_feature_list ul li:hover {
            background-color: #E4E4E4;
            border-left: 5px solid #2ECC71;
        }

        #generic_price_table .generic_content .generic_price_btn a {
            border: 1px solid #2ECC71;
            color: #2ECC71;
        }

        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg {
            border-color: #2ECC71 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #2ECC71;
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span {
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_price_btn a,
        #generic_price_table .generic_content.active .generic_price_btn a {
            background-color: #2ECC71;
            color: #fff;
        }

        #generic_price_table {
            margin: 50px 0 50px 0;
            font-family: 'Raleway', sans-serif;
            line-height:45px;
        }

        .row .table {
            padding: 28px 0;
        }

        /*PRICE BODY CODE START*/

        #generic_price_table .generic_content {
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        #generic_price_table .generic_content .generic_head_price {
            margin: 0 0 20px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content {
            margin: 0 0 50px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg {
            border-style: solid;
            border-width: 90px 1411px 23px 399px;
            position: absolute;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head {
            padding-top: 40px;
            position: relative;
            z-index: 1;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span {
            font-family: "Raleway", sans-serif;
            font-size: 28px;
            font-weight: 400;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag {
            padding: 0 0 20px;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price {
            display: block;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign {
            display: inline-block;
            font-family: "Lato", sans-serif;
            font-size: 28px;
            font-weight: 400;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency {
            font-family: "Lato", sans-serif;
            font-size: 60px;
            font-weight: 300;
            letter-spacing: -2px;
            line-height: 60px;
            padding: 0;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent {
            display: inline-block;
            font-family: "Lato", sans-serif;
            font-size: 24px;
            font-weight: 400;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month {
            font-family: "Lato", sans-serif;
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 3px;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_feature_list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #generic_price_table .generic_content .generic_feature_list ul li {
            font-family: "Lato", sans-serif;
            font-size: 18px;
            padding: 15px 0;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table .generic_content .generic_feature_list ul li:hover {
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;

        }

        #generic_price_table .generic_content .generic_feature_list ul li .fa {
            padding: 0 10px;
        }

        #generic_price_table .generic_content .generic_price_btn {
            margin: 20px 0 32px;
        }

        #generic_price_table .generic_content .generic_price_btn a {
            border-radius: 50px;
            -moz-border-radius: 50px;
            -ms-border-radius: 50px;
            -o-border-radius: 50px;
            -webkit-border-radius: 50px;
            display: inline-block;
            font-family: "Lato", sans-serif;
            font-size: 18px;
            outline: medium none;
            padding: 12px 30px;
            text-decoration: none;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content,
        #generic_price_table .generic_content:hover,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content .price,
        #generic_price_table .generic_content:hover .price,
        #generic_price_table .generic_content .generic_price_btn a,
        #generic_price_table .generic_content:hover .generic_price_btn a {
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;
        }

        @media (max-width: 320px) {}

        @media (max-width: 767px) {
            #generic_price_table .generic_content {
                margin-bottom: 75px;
            }

            .space {
                padding-left: -20px;
                font-family: 'Raleway', sans-serif;
                ;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #generic_price_table .col-md-3 {
                float: left;
                width: 50%;
            }

            #generic_price_table .col-md-4 {
                float: left;
                width: 50%;
            }

            #generic_price_table .generic_content {
                margin-bottom: 75px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {}

        @media (min-width: 1200px) {}

        #generic_price_table_home {
            font-family: 'Raleway', sans-serif;
        }

        .text-center h1,
        .text-center h1 a {
            color: #7885CB;
            font-size: 30px;
            font-weight: 300;
            text-decoration: none;
        }

        .demo-pic {
            margin: 0 auto;
        }

        .demo-pic:hover {
            opacity: 0.7;
        }

        #generic_price_table_home ul {
            margin: 0 auto;
            padding: 0;
            list-style: none;
            display: table;
        }

        #generic_price_table_home li {
            float: left;
        }

        #generic_price_table_home li+li {
            margin-left: 10px;
            padding-bottom: 10px;
        }

        #generic_price_table_home li a {
            display: block;
            width: 50px;
            height: 50px;
            font-size: 0px;
        }

        #generic_price_table_home .blue {
            background: #3498DB;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .emerald {
            background: #2ECC71;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .grey {
            background: #7F8C8D;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .midnight {
            background: #34495E;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .orange {
            background: #E67E22;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .purple {
            background: #9B59B6;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .red {
            background: #E74C3C;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .turquoise {
            background: #1ABC9C;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .blue:hover,
        #generic_price_table_home .emerald:hover,
        #generic_price_table_home .grey:hover,
        #generic_price_table_home .midnight:hover,
        #generic_price_table_home .orange:hover,
        #generic_price_table_home .purple:hover,
        #generic_price_table_home .red:hover,
        #generic_price_table_home .turquoise:hover {
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .divider {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
        }

        #generic_price_table_home .divider span {
            width: 100%;
            display: table;
            height: 2px;
            background: #ddd;
            margin: 50px auto;
            line-height: 2px;
        }

        #generic_price_table_home .itemname {
            text-align: center;
            font-size: 50px;
            padding: 50px 0 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            text-decoration: none;
            font-weight: 300;
        }

        #generic_price_table_home .itemnametext {
            text-align: center;
            font-size: 20px;
            padding-top: 5px;
            text-transform: uppercase;
            display: inline-block;
        }

        #generic_price_table_home .footer {
            padding: 40px 0;
        }

        .price-heading {
            text-align: center;
        }

        .price-heading h1 {
            color: #666;
            margin: 0;
            padding: 0 0 50px 0;
        }

        .demo-button {
            background-color: #333333;
            color: #ffffff;
            display: table;
            font-size: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 50px;
            outline-color: -moz-use-text-color;
            outline-style: none;
            outline-width: medium;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
        }

        .bottom_btn {
            background-color: #333333;
            color: #ffffff;
            display: table;
            font-size: 28px;
            margin: 60px auto 20px;
            padding: 10px 25px;
            text-align: center;
            text-transform: uppercase;
        }

        .demo-button:hover {
            background-color: #666;
            color: #FFF;
            text-decoration: none;

        }

        .bottom_btn:hover {
            background-color: #666;
            color: #FFF;
            text-decoration: none;
        }

        .space {
            /* padding-left: 20px; */
            font-family: 'Raleway', sans-serif;
            ;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <!-- <!========================Syed Sahar Ali Raza========================!> -->
    <div id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--PRICE HEADING START-->
                        <div class="price-heading clearfix">
                            <h1>Receive Request Book</h1>
                        </div>
                        <!--//PRICE HEADING END-->
                    </div>
                </div>
            </div>
            <div class="container">

                <!--BLOCK ROW START-->
                <div class="row justify-content-center">

                    <div class="col-md-5">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content active clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Standard</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">Receive</span>
                                        <span class="currency">Request</span>
                                        <span class="cent">Book</span>
                                        <span class="month">/Student</span>
                                    </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <!-- =====code php relationship and show result====== -->
                            <?php
                            // -----------------
                            //get fine value from settings table
                            $sql = "SELECT * FROM settings";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $return_days = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $return_days = $row['return_days'];
                                }
                            }
                            // ----------------
                            $request_id = $_GET['iid'];
                            //select query
                            $sql = "SELECT request_book.request_id,request_book.request_status,request_book.request_name,request_book.request_book,
                request_book.request_date,request_book.receive_day,student.studentID,student.studentPhone,student.email,student.studentName,book.book_name FROM request_book
                LEFT JOIN student ON request_book.request_name = student.studentID
                LEFT JOIN book ON request_book.request_book = book.book_id
                 WHERE request_id = {$request_id}
               ORDER BY request_book.request_id ";
                            $result = mysqli_query($con, $sql) or die("SQL query failed.");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="generic_feature_list">
                                        <table cellpadding="10px" width="90%" style="margin: 0 0 20px;">
                                            <!--  -->
                                            <tr>
                                                <td>Student_Name: </td>
                                                <td><b>
                                                        <?php echo $row['studentName'] ?>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td>Book_Name : </td>
                                                <td><b>
                                                        <?php echo $row['book_name'] ?>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td>Phone : </td>
                                                <td><b>
                                                        <?php echo $row['studentPhone'] ?>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td>Email : </td>
                                                <td><b>
                                                        <?php echo $row['email'] ?>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td>request_date : </td>
                                                <td><b>
                                                        <?php echo date('d M,Y', strtotime($row['request_date'])); ?>
                                                    </b></td>
                                            </tr>

                                            <?php
                                            if ($row['request_status'] == 'Y') { ?>
                                                <tr>
                                                    <td>Status</td>
                                                    <td><b>Receive</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Receive On</td>
                                                    <td><b>
                                                            <?php echo date('d M, Y', strtotime($row['receive_day'])); ?>
                                                        </b></td>
                                                </tr>
                                            <?php } else {
                                            } ?>
                                        </table>
                                        <?php

                                        if ($row['request_status'] == 'N') { ?>
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                                                <input type="hidden" name="request_id" value="<?php echo $row['request_book'] ?>">
                                                <input type='submit' class='btn btn-danger' name='save' value='Receive'>
                                            </form>
                                        <?php } else if ($row['request_status'] == 'Y') {
                                            $request_id = $_GET['iid'];
                                            //select query
                                            // $sql = "SELECT request_book.request_id,request_book.request_status,request_book.request_name,request_book.request_book,
                                            // request_book.request_date,request_book.receive_day,student.studentID,student.studentPhone,student.email,student.studentName,book.book_name,book.book_id FROM request_book
                                            // LEFT JOIN student ON request_book.request_name = student.studentID
                                            // LEFT JOIN book ON request_book.request_book = book.book_id
                                            // WHERE request_id = {$request_id}
                                            // ORDER BY request_book.request_id ";
                                            // $request_name = $row['studentID'];
                                            // $request_book = $row['book_name'];
                                            // $issue_date = date('Y-m-d');
                                            // $return_date = $return_date = date('Y-m-d', strtotime("+" . $return_days . " days"));
                                            // $sql2 = "INSERT INTO  book_issue(issue_name,issue_book,issue_date,return_date,issue_status) 
                                            // VALUES ('$request_name','$request_book','$issue_date','$return_date','N')";
                                            // $result2 = mysqli_query($con, $sql2);
                                            // if($result2){
                                            //     $update = "UPDATE book SET book_status = 'N' WHERE book_id = {$request_book}";
                                            //      $result3 = mysqli_query($con, $update);
                                            // }

                                        }
                                        ?>
                                    </div>
                                <?php }
                            } ?>
                        </div>


                    </div>


                </div>

            </div>


    </div>
    </section>

    </div>

</body>

</html>