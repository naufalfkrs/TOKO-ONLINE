<?php
    include "../Login/header.php";
?>
<h2 align="center">Keranjang</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Total</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(@$_SESSION['cart']){
            foreach (@$_SESSION['cart'] as $key_produk => $val_produk):
        
             
        ?>
        <tr>
            <td><?=($key_produk+1)?>
            </td><td><?=$val_produk['nama_produk']?></td>
            <td><?=$val_produk['qty']?></td>
            <td><?="<span>Rp. </span>".$val_produk['harga']?></td>
            <td><?= "<span>Rp. </span>".$val_produk['harga'] *  $val_produk['qty']  ?></td>
            <td><a href="hapus_cart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
        </tr>
        
        <?php 
            endforeach; 
            echo("
            <tr >
            <td style='border:none;' colspan='6'><a href='checkout.php' class='btn btn-primary'>Check Out</a></td>
           </tr>  
           
            ");
        } else {
           echo("
           <tr>
            <td colspan='6'><p style='text-align:center'>Tidak Ada Produk di Keranjang</p></td>
           </tr>  
           ");
        }
        ?>
    </tbody>
</table>