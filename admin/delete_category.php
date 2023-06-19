<?php include "./include/config.php"; //header
if (!$con) {
    die("Error connecting to database" . $conn->connect_error());
}
$sql = "DELETE FROM category WHERE CategoryID='" . $_GET["CategoryID"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Record deleted successfully')</script>";
    header("Location:category.php");
} else {
    echo "<script>alert('Error deleting record')</script>" . mysqli_error($con);
}

?>