<?php
$host = "127.0.0.1:3306";
$db = "mydb";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$server;db=$db;charset=utf8;", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $idg = $_GET['id'];
    $sql = "DELETE FROM mydb.produtos WHERE id=$idg";
    $execute = $conn->exec($sql);
    $conn = null;

    echo "EXCLUI ESSE ID AQUI Ó: $idg";
    header('Location: ' . '../index.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>