<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputkategori.css">
<div class="judul">
     <h2 class="a">Edit Kategori</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
<div class="data">


<?php
 include "koneksi.php";
 if(isset($_POST['update'])){
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];
   

    mysqli_query($koneksi, "UPDATE kategori SET namakategori='$namakategori' WHERE kodekategori='$kodekategori'");
 }
 if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM kategori WHERE kodekategori='$id'");
    $data = mysqli_fetch_array($query);

    ?>

<form action="" method="post">
   
        <div class="name"> Kode Kategori :</div>
                <input type="text" name="kodekategori" id="" class="kode" value="<?=$data ['kodekategori'] ?>" readonly>
        <div class="name"> Nama Kategori :</div> 
                <input type="text" name="namakategori" id="" class="kode" value="<?=$data ['namakategori'] ?>">
                <input type="submit" value="UPDATE" name="update" class="simpan">
    


</form>
</div>
<!-- <a href="datakategori.php"><br>Menampilkan</a> -->
<?php
 }
 ?>