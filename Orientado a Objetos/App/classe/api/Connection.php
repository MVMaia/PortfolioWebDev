<?php
class Connection

{
    //sendo Static impede duplicidade do atributo
    private static $conn;
    private function __construct()
    {
        //em Branco 
    }
    public static function open()

    {

        self::$conn = null;
        //verificando se existe o arquivo Config.ini
        if (file_exists("./config/config.ini")) {

            $db = parse_ini_file("./config/config.ini");
        } else {

            throw new Exception("Arquivo ./config/config.ini não encontrado");
        }
        //verificando as variaveis no config.ini e verificando se existem
        //
        $user = isset($db['user']) ? trim($db['user']) : null;
        $pass = isset($db['pass']) ? trim($db['pass']) : null;
        $name = isset($db['name']) ? trim($db['name']) : null;
        $host = isset($db['host']) ? trim($db['host']) : null;
        $type = isset($db['type']) ? trim($db['type']) : null;
        $port = isset($db['port']) ? trim($db['port']) : null;
        //qual será o  Tipo de Banco de Dados Usado no Sistema?

        try {
            switch ($type) {
                case 'pgsql':

                    break;

                case 'mysql':

                    $port = isset($db['port']) ? $db['port'] : '3306';
                    self::$conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                    break;

                case 'sqlite':

                    try {
                        self::$conn = new PDO("sqlite:{$name}");
                        // Definindo o modo de erro do PDO como exceções
                        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //echo '</br>';
                        //echo "Classe Connection DIZ: Conectado ao Banco SQLITE  {$name} com Sucesso!  </br></br>";

                    } catch (Exception $error) {

                        print_r($error);
                        exit;
                    }
                    break;
            }

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (Exception $error) {
            echo "Erro ao Conectar ao Banco de Dados - Classe Connection.php.";
            print('<pre>');
            print_r($error);
            exit;
        }
    }
}
