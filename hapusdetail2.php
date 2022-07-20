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
     $nofak = $_GET['nofak'];
     
     $query = mysqli_query($koneksi, "DELETE FROM detailtransaksi WHERE iddetailtransaksi='$id'");
    
    
     if(mysqli_affected_rows($koneksi)>0){
        header("location:halut.php?page=detailtransaksi&id=$nofak");

     }else{
         echo "Data Gagal Dihapus";
     }
 }

?>
<br><a href="detailtransaksi.php?id=<?= $nofak ?>">Kembali</a>