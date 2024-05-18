<?php


$host = "127.0.0.1:3306";
$db = "mydb";
$usuario = "root";
$senha = "";
 
 
//Tratamento de Erro (Exception)
try{
    //A Conexao
    $conn = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8",$usuario,$senha);
    //Tratamento de Erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //informações da atualização
    $id = $_GET['id'];
    $produto = $_GET['produto'];
    $quantidade = $_GET['quantidade'];
    $marca = $_GET['marca'];
 
 
    //utilizando o metodo do prepare
    $prepare = $conn->prepare("UPDATE mydb.produtos SET produto = :produto, quantidade = :quantidade, marca = :marca WHERE id = :id");
 
     //bindparam("campo", $variável, Tipo_da_Variavel); - PDO::PARAM_STR para STRINGS;
     $prepare->bindValue(":produto", $produto, PDO::PARAM_STR);
     $prepare->bindValue(":quantidade", $quantidade, PDO::PARAM_STR);
     $prepare->bindValue(":marca", $marca, PDO::PARAM_STR);
     $prepare->bindValue(":id", $id, PDO::PARAM_STR);
 
    $count = $prepare->execute();
    // $conn = null;
    echo $count . " Linha foi atualizada!";
    header('Location: ' . '../index.php');
 
}catch(PDOException $error){
 
    echo "Código do erro foi: " . $conn->errorCode() . "<br>";
    print_r($conn->errorInfo());
    echo "<br>";
 
    //Outra forma de mostrar os erros
    echo $conn->errorInfo()[0] . "<br>";
    echo $conn->errorInfo()[1] . "<br>";
    echo $conn->errorInfo()[2] . "<br>";
    echo "As informsções do erro foi: " . $conn->errorInfo() . "<br>";
    echo $error->getMessage();
}
?>