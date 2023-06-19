<?php include "./include/config.php"; //header
if (!$con) {
    die("Error connecting to database" . $con->connect_error());
}
$sql = "DELETE FROM student WHERE studentID='" . $_GET["studentID"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Record deleted successfully')</script>";
    header("Location:viewstudent.php");
} else {
    echo "<script>alert('Error deleting record')</script>" . mysqli_error($con);
}

?>