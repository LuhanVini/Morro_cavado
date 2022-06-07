<?php

// Verificador de sessão
require "verifica.php";

// Conexão com o banco de dados
require "adm/comum.php";

@$pedido_cod = $_GET['pedido_cod'];


?>
<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<meta name="description" content="Café Especial do Sul de Minas">
	<meta name="keywords" content="Café Especial, Café superior, Café, Café do Sul de minas, Café gurmet, aroma de laranjeira">
	<meta itemprop="name" content="Café Especial do Sul de Minas">
	<meta itemprop="description" content="Café Especial do Sul de Minas">
	<meta name="robots" content="">
	<meta name="revisit-after" content="1 day">
	<meta name="language" content="Portuguese">
	<meta name="generator" content="N/A">
	<link rel="shortcut icon" href="assets/images/logo-122x119.png" type="image/x-icon">
	<link rel="canonical" href="https://morrocavadocafe.com" />


	<title>Morro Cavado Café | Contato</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/dropdown/css/style.css">
	<link rel="stylesheet" href="assets/theme/css/style.css">
	<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<link href="assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
	<link href="assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>

<body>

	<section id="nav" class="menu cid-rJ7JV5pcDW" once="menu" id="menu2-0">

	</section>

	<section class="mbr-section form1 cid-rKtYhbcEX1" id="form1-14">
		<div class="container-fluid">
			<div class="row">
				<div class="col-2 border-right">
					<button id="id1" type="button" class="btn btn-outline-dark btn-sm btn-block pb-2 pr-2">Cadastro</button>
					<button id="id2" type="button" class="btn btn-outline-dark btn-sm btn-block pb-2">Pedidos</button>
					<button type="button" class="btn btn-outline-dark btn-sm btn-block pb-2">Senha</button>
				</div>
				<div id="div1" class="col-10 ">
					<div class="container">
						<table class="table table-striped" style="font-size: 12px;">
							<thead>
								<tr>
									<th>Pedido</th>
									<th>Produto</th>
									<th>Status do Pedido</th>
									<th>Rastreio</th>
									<th>Numero da NF</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$result = $obj_mysqli->query("SELECT cliente.cliente_Id, pedido.pedido_cod, pedido.pedido_pagseguro, pedido.pedido_cod_cliente, pedido_cod_prod, pedido.pedido_status, pedido.pedido_rastreio, pedido_nf FROM cliente INNER JOIN pedido ON pedido.pedido_cod_cliente = cliente.cliente_Id WHERE cliente.cliente_Id =" . $_SESSION['login']["cliente_Id"] . " AND pedido.pedido_cod=" . $pedido_cod . "");
								while ($aux_query = $result->fetch_assoc()) {
									echo '  <td>' . $aux_query["pedido_cod"] . '</td>';
									echo '  <td>' . $aux_query["pedido_cod_prod"] . '</td>';
									echo '  <td>' . $aux_query["pedido_status"] . '</td>';
									echo '  <td>' . $aux_query["pedido_rastreio"] . '</td>';
									echo '  <td>' . $aux_query["pedido_nf"] . '</td>';
									echo '</tr>';
									$rastreio = $aux_query["pedido_rastreio"];
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="footer" class="footer4 cid-rJf8j9IQHS" id="footer4-h">

	</section>

	<script src="assets/web/assets/jquery/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/theme/js/script.js"></script>
	<script src="assets/parallax/jarallax.min.js"></script>
	<script src="assets/dropdown/js/navbar-dropdown.js"></script>
	<script src="assets/smoothscroll/smooth-scroll.js"></script>

	<script>
		$("#meio").load("minhaconta.php");
		$("#nav").load("assets/theme/nav.html");
		$("#footer").load("assets/theme/footer.html");
	</script>
	<script>
		$(document).ready(function() {
			$("#id1").click(function() {
				$("#div1").load("minhaconta.php");
			});
		});
		$(document).ready(function() {
			$("#id2").click(function() {
				$("#div1").load("pedidos.php");
			});
		});
		$(document).ready(function() {
			$("#item").click(function() {
				$("#div1").load("pedidos.php");
			});
		});
	</script>


</body>

</html>