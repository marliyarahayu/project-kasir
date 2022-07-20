<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="transaksi.css">
<div class="judul">
     <h2 class="a">Detail Transaksi</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
     <div class="data2">
            <?php
                $id = $_GET['id'];
                include "koneksi.php";
                
                $query = mysqli_query($koneksi,"SELECT * FROM produk ");

                while($data = mysqli_fetch_array($query)){
                    $stok  = $data['stok'];
            ?>
            <div class="konten">
                <form action="halut.php?page=detailtransaksi&id=<?= $id ?>&kd=<?= $data['kodebarang'] ?>" method="post">
                        <table>
                            <tr>
                                <td><img src="img/<?=$data['gambar']?>" width="100" height="80" ></td>
                            </tr>
                            <tr>
                                <td>Stok = <?= $stok ?></td>
                            </tr>
                            <td>
                                <input type="text" name="jumlah" id="" size="3" class="jumlah">
                                <input type="submit" value="Beli" name="beli" class="beli">
                            </td>
                        </table>
                </form>
            </div>
            <?php } ?>
    </div>
    <div class="detail">
            <?php
                $id = $_GET['id'];
                $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN pembeli on pembeli.kodepembeli = transaksi.kodepembeli where nomorfaktur = '$id'");
                $data = mysqli_fetch_array($query)
             ?>
                <h3>Data Transaksi</h3>
                <div class="tulisan">
                    Nomor Faktur : <?=$data['nomorfaktur']?><br>
                    Pembeli : <?=$data['namapembeli']?><br>
                    Waktu : <?=$data['waktu']?><br><br>
                </div>

                    <table border="1" cellspacing="0" cellpadding="10" width="600" height="230">
                        <tr >
                            <th style="background-color:rgb(52, 61, 61); color:white;">No</th>
                            <th style="background-color:rgb(52, 61, 61); color:white;">Barang</th>
                            <th style="background-color:rgb(52, 61, 61); color:white;">Jumlah</th>
                            <th style="background-color:rgb(52, 61, 61); color:white;">Harga</th>
                            <th style="background-color:rgb(52, 61, 61); color:white;">Sub Total</th>
                            <th style="background-color:rgb(52, 61, 61); color:white;">Aksi</th>
                        </tr>
                        <?php  
                            include "koneksi.php";
                            if(isset($_POST['beli'])){ 
                                $nofak      = $_GET['id'];
                                $kodebarang = $_GET['kd'];
                                $jumlah     = $_POST['jumlah'];
                            
                        
                                $query1 = mysqli_query($koneksi,"SELECT * FROM produk where kodebarang = '$kodebarang'");
                                $data1 = mysqli_fetch_array($query1);
                                $harga = $data1['harga'];
                                $sisa  = $stok - $jumlah;

                                if($stok < $jumlah){
                                }else{
                                    if ($jumlah == 0) {
                                        echo "<script>alert('Masukan Jumlah Beli Terlebih Dahulu')</script>";
                                    }else{

                                        $query2 = mysqli_query($koneksi,"INSERT INTO detailtransaksi VALUES ('','$nofak','$kodebarang','$jumlah','$harga')");
                                            if($query2){
                                                $update = mysqli_query($koneksi,"UPDATE produk SET stok='$sisa' WHERE kodebarang='$kodebarang'");
                                         }
                                    }
                                }   
                            }
                                 $nofak      = $_GET['id'];
                        
                                $query3 = mysqli_query($koneksi, "SELECT detailtransaksi.iddetailtransaksi,detailtransaksi.nomorfaktur,detailtransaksi.kodebarang,detailtransaksi.jmlbeli,detailtransaksi.harga as hargadetail,produk.namabarang from detailtransaksi join produk on produk.kodebarang = detailtransaksi.kodebarang WHERE nomorfaktur = '$id' order by iddetailtransaksi asc ");
                                $no = 1;
                                $total = 0;
                                while($data2 = mysqli_fetch_array($query3)){
                                $sub = $data2['jmlbeli'] * $data2['hargadetail'];
                            ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $data2['namabarang']?></td>
                                    <td><?= $data2['jmlbeli']?></td>
                                    <td><?= "RP.".$data2['hargadetail']?></td>
                                    <td><?= "RP.".$sub?></td>
                                    <td><a href="hapusdetail2.php?nofak=<?= $nofak?>&id=<?=$data2['iddetailtransaksi']?>" onclick="return confirm('Cancel Pembelian?')"><input type="button" value="Cancel" class="tekan"></a>
                                </tr>
                            <?php
                            $total += $sub;
                            }
                        ?>
                                <tr>
                                    <td colspan="4" style="border:none;">Total</td>
                                    <td colspan="2" style="border:none;"><?="Rp.".$total?></td>
                                </tr>
                    </table>
                    <!-- <div class="total">
                        Total : <?="Rp.".$total?>
                    </div> -->

    </div>

 </div>

   