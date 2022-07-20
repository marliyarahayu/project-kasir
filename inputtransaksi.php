<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputtransaksi.css">
<div class="judul">
     <h2 class="a">Transaksi</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
<div class="data2">
<form action="" method="post">

        <div class="name"> Nomor Faktur :</div> 
                <input type="text" name="nofaktur" id="" class="kode" placeholder="&nbsp masukan nofak...">
        
         <div class="name"> Nama Pembeli :</div> 

                <select name="pembeli" id="" class="kode">
                    <?php
                 include "koneksi.php";
                    $query = mysqli_query($koneksi,"SELECT * FROM pembeli");
                    while($data = mysqli_fetch_array($query)){
                        ?> <option value="<?=$data['kodepembeli']?>"><?=$data['kodepembeli']?> |
                        <?=$data['namapembeli']?>
                    </option>
                    <?php
                    } 
                ?>
                </select>

            <div class="name"> Waktu :</div> 

                <input type="datetime-local" name="waktu" id="" class="kode">
         
                <input type="submit" value="Proses" name="proses" class="simpan">
</form>
</div>
<div class="proses">
<?php
include "koneksi.php";
if(isset($_POST['proses'])){
    $nofaktur = $_POST['nofaktur'];
    $pembeli = $_POST['pembeli'];
    $petugas = $_SESSION['petugas'];
    $waktu = $_POST['waktu'];

    $query = mysqli_query($koneksi,"INSERT INTO transaksi VALUES ('$nofaktur','$pembeli','$petugas','$waktu')");
    if(mysqli_affected_rows($koneksi)>0){
        echo " ";
    }else{
        echo "Data Gagal Disimpan";
    }
}

?>
<table border="1" cellspacing="0" cellpadding="10" width="600" height="150">
    <tr width="250">
        <th style="background-color:rgb(52, 61, 61); color:white;">Nomor Faktur</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Nama Pembeli</th>
        <th style="background-color:rgb(52, 61, 61); color:white;">Waktu</th>
        <th style="background-color:rgb(52, 61, 61); color:white;" colspan="2">Aksi</th>
    </tr>
    <?php
    include "koneksi.php";
     
    $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN pembeli on pembeli.kodepembeli = transaksi.kodepembeli  ");
    
  
    while($data = mysqli_fetch_array($query)){

    ?>
    <tr>
        <td><?=$data['nomorfaktur']?></td>
        <td><?=$data['namapembeli']?></td>
        <td><?=$data['waktu']?></td>
        <td><a href="halut.php?page=detailtransaksi&id=<?=$data['nomorfaktur']?>"><input type="button" value="Input Belanja" class="tekan1"></a>
        </td>
        <td><a href="halut.php?page=hapustransaksi&id=<?=$data['nomorfaktur']?>"><input type="button"  class="tekan2" value="Hapus" onclick="return confirm('Hapus Data ini?')"></a></td>


    </tr>
    <?php } ?>
</table>
</div>
</div>
