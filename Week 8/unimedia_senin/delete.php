<?php
$ID_Mhs = $_GET['id'];

$a = "mysql:host=localhost;dbname=unimedia_senin";
$username="root";
$password="";
$connection = new PDO($a, $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "DELETE FROM kampus WHERE id ='$ID_Mhs'";
$connection->exec($sql);

$connection = null;

header('Location: index1.php');
?>