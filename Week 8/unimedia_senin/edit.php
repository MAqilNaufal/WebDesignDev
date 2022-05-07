<?php
$ID_Mhs = $_POST['newID'];
$nama_Mhs = $_POST['newName'];
$alamat_Mhs = $_POST['newAddress'];
$telp_Mhs = $_POST['newPhone'];

$a = "mysql:host=localhost;dbname=unimedia_senin";
$username="root";
$password="";
$connection = new PDO($a, $username, $password);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE kampus SET nama = '$nama_Mhs', alamat = '$alamat_Mhs', telepon = '$telp_Mhs' WHERE id = 'ID_Mhs'";

$connection->exec($sql);

$connection = null;

header('Location: index1.php');
?>