<?php
$nama_Mhs = $_POST['name'];
$alamat_Mhs = $_POST['adress'];
$telp_Mhs = $_POST['phone'];

$a = "mysql:host=localhost;dbname=unimedia_senin";
$username="root";
$password="";
$connection = new PDO($a, $username, $password);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO kampus VALUES ('','$nama_Mhs','$alamat_Mhs','$telp_Mhs')";

$connection->exec($sql);

$connection = null;

header('Location: index1.php');
?>