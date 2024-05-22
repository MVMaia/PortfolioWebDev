<?php

require_once("./classes/api/Transaction.php");
require_once("./classes/Utils.php");
class Usuario
{
    public function __construct()
    {
        //vazio
    }

    public function autenticar()
    {
        try {

            //TUDO MAISCULO OU MINUSCULO NAS TABELAS DO USUARIO ? EIS A QUESTÃO? 
            $sql = "SELECT * FROM users WHERE nome = '" . strtolower($_POST['user']) . "'";
            $conn = Transaction::getConnection();
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            $qtd = count($dados);
            Transaction::close();
            if (!empty($_POST['user'] and $qtd > 0)) {

                if (strtolower($_POST['user']) == $dados[0]['nome']  and strtolower($_POST['password']) == $dados[0]['senha']) {
                    $_SESSION['usuario'] = $dados[0]['email'];
                    Utils::log("Autenticou", $dados[0]['email']);
                    echo "Autenticado";
                }
            } else {
                echo "Intruso Tentando Autenticar";
            }
        } catch (Exception $error) {

            print "<pre>";
            print_r($error);
            exit;
        }
    }
    public static function deslogar()
    {
        try {
            if ($_SESSION['usuario'] != "") {

                Utils::log("Deslogou ",  $_SESSION['usuario']);
                session_destroy();
                echo "Deslogado";
            }
        } catch (Exception $error) {


            print_r($error);
            exit;
        }
    }
    public static function cadastrar($params)
    {
        try{
            Transaction::open();
            $sql = "INSERT INTO  users (nome,email,senha) VALUES ('{$params['user']}', '{$params['mail']}', '{$params['pass']}')";
            $RA = "Marcelo";
            Utils::log($sql, $RA);
            echo "O logger foi realizado com sucesso no TXT.";
            echo 'O.o';
            //Qual Conexao está aberta?                        
            $conn = Transaction::getConnection();
            //inicia a Transação
            $result = $conn->prepare($sql);
            $result->execute();
            echo "Cadastrado";
            Transaction::close();
        } catch (Exception $error) {
            echo "<pre>";
            print_r($error);
        }
    }
    public static function show()
    {
        //vazio sem retorno para mostrar
    }
}
