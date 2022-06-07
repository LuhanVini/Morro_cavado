<?phprequire "comum.php"; require "funcfrete.php";require "verifica.php";
?>
<!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta name="description" content="">    <meta name="author" content="">    <title>Cadastro de Frete</title>		<!--<link rel="stylesheet" href="css/estilo.css">-->    <!-- Bootstrap Core CSS -->    <link href="data/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    <!-- MetisMenu CSS -->    <link href="data/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">    <!-- Custom CSS -->    <link href="data/dist/css/sb-admin-2.css" rel="stylesheet">    <!-- Morris Charts CSS -->    <link href="data/vendor/morrisjs/morris.css" rel="stylesheet">    <!-- Custom Fonts -->    <link href="data/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head><body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php			require "nav.php"; 		?>
	<div id="page-wrapper">
		<br>
		<form enctype="multipart/form-data" class="table" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" role="form">			<div class="row">				<div class="col-lg-2 form-group">
					<label>Codigo:</label>
					<input class="form-control"  name="frete_cod" type="text" id="frete_cod" size="70" maxlength="60" value="<?=$frete_cod?>" />				</div>				<div class="col-lg-2 form-group">					<label>Cep:</label>					<input class="form-control"  name="frete_cep" type="text" id="frete_cep" size="70" maxlength="60" value="<?=$frete_cep?>" />				</div>				<div class="col-lg-2 form-group">					<label>Altura:</label>					<input class="form-control"  name="frete_altura" type="text" id="frete_altura" size="70" maxlength="60" value="<?=$frete_altura?>" />				</div>				<div class="col-lg-2 form-group">
					<label>Largura:</label>
					<input class="form-control"  name="frete_largura" type="text" id="frete_largura" size="70" maxlength="60" value="<?=$frete_largura?>" />				</div>				<div class="col-lg-2 form-group">
					<label>Comprimento:</label>
					<input class="form-control"  name="frete_comprimento" type="text" id="frete_comprimento" size="70" maxlength="60" value="<?=$frete_comprimento?>" />				</div>				<div class="col-lg-2 form-group">					<label>Peso:</label>					<input class="form-control"  name="frete_peso" type="text" id="frete_peso" size="70" maxlength="60" value="<?=$frete_peso?>" />				</div>
			</div>
			<div class="form-group">				<input type="hidden" value="<?=$id?>" name="id" >				<button name="submit" type="submit" class="btn btn-primary"><?=($id==-1)?"Cadastrar":"&nbsp;&nbsp;&nbsp;"."Salvar"."&nbsp;&nbsp;&nbsp"?></button>				<a href="cad_frete.php"><span name="submit" type="submit" class="btn btn-danger"><font color="#FFFFFF"><?=($id==1)?"Cadastrar":"Cancelar"?></font></span></a>			</div>
		</form>
		<br>
		<table class="table table-striped" style="font-size: 12px;">			<thead>				<tr>					<th>ID</th>
					<th>Codigo</th>
					<th>Cep:</th>					<th>Altura</th>					<th>Largura</th>
					<th>Comprimento</th>
					<th>Peso</th>
					<th>Editar</th>
					<th>Remover</th>
				</tr>			</thead>			<tbody>				<?php					$result = $obj_mysqli->query("SELECT `frete_id`, `frete_cod`, `frete_cep`, `frete_altura`, `frete_largura`, `frete_comprimento`, `frete_peso` FROM `frete`") or die($obj_mysqli->error);						while ($aux_query = $result->fetch_assoc()){
						@$cont = $cont +1;
						echo '  <td>'.@$cont.'</td>';
						echo '  <td>'.$aux_query["frete_cod"].'</td>';						echo '  <td>'.$aux_query["frete_cep"].'</td>';
						echo '  <td>'.$aux_query["frete_altura"].'</td>';
						echo '  <td>'.$aux_query["frete_largura"].'</td>';
						echo '  <td>'.$aux_query["frete_comprimento"].'</td>';
						echo '  <td>'.$aux_query["frete_peso"].'</td>';
						echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["frete_id"].'">Editar</a></td>';
						echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["frete_id"].'&del=true">Excluir</a></td>';
						echo '</tr>';						}				?>			</tbody>		</table>	</div>
</div>    <!-- /#wrapper -->    <!-- jQuery -->
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
