<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputkategori.css">
<div class="judul">
     <h2 class="a">Input Kategori</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
    <form action="" method="post">
        
    
        <div class="name"> Kode Kategori :</div>   
                <input type="text" name="kodekategori" id="" class="kode" placeholder="&nbsp masukan kode...">
        <div class="name"> Nama Kategori :</div>   
                <input type="text" name="namakategori" id="" class="kode" placeholder="&nbsp masukan kategori..."> 
                <input type="submit" value="SIMPAN" name="simpan" class="simpan">
        

</form>
<?php
include "koneksi.php";
 if(isset($_POST['simpan'])){
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];

    $query = mysqli_query($koneksi,"INSERT INTO kategori VALUES ('$kodekategori','$namakategori')");

    if(mysqli_affected_rows($koneksi)> 0){
        header("location:halut.php?page=kategori");
        
    }else{
        echo "Data Gagal Disimpan";
    }
 }
?>
</div>
<!-- <br><a href="datakategori.php">Lihat Data</a> -->