<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
 $teste = "deu certo";
$results_messages = array();

$Nome = "";
$email = "";
$telefone = "";
$mensagem = "";


		$Nome = $_POST["Nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		$mensagem = $_POST["mensagem"];

 
 
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
ini_set('default_charset', 'UTF-8');
 
class phpmailerAppException extends phpmailerException {}
 
try {
$to = 'morrocavadocafe@gmail.com';
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
}
$mail->isSMTP();
$mail->SMTPDebug  = 0;
$mail->Host       = "morrocavadocafe.com.br";
$mail->Port       = "465";
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth   = true;
$mail->Username   = "contato@morrocavadocafe.com.br";
$mail->Password   = "morrocavdo2020"; 
	
//$mail->addReplyTo("wassalin@os2prohost.com", "Contato Web");
$mail->setFrom("contato@morrocavadocafe.com.br", "Sistema Web"); //email que envia
$mail->addAddress("morrocavadocafe@gmail.com", "Contato site");// email que recebe
$mail->Subject  = "Email enviado pela home";
$body = '<table width="800" border="0" align="left">
  
  <tr>
  <td>
<br>
Possivel cliente <b> '. $Nome .' </b> solicita contato imediato !
  &nbsp;<br>
  &nbsp;<br>
  &nbsp;<br>
	<font face="Courier"> <strong>Email:------> </strong></font>'. $email .'&nbsp;<br>
	<font face="Courier"> <strong>telefone:------> </strong></font>'. $telefone .'&nbsp;<br>
	<font face="Courier"> <strong>mensagem:------> </strong></font>'. $mensagem .'&nbsp;<br>
  &nbsp;<br>
  </td>
  </tr>
  </tr>
	  </tr>
  <tr>
    <td><img src="https://morrocavadocafe.com.br/assets/images/logo-122x119.png"  width=160 /></td>
  </tr>
  
</table>';

$mail->WordWrap = 78;
$mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
//$mail->addAttachment('images/phpmailer.png',''.$_SESSION["nome_usuario"].''); // optional name
//$mail->addAttachment('images/phpmailer.png', 'phpmailer.png');  // optional name
try {
		$mail->send();
		$results_messages[] = "Mensagem enviada com sucesso";
	}
	catch (phpmailerException $e) {
		throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
	}
}
catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
 
if (count($results_messages) > 0) {
  echo "<h2>Obrigado pelo contato</h2>\n";
  echo "<ul>\n";
foreach ($results_messages as $result) {
  echo "<li>$result</li>\n";
}
echo "</ul>\n";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../">';
}

?>