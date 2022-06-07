<?php

require "adm/comum.php";

$produto_item = "";
$produto_item = $_POST["produto_item"];

$valor = $obj_mysqli->query("SELECT * FROM `produto` WHERE produto_cod = " . $produto_item) or die($obj_mysqli->error);
$row = mysqli_fetch_assoc($valor);
?>

<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <meta name="description" content="Café Especial do Sul de Minas">

    <meta name="keywords"

        content="Café Especial, Café superior, Café, Café do Sul de minas, Café gurmet, aroma de laranjeira">

    <meta itemprop="name" content="Café Especial do Sul de Minas">
    <meta itemprop="description" content="Café Especial do Sul de Minas">

    <meta name="robots" content="">

    <meta name="revisit-after" content="1 day">

    <meta name="language" content="Portuguese">

    <meta name="generator" content="N/A">
	<link rel="shortcut icon" href="assets/images/logo-122x119.png" type="image/x-icon">

    <link rel="canonical" href="https://morrocavadocafe.com" />



	<title>Morro Cavado Café | Produtos</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/dropdown/css/style.css">

	<link rel="stylesheet" href="assets/theme/css/style.css">

	<link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">

	<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<link href="assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">



</head>

<body>
	<section id="nav" class="menu cid-rKtWE6aqFK" once="menu" id="menu2-r">

		

	</section>

	<section class="tabs4 cid-rKtXeaxixv" id="tabs4-x">
		<div class="container">
			<div class="media-container-row mt-5 pt-3">

				<div class="mbr-figure" style="width: 52%;">

					<?php

					echo "<img src='assets/images/" . $row['produto_img'] . "' >";
					?>
				</div>

				<div class="tabs-container">

					<div class="tab-content">
						<div id="tab1" class="tab-pane in active" role="tabpanel">

							<div class="row">
								<div class="col-md-12">

									<?php

									echo "<h3><em><strong>" . $row['produto_nome'] . "</strong></em></h3>";

									?>
									<p class="mbr-text py-0 mbr-fonts-style display-7">

										<?php

										echo $row['produto_descricao'];

										?>

									</p>

								</div>

							</div>
						</div>
						<ul>

							<li><?php

								$vl = $row['produto_preco'];
								echo "R$" . $row['produto_preco'] . ",00"; ?></li>

						</ul>
					</div>

					<div class="mbr-section-btn">

					<?php echo '	

					<a class="btn btn-md btn-primary display-4" href= "carrinho/carrinho.php?acao=add&id=' .$row['produto_id']. '">Comprar</a>'

					?>
					</div>

				</div>
			</div>
			<hr>
		</div>
		<?php
		if ($row['produto_cod'] == 507) {

		?>
			<div class="container text-justify">

				<h3>
					<p>Laudo Tecnico</p>
				</h3>
				<br>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Item</th>
							<th scope="col">PTS</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>

							<td>AROMA </td>
							<td>8</td>
						</tr>
						<tr>
							<th scope="row">2</th>

							<td>SABOR </td>

							<td>8</td>

						</tr>

						<tr>
							<th scope="row">3</th>
							<td>ACIDEZ </td>
							<td>7,75</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>CORPO </td>
							<td>8</td>
						</tr>
						<tr>

							<th scope="row">5</th>

							<td>RETROGOSTO </td>

							<td>8</td>

						</tr>

						<tr>

							<th scope="row">6</th>

							<td>SABOR </td>

							<td>7,75</td>

						</tr>

						<tr>

							<th scope="row">7</th>

							<td>BALANCE </td>

							<td>8</td>

						</tr>
						<tr>
							<th scope="row">8</th>
							<td>GERAL </td>
							<td>8</td>
						</tr>
						<tr>
							<th scope="row">9</th>
							<td>UNIFORMIDADE </td>
							<td>10</td>
						</tr>
						<tr>
							<th scope="row">10</th>

							<td>LIMPEZA </td>

							<td>10</td>

						</tr>

						<tr>
							<th scope="row">11</th>

							<td>DOÇURA </td>
							<td>10</td>
						</tr>
					</tbody>
				</table>
			<?php } ?>
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
        $("#nav").load("assets/theme/nav.html");
        $("#footer").load("assets/theme/footer.html");
    </script>
	

	


</body>


</html>