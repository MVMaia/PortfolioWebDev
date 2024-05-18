<?php
$host = '127.0.0.1:3306';
$db = 'mydb';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;db=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['id'];
    $prepare = $conn->prepare("UPDATE mydb.produtos SET comprado = :comprado WHERE id = :id");
 
    //bindparam("campo", $variável, Tipo_da_Variavel); - PDO::PARAM_STR para STRINGS;
    $prepare->bindValue(":id",$id, PDO::PARAM_STR);
    $prepare->bindValue(":comprado", "S", PDO::PARAM_STR);

   $count = $prepare->execute();
   //$conn = null;
   header('Location: ' . '../index.php');
}catch(PDOException $error){
 
    echo $error->getMessage();
}
?>