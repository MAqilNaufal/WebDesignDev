<?php

require 'functions.php';
$pdo = koneksiDb();

$sql = "SELECT * FROM prodi";

$hasil = $pdo->query($sql);

?>

<h1 class="mt-3 h2">Program Studi</h1>
<a href="index.php?page=prodi-form&action=add" class="btn btn-primary">
<span data-feather="plus-circle"></span> Buat Prodi Baru</a>

<div class="table-responsive mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama Prodi</th>            
            <th>Tindakan</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['kode']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td>
                <a href="index.php?page=prodi-form&action=edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                <span data-feather="edit"></span> Ubah</a>
                    
                <a href="Process/prodi.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                <span data-feather="trash-2"></span> Hapus</a>
                    
            </td>            
        </tr>
        <?php endwhile; ?>
    </table>
</div>
