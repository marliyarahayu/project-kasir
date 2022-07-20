<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputpegawai.css">
<div class="judul">
     <h2 class="a">Input Pegawai</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
 
<form action="" method="post">
    
        <div class="name"> Kode Pegawai :</div> 
                <input type="text" name="kodepegawai" id="" class="kode" placeholder="&nbsp masukan kode...">

        <div class="name"> Nama Pembeli :</div> 
                <input type="text" name="namapegawai" id="" class="kode" placeholder="&nbsp masukan nama...">

        <div class="name"> Jenis Kelamin :</div>
                <input type="radio" name="jk" id="" value="L" class="jk">Laki-laki
                <input type="radio" name="jk" id="" value="P" class="jk">Perempuan

        <div class="name"> Alamat :</div>
               <textarea name="alamat" id="" cols="50" rows="5" class="text"  placeholder="&nbsp masukan alamat..."></textarea>

        <div class="name"> Username :</div>
               <input type="text" name="username" id="" class="kode"  placeholder="&nbsp masukan username...">

        <div class="name"> Username :</div>
                <input type="password" name="password" id="" class="kode"  placeholder="&nbsp masukan password...">

        <div class="name"> Level :</div>
                <input type="text" name="level" id="" class="kode"  placeholder="&nbsp masukan level...">
                
        <div class="name"> No HP :</div>
                <input type="text" name="nohp" id="" class="kode" placeholder="&nbsp masukan nohp...">
                <input type="submit" value="SIMPAN" name="simpan" class="simpan">

</form>
<?php
include "koneksi.php";
    if(isset($_POST['simpan'])){
        $kodepegawai = $_POST['kodepegawai'];
        $namapegawai = $_POST['namapegawai'];
        $jk          = $_POST['jk'];
        $alamat      = $_POST['alamat'];
        $username    = $_POST['username'];
        $password    = sha1($_POST['password']);
        $level       = $_POST['level'];
        $nohp        = $_POST['nohp'];

        $query = mysqli_query($koneksi, "INSERT INTO pegawai VALUES ('$kodepegawai','$namapegawai','$jk','$alamat','$username','$password','$level','$nohp')");

        if(mysqli_affected_rows($koneksi)>0){
            header("location:halut.php?page=pegawai");

        }else{
            echo "Data Gagal Disimpan";
        }
    }

?>
</data>
<!-- <br><a href="datapegawai.php">Lihat Data</a> -->