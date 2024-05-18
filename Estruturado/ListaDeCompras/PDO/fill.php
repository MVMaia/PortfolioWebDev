<?php

$host = "127.0.0.1:3306";
$db = "mydb";
$user = "root";
$pass = "";
$content = "";
$buyedContent = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $select = $conn->query("SELECT * FROM mydb.produtos WHERE raAluno = '10'");
    $conn = null;

    if ($select) {
        $line = $select->fetch(PDO::FETCH_ASSOC);
        while ($line) {
            if ($line['comprado'] == 'N') {
                $content .= "<tr>
                <td>{$line['produto']}</td>
                <td>{$line['marca']}</td>
                <td>{$line['quantidade']}</td>
                <td>{$line['raAluno']}</td>
                <td class=" . 'buttonTD' . "><button class=" . 'buttonT' . " id=" . 'edit' . " onclick='atualizarElemento(" . $line["id"] . ")'>Editar</button></td>
                <td class=" . 'buttonTD' . "><button class=" . 'buttonT' . " id=" . 'delete' . " onclick='deleteItem(" . $line["id"] . ")'>Deletar</button></td>
                <td class=" . 'buttonTD' . "><button class=" . 'buttonT' . " id=" . 'buy' . " onclick='updateBuy(" . $line["id"] . ")'>Comprado</button></td>
            </tr>";
            $line = $select->fetch(PDO::FETCH_ASSOC);
            } else if ($line['comprado'] == 'S') {
                $buyedContent .= "<tr style=" . '"text-decoration: line-through;"' . ">
                <td>{$line['produto']}</td>
                <td>{$line['marca']}</td>
                <td>{$line['quantidade']}</td>
                <td>{$line['raAluno']}</td>
                <td class=" . 'buttonTD' . "><button class=" . 'buttonT' . " id=" . 'remake' . " onclick='remakeBuy(" . $line["id"] . ")'>Desfazer</button></td>
                <td class=" . 'buttonTD' . "><button class=" . 'buttonT' . " id=" . 'delete' . " onclick='deleteItem(" . $line["id"] . ")'>Deletar</button></td>
            </tr>";
            $line = $select->fetch(PDO::FETCH_ASSOC);
            }
        }
        $conn = null;
    }
    print $content;
    print $buyedContent;
} catch (Exception $error) {
    echo $error->getMessage();
    $conn = null;
}

?>