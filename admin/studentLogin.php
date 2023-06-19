<?php
session_start();
include "./include/config.php";
if (!$con) {
  echo "<script>alert('Unable to connect to database!')</script>";
} else {
  $page = 'logout';
  if (isset($_POST['signup'])) {
    $filepath = "uploads/" . $_FILES["image"]["name"];
    // name,email,gender,class,phone,password,submit
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $class = $_POST['class'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $sql = "INSERT INTO student  (studentName,studentGender,studentAge,studentCalss,studentPhone,email,password,pro_img) 
      values( '$name', '$gender', '$age','$class','$phone','$email','$password','$filepath') ";
    $result = mysqli_query($con, $sql);
    if (!$result) {
      die("Insert failed");

    } else {
      echo "<script>alert('Register Success!')</script>";
      // header("Location:authors.php");
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) {
        echo "<img src=" . $filepath . " height=200 width=300 />";
      } else {
        echo "Error !!";
      }

    }
  } else if (isset($_POST['login'])) {
    $_SESSION["user"] = $_POST['email'];
    $password = $_POST['Lpassword'];
    $sql = "SELECT *FROM student WHERE email='" . $_SESSION["user"] . "' AND password='$password' ";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        echo '<script>alert("Login successfully ")</script>';
        header("Location:displayBook.php");
      }

    } else {
      echo '<script>alert("Login Fail!!! ")</script>';
    }

  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- <link rel="stylesheet" href="./asset/css/login.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <!-- ===link query===== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    html,
    body {
      display: grid;
      height: 100%;
      width: 100%;
      place-items: center;
      /*background-color: #8EC5FC;*/
      background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
    }

    ::selection {
      background: #1a75ff;
      color: #fff;
    }

    .wrapper {
      overflow: hidden;
      max-width: 490px;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
      margin-top: 100px;
      padding-top: 40px;
    }

    .wrapper .title-text {
      display: flex;
      width: 200%;
    }

    .wrapper .title {
      width: 50%;
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .slide-controls {
      position: relative;
      display: flex;
      height: 50px;
      width: 100%;
      overflow: hidden;
      margin: 30px 0 10px 0;
      justify-content: space-between;
      border: 1px solid lightgrey;
      border-radius: 15px;
    }

    .slide-controls .slide {
      height: 100%;
      width: 100%;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      text-align: center;
      line-height: 48px;
      cursor: pointer;
      z-index: 1;
      transition: all 0.6s ease;
    }

    .slide-controls label.signup {
      color: #000;
    }

    .slide-controls .slider-tab {
      position: absolute;
      height: 100%;
      width: 50%;
      left: 0;
      z-index: 0;
      border-radius: 15px;
      background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    input[type="radio"] {
      display: none;
    }

    #signup:checked~.slider-tab {
      left: 50%;
    }

    #signup:checked~label.signup {
      color: #fff;
      cursor: default;
      user-select: none;
    }

    #signup:checked~label.login {
      color: #000;
    }

    #login:checked~label.signup {
      color: #000;
    }

    #login:checked~label.login {
      cursor: default;
      user-select: none;
    }

    .wrapper .form-container {
      width: 100%;
      overflow: hidden;
    }

    .form-container .form-inner {
      display: flex;
      width: 200%;
    }

    .form-container .form-inner form {
      width: 50%;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-inner form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
    }

    .form-inner form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 15px;
      border-radius: 15px;
      border: 1px solid lightgrey;
      border-bottom-width: 2px;
      font-size: 17px;
      transition: all 0.3s ease;
    }

    .form-inner form .field input:focus {
      border-color: #1a75ff;
      /* box-shadow: inset 0 0 3px #fb6aae; */
    }

    .form-inner form .field input::placeholder {
      color: #999;
      transition: all 0.3s ease;
    }

    form .field input:focus::placeholder {
      color: #1a75ff;
    }

    .form-inner form .pass-link {
      margin-top: 5px;
    }

    .form-inner form .signup-link {
      text-align: center;
      margin-top: 30px;
    }

    .form-inner form .pass-link a,
    .form-inner form .signup-link a {
      color: #1a75ff;
      text-decoration: none;
    }

    .form-inner form .pass-link a:hover,
    .form-inner form .signup-link a:hover {
      text-decoration: underline;
    }

    form .btn {
      height: 50px;
      width: 100%;
      border-radius: 15px;
      position: relative;
      overflow: hidden;
    }

    form .btn .btn-layer {
      height: 100%;
      width: 300%;
      position: absolute;
      left: -100%;
      background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
      border-radius: 15px;
      transition: all 0.4s ease;
      ;
    }

    form .btn:hover .btn-layer {
      left: 0;
    }

    form .btn input[type="submit"] {
      height: 100%;
      width: 100%;
      z-index: 1;
      position: relative;
      background: none;
      border: none;
      color: #fff;
      padding-left: 0;
      border-radius: 15px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <!-- <form action="login.php" method='POST'> -->

  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="studentLogin.php" class="login" method='POST'>
          <pre>
                </pre>
          <div class="field">
            <input name='email' type="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input name='Lpassword' type="password" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input name='login' type="submit" value="Login">

            <!-- <a href="Re_Lo.php"></a> -->

          </div>
          <div class="signup-link">Create an account <a href="">Signup now</a></div>
        </form>
        <form action="studentLogin.php" class="signup" method='POST' enctype="multipart/form-data">
          <div class="field">
            <input type="text" placeholder="Name" name="name" required>
          </div>

          <div class="field">
            <input type="text" placeholder="Gender" name="gender" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Age" name="age" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Class" name="class" required>
          </div>
          <div class="field">
            <input type="number" placeholder="Phone" name="phone" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Email Address" name="email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="field">
            <input name='image' type="file" placeholder="Choose file" required>
          </div>

          <div class="field btn">
            <div class="btn-layer"></div>
            <!-- <a href="user.php?studentID= $row[studentID];" class="edit" title="Signup"
                                                data-toggle="tooltip"> -->
            <input name="signup" type="submit" value="Signup">
            <!-- <button type="submit" name="signup">
              
            </button> -->



          </div>
          <div class="signup-link">Already have an account? <a href="">Login</a></div>
        </form>
      </div>
    </div>
  </div>

  <!-- </form> -->
</body>

</html>
<script>
  const loginText = document.querySelector(".title-text .login");
  const loginForm = document.querySelector("form.login");
  const loginBtn = document.querySelector("label.login");
  const signupBtn = document.querySelector("label.signup");
  const signupLink = document.querySelector("form .signup-link a");
  signupBtn.onclick = (() => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
  });
  loginBtn.onclick = (() => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
  });
  signupLink.onclick = (() => {
    signupBtn.click();
    return false;
  });
</script>