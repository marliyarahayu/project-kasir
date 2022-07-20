<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputproduk.css">
<div class="judul">
     <h2 class="a">Edit Produk</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
<div class="data">
<?php
 include "koneksi.php";
 if(isset($_POST['update'])){
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $stok          = $_POST['stok'];
    $harga      = $_POST['harga'];
    $tglkadaluarsa    = $_POST['tglkadaluarsa'];
    $kodekategori       = $_POST['kategori'];
    $gambar        = $_FILES['gambar']['name'];
    $dir        = 'img/'.$gambar;

    $size = $_FILES['gambar']['size'];
    
    if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
        
        if($size >= 3000000){
            echo "File Terlalu Besar";
        }else{
            if(move_uploaded_file($_FILES['gambar']['tmp_name'],$dir)){
                mysqli_query($koneksi, "UPDATE produk SET namabarang='$namabarang',stok='$stok',harga='$harga',tglkadaluarsa='$tglkadaluarsa', kodekategori='$kodekategori',gambar='$gambar' WHERE kodebarang='$kodebarang'");

        }
      }
    }
    else{
        mysqli_query($koneksi, "UPDATE produk SET namabarang='$namabarang',stok='$stok',harga='$harga',tglkadaluarsa='$tglkadaluarsa', kodekategori='$kodekategori' WHERE kodebarang='$kodebarang'");

    
    } 
}

 if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM produk WHERE kodebarang='$id'");
    $data = mysqli_fetch_array($query);
    $kategori = $data['kodekategori'];
    $gambar = $data['gambar'];

    ?>
        
<form action="" method="post" enctype="multipart/form-data">

        <div class="name"> Kode Barang :</div> 

                    <input type="text" name="kodebarang" id="" class="kode" value="<?=$data ['kodebarang'] ?>" readonly>
                    
        <div class="name"> Nama Barang :</div> 
                    <input type="text" name="namabarang" id="" class="kode" value="<?=$data ['namabarang'] ?>">
                    
        <div class="name"> Stok :</div>
                    <input type="text" name="stok" id="" class="kode" value="<?=$data ['stok'] ?>">
        
        <div class="name"> Harga :</div>
                    <input type="text" name="harga" id="" class="kode" value="<?=$data ['harga'] ?>">
        
        <div class="name"> Tanggal Kadaluarsa :</div> 
                    <input type="date" name="tglkadaluarsa" id="" class="kode" value="<?=$data ['tglkadaluarsa'] ?>">

        <div class="name"> Nama Kategori :</div> 
                    <select name="kategori" id="" class="kode">
                        <?php
                            include "koneksi.php";
                            $query=mysqli_query($koneksi,"SELECT * FROM kategori");
                            while($data = mysqli_fetch_array($query)){
                                
                                if($data['kodekategori']== $kategori){
                                    $pilih = "selected";
                                }else{
                                    $pilih = "";
                                }
                                ?>
                        <option value="<?= $data['kodekategori']?>" <?= $pilih?>><?= $data['namakategori']?></option>
                        <?php } ?>
                    </select>

            <div class="name"> Gambar :</div> 

                    <?php
                    if(isset($gambar)){
                        ?>
                    <img src="img/<?= $gambar?>" alt="" width=100 height=100 class="img"><br>
                    <?php
                    }
                    ?>
                    <input type="file" name="gambar" id="" class="kode">
    
                    <input type="submit" value="UPDATE" name="update" class="simpan">
        
</form>
<?php
 }
 ?>
 </div>