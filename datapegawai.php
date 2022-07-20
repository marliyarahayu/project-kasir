<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="pegawai.css">
<div class="judul">
     <h2 class="a">Data Pegawai</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
 <div class="serch">
        <a href="halut.php?page=inputpegawai"><input type="button" name="tambah" value=" + Tambah Data" class="tambah"></a>
        <form action="" method="post">
            <input type="text" name="txtcari" id="" class="cari" placeholder="&nbsp Cari...">
            <input type="submit" value="CARI" name="cari" class="cari2">
        </form>
    </div>

<table border="1" cellspacing="0" cellpadding="10" width="1000" height="230">
    <tr style="height:50px;">
        <th  style="background-color:rgb(52, 61, 61); color:white;">No</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Kode Pegawai</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Nama Pegawai</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Jenis Kelamin</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Alamat</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Username</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">Level</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;">No HP</th>
        <th  style="background-color:rgb(52, 61, 61); color:white;" colspan="2">Aksi</th>
   </tr>
    <?php
        include "koneksi.php";
          if(isset($_POST['cari'])){
              $cari = $_POST['txtcari'];
              $query = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE kodepegawai LIKE '$cari%' OR namapegawai LIKE '$cari%'");
          }else{
              $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
          }

          $no = 1;
           while($data = mysqli_fetch_array($query)){

               ?>

    <tr>
        <td><?= $no++?></td>
        <td><?=$data['kodepegawai']?></td>
        <td><?=$data['namapegawai']?></td>
        <td><?=($data['jk']=='L')?'Laki-laki' :'Perempuan'?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['username']?></td>
        <td><?=$data['level']?></td>
        <td><?=$data['nohp']?></td>
        <td><a href="halut.php?page=editpegawai&id=<?=$data['kodepegawai']?>"><input type="button" value="Edit" class="tekan1"></a></td>
        <td><a href="hapuspegawai.php?id=<?=$data['kodepegawai']?>"
                onclick="return confirm('Hapus Data ini?')"><input type="button" value="Hapus" class="tekan2"></a> </td>
    </tr>

    <?php } ?>
</table>
</div>
<!-- <a href="halut.php"><input type="button" value="Kembali ke halaman utama"></a><br>
<a href="keluar.php">logout</a> -->