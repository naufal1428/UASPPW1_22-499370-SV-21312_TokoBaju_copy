<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "uasweb";

    session_start();
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php"><img src="images/brand/copy.png" alt="" width="50"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  shop
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="newArrival.php">new arrival</a></li>
                  <li><a class="dropdown-item" href="sweatshirt.php">sweatshirt</a></li>
                  <li><a class="dropdown-item" href="tshirt.php">t shirt</a></li>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">log in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bag.php">bag</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container-fluid category">
        <h1 class="text-center mb-4" style="font-weight: bold; margin-top: 56px;" >tshirt</h1>
        <div class="row">

        <?php $ambil = $conn->query("SELECT * FROM produk WHERE nama_produk LIKE '%tshirt%';"); ?>
        <?php while($perproduk = $ambil->fetch_assoc()){ ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <a class="product" href="detailTsLogo.html">
                    <img src="images/products/<?php echo $perproduk['foto_produk'];?>" class="card-img-top" alt="...">
                </a>
                <div class="caption">
                    <b class="product-name"><?php echo $perproduk['nama_produk']; ?></b>
                    <p class="price">idr. <?php echo number_format($perproduk['harga_produk']); ?>k</p>
                    <a href="addToBag.php?id=<?php echo $perproduk['id_produk']; ?>" class="addToBag">add to bag</a>
                </div>
            </div>
        </div>
        <?php } ?>

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