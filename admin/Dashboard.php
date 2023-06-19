
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}
$page = 'home';
include 'include/config.php';
include 'include/AdminHead.php';
?>
<!--dashboard area-->
<style>
    
    .dashboard-content{
        margin-left:80px;
    }
     @media only screen and (max-width: 600px) and (min-width: 400px)  {
             .dashboard-content {
            margin-top: 60px ;
           
        }

        }
</style>
<div class="dashboard-content ">
    <div class="dashboard-header ">
        <div class="container ">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="left ">
                        <p><span>dashboard</span>Control panel</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="Dashboard.php"><i class="fas fa-home"></i>home</a>
                        <span class="disabled">dashboard</span>
                    </div>
                </div>
            </div>
            <div class="row counterup">
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query( $con,"select * from author");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="authors.php">Authors</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box2">
                        <div class="icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select * from category");
                                    // $res2 = mysqli_query($con, "select * from t_issuebook");
                                    // $count2 = mysqli_num_rows($res2);
                                    $count = mysqli_num_rows($res);
                                    // $result = $count + $count2;
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="category.php">category</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box3">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select * from publisher");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="publisher.php">publisher</a></h4>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box4">
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select * from book");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="book.php">Books</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box4">
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select fine from book_issue where issue_status='N'");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="book_issue.php">book_issue</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box3">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select * from student");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="viewstudent.php">View Students</a></h4>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box2">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text">
                            <h3><span class="counter">
                                    <?php
                                    $res = mysqli_query($con, "select * from request_book");
                                    $count = mysqli_num_rows($res);
                                    echo $count;
                                    ?>
                                </span></h3>
                            <h4><a href="request_book_stu.php">Request Books</a></h4>
                        </div>
                    </div>
                </div>
               
               
                <div class="col-md-3 col-sm-3 col-xs-12 control">
                    <div class="box box1">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text">
                            <h4 class="mt-20"><a href="send_email_student.php">Send Email</a></h4>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>
