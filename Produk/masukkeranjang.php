<?php
    session_start();
    if($_POST){
        include "../toko.php";
        $qry_get_buku=mysqli_query($conn,"select * from produk where id_produk= '".$_GET['id_produk']."'");
        $dt_buku=mysqli_fetch_array($qry_get_buku);
        $_SESSION['cart'][]=array(
            'id_produk'=>$dt_buku['id_produk'],
            'nama_produk'=>$dt_buku['nama_produk'],
            'harga'=>$dt_buku['harga'],
            'qty'=>$_POST['jumlah_beli']);
    }
    header('location: keranjang.php');
?>