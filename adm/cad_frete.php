<?php
?>
<!DOCTYPE html>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <div id="wrapper">
        <!-- Navigation -->
        <?php
	<div id="page-wrapper">
		<br>
		<form enctype="multipart/form-data" class="table" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" role="form">
					<label>Codigo:</label>
					<input class="form-control"  name="frete_cod" type="text" id="frete_cod" size="70" maxlength="60" value="<?=$frete_cod?>" />
					<label>Largura:</label>
					<input class="form-control"  name="frete_largura" type="text" id="frete_largura" size="70" maxlength="60" value="<?=$frete_largura?>" />
					<label>Comprimento:</label>
					<input class="form-control"  name="frete_comprimento" type="text" id="frete_comprimento" size="70" maxlength="60" value="<?=$frete_comprimento?>" />
			</div>
			<div class="form-group">
		</form>
		<br>
		<table class="table table-striped" style="font-size: 12px;">
					<th>Codigo</th>
					<th>Cep:</th>
					<th>Comprimento</th>
					<th>Peso</th>
					<th>Editar</th>
					<th>Remover</th>
				</tr>
						@$cont = $cont +1;
						echo '  <td>'.@$cont.'</td>';
						echo '  <td>'.$aux_query["frete_cod"].'</td>';
						echo '  <td>'.$aux_query["frete_altura"].'</td>';
						echo '  <td>'.$aux_query["frete_largura"].'</td>';
						echo '  <td>'.$aux_query["frete_comprimento"].'</td>';
						echo '  <td>'.$aux_query["frete_peso"].'</td>';
						echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["frete_id"].'">Editar</a></td>';
						echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["frete_id"].'&del=true">Excluir</a></td>';
						echo '</tr>';
</div>
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