<?php
class Utils
{
    private static $timestamp;
    public static function getDataHora()
    {

        date_default_timezone_set('America/Sao_Paulo');
        self::$timestamp = date('d-m-Y H:i:s');
        return self::$timestamp;
    }

    public static function log($sql, $RA)
    {

        //Criando um LOG das ações no Banco de Dados 
        $arquivo = './logger/log.txt';
        $timestamp = Utils::getDataHora();
        $message =  $timestamp . " -  {$RA} disparou :  {$sql}";
        //lendo o arquivo atual na pasta
        $conteudoAtual = file_get_contents($arquivo);
        //Abrindo o arquivo para o modo Escrita
        $arquivoAberto = fopen($arquivo, 'w');
        //Escreve o novo registro de Log no inicio 
        fwrite($arquivoAberto, $message . PHP_EOL);
        //fecha o arquivo aberto 
        fclose($arquivoAberto);
        //Escreve o conteudo antigo abaixo do novo Log
        file_put_contents($arquivo, $conteudoAtual, FILE_APPEND);
    }
}
