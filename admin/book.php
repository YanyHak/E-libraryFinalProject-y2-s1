<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "AdminLogin.php";
    </script>
    <?php
}
$page = 'book';
include 'include/config.php';
include 'include/AdminHead.php';
?>
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
        /* body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        } */

        .table-responsive {
            margin: 30px 0;
            padding-left: 40px;
        }
        th{
    color:white;
    font-size:bold;
    background-color:#004658;
 }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
              background: #d3e1fd ;
     box-shadow:2px 2px 1px #004658;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }

        /* ====button add==== */


        .glow-button {
            width: 120px;
            height: 40px;
            border: none;
            outline: none;
            color: #fff;
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .glow-button:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-button:active {
            color: #000
        }

        .glow-button:active:after {
            background: transparent;
        }

        .glow-button:hover:before {
            opacity: 1;
        }

        .glow-button:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #111;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        @keyframes glowing {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <form action="./book.php" method="POST" enctype="multipart/form-data">
       
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <button class="glow-button" type="button"><a href="add_book.php">ADD Book</a>
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons" type="submit" name="filter">&#xE8B6;</i>
                                    <input type="text" name="name" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    $sql = "SELECT book.book_id, book.book_status, book.book_name, book.book_category, book.book_author, book.book_publisher,book.books_image,
                                        category.CategoryName, author.AuthorName, publisher.PublisherName FROM book
                                        LEFT JOIN category ON book.book_category= category.CategoryID
                                        LEFT JOIN author ON book.book_author  = author.AuthorID
                                        LEFT JOIN publisher ON book.book_publisher =publisher.PublisherID
                                        ORDER BY book.book_id ";
                    $result = mysqli_query($con, $sql) or die("Sql query failed."); ?>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>book_id</th>
                                
                                <th>book_name </th>
                                <th>book_category</th>
                                <th>book_author </th>
                                <th>book_publisher</th>
                                <th>book_status </i></th>
                                <th>books_image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // if (!isset($POST['filter'])) {
                            if (mysqli_num_rows($result) > 0){
                                while ($row = $result->fetch_assoc()){
                            // $book_name = mysqli_real_escape_string($con, $_POST['name']);
                            // $sql1 = "select * from book  where book_name like ('%$book_name%') ";
                            // $result1 = $con->query($sql1);
                            // if ($result1->num_rows > 0) {
                                //  $serial = $offset + 1;
                                // while ($row = $result1->fetch_assoc()) {
                                     ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['book_id']; ?>
                                        </td>
                                       
                                          <td> 
                                            <?php echo $row['book_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['CategoryName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['AuthorName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['PublisherName'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['book_status'] == 'Y') {
                                                echo "<span class='badge badge-success'>Available</span>";
                                            } else {
                                                echo "<span class='badge badge-danger'>Issued</span>";
                                            } ?>
                                        </td>
                                         <td> 
                                            <img src="<?php echo $row["books_image"]; ?> " height="100" width="100" alt=""> 
                            
                                        </td>
                                        <td>
                                            <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE417;</i></a>
                                            <a href="update_book.php?book_id= <?php echo $row['book_id']; ?>" class="edit" title="Edit"
                                                data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="delete_book.php?book_id=<?php echo $row['book_id']; ?> " onClick="javascript: return confirm('Please confirm deletion');" class="delete" title="Delete"
                                                        data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                <?php }
                            }
                            // }
                            // }

                            ?>

                        </tbody>
                    </table>
                    <div class="clearfix">
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i
                                        class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>