<?php
session_start();
if (!isset($_SESSION["user"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
$page = 'request_book';

include 'include/config.php';
include 'include/Header_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        * {
            padding: 0;
            margin: 0;
        }

        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #eee; */
        }

        .container .card {
            height: 500px;
            width: 800px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            border-radius: 20px;
        }

        .container .card .form {
            width: 100%;
            height: 100%;

            display: flex;
        }

        .container .card .left-side {
            width: 35%;
            background-color: #304767;
            height: 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 20px 30px;
            box-sizing: border-box;

        }

        /*left-side-start*/
        .left-heading {
            color: #fff;

        }

        .steps-content {
            margin-top: 30px;
            color: #fff;
        }

        .steps-content p {
            font-size: 12px;
            margin-top: 15px;
        }

        .progress-bar {
            list-style: none;
            /*color:#fff;*/
            margin-top: 30px;
            font-size: 13px;
            font-weight: 700;
            counter-reset: container 0;
        }

        .progress-bar li {
            position: relative;
            margin-left: 40px;
            margin-top: 50px;
            counter-increment: container 1;
            color: #4f6581;
        }

        .progress-bar li::before {
            content: counter(container);
            line-height: 25px;
            text-align: center;
            position: absolute;
            height: 25px;
            width: 25px;
            border: 1px solid #4f6581;
            border-radius: 50%;
            left: -40px;
            top: -5px;
            z-index: 10;
            background-color: #304767;


        }


        .progress-bar li::after {
            content: '';
            position: absolute;
            height: 90px;
            width: 2px;
            background-color: #4f6581;
            z-index: 1;
            left: -27px;
            top: -70px;
        }


        .progress-bar li.active::after {
            background-color: #fff;

        }

        .progress-bar li:first-child:after {
            display: none;
        }

        /*.progress-bar li:last-child:after{*/
        /*  display:none;  */
        /*}*/
        .progress-bar li.active::before {
            color: #fff;
            border: 1px solid #fff;
        }

        .progress-bar li.active {
            color: #fff;
        }

        .d-none {
            display: none;
        }

        /*left-side-end*/
        .container .card .right-side {
            width: 65%;
            background-color: #fff;
            height: 100%;
            border-radius: 20px;
        }

        /*right-side-start*/
        .main {
            display: none;
        }

        .active {
            display: block;
        }

        .main {
            padding: 40px;
        }

        .main small {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2px;
            height: 30px;
            width: 30px;
            background-color: #ccc;
            border-radius: 50%;
            color: yellow;
            font-size: 19px;
        }

        .text {
            margin-top: 20px;
        }

        .congrats {
            text-align: center;
        }

        .text p {
            margin-top: 10px;
            font-size: 13px;
            font-weight: 700;
            color: #cbced4;
        }

        .input-text {
            margin: 30px 0;
            display: flex;
            gap: 20px;
        }

        .input-text .input-div {
            width: 100%;
            position: relative;

        }



        input[type="text"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #cbced4;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        select {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #cbced4;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        .input-text .input-div span {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 14px;
            transition: all 0.5s;
        }

        .input-div input:focus~span,
        .input-div input:valid~span {
            top: -15px;
            left: 6px;
            font-size: 10px;
            font-weight: 600;
        }

        .input-div span {
            top: -15px;
            left: 6px;
            font-size: 10px;
        }

        .buttons button {
            height: 40px;
            width: 100px;
            border: none;
            border-radius: 5px;
            background-color: #0075ff;
            font-size: 12px;
            color: #fff;
            cursor: pointer;
        }

        .button_space {
            display: flex;
            gap: 20px;

        }

        .button_space button:nth-child(1) {
            background-color: #fff;
            color: #000;
            border: 1px solid#000;
        }

        .user_card {
            margin-top: 20px;
            margin-bottom: 40px;
            height: 200px;
            width: 100%;
            border: 1px solid #c7d3d9;
            border-radius: 10px;
            display: flex;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }

        .user_card span {
            height: 80px;
            width: 100%;
            background-color: #dfeeff;
        }

        .circle {
            position: absolute;
            top: 40px;
            left: 60px;
        }

        .circle span {
            height: 70px;
            width: 70px;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .circle span img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .social {
            display: flex;
            position: absolute;
            top: 100px;
            right: 10px;
        }

        .social span {
            height: 30px;
            width: 30px;
            border-radius: 7px;
            background-color: #fff;
            border: 1px solid #cbd6dc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            color: #cbd6dc;

        }

        .social span i {
            cursor: pointer;
        }

        .heart {
            color: red !important;
        }

        .share {
            color: red !important;
        }

        .user_name {
            position: absolute;
            top: 110px;
            margin: 10px;
            padding: 0 30px;
            display: flex;
            flex-direction: column;
            width: 100%;

        }

        .user_name h3 {
            color: #4c5b68;
        }

        .detail {
            /*margin-top:10px;*/
            display: flex;
            justify-content: space-between;
            margin-right: 50px;
        }

        .detail p {
            font-size: 12px;
            font-weight: 700;

        }

        .detail p a {
            text-decoration: none;
            color: blue;
        }






        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }

        .warning {
            border: 1px solid red !important;
        }


        /*right-side-end*/
        @media (max-width:750px) {
            .container {
                height: scroll;


            }

            .container .card {
                max-width: 350px;
                height: auto !important;
                margin: 30px 0;
            }

            .container .card .right-side {
                width: 100%;

            }

            .input-text {
                display: block;
            }

            .input-text .input-div {
                margin-top: 20px;

            }

            .container .card .left-side {

                display: none;
            }
        }
    </style>
</head>

<body>
    
    <?php //if form submit
    if (isset($_POST['save'])) {
        // --------------------
        // get return days from settings table
        $sql = "SELECT * FROM settings";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $return_days = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $return_days = $row['return_days'];
            }
        }
        // --------------------
        if (empty($_POST['studentName']) || empty($_POST['book_name'])) {
            echo "<div class='alert alert-danger'>Please Fill All the Fields.</div>";
        } 
        else {
            // validate inputs
            // $today = date('Y-m-d');
            $request_name = mysqli_real_escape_string($con, $_POST['studentName']);
            $request_book = mysqli_real_escape_string($con, $_POST['book_name']);
            $request_date = date('Y-m-d');
            $return_date = date('Y-m-d', strtotime("+" . $return_days . " days"));
           
            //insert query
            $sql = "INSERT INTO  request_book(request_name,request_book,request_date,request_status) 
            VALUES ('$request_name','$request_book','$request_date','N')";
           
            if (mysqli_query($con, $sql)) {
                $update = "UPDATE book SET book_status = 'Y' WHERE book_id = {$request_book}";
                $result = mysqli_query($con, $update);
                
                // header("location:request_book.php"); //redirect
            } else {
                echo "<div class='alert alert-danger'>Query failed.</div>";
            }
            //Request is received
      
                                                //     if ($row['request_status'] == 'Y') {
                                                //         $request_name = $row['studentID'];
                                                //         $request_book = $row['book_id'];
                                                //         $request_date = $row['receive_day'];
                                                //         $return_date = date('Y-m-d', strtotime("+" . $return_days . " days"));

                                                //         $sql2 = "INSERT INTO  book_issue(issue_name,issue_book,issue_date,return_date,issue_status) 
                                                //   VALUES ('$request_name','$request_book','$request_date','$return_date','N') ";
                                                //         $result2 = mysqli_query($con, $sql2);
                                                //         $update = "UPDATE book SET book_status = 'N' WHERE book_id = {$request_book}";
                                                //         $result = mysqli_query($con, $update);

                                                //     }
                                
           
         
           
    
        //     $sql1 = "SELECT * FROM request_book WHERE request_status='Y'";
        //    if($result1=mysqli_query($con,$sql1)){
        //         $update = "UPDATE book SET book_status = 'N' WHERE book_id = {$request_book}";
        //         $result_update = mysqli_query($con, $update);
        //         $sql2 = "INSERT INTO  book_issue(issue_name,issue_book,issue_date,return_date,issue_status) 
        //     VALUES ('$request_name','$request_book',date('Y-m-d'),'$return_date','N') WHERE request_status='Y'";
        //         $result2 = mysqli_query($con, $sql2);
        //         if ($result2) {
        //             // header("location:request_book.php"); //redirect
    
        //         }

        //    }
                
            
          
        }
    } ?>
    
    <form action="./request_book.php" method="POST">
        <div class="container">
            <div class="card">
                <div class="form">
                    <div class="left-side">
                        <div class="left-heading">
                            <h3>Request Book</h3>
                        </div>
                        <div class="steps-content">
                            <h3>Step <span class="step-number">1</span></h3>
                            <p class="step-number-content active">Enter Book request information.
                            </p>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="main active">
                            <small><i class="fa fa-smile-o"></i></small>
                            <div class="text">
                                <h2>Add Book request Information</h2>
                                <p>Enter Book request information to database.</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select name="studentName">
                                        <option>Select Student Name</option>
                                        <?php
                                        $studentID = $_GET['studentID'];
                                        $sql = "SELECT * FROM student where email='". $_SESSION["user"]."'";
                                        $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                        if (mysqli_num_rows($result) > 0) { //check result rows
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['studentID']}'>{$row['studentName']}</option>";
                                            }
                                        } ?>

                                    </select>

                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">

                                    <select name="book_name">
                                        <option>Select Book Name</option>
                                        <?php
                                        $sql = "SELECT * FROM book WHERE book_status = 'Y'";
                                        $result = mysqli_query($con, $sql) or die("SQL query failed.");
                                        if (mysqli_num_rows($result) > 0) { // check result rows
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['book_id']}'>{$row['book_name']}</option>";
                                            }
                                        } ?>


                                    </select>
                                </div>
                            </div>

                            <div class="buttons">
                                <button class="next_button" type="submit" name="save">Request</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>


