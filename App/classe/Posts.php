<?php
require_once './classe/api/Connection.php';
require_once './classe/api/Transaction.php';
require_once './classe/utils/Utils.php';
class Posts
{

    private $registros = '';
    public function __construct()
    {
        //vazio
    }
    public  function all()
    {

        try {
            $sql = "SELECT * FROM posts LIMIT 10";
            $conn = Transaction::getConnection();
            $result = $conn->prepare($sql);
            $result->execute();
            //criando um log de ações no Banco de Dados com RA
            $RA = "Cosme";
            Utils::log($sql, $RA);
            //echo "O logger foi realizado com sucesso no TXT.";
            //echo "<pre>";
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $row) {
                $this->registros .= $row['post'] . " - " . $row['data'] . " - " .  $row['hora'] . '<br>';
            }
            return $dados;
        } catch (Exception $error) {
            print_r($error);
            exit;
        }
    }
    public  function insert($params)
    {
        $sql = "INSERT INTO  posts (id,post,data,hora,likes)
                                 VALUES  ({$params['id']},
                                         '{$params['post']}',
                                         '{$params['data']}',
                                         '{$params['hora']}',
                                         '{$params['likes']}')";

        //criando um log de ações no Banco de Dados com RA
        $RA = "Cosme";
        Utils::log($sql, $RA);
        echo "O logger foi realizado com sucesso no TXT.";
        //Qual Conexao está aberta?                        
        $conn = Transaction::getConnection();
        //inicia a Transação
        return $conn->exec($sql);
    }
}