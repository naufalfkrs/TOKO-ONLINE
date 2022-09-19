
<!DOCTYPE html>
<html>
<head>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha38+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"crossorigin="anonymous">
    <title>Tampil Petugas</title>
</head>
<body>
    <h3>Tampil Petugas</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA PETUGAS</th>
                <th>USERNAME</th><th>LEVEL</th><th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../toko.php";
            $qry_siswa=mysqli_query($conn,"select * from petugas ");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
            $no++;?>
            <tr>
                <td><?=$no?></td><td><?=$data_siswa['nama_petugas']?></td>
                <td><?=$data_siswa['username']?></td>
                <td><?=$data_siswa['level']?></td>
                <td><img src="gambar_petugas/<?=$data_siswa['foto']?>"class="card-img-top" width="150" height="98" ></td>
                <td><a href="ubah_petugas.php?id_petugas=<?=$data_siswa['id_petugas']?>" class="btn btn-success">Ubah</a> |  
                    <a href="hapus_petugas.php?id_petugas=<?=$data_siswa['id_petugas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <a href="tambah_petugas.php" class="btn btn-primary">Tambah</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
</body>
</html>