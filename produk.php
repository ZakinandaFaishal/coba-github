<?php
include 'header.php';
?>

<br>
<h1>DETAIL PRODUK</h1>
<br>


<div class="cotainer">
    <div style="width: 50%">
        <table class="table table-striped" border="5" cellpadding="7">
            <tr>
                <td class="bg-danger bg-gradient fw-bold">ID PRODUK</td>
                <td class="bg-danger bg-gradient fw-bold">NAMA PRODUK</td>
                <td class="bg-danger bg-gradient fw-bold">QUANTYTY/UNIT</td>
                <td class="bg-danger bg-gradient fw-bold">HARGA</td>
                <td class="bg-danger bg-gradient fw-bold">UNIT/STOK</td>
            </tr>

            <?php
            include 'koneksi.php';
                $ProductID= $_GET['ProductID'];
                $query= mysqli_query($conn,"SELECT * FROM products WHERE ProductID='$ProductID'");
                $data=mysqli_fetch_array($query);
            ?>
            <tr align="center">
                <td><?php echo $data['ProductID'];?></td>
                <td><?php echo $data['ProductName'];?></td>
                <td><?php echo $data['QuantityPerUnit'];?></td>
                <td><?php echo $data['UnitPrice'];?></td>
                <td><?php echo $data['UnitsInStock'];?></td>
            </tr>
        </table>
    </div>
        <form action="keranjang.php" method="post" class="col-4">
            <label for="quantity" class="form-label fw-bold">JUMLAH:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
            <input type="hidden" name="ProductID" value="<?php echo $data['ProductID'];?>">
            <button type="submit" class="btn btn-primary my-3 col-4">BELI</button>
        </form> 
    </div>


<?php
include 'footer.php';
?>