<?php

$host = "127.0.0.1:3306";
$db = "mydb";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;db=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $descricao = $_POST['descricao'];
    $marca = $_POST['marca'];
    $qtd = $_POST['qtd'];
    $ra = $_POST['ra'];

    $prepare = $conn->prepare("INSERT INTO mydb.produtos(produto,quantidade,marca,comprado,raAluno) VALUES(:descricao,:qtd,:marca,:comprado,:ra)");
    $prepare->bindValue(":descricao",$descricao,PDO::PARAM_STR);
    $prepare->bindValue(":marca",$marca,PDO::PARAM_STR);
    $prepare->bindValue(":qtd",$qtd,PDO::PARAM_STR);
    $prepare->bindValue(":comprado","N",PDO::PARAM_STR);
    $prepare->bindValue(":ra",$ra,PDO::PARAM_STR);
    $execute = $prepare->execute();
    $conn = null;
    echo "Inserido";
}catch(Exception $error){
    $conn = null;
    echo $error->getMessage();
}

?>