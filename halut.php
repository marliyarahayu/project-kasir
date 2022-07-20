
<link rel="stylesheet" href="halut.css">
<div class="wadah">
        <div class="halut">
            <h2 class="item">Project Kasir</h2>
            <ul>
                <li><a href="halut.php?page=pembeli" class="link">Data Pembeli</a></li>
                <li><a href="halut.php?page=pegawai" class="link">Data Pegawai</a></li>
                <li><a href="halut.php?page=kategori" class="link">Data Kategori</a></li>
                <li><a href="halut.php?page=produk" class="link">Data Produk</a></li>
                <li><a href="halut.php?page=transaksi" class="link">Data Transaksi</a></li>    
            </ul>
            
            
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "pembeli"){
                        include "datapembeli.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "inputpembeli"){
                        include "inputpembeli.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "editpembeli"){
                        include "editpembeli.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "pegawai"){
                        include "datapegawai.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "inputpegawai"){
                        include "inputpegawai.php";
                    }
                   }
               ?>
        </div> 
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "editpegawai"){
                        include "editpegawai.php";
                    }
                   }
               ?>
        </div>
         <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "kategori"){
                        include "datakategori.php";
                    }
                   }
               ?>
        </div> 
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "tambah"){
                        include "inputkategori.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "editkategori"){
                        include "editkategori.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "produk"){
                        include "dataproduk.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "inputproduk"){
                        include "inputproduk.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "editproduk"){
                        include "editproduk.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "transaksi"){
                        include "inputtransaksi.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "detailtransaksi"){
                        include "detailtransaksi.php";
                    }
                   }
               ?>
        </div>
        <div>
              <?php
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == "hapustransaksi"){
                        include "hapus.php";
                    }
                   }
               ?>
        </div>
       

        <!-- <div class="konten">
            <a href="datapembeli.php"><input type="button" value="Data Pembeli"></a>
            <a href="datapegawai.php"><input type="button" value="Data Pegawai"></a>
            <a href="datakategori.php"><input type="button" value="Data Kategori"></a>
            <a href="dataproduk.php"><input type="button" value="Data Produk"></a>
            <a href="inputtransaksi.php"><input type="button" value="Data Transaksi"></a>
        </div> -->
</div>