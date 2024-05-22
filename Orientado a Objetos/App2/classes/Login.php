<?php


class Login
{

    private $registros = '';
    public function __construct()
    {
        //vazio

    }
    public function logando()
    {
        try {
            $dadosPOST = $_POST;
            echo `<script>console.log('Debug Objects:   {$dadosPOST}  ' );</script>`;
            $sql = "SELECT * FROM users ";
            $conn = Transaction::getConnection();
            $result = $conn->query($sql);

            //criando um log de ações no Banco de Dados com RA
            $RA = "Cosme";
            Utils::log($sql, $RA);
            //echo "O logger foi realizado com sucesso no TXT.";
            //echo "<pre>";
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            Transaction::close();

            $_SESSION['usuario'] = $dados[0]['email'];
            echo "Autenticado";
        } catch (Exception $error) {

            print "<pre>";
            print_r($error);
            exit;
        }
    }



    public  function show()
    {

        try {
            // Lê o conteúdo de um arquivo chamado "exemplo.txt" para uma string
            $pagina = file_get_contents("./pages/login/login.html");
            echo $pagina;
        } catch (Exception $error) {
            print_r($error);
            exit;
        }
    }
}
