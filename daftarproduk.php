<?php
include 'header.php';
?>

<br>
<h1>DAFTAR PRODUK</h1>
<br>

<div style="height: 60vh; width: 50%">
    <table class="table table-striped" border="5" cellpadding="7">
        <tr>
            <td class="bg-danger bg-gradient fw-bold">ID PRODUK</td>
            <td class="bg-danger bg-gradient fw-bold">NAMA PRODUK</td>
            <td class="bg-danger bg-gradient fw-bold">HARGA</td>
        </tr>

        <?php
        include 'koneksi.php';
            $CategoryID= $_GET['CategoryID'];
            $query= mysqli_query($conn,"SELECT * FROM products WHERE CategoryID='$CategoryID'");
            while($data=mysqli_fetch_array($query))
            {?>
        <tr>
            <td><?php echo $data['ProductID'];?></td>
            <td><a href="produk.php?ProductID=<?php echo $data['ProductID'];?>"><?php echo $data['ProductName'];?></td></a>
            <td><?php echo $data['UnitPrice'];?></td>
        </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php
include 'footer.php';
?>