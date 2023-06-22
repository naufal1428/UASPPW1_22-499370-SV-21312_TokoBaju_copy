<?php
require 'koneksi.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
          <img src="images/brand/copy.png" alt="" width="50" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                shop
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="newArrival.php"
                    >new arrival</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="sweatshirt.php">sweatshirt</a>
                </li>
                <li><a class="dropdown-item" href="tshirt.php">t shirt</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bag-link" href="bag.php">bag</a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--login-->
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-4">
              <h1 class="text-center mb-4" style="font-weight: bold;" >login </h1>
              <form method="post">
                <div class="mb-3">
                  
                  <input type="text" class="form-control-login" name="usernameemail" id="usernameemail" placeholder="email" required>
                </div>
                <div class="mb-3">
                  
                  <input type="password" class="form-control-login" name="password" id="password" placeholder="password" required>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-logreg">login</button>
                  <p>
                    don't have an account?
                    <a href="registration.php" class="logreg-link">register</a>
                  </p>
                </div>
                
              </form>
            </div>
        </div>
    </div>
    
    
    <!--footer-->
    <div class="footer">
        <footer class="py-3">
          <ul class="nav justify-content-center pb-3 mb-3">
            <li class="footer-item">
              <a href="home.php" class="footer-link px-2">home</a></li>
            <li class="footer-item">
              <a href="contactUs.php" class="footer-link px-2">contact us</a>
            </li>
            <li class="footer-item">
              <a href="aboutUs.php" class="footer-link px-2">about us</a>
            </li>
          </ul>
          <p class="text-center">© 2023, copy</p>
        </footer>
      </div>

    <!--script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>