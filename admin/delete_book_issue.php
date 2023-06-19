<?php
include "./include/config.php";
if (!$con) {
    echo "<script>alert('Unable to connect to database!')</script>";
   
}
$issue_id = $_GET['iid'];
$issue_status='';
//delete query
$sql = "DELETE FROM book_issue WHERE issue_id = '{$issue_id}' and issue_status = 'Y'";
if (mysqli_query($con, $sql)) {
    header("location:book_issue.php");
} else {
   
echo "<script >alert('Cant't delete Book issue record');</script>";
  
}
mysqli_close($con);
?>