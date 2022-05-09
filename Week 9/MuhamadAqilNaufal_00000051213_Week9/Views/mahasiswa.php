<?php

// 1. Koneksi DB
require 'functions.php';
$pdo = koneksiDb();


// 2. SQL
$sql = "SELECT 
            mahasiswa.id,
            mahasiswa.nim,
            mahasiswa.nama AS nama_mhs,
            mahasiswa.foto,
            prodi.nama AS nama_prodi
        FROM mahasiswa
        JOIN prodi
        ON mahasiswa.prodi_id = prodi.id";

$hasil = $pdo->query($sql);

?>

<h1 class="mt-3 h2">Mahasiswa</h1>
<a href="index.php?page=mahasiswa-form&action=add" class="btn btn-primary">
    <span data-feather="plus-circle"></span> Buat Mahasiswa Baru</a>

<div class="table-responsive mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>NIM</th>            
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Tindakan</th>
        </tr>

        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <!-- ?php if(file_exists("uploads/" . $row['nim'] . ".jpg")): ?> -->
                <img src="<?= $row['foto']; ?>" />
                <!-- //?php endif; ?> -->
            </td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama_mhs']; ?></td>
            <td><?= $row['nama_prodi']; ?></td>
            <td>
                <a href="index.php?page=mahasiswa-view&action=view&id=<?= $row ['id']; ?>" class="btn btn-primary btn-sm">
                <span data-feather="eye"></span> Lihat</a>

                <a href="index.php?page=mahasiswa-form&action=edit&id=<?= $row ['id']; ?>" class="btn btn-warning btn-sm">
                <span data-feather="edit"></span> Ubah</a>
                    
                <a href="Process/mahasiswa.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                <span data-feather="trash-2"></span> Hapus</a>
                    
            </td>            
        </tr>
        <?php endwhile; ?>
    </table>
</div>
