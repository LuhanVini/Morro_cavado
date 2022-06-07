<?php

require_once('class.phpmailer.php');

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 25; //Indica a porta de conexão para a saída de e-mails
$mailer->Host = 'smtplw.com.br';//Endereço do Host do SMTP Locaweb
$mailer->SMTPAuth = true; //define se haverá ou não autenticação no SMTP
$mailer->Username = 'wassalin@crwplasticos.com'; //Login de autenticação do SMTP
$mailer->Password = 'W_assalin9955'; //Senha de autenticação do SMTP
$mailer->FromName = 'Bart S. Locaweb'; //Nome que será exibido para o destinatário
$mailer->From = 'wassalin@crwplasticos.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress('destinatario@email.com','Nome do destinatário'); //Destinatários
$mailer->Subject = 'Teste enviado através do PHP Mailer SMTPLW';
$mailer->Body = 'Este é um teste realizado com o PHP Mailer SMTPLW';
if(!$mailer->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; }
print "E-mail enviado!"
?>