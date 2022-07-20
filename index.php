<?php
session_start();
if(isset($_SESSION['login'])){
    header("location:index.php");
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    
</head>

<div class="header">
    <div class="judul">
        Projek Kasir 
    </div>
</div>
<body>
     <div class="login">
    <h2 class="judul2">LOGIN</h2>
   
    <form action="" method="post">
        <table class="tabel">
            <tr>
                <td class="user">
                    <label for="" class="username">Username : </label>
                    <input type="text" name="username" id="" class="kotak1" placeholder=" &nbsp username...">
                </td>
            </tr>
            <tr>
                <td class="pass">
                    <label for="" class="password">Password : </label>
                    <input type="password" name="password" id="" class="kotak2" placeholder=" &nbsp password...">
                </td>
            </tr>
            <!-- <tr>
                <td>
                    <input type="submit" value="LOGIN" name="login">
                </td>
            </tr> -->
        </table>
        <div class="tekan">
           <input type="submit" value="LOGIN" name="login" class="tekan2">
        </div>
    </form>
</div>
</body>


</html>
<?php
     include "koneksi.php";
 if(isset($_POST['login'])){
     $user = mysqli_real_escape_string($koneksi,$_POST['username']);
     $pass = sha1($_POST['password']);
     
    $query = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE username='$user' AND password='$pass'");

     if(mysqli_num_rows($query)> 0){
        $data = mysqli_fetch_array($query); 
         header("location:halut.php?page=pembeli");
         $_SESSION['status'] = "berhasil";
         $_SESSION['login'] = true;
         $_SESSION['petugas'] = $data['kodepegawai'];
     }else{
         echo " Login Anda Gagal !!";
     }
 }
?>