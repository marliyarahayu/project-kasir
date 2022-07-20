<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputproduk.css">
<div class="judul">
     <h2 class="a">Input Produk</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
<form action="" method="post" enctype="multipart/form-data">
    
        <div class="name"> Kode Barang :</div> 
                <input type="text" name="kodebarang" id="" class="kode" placeholder="&nbsp masukan kode...">
        
        <div class="name"> Nama Barang :</div> 
                <input type="text" name="namabarang" id="" class="kode" placeholder="&nbsp masukan nama...">
           
        <div class="name"> Stok :</div> 
                <input type="text" name="stok" id="" class="kode" placeholder="&nbsp masukan stok...">
        
        <div class="name"> Harga :</div> 
                 <input type="text" name="harga" id="" class="kode" placeholder="&nbsp masukan harga...">

         <div class="name"> Tanggal Kadaluarsa :</div> 
                 <input type="date" name="tglkadaluarsa" id="" class="kode">
        
        <div class="name"> Nama Kategori :</div> 

                <select name="kategori" id="" class="kode">
                    <?php
                 include "koneksi.php";
                    $query = mysqli_query($koneksi,"SELECT * FROM kategori");
                    while($data = mysqli_fetch_array($query)){
                        ?> <option value="<?=$data['kodekategori']?>"><?=$data['namakategori']?></option>
                    <?php
                    } 
                ?>
                </select>

        <div class="name"> Gambar :</div> 
                <input type="file" name="gambar" id="" class="kode">
                <input type="submit" value="SIMPAN" name="simpan" class="simpan">
            </td>
        </tr>
    </table>
</form>
<?php
include "koneksi.php";
 if(isset($_POST['simpan'])){
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
                $query = mysqli_query($koneksi,"INSERT INTO produk VALUES('$kodebarang','$namabarang','$stok','$harga','$tglkadaluarsa','$kodekategori','$gambar')");
        }
      }
    }
    else{
        $query = mysqli_query($koneksi,"INSERT INTO produk VALUES('$kodebarang','$namabarang','$stok','$harga','$tglkadaluarsa','$kodekategori','')");
    
    } 
                if(mysqli_affected_rows($koneksi) > 0){
                    header("location:halut.php?page=produk");

                }else{
                    echo"Data gagal disimpan";
                }
 } 
    
    

?>
</div>