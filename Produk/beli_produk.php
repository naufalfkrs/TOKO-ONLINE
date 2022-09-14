<?php
    include "../Login/header.php";
    include "../toko.php";
    $qry_detail_buku=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_buku=mysqli_fetch_array($qry_detail_buku);
?>
<h2>Beli Produk</h2>
<div class="row">
    <div class="col-md-4">
        <img src="gambar/<?=$dt_buku['foto']?>" class="card-img-top">
    </div>
    <div class="col-md-8">
        <form action="masukkeranjang.php?id_produk=<?=$dt_buku['id_produk']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama Produk</td><td><?=$dt_buku['nama_produk']?></td>
                    </tr>
                    <tr>
                        <td>Harga</td><td><?="<span>Rp. </span>".$dt_buku['harga']?></td>
                    </tr>
                    <tr>
                        <td>Jumlah</td><td><input type="number" name="jumlah_beli" value="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="BELI"></td>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>