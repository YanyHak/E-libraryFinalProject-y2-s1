<?php
session_start();
if (!isset($_SESSION["user"])) {
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}
$page = 'view_book';

include 'include/config.php';
include 'include/Header_user.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cards Hover2</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
    .container {
      max-width: 910px;
      margin: 0 auto;
    }

    .choose {
      width: 100%;
      height: 40px;
    }

    .fa {
      margin-right: 20px;
      font-size: 30px;
      color: gray;
      float: right;
    }

    /******************************************
Book stuff
*******************************************/

    .book {
      display: inline-block;
      width: 230px;
      height: 390px;
      box-shadow: 0 0 20px #aaa;
      margin: 25px;
      padding: 10px 10px 0 10px;
      vertical-align: top;
      transition: height 1s;
    }

    /* star button */
    .book:after {
      font-family: FontAwesome;
      content: "\f006";
      font-size: 35px;
      position: relative;
      left: -.1cm;
      top: -1.6cm;
      float: right;
    }

    .cover {
      border: 2px solid gray;
      height: 55%;
      overflow: hidden;
    }

    .cover img {
      width: 100%;
      height:100%;
      /* padding:40px; */
    }

    .book p {
      margin-top: 12px;
      font-size: 20px;
    }

    .book .author {
      font-size: 15px;
    }

    @media (max-width: 941px) {
      .container {
        max-width: 700px;
      }

      .book {
        margin: 49px;
      }
    }

    @media (max-width: 730px) {
      .book {
        display: block;
        margin: 0 auto;
        margin-top: 50px;
      }

      .cover {}
    }

    /*********************************
other
**********************************/

    h1 {
      color: gray;
      text-align: center;
      font-size: 50px;
      margin-bottom: -3px;
    }

    /**********************************
display change
***********************************/
    /*book height smaller, cover opacity, move text onto cover and star too
animate it */
    #list-th:target .book {
      height: 200px;
      width: 250px;
      padding: 10px;
      margin: 25px auto 25px auto;
    }

    #list-th:target .cover {
      width: 246px;
    

    }

    #list-th:target img {
      opacity: .1;
    }

    #list-th:target p {
      margin-top: -62px;
      margin-left: 20px;
    }

    /* remove button? */
    #large-th:target .book {
    
      height: 390px;
    }

    /***********************************
star animation
***********************************/
    /***********************************
zoom on click
***********************************/
  </style>
</head>

<body>
   
    
  <div id="large-th">
    <div class="container">
      <h1> View All Books</h1>
      <br>
      <div class="choose">
        <a href="#list-th"><i class="fa fa-th-list" aria-hidden="true"></i></a>
        <a href="#large-th"><i class="fa fa-th-large" aria-hidden="true"></i></a>
      </div>
      <div id="list-th">


       <?php

            $sql = "SELECT book.book_id, book.book_status, book.book_name, book.book_category, book.book_author, book.book_publisher,book.books_image,
                                        category.CategoryName, author.AuthorName, publisher.PublisherName FROM book
                                        LEFT JOIN category ON book.book_category= category.CategoryID
                                        LEFT JOIN author ON book.book_author  = author.AuthorID
                                        LEFT JOIN publisher ON book.book_publisher =publisher.PublisherID
                                        ORDER BY book.book_id ";
            $result = mysqli_query($con, $sql) or die("Sql query failed.");
            // if (!isset($POST['filter'])) {
            // $book_name = mysqli_real_escape_string($con, $_POST['name']);
            // $sql1 = "select * from book  where book_name like ('%$book_name%') ";
            // $result1 = $con->query($sql1);
            if ($result->num_rows > 0) {
                //  $serial = $offset + 1;
                
                while ($row = $result->fetch_assoc()) { ?>
        <div class="book read">
         
                            <?php
                                    if ($row['book_status'] == 'Y') {
                                        echo "<span class='badge badge-success'>Available</span>";
                                    } else {
                                        echo "<span class='badge badge-danger'>Issued</span>";
                                    } ?>
                 
          <div class="cover">
            <img src="<?php echo $row["books_image"]; ?>">
          </div>
          <div class="description">
            <p class="title">Book:<?php echo $row['book_name'] ?><br>
              <span class="author">Category:<?php echo $row['CategoryName'] ?></span><br>
              <span class="author">Author:<?php echo $row['AuthorName'] ?></span><br>
              <span class="author">Publisher:<?php echo $row['PublisherName'] ?></span><br>
                      </div>
                  
                    </div>
         <?php }
       }
       ?>
      </div>
    </div>
  </div>
</body>

</html>
 
                        