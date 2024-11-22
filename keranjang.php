<?php
session_start();
include "koneksi.php";

if (isset($_POST['quantity']) && isset($_POST['ProductID'])){
    $quantity = $_POST['quantity'];
    $ProductID = $_POST['ProductID'];
    
    //menampilkan barang yang kita checkout dari tabel produk
    $query= mysqli_query($conn,"SELECT * FROM products WHERE ProductID='$ProductID'");
    $product=mysqli_fetch_assoc($query);

    //membuat cart array
    $card_item = [
        'ProductID' => $ProductID,
        'product_name' => $product['ProductName'],
        'quantity' => $quantity,
        'unit_price' => $product['UnitPrice'],
        'subtotal' => $quantity * $product['UnitPrice']
    ];

    //menambahkan cart_array menggunakan Session cart array
    $_SESSION['cart'][] = $card_item;
}
    function calculateTotal($cart){
        $total=0;
        foreach ($cart as $item) {
            $total += $item['subtotal'];
            }
            return $total;
        }
    ?>

<div class="container mmy-5">

<?php
include 'header.php';
?>

<br>
<h1>SHOPPING CART</h1>
<br>
<div style="width: 50%">
    <table class="table table-striped" border="5" cellpadding="7">
        <tr>
            <td class="bg-danger bg-gradient fw-bold">NAMA PRODUK</td>
            <td class="bg-danger bg-gradient fw-bold">JUMLAH</td>
            <td class="bg-danger bg-gradient fw-bold">HARGA PRODUK</td>
            <td class="bg-danger bg-gradient fw-bold">SUBTOTAL</td>
            <td class="bg-danger bg-gradient fw-bold">OPSI</td>       
        </tr>
        <tbody>
            <?php
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key => $item){
                    echo "<tr>";
                    echo "<td>{$item['product_name']}</td>";
                    echo "<td>{$item['quantity']}</td>";
                    echo "<td>{$item['unit_price']}</td>";
                    echo "<td>{$item['subtotal']}</td>";
                    echo "<td><a href='delete.php?key={$key}' class='btn btn-danger'>HAPUS</a></td>";
                    echo "</tr>";
                }
                    echo "<tr>";
                    echo "<td class='bg-light fw-bold' colspan='3'>Total</td>
                          <td class='bg-light fw-bold'>" . calculateTotal($_SESSION['cart']) . "</td>
                    ";
                    echo "</tr>";
                }
               
            ?>
        </tbody>
    </table>
    <p><a href="homepage.php" class="btn btn-warning mx-2">KEMBALI KE HALAMAN UTAMA</a></p>
    </div>
    </div>

<?php
include 'footer.php';
?>