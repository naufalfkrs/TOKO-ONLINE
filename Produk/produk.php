<?php
    include "../Login/header.php";
?>
<h2 align="center">Daftar Produk</h2>
    <div class="row">
<?php
    include "../toko.php";
    $qry_buku=mysqli_query($conn,"select * from produk");
    while($dt_buku=mysqli_fetch_array($qry_buku)){
?>
    <div class="col-md-3">
        <div class="card" >
        <img src="gambar/<?=$dt_buku['foto']?>" class="card-img-top" width="15" height="300">
            <div class="card-body">
                <h5 class="card-title"><?=$dt_buku['nama_produk']?></h5>
                <p class="card-text"><?=substr($dt_buku['deskripsi'],0,20)?></p>
                <p class="card-text"><?="<span>Rp. </span>".substr($dt_buku['harga'],0,20)?></p>
                <a href="beli_produk.php?id_produk=<?=$dt_buku['id_produk']?>" class="btn btn-primary">Beli</a>
           </div>
        </div>
    </div>
<?php
    }
?>
</div>