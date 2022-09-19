<?php
if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $foto=$_POST['foto'];
    if(empty($nama)){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else {
    include "../toko.php";
        $update=mysqli_query($conn,"update pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."', username='".$username."',foto='".$foto."',password='".md5($password)."' where id_pelanggan = '".$id_pelanggan."' ") or
        die(mysqli_error($conn));
        if($update){
            echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
        }
    }
}
?>