<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputpembeli.css">
<div class="judul">
     <h2 class="a">Edit Pembeli</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
<div class="data">


<?php
 include "koneksi.php";
 if(isset($_POST['update'])){
    $kodepembeli = $_POST['kodepembeli'];
    $namapembeli = $_POST['namapembeli'];
    $jk          = $_POST['jk'];
    $alamat      = $_POST['alamat'];
    $nohp        = $_POST['nohp'];

    mysqli_query($koneksi, "UPDATE pembeli SET namapembeli='$namapembeli',jk='$jk',alamat='$alamat',nohp='$nohp' WHERE kodepembeli='$kodepembeli'");
 }
 if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM pembeli WHERE kodepembeli='$id'");
    $data = mysqli_fetch_array($query);
    
    

    ?>
<form action="" method="post">

    <div class="name"> Kode Pembeli :</div> 
                <input type="text" name="kodepembeli" id="" class="kode" value ="<?=$data ['kodepembeli'] ?>" readonly>
    <div class="name"> Nama Pembeli :</div> 
                <input type="text" name="namapembeli" id="" class="kode" value ="<?=$data ['namapembeli'] ?>">
    <div class="name"> Jenis Kelamin :</div>
            <?php
                if($data['jk']=='L'){
                    $l = 'checked';
                }else{
                    $l = '';
                }

                if($data['jk']=='P'){
                    $p = 'checked';
                }else{
                    $p = '';
                }
             ?>
                <input type="radio" name="jk" id="" value="L" <?= $l ?> class="jk">Laki-laki
                <input type="radio" name="jk" id="" value="P" <?= $p ?> class="jk">Perempuan
    <div class="name"> Alamat :</div>
               <textarea name="alamat" id="" cols="20" rows="5" class="text" ><?= $data['alamat']?></textarea>
    <div class="name"> No HP :</div>
                <input type="text" name="nohp" id="" class="kode" value ="<?=$data ['nohp'] ?>">
                <input type="submit" value="UPDATE" name="update" class="simpan">
     
</form>
<!-- <a href="datapembeli.php"><br>Menampilkan</a> -->

<?php

 }
 ?>
 </data>