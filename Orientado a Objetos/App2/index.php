<?php
session_start();
require_once 'classes/api/Transaction.php';
//require_once  './classe/utils/Utils.php';
//Adicionando a classes automaticamente
spl_autoload_register(function ($class) {
    if (file_exists('./classes/' . $class . '.php')) {
        require_once './classes/' . $class . '.php';
        //echo "Existe: " . './classe/' . $class . '.php' . '<br>';
    } else {
        echo "arquivo não encontrado: " . './classes/' . $class . '.php';
    }
});
$_SESSION['raiz'] = "http://localhost/app2/";

$classe = isset($_REQUEST['class']) ? $_REQUEST['class'] : null;
$metodo = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;


if (class_exists($classe)) {

    //echo  'classe é: ' . $classe . '<br></br>'; 
    //echo  'método é: ' . $metodo . '<br></br>';
    
    $pagina = new $classe($_REQUEST);
    
    

    if (!empty($metodo) and method_exists($classe, $metodo)) {
        $pagina->$metodo($_REQUEST);
        echo $metodo;
        exit;
    }
    //autenticação
    if ($classe === "Login") {

        $pagina->show();
    } else {

        if (isset($_SESSION['usuario'])) {
            //demais páginas somente podem ser mostradas caso haja um usuário autenticado
            $pagina->show();
        } else {

            header('Location: ./index.php?class=Login');
            exit;
        }
    }
}
