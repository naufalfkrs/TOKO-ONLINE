<?php
if($_POST){
    $id_petugas=$_POST['id_petugas'];
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='ubah_petugas.php';</script>";    
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } else {
        include "../toko.php";
        $ekstensi =  array('png','jpg','JPG','jpeg','gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$ekstensi) ) {
            header("location:ubah_petugas.php?alert=gagal_ekstensi");
        } else if(empty($password)){
            if($ukuran < 1044070){
                $xx = $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar_petugas/'.$filename);
                $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama_petugas."',username='".$username."',level='".$level."', foto='".$xx."' where id_petugas = '".$id_petugas."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update petugas');location.href='tampil_petugas1.php';</script>";
            } else {
                echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }
        } else {
            if($ukuran < 1044070){
                $xx = $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar_petugas/'.$filename);
                $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama_petugas."',username='".$username."',password='".md5($password)."',level='".$level."', foto='".$xx."' where id_petugas = '".$id_petugas."' ") or die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update petugas');location.href='../Login/login.php';</script>";
                } else {
                    echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
                }
            }
        }
    }
}
?>