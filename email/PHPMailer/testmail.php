<?php

require_once('class.phpmailer.php');

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 25; //Indica a porta de conex�o para a sa�da de e-mails
$mailer->Host = 'smtplw.com.br';//Endere�o do Host do SMTP Locaweb
$mailer->SMTPAuth = true; //define se haver� ou n�o autentica��o no SMTP
$mailer->Username = 'wassalin@crwplasticos.com'; //Login de autentica��o do SMTP
$mailer->Password = 'W_assalin9955'; //Senha de autentica��o do SMTP
$mailer->FromName = 'Bart S. Locaweb'; //Nome que ser� exibido para o destinat�rio
$mailer->From = 'wassalin@crwplasticos.com'; //Obrigat�rio ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress('destinatario@email.com','Nome do destinat�rio'); //Destinat�rios
$mailer->Subject = 'Teste enviado atrav�s do PHP Mailer SMTPLW';
$mailer->Body = 'Este � um teste realizado com o PHP Mailer SMTPLW';
if(!$mailer->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; }
print "E-mail enviado!"
?>