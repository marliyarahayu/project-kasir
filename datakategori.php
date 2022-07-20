<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
 <link rel="stylesheet" href="kategori.css">
 <div class="judul">
     <h2 class="a">Data Kategori</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
    <?php
    include "koneksi.php";
    ?>
    <div class="serch">
        <a href="halut.php?page=tambah"><input type="button" name="tambah" value=" + Tambah Data" class="tambah"></a>
        <form action="" method="post">
            <input type="text" name="txtcari" id="" class="cari" placeholder="&nbsp Cari...">
            <input type="submit" value="CARI" name="cari" class="cari2">
        </form>
    </div>
    <table border="1" cellspacing="0" cellpadding="10" width="800" height="200">
        <tr style="height:40px;">
            <th style="background-color:rgb(52, 61, 61); color:white;">No</th>
            <th style="background-color:rgb(52, 61, 61); color:white;">Kode Kategori</th>
            <th style="background-color:rgb(52, 61, 61); color:white;">Nama Kategori</th>
            <th style="background-color:rgb(52, 61, 61); color:white;" colspan="2">Aksi</th>
        </tr>
        <?php
    if(isset($_POST['cari'])){
        $cari = $_POST['txtcari'];
        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kodekategori = '$cari' OR namakategori = '$cari'");
        }else{
            $query = mysqli_query($koneksi,"SELECT * FROM kategori");
        }
        $no = 1;

        while($data = mysqli_fetch_array($query)){
            ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $data['kodekategori']?></td>
            <td><?= $data['namakategori']?></td>
            <td><a href="halut.php?page=editkategori&id=<?=$data['kodekategori']?>"><input type="button" value="Edit" class="tekan1"></a></td>
            <td><a href="hapuskategori.php?id=<?=$data['kodekategori']?>"onclick="return confirm('Hapus Data ini?')"><input type="button" value="Hapus" class="tekan2"></a></td>
        </tr>
        <?php
        }
        ?>
    </table>
 </div>
 <!-- <a href="halut.php"><input type="button" value="Kembali ke halaman utama"></a><br> -->
 