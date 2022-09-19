<?php
if($_POST){
    $nama_pelanggan=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $no_telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($nama_pelanggan)){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";    
    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($no_telp)){
        echo "<script>alert('no telepon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "../toko.php";
        $insert=mysqli_query($conn,"insert into pelanggan (nama, alamat, telp, username, password) value ('".$nama_pelanggan."','".$alamat."','".$no_telp."','".$username."','".md5($password)."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='../Login/login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>

<?php
    // include '../toko.php';
    // $nama_pelanggan=$_POST['nama'];
    // $alamat=$_POST['alamat'];
    // $no_telp=$_POST['telp'];
    // $username=$_POST['username'];
    // $password=$_POST['password'];
    
    // $ekstensi =  array('png','jpg','JPG','jpeg','gif');
    // $filename = $_FILES['foto']['name'];
    // $ukuran = $_FILES['foto']['size'];
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    // if(!in_array($ext,$ekstensi) ) {
    //     header("location:tambah_pelanggan.php?alert=gagal_ekstensi");
    // }else{
    //     if($ukuran < 1044070){		
    //         $xx = $filename;
    //         move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$filename);
    //         mysqli_query($conn, "INSERT INTO pelanggan VALUES(NULL,'$nama_pelanggan','$alamat','$no_telp','$username','$password','$xx')");
    //         echo "<script>alert('Sukses menambahkan pelanggan');location.href='../Login/login.php';</script>";
    //     }else{
    //         echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
    //     }
    // }
?>