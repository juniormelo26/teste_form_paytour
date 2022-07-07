<?php

namespace App\Classes;


use PHPMailer\PHPMailer\PHPMailer;
use Exception;


class Email
{

    /* CREDENCIAIS DE ACESSO SMTP UTILIZANDO GMAIL*/
    const HOST      = 'smtp.gmail.com';
    const USER      = 'seuemailgmail@gmail.com';
    const PASS      = 'sua senha '; // CRIAR SENHA DE APP DO GOOGLE PARA O EMAIL ACIMA-> https://myaccount.google.com/security?hl=pt_BR
    const SECURE    = 'TLS';
    const PORT      = '587';
    const CHARSET   = 'UTF-8';

    /* DADOS DO REMETENTE */
    const FROM_EMAIL = 'juniormelo26@gmail.com';
    const FROM_NAME = 'Antonio de Melo Sousa Junior';


    /* MESAGENS DE ERRO DO ENVIOLA */
    private $error;


    /*  METODO RESPOSANVEL PARA RETORNAR A MENSGEM DE ERRO DO ENVIO */
    public function getError()
    {
        return $this->error;
    }
    /*  METODO RESPOSANVEL POR ENVIAR O EMAIL
    @param string/array $addresses
    @param string/ $subject
    @param string/ $bodyEncoding
    @param string/array $attachments
    @param string/array $ccs
    @param string/array $bccs
    @return boolean
    */
    public function sendEmail($addresses, $subject, $body, $attachments = [], $ccs = [], $bccs = [])
    {
        //LIMPAR A MENSAGEM DE ERROR
        $this->error = '';

        //INSTANCIA DE PHPMailer
        $obMail = new PHPMailer(true);
        try {

            /* CREEDNCIAIS DE ACESSO SMTP */
            $obMail->isSMTP(true);
            $obMail->Host       = self::HOST;
            $obMail->SMTPAuth   = true;
            $obMail->Username   = self::USER;
            $obMail->Password   = self::PASS;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port       = self::PORT;
            $obMail->CharSet    = self::CHARSET;

            //REMETENTE
            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            //DESTINATARIOS
            $addresses = is_array($addresses) ? $addresses : [$addresses]; // recebe um array, caso seja um array recebe ele mesmo
            foreach ($addresses as $address) {
                $obMail->addAddress($address);
            }
            //ANEXOS
            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach ($attachments as $attachment) {
                $obMail->addAttachment($attachment);
            }
            //CÓPIA
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach ($ccs as $cc) {
                $obMail->addCC($cc);
            }
            //COPIA OCULTA
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach ($bccs as $bcc) {
                $obMail->addBCC($bcc);
            }

            //CONTEUDO DO EMAIL
            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            //ENCIA O EMAIL
            return $obMail->send();
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
