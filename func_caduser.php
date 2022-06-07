<?php
// Conexão com o banco de dados
require "adm/comum.php";

$id     = -1;

if(isset($_POST["cliente_cpf"]) 
	&&	isset($_POST["cliente_Id"]) 
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
			/*echo ">>>>".$cliente_Id . "<br>";
			echo ">>>>".$cliente_cpf . "<br>";
			echo ">>>>".$cliente_nome . "<br>";
			echo ">>>>".$cliente_email . "<br>";
			echo ">>>>".$cliente_data_nacimento . "<br>";
			echo ">>>>".$cliente_telefone . "<br>";
			echo ">>>>".$cliente_endereco . "<br>";
			echo ">>>>".$cliente_numero . "<br>";
			echo ">>>>".$cliente_bairro . "<br>";
			echo ">>>>".$cliente_cidade . "<br>";
			echo ">>>>".$cliente_estado . "<br>";*/

			$sql ="UPDATE `cliente` SET `cliente_cpf`='$cliente_cpf', `cliente_nome`='$cliente_nome', `cliente_email`='$cliente_email', `cliente_data_nacimento`='$cliente_data_nacimento', `cliente_ddd`='$cliente_ddd', `cliente_telefone`='$cliente_telefone', `cliente_endereco`='$cliente_endereco', `cliente_numero`='$cliente_numero', `cliente_bairro`='$cliente_bairro', `cliente_cidade`='$cliente_cidade',`cliente_estado`='$cliente_estado' WHERE cliente_Id = '$cliente_Id' ";
			echo"<pre>";	
				print_r($sql);
			echo"</pre>";

			if ($obj_mysqli->query($sql) === TRUE) {
					echo "Alteração realizada com sucesso!";
					header("Location:minhaconta.html");
				} else {
					echo "Error updating record: " . $obj_mysqli->error;
					
				}

				$obj_mysqli->close();
				
		}

		else
		{
			$erro = "Numero invalido";
		}
	}
}

?>