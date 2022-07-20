<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<?php
include "koneksi.php";
 if(isset($_GET['id'])){
     $id = $_GET['id'];
     $queri = mysqli_query($koneksi, "DELETE FROM kategori WHERE kodekategori='$id'");
     if(mysqli_affected_rows($koneksi)>0){
        header("location:halut.php?page=kategori");

     }else{
         echo "Data Gagal Dihapus";
     }
 }

?>
<br><a href="datakategori.php">Kembali</a>