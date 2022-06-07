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
		<br>
		<form enctype="multipart/form-data" class="table" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" role="form">
			<div class="row">
				<div class="col-lg-2 form-group">
					<label>pedido_id:</label>
					<input class="form-control"  name="pedido_id" type="text" id="pedido_id" size="70" maxlength="60" value="<?=$pedido_id?>" />
				</div>
				<div class="col-lg-2 form-group">
					<label>Transação:</label>
					<input class="form-control"  name="pedido_pagseguro" type="text" id="pedido_pagseguro" size="70" maxlength="60" value="<?=$pedido_pagseguro?>" />
				</div>
				<div class="col-lg-2 form-group">
					<label>Codigo do Cliente:</label>
					<input class="form-control"  name="pedido_cod_cliente" type="text" id="pedido_cod_cliente" size="70" maxlength="60" value="<?=$pedido_cod_cliente?>" />
				</div>
				<div class="col-lg-2 form-group">
					<label>Status do Pedido:</label>
					<input class="form-control"  name="pedido_status" type="text" id="pedido_status" size="70" maxlength="60" value="<?=$pedido_status?>" />
				</div>
				<div class="col-lg-2 form-group">
					<label>Rastreio:</label>
					<input class="form-control"  name="pedido_rastreio" type="text" id="pedido_rastreio" size="70" maxlength="60" value="<?=$pedido_rastreio?>" />
				</div>
				<div class="col-lg-2 form-group">
					<label>Nota fiscal:</label>
					<input class="form-control"  name="pedido_nf" type="text" id="pedido_nf" size="70" maxlength="60" value="<?=$pedido_nf?>" />
				</div>
			</div>
			<div class="form-group">
				<!--<input type="hidden" value="<?=$pedido_id?>" name="pedido_id" >-->
				<button name="submit" type="submit" class="btn btn-primary">Salvar</button>
				<a href="cad_pedido.php"><span name="submit" type="submit" class="btn btn-danger"><font color="#FFFFFF">Limpar</font></span></a>
			</div>
		</form>
		<br>

		<table class="table table-striped" style="font-size: 12px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Itens</th>
					<th>Data</th>
					<th>Itopo Frete</th>
					<th>Transação</th>
					<th>Cod Cliente</th>
					<th>Status do Pedido</th>
					<th>Rastreio</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = $obj_mysqli->query("SELECT p.pedido_id, c.cliente_nome, c.cliente_id, p.pedido_cod, p.pedido_pagseguro, p.pedido_cod_cliente, p.pedido_cod_prod, p.pedido_status, p.pedido_status, p.pedido_data_compra, p.pedido_rastreio, p.pedido_tipo_frete, p.pedido_nf FROM pedido p INNER JOIN cliente c ON p.pedido_cod_cliente = c.cliente_Id") or die($obj_mysqli->error);
						while ($aux_query = $result->fetch_assoc()){
						@$cont = $cont +1;
						echo '  <td>'.@$cont.'</td>';
						echo '  <td>'.$aux_query["cliente_nome"].'</td>';
						echo '  <td><a href="itens.php?id='.$aux_query["pedido_id"].'& cliente_id='.$aux_query["cliente_id"].'">Itens</a></td>';
						echo '  <td>'.$aux_query["pedido_data_compra"].'</td>';
						echo '  <td>'.$aux_query["pedido_tipo_frete"].'</td>';
						echo '  <td>'.$aux_query["pedido_pagseguro"].'</td>';
						echo '  <td>'.$aux_query["pedido_cod_cliente"].'</td>';
						

						if($aux_query["pedido_status"] ==3){
							@$status = "<font color='green'><b>Pagamento aprovado</b></font>";
						}elseif($aux_query["pedido_status"] ==2){
							@$status = "<font color='yellow'><b>Em alalize</b></font>";
						}elseif($aux_query["pedido_status"] ==1){
							@$status = "<font color='orange'><b>Aguardando Pagamento</b></font>";
						}else{
							@$status = "<font color='red'><b>Erro no pagamento</b></font>";
						}
						echo '  <td>'.@$status.'</td>';


						echo '  <td>'.$aux_query["pedido_rastreio"].'</td>';
						echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["pedido_id"].'">Editar</a></td>';
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

