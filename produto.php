<?php
session_start();

// Conexão com o banco de dados

require "adm/comum.php";

// Inicia sessões





?>



	<div class="col mt-n1 text-right">

		<?php echo @$_SESSION["cliente_nome"];?>

	</div>

    <div class="container">

        <br>

        <br>

        <br>

		<div class="container">

			<div class="row justify-content-md-center">

						<?php

					  @$cod = $_GET["cod"];

					  //echo "id do chamado: ".$cod;

						$result = $obj_mysqli->query("SELECT `produto_id`, `produto_cod`, `produto_nome`, `produto_descricao`, `produto_link`, `produto_preco`, `produto_img` FROM `produto`");

						while ($aux_query = $result->fetch_assoc()){

						echo "<form action='page3.php' method='post'>";   

						echo "<div class='col-md-auto'>";

						echo "<div class='card' style='width: 18rem;'>";

						echo '<font size="3" face="Verdana">';

						echo "<h5 class='card-title'>".$aux_query['produto_nome']."</b></h5>";      					

						echo "<img class='card-img-top' src='assets/images/".$aux_query['produto_img']."' alt='Card image cap'>";

						echo "<b>R$  </b> " . $aux_query['produto_preco'].",00";

						$produto_item = $aux_query['produto_cod'];

						echo "<div class='card-body'>"?>

						<input type="hidden" name="produto_item" value="<?=$produto_item?>" /><?php

						echo"<button name='produto_item' value='$produto_item' class='btn btn-primary btn-round'><a> Comprar </a> </button></div>";												

						echo "</div>";

						echo "</div>";

						echo "</form>";

						}?>

			</div>

		</div>

        <br>

        <br>

        <br>

        <br>

        <br>

        <br>

    </div>



