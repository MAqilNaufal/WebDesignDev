<?php // /Process/prodi.php
try {
    $koneksi = "mysql:host=localhost;dbname=unimedia_senin";
    $nama = "root";
    $kata_sandi = "";

    $pdo = new PDO($koneksi, $nama, $kata_sandi);

    if($_GET['action'] == "add"){
        $sql = "INSERT INTO prodi (kode, nama)
                VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['kode'], $_POST['nama']]);
        header('Location: ../index.php?page=prodi');
        
    }elseif($_GET['action'] == "edit"){
        $sql = "UPDATE prodi
                SET kode = ?, 
                    nama = ?
                WHERE id = ?";
        $wadah = $pdo->prepare($sql);
        $wadah->execute([
            $_POST['kode'],
            $_POST['nama'],
            $_POST['id']
        ]);
        header('Location: ../index.php?page=prodi');
        
    }elseif($_GET['action'] == "delete"){
        $sql = "DELETE FROM prodi
                WHERE id = ?";
        $wadah = $pdo->prepare($sql);
        $wadah->execute([$_GET['id']
        ]);
        header('Location: ../index.php?page=prodi');
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}
?>