<?php
require_once './classe/api/Connection.php';
require_once './classe/utils/Utils.php';
class Transaction
{
    private static $conn;

    private function __construct()
    {
        //em Branco
    }

    public static function open()
    {
        //liberando a conexão
        self::$conn = null;
        //abrindo a Transação com o Banco de Dados 
        self::$conn = Connection::open();
        //Iniciando uma Conexão
        self::$conn->beginTransaction();
    }


    public static function close()
    {

        if (self::$conn) {

            //COMMIT dos procedimentos
            self::$conn->commit();
            //liberando a conexão
            self::$conn = null;
            /// echo '</br></br>';
            //echo "Classe Transaction DIZ: Transação Feita, Commit e Banco Fechado ";
        }
    }
    public static function getConnection()
    {
        self::open();
        //Retorna a Conexão Ativa 
        return self::$conn;
    }
    public static function rollback()
    {

        if (self::$conn) {

            //Cancelar todas alterações Feitas
            self::$conn->rollBack();
            //Libera a Conexão
            self::$conn = null;
            echo "<br>Erro RollBack<br>";
        }
    }
}