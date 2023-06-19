<?php include "./include/config.php"; //header
if (!$con) {
    die("Error connecting to database" . $conn->connect_error());
}
$sql = "DELETE FROM author WHERE AuthorID='" . $_GET["AuthorID"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Record deleted successfully')</script>";
    header("Location:authors.php");
} else {
    echo "<script>alert('Error deleting record')</script>". mysqli_error($con);
}

?>