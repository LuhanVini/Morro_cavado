<?php

$id     = -1;
$nome   = "";
$email  = "";
$login  = "";
$senha = "";
$tipo = "";
$status = 1;


if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["tipo"]) && isset($_POST["tipo"]))
{
	if(empty($_POST["nome"]) || empty($_POST["login"]) || empty($_POST["senha"]) || empty($_POST["senha"])){
		$erro = "Campo nome obrigatorio";
	 }else{

		$id     = $_POST["id"];		
		$nome   = $_POST["nome"];
		$email   = $_POST["email"];
		$login  = $_POST["login"];
		$senha = md5($_POST["senha"]);
		$tipo = $_POST["tipo"];
		
		if($id == -1)
		{
			$stmt = $obj_mysqli->prepare("INSERT INTO `usuarios` (`nome`, `login`,`senha`, `tipo`) VALUES (?,?,?,?)");
			$stmt->bind_param('ssss', $nome, $login, $senha, $tipo);	
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo "Usuario cadastrado com sucesso";
				
			}
			echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=cad.php'>";
		}

		else
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $obj_mysqli->prepare("UPDATE `usuarios` SET `nome`=?, `login`=?, `senha`=?, `tipo`=? WHERE id = ? ");
			$stmt->bind_param('ssssi', $nome, $login, $senha, $tipo, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad.php'>";
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
		$stmt = $obj_mysqli->prepare("DELETE FROM `usuarios` WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		header("Location:cad.php");
		exit;
	}
	else
	{
		$stmt = $obj_mysqli->prepare("SELECT * FROM `usuarios` WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		
		$nome = $aux_query["nome"];
		$login = $aux_query["login"];
		$senha = $aux_query["senha"];
		$tipo = $aux_query["tipo"];
		
		$stmt->close();		
	}
}
 
?>