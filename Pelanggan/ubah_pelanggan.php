<!DOCTYPE html>
<html>
<head>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"crossorigin="anonymous">
    <title>Ubah Pelanggan</title>
</head>
<body>
    <?php
    include "../toko.php";
    $qry_get_siswa=mysqli_query($conn,"select * from pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Ubah Pelanggan</h3>
    <form action="proses_ubah_pelanggan.php" method="post">
        <input type="hidden" name="id_pelanggan" value= "<?=$dt_siswa['id_pelanggan']?>">
        nama siswa :
        <input type="text" name="nama" value= "<?=$dt_siswa['nama']?>" class="form-control">
        Alamat :
        <textarea name="alamat" class="form-control"
        rows="4"><?=$dt_siswa['alamat']?></textarea>
        No Telepon : 
        <input type="number" name="telp" value="<?=$dt_siswa['telp']?>" class="form-control">
        Username :
        <input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        Foto :
        <input type="file" name="foto" value="" class="form-control">   
        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
    </form>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
</body>
</html>