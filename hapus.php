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
     $queri = mysqli_query($koneksi, "DELETE FROM transaksi WHERE nomorfaktur='$id'");
     $queri1 = mysqli_query($koneksi, "DELETE FROM detailtransaksi WHERE nomorfaktur='$id'");

     if(mysqli_affected_rows($koneksi)>0){
        header("location:halut.php?page=transaksi");
     }else{
         echo "Data Gagal Dihapus";
     }
 }

?>