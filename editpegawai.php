<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location:index.php");
    exit;

}
?>
<link rel="stylesheet" href="inputpegawai.css">
<div class="judul">
     <h2 class="a">Edit Pegawai</h2>
     <a href="keluar.php"><input type="button" value="Logout" class="logout"></a>
 </div>
 <div class="data">
<?php
 include "koneksi.php";
if(isset($_POST['update'])){
    $kodepegawai = $_POST['kodepegawai'];
    $namapegawai = $_POST['namapegawai'];
    $jk          = $_POST['jk'];
    $alamat      = $_POST['alamat'];
    $username    = $_POST['username'];
    $password    = sha1($_POST['password']);
    $level       = $_POST['level'];
    $nohp        = $_POST['nohp'];
    
    mysqli_query($koneksi, "UPDATE pegawai SET namapegawai='$namapegawai',jk='$jk',alamat='$alamat',username='$username',password='$password',level='$level',nohp='$nohp' WHERE kodepegawai='$kodepegawai'");
}
 if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE kodepegawai='$id'");
     $data = mysqli_fetch_array($query);
?>
     <form action="" method="post">
     <table>
        <h2>Input Data Pegawai</h2>
        <tr>
            <td>Kode Pegawai</td>
            <td>
                <input type="text" name="kodepegawai" id="" value ="<?=$data ['kodepegawai'] ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>
                <input type="text" name="namapegawai" id="" value ="<?=$data ['namapegawai'] ?>">
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <?php
                    if($data['jk']== 'L'){
                        $l = 'checked';
                    }else{
                        $l = '';
                    }
                    if($data['jk']== 'P'){
                        $p = 'checked';
                    }else{
                        $p = '';
                    }
                ?>
                <input type="radio" name="jk" id="" value="L" <?= $l ?>>Laki-laki
                <input type="radio" name="jk" id="" value="P" <?= $p ?>>Perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>
                <textarea name="alamat" id="" cols="20" rows="5"><?=$data ['alamat'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" id=""  value ="<?=$data ['username'] ?>" >
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" id=""  value ="<?=$data ['password'] ?>">
            </td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <input type="text" name="level" id=""  value ="<?=$data ['level'] ?>">
            </td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>
                <input type="text" name="nohp" id=""  value ="<?=$data ['nohp'] ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="submit" value="UPDATE" name="update">
            </td>
        </tr>
    </table>
     </form>
    
     <?php
 }
?>
</div>