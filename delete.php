<?php
session_start();
if(!isset($_SESSION['key'])){
    $key = $_GET['key'];

    //remove
    unset($_SESSION['cart'][$key]);

    $_SESSION['cart'] = array_values($_SESSION['cart']);

}

header("Location: keranjang.php");
exit();
?>