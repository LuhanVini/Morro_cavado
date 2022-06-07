<?php

$id     = -1;
$nome   = "";
$login  = "";
$senha = "";
$status = 1;


if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"]))
{
	if(empty($_POST["nome"]) || empty($_POST["login"]) || empty($_POST["senha"])){
		$erro = "Campo nome obrigatorio";
	 }else{

		$id     = $_POST["id"];		
		$nome   = $_POST["nome"];
		$login  = $_POST["login"];
		$senha = md5($_POST["senha"]);
		
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $obj_mysqli->prepare("UPDATE `usuarios` SET `nome`=?, `senha`=? WHERE id = ? ");
			$stmt->bind_param('ssi', $nome, $senha, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"Senha alterada com sucesso!";
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

		$stmt = $obj_mysqli->prepare("SELECT * FROM `usuarios` WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		
		$nome = $aux_query["nome"];
		$login = $aux_query["login"];
		
		$stmt->close();		

}
 
?>