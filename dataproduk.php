<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="produk.css">
<div class="judul">
     <h2 class="a">Data Produk</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
 <div class="serch">
        <a href="halut.php?page=inputproduk"><input type="button" name="tambah" value=" + Tambah Data" class="tambah"></a>
        <form action="" method="post">
            <input type="text" name="txtcari" id="" class="cari" placeholder="&nbsp Cari...">
            <input type="submit" value="CARI" name="cari" class="cari2">
        </form>
    </div>
<table border="1" cellspacing="0" cellpadding="10" width="1000" height="430">
    <tr class="th">
        <th style="background-color:rgb(52, 61, 61); color:white;">No.</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Kode Produk</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Nama Produk</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Stok</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Harga</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Tanggal Kadaluarsa</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Kode Kategori</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Gambar</th>
        <th style="background-color:rgb(52, 61, 61); color:white;" colspan="2">Aksi</th>
    </tr>
    <?php
    include "koneksi.php";
        if(isset($_POST['cari'])){
            $cari  = $_POST['txtcari'];
            $query = mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori on kategori.kodekategori = produk.kodekategori   WHERE namabarang like '$cari%' OR kodebarang like '$cari%'");
        }else{
            $query = mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori on kategori.kodekategori = produk.kodekategori ");
        }

        $no = 1;

        while($data = mysqli_fetch_array($query)){
            ?>

    <tr>
        <td><?=$no++ ?></td>
        <td><?=$data['kodebarang']?></td>
        <td><?=$data['namabarang'] ?></td>
        <td><?=$data['stok'] ?></td>
        <td><?=$data['harga'] ?></td>
        <td><?=$data['tglkadaluarsa'] ?></td>
        <td><?=$data['namakategori']?></td>
        <td><img src="img/<?=$data['gambar']?>" width="100" height="80" class="gambar"></td>
        <td><a href="halut.php?page=editproduk&id=<?=$data['kodebarang']?>"><input type="button" value="Edit" class="tekan1"></a></td>
        <td><a href="hapusproduk.php?id=<?=$data['kodebarang']?>" onclick="return confirm('Hapus Data ini?')"><input type="button" value="Hapus" class="tekan2"></a>
        </td>

    </tr>
    <?php } ?>
</table>
</div>
<!-- <a href="halut.php"><input type="button" value="Kembali ke halaman utama"></a><br>
<a href="keluar.php">logout</a> -->