<!DOCTYPE html>
<html>
<head>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha38+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"crossorigin="anonymous">
    <title>Tampil Pelanggan</title>
</head>
<body>
    <h3>Tampil Pelanggan</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA PELANGGAN</th>
                <th>ALAMAT</th><th>NO TELP</th>
                <th>USERNAME</th><th>FOTO</th><th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../toko.php";
            $qry_siswa=mysqli_query($conn,"select * from pelanggan ");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
            $no++;?>
            <tr>
                <td><?=$no?></td><td><?=$data_siswa['nama']?></td>
                <td><?=$data_siswa['alamat']?></td>
                <td><?=$data_siswa['telp']?></td>
                <td><?=$data_siswa['username']?></td>
                <td><img src="gambar/<?=$data_siswa['foto']?>"class="card-img-top" width="150" height="98" ></td>
                <td><a href="ubah_pelanggan.php?id_pelanggan=<?=$data_siswa['id_pelanggan']?>" class="btn btn-success">Ubah</a> |  
                    <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_siswa['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <a href="tambah_pelanggan.php" class="btn btn-primary">Tambah</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
</body>
</html>