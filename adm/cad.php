<?php 

// Verificador de sessão
require "verifica.php";

// Conexão com o banco de dados
require "comum.php";

// Variavel que recebe o id da sessao para gravaçao no banco
$id_sessao = $_SESSION['id_usuario'];
 
 if( $_SESSION["permissao"] == "A"){
	require "caduser.php";
}else{
	echo "Permissão negada! ";
}

?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Os2prohos</title>

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

</head>
  <body>
  <div id="wrapper">

        <!-- Navigation -->
        <?php
			require "nav.php"; 
		?>
		
		<div id="page-wrapper">
		<br>
	<div class="row">
		<form enctype="multipart/form-data" class="table" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" role="form">
			<div class="col-md-6"> 
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome do usuario:"value="<?=$nome?>">
			</div>
			<div class="col-md-6"> 
			<label>Login:</label>
			<input type="text" name="login" class="form-control" placeholder="Login do usuario:"value="<?=$login?>">
			</div>
			<div class="col-md-6"> 
			<label>Senha:</label>
			<input class="form-control" rows="4" type="password" name="senha" class="form-control" placeholder="Senha do usuario:" value="<?=$senha?>">
			</div>
			<div class="col-md-6"> 
			<label>Tipo:</label>
			<input class="form-control" rows="4" type="text" name="tipo" class="form-control" placeholder="Nivel do usuario:" value="<?=$tipo?>"><br/>
			</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-0">
			<input type="hidden" value="<?=$id?>" name="id" >
			<button name="submit" type="submit" class="btn btn-primary"><?=($id==-1)?"Cadastrar":"Salvar"?></button>
		</div>
	</div>
		</form>
		
		


<th/>
<br/>

	<br>
	<br>
		<table class="table table-striped" style="font-size: 12px;">
<tr>
	<td><strong>#</strong></td>
	<td><strong>Nome</strong></td>
	<td><strong>Login</strong></td>
	<td><strong>Senha</strong></td>
	<td><strong>Tipo</strong></td>
	<td><strong>Editar</strong></td>
	<td><strong>Excluir</strong></td>
</tr>

<?php
$pwd = "************";
	$result = $obj_mysqli->query("SELECT `id`, `nome`, `login`, `senha`, `tipo` FROM `usuarios` ");
	while ($aux_query = $result->fetch_assoc()){
		echo '  <td>'.$aux_query["id"].'</td>';
		echo '  <td>'.$aux_query["nome"].'</td>';
		echo '  <td>'.$aux_query["login"].'</td>';
		echo '  <td>'.$pwd.'</td>';
		echo '  <td>'.$aux_query["tipo"].'</td>';
		echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id"].'">Editar</a></td>';
		echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id"].'&del=true">Excluir</a></td>';
		echo '</tr>';
	}
?>


</table><!--Fim da tabela com os dados-->
		
	<br>
	<br>
	<br>
	<br>
	</div>
	</div>

	<script>
  $( function() {
    $( "#datepicker" ).datepicker({
		dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
	});
  } );
  </script>
  
  
   <script>
                $(function() {
                    $('#setTimeAbertura').timepicker({
						 timeFormat: 'H:i'
					});
                    $('#setTimeBtnAbertura').on('click', function (){
                        $('#setTimeAbertura').timepicker('setTime', new Date());
                    });
                }); 
				
				$(function() {
                    $('#setTimeFechamento').timepicker({
						 timeFormat: 'H:i'
					});
                    $('#setTimeBntFechamento').on('click', function (){
                        $('#setTimeFechamento').timepicker('setTime', new Date());
                    });
                });
            </script>
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
