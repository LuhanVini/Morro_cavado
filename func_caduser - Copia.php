<?php


$id     = -1;

if(isset($_POST["cliente_cpf"]) 
	&&	isset($_POST["cliente_nome"]) 
	&&	isset($_POST["cliente_email"]) 
	&&	isset($_POST["cliente_data_nacimento"]) 
	&&	isset($_POST["cliente_ddd"]) 
	&&	isset($_POST["cliente_telefone"]) 
	&&	isset($_POST["cliente_endereco"]) 
	&&	isset($_POST["cliente_numero"]) 
	&&	isset($_POST["cliente_bairro"]) 
	&&	isset($_POST["cliente_cidade"]) 
	&&	isset($_POST["cliente_estado"]))
{
	if(empty($_POST["cliente_cpf"]) || empty($_POST["cliente_nome"])){
		$erro = "Campo nome obrigatorio";
	 }else{

		$cliente_Id     = $_POST["cliente_Id"];		
		$cliente_cpf = $_POST["cliente_cpf"];
		$cliente_nome = $_POST["cliente_nome"];
		$cliente_email = $_POST["cliente_email"];
		$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
		$cliente_ddd = $_POST["cliente_ddd"];	
		$cliente_telefone = $_POST["cliente_telefone"];
		$cliente_endereco = $_POST["cliente_endereco"];
		$cliente_numero = $_POST["cliente_numero"];
		$cliente_bairro = $_POST["cliente_bairro"];
		$cliente_cidade = $_POST["cliente_cidade"];
		$cliente_estado = $_POST["cliente_estado"];
		

		if($id == -1)
		{
			echo ">>>>".$cliente_Id . "<br>";
			echo ">>>>".$cliente_cpf . "<br>";
			echo ">>>>".$cliente_nome . "<br>";
			echo ">>>>".$cliente_email . "<br>";
			echo ">>>>".$cliente_data_nacimento . "<br>";
			echo ">>>>".$cliente_telefone . "<br>";
			echo ">>>>".$cliente_endereco . "<br>";
			echo ">>>>".$cliente_numero . "<br>";
			echo ">>>>".$cliente_bairro . "<br>";
			echo ">>>>".$cliente_cidade . "<br>";
			echo ">>>>".$cliente_estado . "<br>";
			
			$obj_mysqli2 = new mysqli('localhost', 'root', 'toor', 'bd_cafe');
			if ($obj_mysqli2->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			if (!$obj_mysqli2->set_charset("utf8")) {
				printf("Error loading character set utf8: %s\n", $obj_mysqli2->error);
				exit();
			}

			$stmt = $obj_mysqli2->prepare("UPDATE `cliente` SET `cliente_cpf`=?, `cliente_nome`=?, `cliente_email`=?, `cliente_data_nacimento`=?, `cliente_ddd`=?, `cliente_telefone`=?, `cliente_endereco`=?, `cliente_numero`=?, `cliente_bairro`=?, `cliente_cidade`=?,`cliente_estado`=? WHERE cliente_Id = $cliente_Id ");
			$stmt->bind_param('sssssssssss', $cliente_cpf, $cliente_nome, $cliente_email, $cliente_data_nacimento, $cliente_ddd, $cliente_telefone, $cliente_endereco, $cliente_numero, $cliente_bairro, $cliente_cidade, $cliente_estado);
		
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=minhaconta.php'>";
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




// Create connection
$conn = new mysqli('localhost', 'root', 'toor', 'bd_cafe');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET["cliente_Id"]) && is_numeric($_GET["cliente_Id"]))
{
	$cliente_Id = (int)$_GET["cliente_Id"];
	
	if(isset($_GET["del"]))
	{
		$stmt = $obj_mysqli2->prepare("DELETE FROM `cliente` WHERE cliente_Id = ?");
		$stmt->bind_param('i', $cliente_Id);
		$stmt->execute();
		
		header("Location:cad.php");
		exit;
	}
	else
	{
		
		$sql = "SELECT * FROM `cliente` WHERE cliente_Id = 1";
		$result = $conn->query($sql);
		$aux_query = $result->fetch_assoc();
		
		$cliente_cpf = $aux_query["cliente_cpf"];
		$cliente_nome = $aux_query["cliente_nome"];
		$cliente_email = $aux_query["cliente_email"];
		$cliente_data_nacimento = $aux_query["cliente_data_nacimento"];
		$cliente_ddd = $aux_query["cliente_ddd"];
		$cliente_telefone = $aux_query["cliente_telefone"];
		$cliente_endereco = $aux_query["cliente_endereco"];
		$cliente_numero = $aux_query["cliente_numero"];
		$cliente_bairro = $aux_query["cliente_bairro"];
		$cliente_cidade = $aux_query["cliente_cidade"];
		$cliente_estado = $aux_query["cliente_estado"];
			
	}
}
 
?>