<?php
session_start();

$id_produk = $_GET['id'];


if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}

else
{
    $_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('the product has been added to the shopping bag');</script>"; 
echo "<script>location='bag.php';</script>";
?>