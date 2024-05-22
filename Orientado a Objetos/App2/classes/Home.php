<?php

class Home
{

    private $header,$navbar,$posts,$rowTable,$table,$rows,$formPost;
    public function __construct()
    {
        $this->table = file_get_contents("./pages/components/TablePadrao.html");
        $this->montaTabela();
    }

    public function montaTabela(){
        //instanciando o objeto:
        $postsResult = new Posts();
        //aplico o método all da classe posts.php:
        $this->posts = $postsResult->all();
        $i = 1;
        foreach($this->posts as $row){
            $dateE = $row['data'];
            $dateEx = explode('-', $dateE);
            $dateBr = "$dateEx[0]/$dateEx[1]/$dateEx[2]";
            $this->rowTable = file_get_contents("./pages/components/rowTable.html");
            $this->rowTable = str_replace('{id}',$row['id'],$this->rowTable);
            $this->rowTable = str_replace('{post}',$row['post'],$this->rowTable);
            $this->rowTable = str_replace('{data}', $dateBr,$this->rowTable);
            $this->rowTable = str_replace('{hora}', $row['hora'], $this->rowTable);
            $this->rows .= $this->rowTable;
        }
        //montando tabela:
        $this->table = str_replace('{rows}', $this->rows,$this->table);
    }
    public  function show()
    {

        try {
            // Lê o conteúdo de um arquivo chamado "exemplo.txt" para uma string
            $pagina = file_get_contents("./pages/home/home.html");
            $pagina = str_replace('{posts}', $this->table,$pagina);
            $pagina = str_replace('{usuario}', $_SESSION['usuario'], $pagina);
            echo $pagina;
        } catch (Exception $error) {
            print_r($error);
            exit;
        }
    }
}
