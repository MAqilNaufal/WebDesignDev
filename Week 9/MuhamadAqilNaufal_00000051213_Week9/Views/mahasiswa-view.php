<h1 class="h2 mt-3">Lihat Data Mahasiswa</h1>

<?php

// 1. Koneksi DB
require 'functions.php';
$pdo = koneksiDb();


// 2. SQL
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

?>
    <br>
    <p>NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php
    echo $nim; ?>
    </p>

    <p>Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php
    echo $nama; ?>
    </p>

    <p>Foto &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
    <img src="<?php echo $foto; ?>" ?>
    </p>

    <p>Tanggal Lahir &nbsp: <?php
    echo $tgl_lahir; ?>
    </p>

    <p>Jenis Kelamin &nbsp: <?php
    if($jk == "M"){
    echo "Laki-laki";}
    else{
    echo "Perempuan";
    }
    ?>

    <p>Prodi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php
    echo $prodi; ?>
    </p>

<input type="hidden" name="id" value="<?= $id; ?>">
