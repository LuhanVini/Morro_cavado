<?php

$id     = -1;
$cliente_cpf = "";
$cliente_cnpj = "";
$cliente_nome = "";
$cliente_email = "";
$cliente_data_nacimento = "";
$cliente_ddd = "";	
$cliente_telefone = "";
$cliente_endereco = "";
$cliente_numero = "";
$cliente_bairro = "";
$cliente_cidade = "";
$cliente_estado = "";
$cliente_pais = "";


	if(isset($_POST["id"]) 
	&&	isset($_POST["cliente_cpf"]) 
	&&	isset($_POST["cliente_cnpj"]) 
	&&	isset($_POST["cliente_nome"]) 
	&&	isset($_POST["cliente_email"]) 
	&&	isset($_POST["cliente_data_nacimento"]) 
	&&	isset($_POST["cliente_ddd"]) 
	&&	isset($_POST["cliente_telefone"]) 
	&&	isset($_POST["cliente_endereco"]) 
	&&	isset($_POST["cliente_numero"]) 
	&&	isset($_POST["cliente_bairro"]) 
	&&	isset($_POST["cliente_cidade"]) 
	&&	isset($_POST["cliente_estado"]) 
	&&	isset($_POST["cliente_pais"]))

{
	

	if(empty($_POST["cliente_cpf"]))
		$alerta = "Solicitante";

	
		else
	 {
		
		$id     = $_POST["id"];
		$cliente_cpf = $_POST["cliente_cpf"];
		$cliente_cnpj = $_POST["cliente_cnpj"];
		$cliente_nome = $_POST["cliente_nome"];
		$cliente_email = $_POST["cliente_email"];
		$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
		
			function inverteData($cliente_data_nacimento){
			if(count(explode("/",$cliente_data_nacimento)) > 1){
				return implode("-",array_reverse(explode("/",$cliente_data_nacimento)));
			}elseif(count(explode("-",$cliente_data_nacimento)) > 1){
				return implode("/",array_reverse(explode("-",$cliente_data_nacimento)));
			}
		}
		$Data_inv = inverteData($cliente_data_nacimento);

		
		$cliente_ddd = $_POST["cliente_ddd"];	
		$cliente_telefone = $_POST["cliente_telefone"];
		$cliente_endereco = $_POST["cliente_endereco"];
		$cliente_numero = $_POST["cliente_numero"];
		$cliente_bairro = $_POST["cliente_bairro"];
		$cliente_cidade = $_POST["cliente_cidade"];
		$cliente_estado = $_POST["cliente_estado"];
		$cliente_pais = $_POST["cliente_pais"];



		if($id == -1)
		{
			
			echo "<br/>";

			$stmt = $obj_mysqli->prepare("INSERT INTO `cliente`(
			`cliente_cpf`, 
			`cliente_cnpj`, 
			`cliente_nome`, 
			`cliente_email`, 
			`cliente_data_nacimento`, 
			`cliente_ddd`, 
			`cliente_telefone`, 
			`cliente_endereco`, 
			`cliente_numero`, 
			`cliente_bairro`, 
			`cliente_cidade`, 
			`cliente_estado`, 
			`cliente_pais`)
 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)") or die($obj_mysqli->error);
			$stmt->bind_param('ssssssssissss', 
			$cliente_cpf, 
			$cliente_cnpj, 
			$cliente_nome, 
			$cliente_email, 
			$Data_inv, 
			$cliente_ddd, 
			$cliente_telefone, 
			$cliente_endereco, 
			$cliente_numero, 
			$cliente_bairro, 
			$cliente_cidade, 
			$cliente_estado, 
			$cliente_pais);	
			

			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				
					
				echo "cadastro realisado com sucesso!";
				require "envia/email/envia_email_cadastro.php";
				exit;
				
			}

				//echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=index.php'>";
		}

		else
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $obj_mysqli->prepare("UPDATE `cliente` SET `cliente_cpf`=?, `cliente_cnpj`=?, `cliente_nome`=?, `cliente_email`=?, `cliente_data_nacimento`=?, `cliente_ddd`=?, `cliente_telefone`=?, `cliente_endereco`=?, `cliente_numero`=?, `cliente_bairro`=?, `cliente_cidade`=?,`cliente_estado`=?,`cliente_pais`=? WHERE cliente_Id = ? ");
			$stmt->bind_param('ssssssssssssss', $cliente_cpf, $cliente_cnpj, $cliente_nome, $cliente_email, $Data_inv, $cliente_ddd, $cliente_telefone, $cliente_endereco, $cliente_numero, $cliente_bairro, $cliente_cidade, $cliente_estado, $cliente_pais, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				header("Location:index.php");
				exit;
			}
		}

		else
		{
			$erro = "Numero invalido";
		}
	}
}
else

if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
	$id = (int)$_GET["id"];
	
	if(isset($_GET["del"]))
	{
		$stmt = $obj_mysqli->prepare("DELETE FROM `cliente` WHERE cliente_Id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		header("Location:index.php");
		exit;
	}
	else
	{
		$stmt = $obj_mysqli->prepare("SELECT * FROM `cliente` WHERE cliente_Id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		$cliente_cpf = $aux_query["cliente_cpf"];
		$cliente_cnpj = $aux_query["cliente_cnpj"];
		$cliente_nome = $aux_query["cliente_nome"];
		$cliente_email = $aux_query["cliente_email"];
		$cliente_data_nacimento = $aux_query["cliente_data_nacimento"];
		function inverteData($cliente_data_nacimento){
			if(count(explode("/",$cliente_data_nacimento)) > 1){
				return implode("-",array_reverse(explode("/",$cliente_data_nacimento)));
			}elseif(count(explode("-",$cliente_data_nacimento)) > 1){
				return implode("/",array_reverse(explode("-",$cliente_data_nacimento)));
			}
		}
		$cliente_data_nacimento = inverteData($cliente_data_nacimento);
		
		$cliente_ddd = $aux_query["cliente_ddd"];	
		$cliente_telefone = $aux_query["cliente_telefone"];
		$cliente_endereco = $aux_query["cliente_endereco"];
		$cliente_numero = $aux_query["cliente_numero"];
		$cliente_bairro = $aux_query["cliente_bairro"];
		$cliente_cidade = $aux_query["cliente_cidade"];
		$cliente_estado = $aux_query["cliente_estado"];
		$cliente_pais = $aux_query["cliente_pais"];

		
		$stmt->close();		
	}
}
 
?>