<?php

$id     = -1;
$frete_cod = "";
$frete_cep = "";
$frete_altura = "";
$frete_largura = "";
$frete_comprimento = "";
$frete_peso = "";	

	if(isset($_POST["id"]) 
	&&	isset($_POST["frete_cod"]) 
	&&	isset($_POST["frete_cep"]) 
	&&	isset($_POST["frete_altura"]) 
	&&	isset($_POST["frete_largura"]) 
	&&	isset($_POST["frete_comprimento"]) 
	&&	isset($_POST["frete_peso"]))

{
	

	if(empty($_POST["frete_cod"]))
		$alerta = "Solicitante";
	
		else
	 {
		
		$frete_id    = $_POST["id"];
		$frete_cod = $_POST["frete_cod"];
		$frete_cep = $_POST["frete_cep"];
		$frete_altura = $_POST["frete_altura"];
		$frete_largura = $_POST["frete_largura"];
		$frete_comprimento = $_POST["frete_comprimento"];
		$frete_peso = $_POST["frete_peso"];
		


		if($frete_id== -1)
		{
			
			echo "<br/>";
			$stmt = $obj_mysqli->prepare("INSERT INTO `frete`(`frete_cod`, `frete_cep`, `frete_altura`, `frete_largura`, `frete_comprimento`, `frete_peso`)
			VALUES (?,?,?,?,?,?)") or die($obj_mysqli->error);
			$stmt->bind_param('ssssss', $frete_cod, $frete_cep, $frete_altura, $frete_largura, $frete_comprimento, $frete_peso);				

			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				
				echo "cadastro realisado com sucesso!";
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad_frete.php'>";
				exit;
				
			}

		}

		else
		if(is_numeric($id) && $frete_id>= 1)
		{
			$stmt = $obj_mysqli->prepare("UPDATE `frete` SET `frete_cod`=?, `frete_cep`=?, `frete_altura`=?, `frete_largura`=?, `frete_comprimento`=?, `frete_peso`=? WHERE frete_id = ? ");
			$stmt->bind_param('ssssss', $frete_cod, $frete_cep, $frete_altura, $frete_largura, $frete_comprimento, $frete_peso);
		

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
	$frete_id= (int)$_GET["id"];
	
	if(isset($_GET["del"]))
	{
		$stmt = $obj_mysqli->prepare("DELETE FROM `frete` WHERE frete_id = ?");
		$stmt->bind_param('i', $frete_id);
		$stmt->execute();
		
		header("Location:cad_frete.php");
		exit;
	}
	else
	{
		$stmt = $obj_mysqli->prepare("SELECT * FROM `frete` WHERE frete_id = ?");
		$stmt->bind_param('i', $frete_id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		$frete_cod = $aux_query["frete_cod"];
		$frete_cep = $aux_query["frete_cep"];
		$frete_altura = $aux_query["frete_altura"];
		$frete_largura = $aux_query["frete_largura"];
		$frete_comprimento = $aux_query["frete_comprimento"];
		$frete_peso = $aux_query["frete_peso"];
		
		$stmt->close();		
	}
}
 
?>