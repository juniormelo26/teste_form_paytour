<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Classes\Cadastro;
use \App\Classes\Upload;
use \App\Classes\Email;


/* VEIRIFICA SE FILES EXISTE E TRATA O ARQUIVO MOVENDO PARA PASTA files */

if (isset($_FILES['arquivo'])) {

    //INSTANCIA O UPLOAD
    $obUpload = new Upload($_FILES['arquivo']);

    // PEGA O NOME DO ARQUIVO 
    $arquivo = $obUpload->getBaseName();

    //MOVE O ARQUIVO PARA PSTA files
    $sucesso = $obUpload->upload(__DIR__ . '/files');
}

/* TRATA DOS DADOS PARA ENVIO AO BANCO DE DADOS */

/* PEGA DATA  */
$data = date("Y-m-d H:i:s");

/* PEGA O IP DO USUARIO */
$ip = $_SERVER['REMOTE_ADDR'];


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
$escolaridade = filter_input(INPUT_POST, 'escolaridade', FILTER_SANITIZE_SPECIAL_CHARS);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_SPECIAL_CHARS);

$obDados = new Cadastro;

/* REMOVENDO CARACTERES NÃO NÚMERICOS DO CAMPO TELEFONE */
$telefone = $obDados->removeNonNumbers($telefone);


if (isset(

    $nome,
    $email,
    $telefone,
    $cargo,
    $escolaridade,
    $_FILES['arquivo'],
    $observacao
)) {

    $obDados->nome          = $nome;
    $obDados->email         = $email;
    $obDados->telefone      = $telefone;
    $obDados->cargo         = $cargo;
    $obDados->escolaridade  = $escolaridade;
    $obDados->observacao    = $observacao;
    $obDados->arquivo       = $arquivo;
    $obDados->ip            = $ip;
    $obDados->data          = $data;
    $sucesso =  $obDados->cadastrar();


    if ($sucesso) {


        /* FORMATA OS DADOS PARA ENVIO DO EMAIL COM DADOS DO FORMULÁRIO*/

        $address = 'juniormelo26@gmail.com';
        $cc = $email;
        $subject = 'Teste de Avaliação Desenvolvedor Full Stack';
        $messageForm = '<b>NOME:</b> ' . $nome . '<br>' .
            '<b>EMAIL:</b> ' . $email . '<br>' .
            '<b>TELEFONE:</b> ' . $telefone . '<br>' .
            '<b>CARGO:</b> ' . $cargo . '<br>' .
            '<b>ESCOLARIDADE:</b> ' . $escolaridade . '<br>' .
            '<b>OBSERVAÇÃO:</b> ' . $observacao . '<br>' .
            '<b>DATA/HORA DO ENVIO:</b> ' . $data . '<br>' .
            '<b>IP DE ORIGEM:</b> ' . $ip;
        $body = $messageForm;
        $attachment = __DIR__ . '/files' . '/' . $arquivo;

        /* ENVIA O EMAIL CONTENDO OS DADOS DO FORMULÁRIO */

        $obMail = new Email();
        $sucesso = $obMail->sendEmail($address, $subject, $body, $attachment, $cc);
        echo $sucesso ? 'Email enviado' : $obMail->getError();

        header('location: index.php?status=success');
        exit;
    }
}

include __DIR__ . '/includes/form.php';
