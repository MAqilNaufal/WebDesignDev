<?php

require 'functions.php';
// 1. Koneksi DB
$pdo = koneksiDb();

$action = $_GET['action'];
if($action == "add"){
    $page_tittle = "Buat Mahasiswa Baru";

    $nim = "";
    $nama = "";
    $tgl_lahir = "";
    $jk = "";
    $foto = "";
    $prodi = "";
    $id = "";
}

elseif($_GET['action'] == "edit"){
    $page_tittle = "Ubah Data Mahasiswa";

    $sql = "SELECT
                mahasiswa.id,
                mahasiswa.nim,
                mahasiswa.nama AS nama_mhs,
                mahasiswa.tanggal_lahir,
                mahasiswa.jenis_kelamin,
                mahasiswa.foto,
                prodi.nama AS nama_prodi
            FROM mahasiswa
            JOIN prodi
            ON mahasiswa.prodi_id = prodi.id
            WHERE mahasiswa.id = ?";

    $hasil = $pdo->prepare($sql);
    $hasil->execute([$_GET['id']]);
    $row = $hasil->fetch();

    $nim = $row['nim'];
    $nama = $row['nama_mhs'];
    $tgl_lahir = $row['tanggal_lahir'];
    $jk = $row['jenis_kelamin'];
    $foto = $row['foto'];
    $prodi = $row['nama_prodi'];
    $id = $row['id'];
}
    
    // 2. SQL
    $sql = "SELECT * FROM prodi";
    
    // 3. Prepare & Execute
    $hasil = $pdo->query($sql);
    


?>

<h1 class="h2 mt-3"><?= $page_tittle; ?></h1>
<form action="process/mahasiswa.php?action=<?= $action ?>" 
              method="post"
              enctype="multipart/form-data">

<div class="form-group">
    <label for="">NIM</label>
    <input type="text" name="nim" value="<?= $nim; ?>" class="form-control">
</div>

<div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="nama" value="<?= $nama; ?>" class="form-control">
</div>

<div class="form-group">
    <label for="">Tanggal Lahir</label>
    <input type="text" name="tgl_lahir" value="<?= $tgl_lahir; ?>" class="form-control" placeholder="YYYY-MM-DD">
</div>

<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <label for="">
        <input type="radio" name="jk" value="M" <?php echo ($jk == 'M'?' checked=checked':''); ?> /> Laki-laki
    </label>
    <label for="">
        <input type="radio" name="jk" value="F" <?php echo ($jk == 'F'?' checked=checked':''); ?> /> Perempuan
    </label>
</div>

<div class="form-group">
    <label for="">Foto</label>
    <input type="file" name="foto" value="<?= $foto; ?>">
</div>

<div class="form-group">
    <label for="">Program Studi</label>
    <select name="prodi" class="form-control">
        <?php while($prodi = $hasil->fetch()): ?>
        <option value="<?= $prodi['id'] ?>"><?= $prodi['nama'] ?></option>
        <?php endwhile; ?>
    </select>
</div>

<input type="hidden" name="id" value="<?= $id; ?>" />
<button type="submit" class="btn btn-success">Simpan</button>

</form>