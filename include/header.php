<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- ===link query===== -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

    <link rel="stylesheet" href="./">
    <title></title>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: #676a81;
    background: #ddd;
    max-width: 1920px;
    margin: 0 auto;
    overflow-x: hidden;
     
}

ul {
    z-index: 100;
    padding: 0;
    margin: 0 auto;
    list-style: none;
}

ul li {
    list-style: none;
    display: inline-block;
}

/* 
    font-family: 'Poppins', sans-serif;
*/

/* .header */
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 80px;
    background: #fff;
    padding: 0 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .2)
}

/* .serch-box */
.search-box {
    display: none;
}

.search-box .form-group input[type="text"] {
    width: 100%;
    padding: 25px;
    background: #ddd;
    border: 0;
    color: #eb1b33;
    font-size: 24px;
   
}

/* .logo */
.logo {
    text-transform: capitalize;
    color: #eb1b33;
}

/* .header-menu */
.responsive-menu {
    display: none;
    color: #eb1b33;
    font-size: 24px;
    cursor: pointer;
}

.header-menu ul li a,
.head-social-link ul li a {
    display: block;
    padding: 0 15px;
    font-size: 16px;
    text-decoration: none;
    text-transform: capitalize;
    color: rgb(77, 73, 73);
    transition: .5s all;
}

.head-social-link ul li a {
    font-size: 15px;
    padding: 0 5px;
    color: #676a81;
}

.header-menu ul li a:hover,
.header-menu ul li a.menu-active {
    color: #eb1b33;
}

.head-social-link ul li a:hover {
    color: #0b021b;
}

.responsive-sub-menu.responsive-active-sub-menu {}


/* responsive issue */

@media screen and (max-width:1199px) {
    .header-menu {
        position: relative;
    }

    .responsive-menu {
        display: block;
    }

    .responsive-sub-menu {
        display: none;
    }

    .responsive-sub-menu {
        display: block;
        position: absolute;
        top: 65px;
        background: #fff;
        order: 1;
        transform: translateX(-160px);
        transition: .7s linear;

    }

    .responsive-active-sub-menu {

        transform: translateX(0px);

    }

    .logo {
        order: 2
    }

    .responsive-sub-menu.responsive-active-sub-menu>li {
        width: 100%;
        padding: 5px 0;
    }

    .head-social-link {
        order: 3;
    }

}

/*max-width:1199px*/

@media screen and (max-width:991px) {}

/*max-width:991px*/

@media screen and (max-width:767px) {}

/*max-width:767px*/
    </style>
   
</head>

<body>

   
    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    </head>

    <body>

        <div class="search-box">
            <div class="form-group"><input type="text" class="form-control"></div>
        </div>
        <div class="header">

            <div class="logo">
                <h2>BELTIE</h2>
            </div>

            <div class="header-menu">
                <div class="responsive-menu"><i class="fa fa-bars"></i></div>
                <ul class="responsive-sub-menu">
                    <li><a href="home.php" class="menu-active"><i class="fa fa-home"></i></a></li>
                    <li><a href="home.php">home</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="feature.php">features</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">contacts</a></li>
                    <li><a href="#" class="menu-active menu-search"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>

            <div class="head-social-link">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li> -->
                </ul>
            </div>

        </div>
</body>

</html>
<script>
    // ---------Responsive-navbar-active-animation-----------

   $(document).ready(function(){

  $('.menu-search').click(function(){
    $('.search-box').slideToggle(700)
  })

  $('.responsive-menu').click(function(){
    $('.responsive-sub-menu').toggleClass('responsive-active-sub-menu')
  })
})
</script>