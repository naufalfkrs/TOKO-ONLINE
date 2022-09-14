<?php
    include "../Login/header_petugas.php";
?>
<h2 align="center">Histori Pembelian Pelanggan</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Nama Pelanggan</th><th>Tanggal transaksi</th><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Total Harga</th>
    </thead>
    <tbody>
        <?php 
        include "../toko.php";
        $sql = mysqli_query($conn, "select produk.nama_produk, transaksi.tgl_transaksi, qty, produk.harga, produk.foto, detail_transaksi.subtotal, transaksi.id_transaksi from transaksi JOIN produk ON transaksi.id_produk = produk.id_produk JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi order by id_detail_transaksi desc;");
        
        $no=0;
        if (mysqli_num_rows($sql) > 0) {
            while($histori = mysqli_fetch_array($sql)){
                $no++;

                $qry_buku=mysqli_query($conn,"select P.nama from  pelanggan P  join transaksi T on T.id_pelanggan=P.id_pelanggan where T.id_transaksi = '".$histori['id_transaksi']."'");
                while($dt_buku=mysqli_fetch_array($qry_buku)){
                    $buku_dipinjam=$dt_buku['nama'];
                }
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$buku_dipinjam?></td>
                <td><?=$histori['tgl_transaksi']?></td>
                <td><?=$histori['nama_produk']?></td>
                <td><?=$histori['qty']?></td>
                <td><?=$histori['harga']?></td>
                <td><?=$histori['subtotal']?></td>
            </tr>
            <?php
            }
        } else {
            echo("
            <tr>
             <td colspan='8'><p style='text-align:center'>Tidak Ada Histori</p></td>
            </tr>  
            ");
         }
        ?>