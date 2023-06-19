<?php
include "./include/config.php";

if (!$con) {
    echo "<script>alert('Unable to connect to database!')</script>";

}

//delete query
$sql = "DELETE FROM book WHERE book_id = '". $_GET['book_id']."' and book_status = 'Y'";
$result = mysqli_query($con, $sql);
if ($result) {
    // header("location:book_issue.php");
    ?>
    <script type="text/javascript">
        window.location = "book.php";
    </script>
    <?php
} else {

    echo "<script >alert('Cant't delete Book issue record');</script>";

}
mysqli_close($con);
?>