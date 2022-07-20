<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputpembeli.css">
<div class="judul">
     <h2 class="a">Input Pembeli</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">

 
<form action="" method="post">
    
        <div class="name"> Kode Pembeli :</div> 
                <input type="text" name="kodepembeli" id="" class="kode" placeholder="&nbsp masukan kode...">
   
        <div class="name"> Nama Pembeli :</div> 
                <input type="text" name="namapembeli" id="" class="kode" placeholder="&nbsp masukan nama...">

        <div class="name"> Jenis Kelamin :</div>
                <input type="radio" name="jk" id="" value="L" class="jk">Laki-laki
                <input type="radio" name="jk" id="" value="P" class="jk">Perempuan

        <div class="name"> Alamat :</div>
               <textarea name="alamat" id="" cols="50" rows="5" class="text"  placeholder="&nbsp masukan alamat..."></textarea>

        <div class="name"> No HP :</div>
                <input type="text" name="nohp" id="" class="kode" placeholder="&nbsp masukan nohp...">
                <input type="submit" value="SIMPAN" name="simpan" class="simpan">
</form>
<?php
        if(isset($_POST['simpan'])){
            $kodepembeli = $_POST['kodepembeli'];
            $namapembeli = $_POST['namapembeli'];
            $jk          = $_POST['jk'];
            $alamat      = $_POST['alamat'];
            $nohp        = $_POST['nohp'];

            include "koneksi.php";

            $query = mysqli_query($koneksi,"INSERT INTO pembeli VALUES ('$kodepembeli','$namapembeli','$jk','$alamat','$nohp')");
            
            if(mysqli_affected_rows($koneksi)>0){
                header("location:halut.php?page=pembeli");
                
            }else{
                echo"Data gagal disimpan";
            }
        }
        ?>
        </div>
    <!-- <br><a href="datapembeli.php">Lihat data</a> -->