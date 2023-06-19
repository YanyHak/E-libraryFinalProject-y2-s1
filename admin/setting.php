<?php
include "./include/config.php";
if (!$con) {
    echo "<script>alert('Unable to connect to database!')</script>";
}

if (isset($_POST['save'])) {
    //validate inputs
    $setting_id = mysqli_real_escape_string($con, $_POST['id']);
    $return_days = mysqli_real_escape_string($con, $_POST['returndays']);
    $fine = mysqli_real_escape_string($con, $_POST['fine']);
    //update query
    $sql = "UPDATE settings SET return_days = '{$return_days}', fine = '{$fine}' WHERE id = '{$setting_id}'";
    if (mysqli_query($con, $sql)) {
        echo "<div class='alert alert-success'>Updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Updated not successfully.</div>";
    }
} ?>
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
    <head>
        <body>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Setting</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <?php
                $sql = "SELECT * FROM settings";
                $result = mysqli_query($con, $sql) or die("SQL query failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <form class="yourform" action="setting.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Return Days</label>
                                <input type="number" class="form-control" name="returndays"
                                    value="<?php echo $row['return_days'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Fine (in Rs.)</label>
                                <input type="number" class="form-control" name="fine" value="<?php echo $row['fine'] ?>"
                                    required>
                            </div>
                            <input type="submit" name="save" class="btn btn-danger" value="Update" required>
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
</body>
</head>
</html>
