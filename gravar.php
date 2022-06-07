<?php

// Conexão com o banco de dados
require "adm/comum.php"; 

$id     = -1;
	$cliente_nome = $_POST["cliente_nome"];
	$cliente_sobrenome = $_POST["cliente_sobrenome"];
	$cliente_cpf = $_POST["cliente_cpf"];
	$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
	$cliente_ddd = $_POST["cliente_ddd"];
	$cliente_telefone = $_POST["cliente_telefone"];
	$cliente_endereco = $_POST["cliente_endereco"];
	$cliente_numero = $_POST["cliente_numero"];
	$cliente_bairro = $_POST["cliente_bairro"];
	$cliente_cidade = $_POST["cliente_cidade"];
	$cliente_estado = $_POST["cliente_estado"];
	$cliente_cep = $_POST["cliente_cep"];
	$cliente_emailcad  = $_POST["cliente_emailcad"];
	$cliente_senha = md5($_POST["cliente_senha"]);
	$cliente_senhac = md5($_POST["cliente_senhac"]);

	function inverteData($cliente_data_nacimento){
			if(count(explode("/",$cliente_data_nacimento)) > 1){
				return implode("-",array_reverse(explode("/",$cliente_data_nacimento)));
			}elseif(count(explode("-",$cliente_data_nacimento)) > 1){
				return implode("/",array_reverse(explode("-",$cliente_data_nacimento)));
			}
		}

		$Data_inv = inverteData($cliente_data_nacimento);

	$cliente_nome = $cliente_nome . " " . $cliente_sobrenome;

/*
	echo "cliente_nome---------------->" . $cliente_nome . "<br>";
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


					

		if($id == -1)
		{
			$stmt = $obj_mysqli->prepare("INSERT INTO `cliente` (`cliente_cpf`, `cliente_nome`, `cliente_email`, `cliente_senha`, `cliente_data_nacimento`, `cliente_ddd`, `cliente_telefone`, `cliente_endereco`, `cliente_numero`, `cliente_bairro`, `cliente_cidade`, `cliente_cep`, `cliente_estado`) 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('sssssiisissss', $cliente_cpf, $cliente_nome, $cliente_emailcad, $cliente_senha, $Data_inv, $cliente_ddd, $cliente_telefone, $cliente_endereco, $cliente_numero, $cliente_bairro, $cliente_cidade, $cliente_cep, $cliente_estado);	

			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				//echo "Cliente cadastrado com sucesso";
			}
			
			$result = $obj_mysqli->query("SELECT cliente_Id FROM `cliente` ORDER BY cliente_Id DESC LIMIT 1") or die($obj_mysqli->error);
			while ($aux_query = $result->fetch_assoc()){
			$cliente_Id = $aux_query["cliente_Id"];
			}
			$cliente_Id;
			
			$stmt = $obj_mysqli->prepare("INSERT INTO `pedido`(`pedido_cod_cliente`) 
			VALUES (?)");
			$stmt->bind_param('i', $cliente_Id);	

			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}

			require "email/confimacao_cadastro.php"; 
		}
		
?>