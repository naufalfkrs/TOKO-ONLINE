<!-- ?php
if($_POST){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        include "../toko.php";
        $qry_login=mysqli_query($conn,"select * from pelanggan where username = '".$username."' and password = '".md5($password)."'");
        if(mysqli_num_rows($qry_login)>0){
            $dt_login=mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_pelanggan']=$dt_login['id_pelanggan'];
            $_SESSION['nama']=$dt_login['nama'];
            $_SESSION['status_login']=true;
            header("location: home.php");
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
?> -->

<?php
session_start();
include "../toko.php";
$username = $_POST['username'];
$password = $_POST['password'];
$q = mysqli_query($conn, "select * from pelanggan where username='".$username."' and password='".md5($password)."'");
$r = mysqli_fetch_array ($q);
$q2 = mysqli_query($conn,"select * from petugas where username='".$username."' and password='".md5($password)."'");
$row = mysqli_fetch_array ($q2);
if (mysqli_num_rows($q) > 0) {
    $_SESSION['id_pelanggan'] = $r['id_pelanggan'];
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['nama'] = $r['nama'];
    $_SESSION['foto'] = $r['foto'];
    $_SESSION['status_login']=true;
    header('location:home.php');
}
else if (mysqli_num_rows($q2) > 0 ) {
    $_SESSION['id_petugas'] = $row['id_petugas'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['nama_petugas'] = $row['nama_petugas'];
    $_SESSION['level'] = $row['level'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['status_login_petugas']=true;
    header('location:home_petugas.php');
}else {
    echo "Login Gagal";
}
?>