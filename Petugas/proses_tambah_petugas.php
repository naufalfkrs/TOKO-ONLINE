<?php
if($_POST){
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah_petugas.php';</script>";    
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "../toko.php";
        $ekstensi =  array('png','jpg','JPG','jpeg','gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:tampil_petugas1.php?alert=gagal_ekstensi");
        }else{
            if($ukuran < 1044070){		
                $xx = $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar_petugas/'.$filename);
                mysqli_query($conn, "INSERT INTO petugas VALUES(NULL,'".$nama_petugas."','".$username."','".md5($password)."','".$level."','".$xx."')");
                echo "<script>alert('Sukses menambahkan petugas');location.href='tampil_petugas1.php';</script>";
            }else{
                echo "<script>alert('Gagal menambahkan petugas');location.href='tampil_petugas1.php';</script>";
            }
        }

    }
}
?>

