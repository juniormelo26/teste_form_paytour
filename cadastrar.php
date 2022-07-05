<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Classes\Cadastro;
use App\Classes\Upload;

/* VEIRIFICA SE FILES EXISTE E TRATA O ARQUIVO MOVENDO PARA PASTA files */

if (isset($_FILES)) {

    $obUpload = new Upload($_FILES['arquivo']);

    // PEGA O NOME DO ARQUIVO 
    $aqruivos = $obUpload->getBaseName();
    $sucesso = $obUpload->upload(__DIR__ . '/files');
}

/* TRATA DOS DADOS PARA ENVIO AO BANCO DE DADOS */

/* PEGA DATA  */
$data = date("Y-m-d H:i:s");

/* PEGA O IP DO USUARIO */
$ip = $_SERVER['REMOTE_ADDR'];

$obDados = new Cadastro;

if (isset(
    $_POST['nome'],
    $_POST['email'],
    $_POST['telefone'],
    $_POST['cargo'],
    $_POST['escolaridade'],
    $_FILES['arquivo'],
    $_POST['observacao']
)) {

    $obDados->nome          = $_POST['nome'];
    $obDados->email         = $_POST['email'];
    $obDados->telefone      = $_POST['telefone'];
    $obDados->cargo         = $_POST['cargo'];
    $obDados->escolaridade  = $_POST['escolaridade'];
    $obDados->observacao    = $_POST['observacao'];
    $obDados->arquivo       = $aqruivos;
    $obDados->ip            = $ip;
    $obDados->data          = $data;
    $obDados->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/form.php';
