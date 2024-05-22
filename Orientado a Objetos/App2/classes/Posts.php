<?php
require_once './classes/api/Connection.php';
require_once './classes/api/Transaction.php';
require_once './classes/Utils.php';
class Posts
{

    private $registros = '';
    public function __construct()
    {
        //vazio
    }
    public function all()
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
                $this->registros .= $row['post'] . " - " . $row['data'] . " - " . $row['hora'] . '<br>';
            }
            return $dados;
        } catch (Exception $error) {
            print_r($error);
            exit;
        }
    }

    public function insert($params)
    {
        try {

            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d-m-Y');
            $hora = date('H:i');

            
            $sql = "INSERT INTO  posts (post,data,hora)
            VALUES  ('{$params['posts']}',
                    '$data',
                    '$hora')";

            //criando um log de ações no Banco de Dados com RA
            $RA = "Marcelo";
            Utils::log($sql, $RA);
            echo "O logger foi realizado com sucesso no TXT.";
            //Qual Conexao está aberta?                        
            $conn = Transaction::getConnection();
            echo "Postado";
            //inicia a Transação
            $result = $conn->prepare($sql);
            $result->execute();
            Transaction::close();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
        }
    }
    
    public function deletePost($params){
        
        try{
            
            $sql = "DELETE FROM posts WHERE id = :id";
            $dev = "Marcelo";
            Utils::log($sql,$dev);
            $conn = Transaction::getConnection();
            $query = $conn->prepare($sql);
            $query->bindParam(':id',$params['id']);
            $query->execute();
            echo "deletado";
            Transaction::close();

        }catch(Exception $error){
            echo '<pre>';
            print_r($error);
        }
    }

    public function updatePost($params){
        try{
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d-m-Y');
            $hora = date('H:i');

            $sql = "UPDATE posts SET post = :post, data = :data, hora = :hora WHERE id = :id";
            $dev = "Marcelo";
            Utils::log($sql,$dev);
            $conn = Transaction::getConnection();
            $query = $conn->prepare($sql);
            $query->bindParam(':post',$params['updated']);
            $query->bindParam(':data',$data);
            $query->bindParam(':hora',$hora);
            $query->bindParam(':id',$params['id']);
            $query->execute();
            echo "atualizado";
            Transaction::close();

        }catch(Exception $error){
            echo '<pre>';
            print_r($error);
        }
    }
}
