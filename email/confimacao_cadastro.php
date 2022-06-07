<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
 $teste = "deu certo";
$results_messages = array();

$cliente_cpf = $_POST["cliente_cpf"]; 
$cliente_nome = $_POST["cliente_nome"]; 
$cliente_ddd = $_POST["cliente_ddd"]; 
$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
$cliente_telefone = $_POST["cliente_telefone"]; 
$cliente_endereco = $_POST["cliente_endereco"]; 
$cliente_numero = $_POST["cliente_numero"]; 
$cliente_bairro = $_POST["cliente_bairro"]; 
$cliente_cidade = $_POST["cliente_cidade"]; 
$cliente_cep = $_POST["cliente_cep"]; 
$cliente_estado = $_POST["cliente_estado"]; 
$cliente_emailcad = $_POST["cliente_emailcad"];


	/*echo "cliente_nome---------------->" . $cliente_nome . "<br>";
	echo "cliente_cpf----------------->" . $cliente_cpf . "<br>";
	echo "cliente_data_nacimento------>" . $Data_inv . "<br>";
	echo "cliente_ddd----------------->" . $cliente_ddd . "<br>";
	echo "cliente_telefone------------>" . $cliente_telefone . "<br>";
	echo "cliente_endereco------------>" . $cliente_endereco . "<br>";
	echo "cliente_numero-------------->" . $cliente_numero . "<br>";
	echo "cliente_bairro-------------->" . $cliente_bairro . "<br>";
	echo "cliente_cidade-------------->" . $cliente_cidade . "<br>";
	echo "cliente_estado-------------->" . $cliente_estado . "<br>";
	echo "cliente_cep----------------->" . $cliente_cep . "<br>";
	echo "senha----------------------->" . $cliente_senha . "<br>";
	echo "senhac---------------------->" . $cliente_senhac . "<br>";
	echo "cliente_emailcad----------------------->" . $cliente_emailcad . "<br>";
*/


 
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
Obrigado <b> '. $cliente_nome .' </b> seu cadastro foi realizado com sucesso!
  &nbsp;<br>
  &nbsp;<br>
  &nbsp;<br>
	
	
<font face="Courier"> <strong>  DADOS DO PESSOAIS </strong></font><br>
<font face="Courier"> <strong> CPF/CNPJ--------------> </strong>'. $cliente_cpf.'</font>'.'<br>
<font face="Courier"> <strong> NOME------------------> </strong>'. $cliente_nome.'</font>'.'<br>
<font face="Courier"> <strong> EMAIL-----------------> </strong>'. $cliente_emailcad.'</font>'.'<br>
<font face="Courier"> <strong> ANIVERSARIO-----------> </strong>'. $cliente_data_nacimento.'</font>'.'<br>
<font face="Courier"> <strong> DDD-------------------> </strong>'. $cliente_ddd.'</font>'.'<br>
<font face="Courier"> <strong> TELEFONE--------------> </strong>'. $cliente_telefone.'</font>'.'<br>
<font face="Courier"> <strong> CEP-------------------> </strong>'. $cliente_cep.'</font>'.'<br><br>
<font face="Courier"> <strong> ENDEREÇO--------------> </strong>'. $cliente_endereco.'</font>'.'<br>
<font face="Courier"> <strong> NUMERO----------------> </strong>'. $cliente_numero.'</font>'.'<br>
<font face="Courier"> <strong> BAIRRO----------------> </strong>'. $cliente_bairro.'</font>'.'<br>
<font face="Courier"> <strong> CIDADE----------------> </strong>'. $cliente_cidade.'</font>'.'<br>
<font face="Courier"> <strong> ESTADO----------------> </strong>'. $cliente_estado.'</font>'.'<br>


	
	
	
	
  &nbsp;<br>
  </td>
  </tr>
  </tr>
	  </tr>
  <tr>
    <td><img src="https://morrocavadocafe.com.br/assets/images/logo-122x119.png"/></td>
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
  //echo "<h2>Obrigado pelo contato</h2>\n";
  //echo "<ul>\n";
foreach ($results_messages as $result) {
  //echo "<li>$result</li>\n";
}
echo "</ul>\n";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="3; URL=page3.html">';
}

/*
echo '<font face="Courier"> <strong>  DADOS DO PESSOAIS </strong></font>'."<br>";
echo '<font face="Courier"> <strong> CPF-------------------> </strong>'. $cliente_cpf.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> NOME------------------> </strong>'. $cliente_nome.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> EMAIL-----------------> </strong>'. $cliente_emailcad.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> ANIVERSARIO-----------> </strong>'. $cliente_data_nacimento.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> DDD-------------------> </strong>'. $cliente_ddd.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> TELEFONE--------------> </strong>'. $cliente_telefone.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> ENDEREÇO--------------> </strong>'. $cliente_endereco.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> NUMERO----------------> </strong>'. $cliente_numero.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> BAIRRO----------------> </strong>'. $cliente_bairro.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> CIDADE----------------> </strong>'. $cliente_cidade.'</font>'."<br>"; 
echo '<font face="Courier"> <strong> ESTADO----------------> </strong>'. $cliente_estado.'</font>'."<br>"; 
*/





?>