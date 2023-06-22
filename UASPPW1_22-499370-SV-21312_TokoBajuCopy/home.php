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
              <a class="nav-link" href="bag.php">bag</a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--home-->
    <div class="container-fluid text-center home-img">
      <div class="row">
        <div class="col">
          <a class="product" href="newArrival.php">
            <img src="images/hoodie on fit.png" class="img-fluid" alt="...">
        </a>
        </div>
      </div>
    </div>

    <!--produk-->
    <div class="container-fluid">
      <h2 class="text-center mt-2 products">products</h2>
      <div class="row">

        <?php $ambil = $conn->query("SELECT * FROM produk"); ?>
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

    <!--join-->
    <div class="container-fluid join">
      <div class="row justify-content-center">
      <div class="col-md-4">
        <h5 class="text-center mb-4" style="font-weight: bold;">join the community</h5>
        <form>
          <div class="mb-3">
            <input
              type="text"
              class="form-control-join"
              id="namejoin"
              placeholder="name"
              required
            >
          </div>
          <div class="mb-3">
            <input
              type="email"
              class="form-control-join"
              id="emailjoin"
              placeholder="email"
              required
            >
          </div class="text-center mb-4">
          <button type="button" class="btn-join" onclick="cetak()">
            subscribe
          </button>
        </form>

        <div id="outname"></div>

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
