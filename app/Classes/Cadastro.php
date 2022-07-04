<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Cadastro
{


    public $id;

    public $nome;
    public $email;
    public $telefone;
    public $cargo;
    public $escolaridade;

    /* PERMITIDO APENAS PDF - DOC - DOCX */
    public $arquivo;

    /* CAMPO NÃO OBRIGATÓRIO */
    public $observacao;

    /* PEGA O IP DO USUARIO QUE REALIZOU O CADASTRO */
    public $ip;

    public $data;



    /* METODO PARA CADASTRAR OS DADOS DO USUARIO 
     RETORNA BOOLEAN
    */

    public function cadastrar()
    {

        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        //DEFINIR IP
        $this->ip = $_SERVER['REMOTE_ADDR'];


        /* INSERE OS DADOS NO BANCO */
        $obDatabase = new Database('curriculos');
        /* echo "<pre>";
        print_r($obDatabase);
        echo "</pre>"; */
        $this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'cargo' => $this->cargo,
            'escolaridade' => $this->escolaridade,
            'arquivo' => $this->arquivo,
            'observacao' => $this->observacao,
            'ip' => $this->ip,
            'data' => $this->data

        ]);
        return true;
    }
}
