<?php
require "comum.php"; 
require "funcpedido.php";
require "verifica.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Frete</title>
		<!--<link rel="stylesheet" href="css/estilo.css">-->
    <!-- Bootstrap Core CSS -->
    <link href="data/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="data/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="data/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="data/vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="data/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php
			require "nav.php"; 
		?>

	<div id="page-wrapper">
	<?php
		@$id = $_GET['id'];
		@$cliente_id = $_GET['cliente_id'];
		/*echo "id--> " . @$id;
		echo "<br>";		
		echo "cliente_id--> " . @$cliente_id;
		echo "<br>";*/
	?>

					<ul>
						<br>
					<li>	
						<?php					
						@$valor = $obj_mysqli->query("SELECT cliente_cpf, cliente_nome, cliente_ddd, cliente_telefone, cliente_endereco, cliente_numero, cliente_bairro, cliente_cidade, cliente_cep, cliente_estado FROM `cliente` WHERE cliente_id = $cliente_id") or die($obj_mysqli->error);
						@$row = mysqli_fetch_assoc($valor);
						@$vl = $row['cliente_nome'];
						echo "<a><b>Nome: </b>" .$row['cliente_nome']."</a>";
						echo "<br>";
						echo "<a><b>CPF:</b> " .$row['cliente_cpf']."</a>";
						echo "<br>";
						echo "<a><b>Telefone:</b> (" .$row['cliente_ddd'].") ".$row['cliente_telefone']."</a>";
						echo "<br>";
						echo "<a><b>Endereço:</b> " .$row['cliente_endereco'].", ".$row['cliente_numero']." - ".$row['cliente_bairro']." - ".$row['cliente_cidade']." - ".$row['cliente_estado']."</a>";
						echo "<br>";?>
					</li>
					</ul>
		<table class="table table-striped" style="font-size: 12px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Numero do Pedido</th>
					<th>Cliente</th>
					<th>Item</th>
					<th>Quantidade</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = $obj_mysqli->query("SELECT i.id, p.pedido_id, i.id_pedido, i.id_cliente, i.pedido_item, i.pedido_qtd FROM pedido p INNER JOIN itens_pedido i ON i.id_pedido = p.pedido_id WHERE p.pedido_id = $id") or die($obj_mysqli->error);
						while ($aux_query = $result->fetch_assoc()){
						@$cont = $cont +1;
						echo '  <td>'.@$cont.'</td>';
						echo '  <td>'.$aux_query["id_pedido"].'</td>';
						echo '  <td>'.$aux_query["id_cliente"].'</td>';
						$prod = $obj_mysqli->query("SELECT produto_nome FROM `produto` WHERE produto_id = 3") or die($obj_mysqli->error);
						while ($aux_query2 = $prod->fetch_assoc()){
						echo '  <td>'.$aux_query2["produto_nome"].'</td>';
						}
						echo '  <td>'.$aux_query["pedido_qtd"].'</td>';
						echo '</tr>';
						}
				?>
			</tbody>
		</table>
	</div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="data/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="data/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="data/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="data/vendor/raphael/raphael.min.js"></script>
    <script src="data/vendor/morrisjs/morris.min.js"></script>
    <script src="data/data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="data/dist/js/sb-admin-2.js"></script>
</body>
</html>

