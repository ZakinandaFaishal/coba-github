<?php
include 'header.php';
?>

<br>
<h1>SELAMAT DATANG DI JOGJAMART</h1>
<br>

<div style="height: 60vh; width: 50%">
    <table class="table table-striped" border="5">
        <tr>
            <td class="bg-danger bg-gradient fw-bold">ID</td>
            <td class="bg-danger bg-gradient fw-bold">KATEGORI BARANG</td>
            <td class="bg-danger bg-gradient fw-bold">DESKRIPSI</td>
        </tr>

        <?php
        include 'koneksi.php';
            $query= mysqli_query($conn,"SELECT * FROM categories");
            while($data=mysqli_fetch_array($query))
            {?>
        <tr>
            <td><?php echo $data['CategoryID'];?></td>
            <td><a href="daftarproduk.php?CategoryID=<?php echo $data['CategoryID'];?>"><?php echo $data['CategoryName'];?></td></a>
            <td><?php echo $data['Description'];?></td>
            <input type="hidden" name="CategoryID" value="<?php echo $data['CategoryID'];?>">
        </tr>

        <?php
        }
        ?>
    </table>
</div>
<?php
include 'footer.php';
?>