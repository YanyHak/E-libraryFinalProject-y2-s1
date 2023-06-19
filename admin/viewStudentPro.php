<?php

$studentID = $_GET['studentID'];
$page = 'student';
include 'include/config.php';

?>
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
    @import url('https://fonts.googleapis.com/css?family=Montserrat');



body {
	background-color: #28223F;
	font-family: Montserrat, sans-serif;
	
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;

	min-height: 100vh;
	margin: 0;
    top:0px;
}

h3 {
	margin: 10px 0;
}

p {
	margin: 5px 0;
	line-height:80px;
}

p {
	font-size: 14px;
	line-height: 21px;
}

.card-container {
	background-color: #231E39;
	border-radius: 5px;
	box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
	color: #B3B8CD;
	padding-top: -30px;
	position: relative;
	width: 350px;
	max-width: 100%;
	text-align: center;
}

.card-container .pro {
	color: #231E39;
	background-color: #FEBB0B;
	border-radius: 3px;
	font-size: 14px;
	font-weight: bold;
	padding: 3px 7px;
	position: absolute;
	top: 30px;
	left: 30px;
}

.card-container .round {
	border: 1px solid #03BFCB;
	border-radius: 50%;
	padding: 7px;
}

button.primary {
	background-color: #03BFCB;
	border: 1px solid #03BFCB;
	border-radius: 3px;
	color: #231E39;
	font-family: Montserrat, sans-serif;
	font-weight: 500;
	padding: 10px 25px;
}

button.primary.ghost {
	background-color: transparent;
	color: #02899C;
}

.skills {
	background-color: #1F1A36;
	text-align: left;
	padding: 15px;
	margin-top: 30px;
}

.skills ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.skills ul li {
	border: 1px solid #2D2747;
	border-radius: 2px;
	display: inline-block;
	font-size: 12px;
	margin: 0 7px 7px 0;
	padding: 7px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
   </style>

    </head>
    <body>
        <?php
          $sql = "SELECT * FROM student WHERE studentID = '{$studentID}'";
          $result = mysqli_query($con, $sql) or die("SQL query failed.");
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
<div class="card-container" id="popup">
    <span class="pro">Student</span>
    <img class="round" src="<?php echo $row["pro_img"]; ?>" alt="user"  height="100" width="100" alt=""
                                    class="rounded-circle"> <span class="font-weight-bold" />
    <p>Stdent ID:<?php echo $row['studentID'] ?></p>
    <p>Stdent Name:<?php echo $row['studentName'] ?>
            </p>
            <p>Gender:<?php echo $row['studentGender'] ?>
             <p>Age:<?php echo $row['studentAge'] ?>
              <p>Class:<?php echo $row['studentCalss'] ?>
               <p>Phone Number:<?php echo $row['studentPhone'] ?>
                 <p>email:<?php echo $row['email'] ?>
<?php

    }
  }
  ?>



</body>
<script>
		function openPopup() {
			document.getElementById("popup").style.display = "block";
		}
		function closePopup() {
			document.getElementById("popup").style.display = "none";
		}
	</script>