<?php 
    if($_GET['id_transaksi']){
        include "../toko.php";
        $hapus="delete from transaksi where id_transaksi ='".$_GET['id_transaksi']."'";
        $hapus2="delete from detail_transaksi where id_transaksi ='".$_GET['id_transaksi']."'";
        
        $hasil =mysqli_query($conn,$hapus);
        $hasil2=mysqli_query($conn,$hapus2);

        
        if($hasil && $hasil2 ){
        include "../toko.php";
            echo "<script>alert('Sukses hapus histori');location.href='histori_pembelian.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus histori');location.href='histori_pembelian.php';</script>";
        }
    }
?>