<?php
$pedido_id     = "";
$pedido_num = "";
$pedido_cod_cliente = "";
$pedido_cod_prod = "";
$pedido_status = "";
$pedido_rastreio = "";
$pedido_nf = "";
$pedido_pagseguro = "";



	if(isset($_POST["pedido_id"]) 
	&&	isset($_POST["pedido_pagseguro"])  
	&&	isset($_POST["pedido_cod_cliente"]) 
	&&	isset($_POST["pedido_status"]) 
	&&	isset($_POST["pedido_rastreio"]) 
	&&	isset($_POST["pedido_nf"])){

	if(empty($_POST["pedido_id"]))

		$alerta = "Solicitante";

		else{

		$pedido_id    = $_POST["pedido_id"];
		$pedido_pagseguro = $_POST["pedido_pagseguro"];
		$pedido_cod_cliente = $_POST["pedido_cod_cliente"];
		$pedido_status = $_POST["pedido_status"];
		$pedido_rastreio = $_POST["pedido_rastreio"];
		$pedido_nf = $_POST["pedido_nf"];
		
		/*echo "Pedido id>>> " .$pedido_id."<br>";
		echo "pedido_pagseguro>>> " .$pedido_pagseguro."<br>";
		echo "pedido_cod_cliente>>> " .$pedido_cod_cliente."<br>";
		echo "pedido_status>> " .$pedido_status."<br>";
		echo "pedido_rastreio>>> " .$pedido_rastreio."<br>";
		echo "pedido_nf>>> " .$pedido_nf."<br>";*/


			$sql ="UPDATE `pedido` SET `pedido_cod_cliente`='$pedido_cod_cliente', `pedido_pagseguro`='$pedido_pagseguro', `pedido_status`='$pedido_status', `pedido_rastreio`='$pedido_rastreio', `pedido_nf`='$pedido_nf' WHERE pedido_id = '$pedido_id' ";

			if ($obj_mysqli->query($sql) === TRUE) {
					echo "Alteração realizada com sucesso!";
					header("Location:cad_pedido.php");
				} else {
					echo "Error updating record: " . $obj_mysqli->error;
					
				}

	}
}else
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
	$pedido_id= (int)$_GET["id"];

	if(isset($_GET["del"])){
		$stmt = $obj_mysqli->prepare("DELETE FROM `pedido` WHERE pedido_id = ?");
		$stmt->bind_param('i', $pedido_id);
		$stmt->execute();

		header("Location:cad_pedido.php");
		exit;
	}else{

		$stmt = $obj_mysqli->prepare("SELECT * FROM `pedido` WHERE pedido_id = ?");
		$stmt->bind_param('i', $pedido_id);
		$stmt->execute();

		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		$pedido_id = $aux_query["pedido_id"];
		$pedido_pagseguro = $aux_query["pedido_pagseguro"];
		$pedido_cod_cliente = $aux_query["pedido_cod_cliente"];
		$pedido_status = $aux_query["pedido_status"];
		$pedido_rastreio = $aux_query["pedido_rastreio"];
		$pedido_nf = $aux_query["pedido_nf"];
		
		$stmt->close();		
	}
}
?>