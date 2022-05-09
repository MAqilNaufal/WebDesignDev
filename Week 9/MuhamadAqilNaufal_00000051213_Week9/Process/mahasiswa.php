<?php

$action = $_GET['action'];
require '../functions.php';

// 1. Koneksi DB
$pdo = koneksiDb();

if($action == "add"){

    // 2. SQL
    $sql = "INSERT INTO mahasiswa (nim, nama, tanggal_lahir, jenis_kelamin, foto, prodi_id)
               VALUES(?, ?, ?, ?, ?, ?)";
    
    // 3. Prepare & Execute
    $stmt = $pdo->prepare($sql);
    $ext_boleh = ["jpg", "png", "jpeg"];
    if(checkFile($_FILES['foto'], $ext_boleh)){

        // Proses Upload
        $ext = getFileExt($_FILES['foto']);
        $temp = $_FILES['foto']['tmp_name'];
        $permanent_path = "../uploads/" . $_POST['nim'] . "." . $ext;
        $file_path = "uploads/" . $_POST['nim'] . "." . $ext;

        if(!file_exists("../uploads")){
            mkdir("../uploads");
        }
        
        move_uploaded_file($temp, $permanent_path);

        $data = [
            $_POST['nim'],
            $_POST['nama'],
            $_POST['tgl_lahir'],
            $_POST['jk'],
            $file_path,
            $_POST['prodi'],
        ];
    
    }else{
        $data = [
            $_POST['nim'],
            $_POST['nama'],
            $_POST['tgl_lahir'],
            $_POST['jk'],
            null,
            $_POST['prodi'],
        ];
    }

    $stmt->execute($data);
    header('Location: ../index.php?page=mahasiswa');
}

elseif($action == "edit"){
    $sql = "UPDATE mahasiswa
            SET nim = ?,
            nama = ?,
            tanggal_lahir = ?,
            jenis_kelamin = ?,
            foto = ?,
            prodi_id = ?
        WHERE id = ?";


    $stmt =  $pdo->prepare($sql);
    $ext_boleh = ["jpg", "png", "jpeg"];
    if(checkFile($_FILES['foto'], $ext_boleh)){

        $ext = getFileExt($_FILES['foto']);
        $temp = $_FILES['foto']['tmp_name'];
        $permanent_path = "../uploads/" . $_POST['nim'] . "." . $ext;
        $file_path = "uploads/" . $_POST['nim'] . "." . $ext;

        if(!file_exists("../uploads")){
            mkdir("../uploads");
        }

        move_uploaded_file($temp, $permanent_path);

        $data = [
            $_POST['nim'],
            $_POST['nama'],
            $_POST['tgl_lahir'],
            $_POST['jk'],
            $file_path,
            $_POST['prodi'],
            $_POST['id']
        ];
    }else{
        $data = [
            $_POST['nim'],
            $_POST['nama'],
            $_POST['tgl_lahir'],
            $_POST['jk'],
            null,
            $_POST['prodi'],
            $_POST['id']
        ];
    }
    $stmt->execute($data);
    header('Location: ../index.php?page=mahasiswa');
}

elseif($action == "delete"){
    $sql = "DELETE FROM mahasiswa
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    header('Location: ../index.php?page=mahasiswa');
}