<?php
require "../../conn/comum.php"; 
$id = "";
$cliente_plano = "";
$cliente_data_nacimento = "";
$cliente_nome = "";
$cliente_cpf = "";
$cliente_cnpj = "";
$cliente_email = "";
$cliente_ddd = "";
$cliente_telefone = "";
$cliente_endereco = "";
$cliente_numero = "";
$cliente_bairro = "";
$cliente_cidade = "";
$cliente_estado = "";
$cliente_cep = "";
$cliente_pais = "";
$v1 ="";
$v2 ="";

@$plano_desc_v = $_POST["plano_desc_v"];
@$cliente_valor = $_POST["cliente_valor"];
@$cliente_equipamento = $_POST["cliente_equipamento"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
		<title>Boleto</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
	<body>


<div class="container">
	<h3><?php echo "Agradecemso sua compra, favor preencher os campos abaixo!";?></h3>
	<div class="row">
		<form enctype="multipart/form-data" class="table" action="boleto.php" method="POST" role="form">
			<div class="row form-group">
		<!--<div class="col-12 col-md-2"> 
			<label>Plano</label>
			<input type="text" name="cliente_plano" class="form-control" value="<?=$cliente_plano?>" required>
		</div>-->
		<div class="col-md-4"> 
				<label>Plano:</label>
				<select type="text" name="cliente_plano" class="form-control" value="<?=$cliente_plano?>" required>
					<option value="<?=$cliente_plano?>"><?=$cliente_plano?></option>
					<?php 
					$result = $obj_mysqli->query("SELECT `id`, `plano_descricao`, `plano_cota`, `plano_qtd_email`, `plano_valor` FROM `plano`");
					while ($aux_query = $result->fetch_assoc()){ ?>
					<option value="<?php echo $aux_query['plano_descricao'] ?>"><?php echo $aux_query['plano_descricao'] ?></option>
					<?php } ?>
				</select>
			</div>
		<div class="col-12 col-md-2"> 
			<label>CPF</label>
			<input type="text" name="cliente_cpf" class="form-control" value="<?=$cliente_cpf?>" >
		</div>
		<div class="col-12 col-md-2"> 
			<label>CNPJ</label>
			<input type="text" name="cliente_cnpj" class="form-control" value="<?=$cliente_cnpj?>" >
		</div>
		<div class="col-12 col-md-4"> 
			<label>Nome:</label>
			<input type="text" class="form-control" name="cliente_nome" value="<?=$cliente_nome?>" required>
		</div>
		<div class="col-12 col-md-4"> 
			<label>E-mail:</label>
			<input type="text" name="cliente_email" class="form-control" value="<?=$cliente_email?>" required>
		</div>
		<div class="col-2 col-md-2"> 
			<label>Data de nacimento:</label>
			<input type="text" name="cliente_data_nacimento" class="form-control" placeholder="__/__/___" value="<?=$cliente_data_nacimento?>">
		</div>
		<div class="col-12 col-md-1"> 
			<label>DDD:</label>
			<input type="text" class="form-control" name="cliente_ddd" value="<?=$cliente_ddd?>">
		</div>
		<div class="col-12 col-md-2"> 
			<label>Telefone:</label>
			<input type="text" class="form-control" name="cliente_telefone" value="<?=$cliente_telefone?>">
		</div>
		<div class="col-2 col-md-4">
			<label> Endereco:</label>
			<input type="text" class="form-control" name="cliente_endereco" value="<?=$cliente_endereco?>" required>
		</div>
		<div class="col-2 col-md-1"> 
			<label> Numero:</label>
			<input type="text" class="form-control" name="cliente_numero" value="<?=$cliente_numero?>" required>
		</div>
		<div class="col-2 col-md-4"> 
			<label> Bairro:</label>
			<input type="text" class="form-control" name="cliente_bairro" value="<?=$cliente_bairro?>" required>
		</div>
		<div class="col-2 col-md-4"> 
			<label> Cidade:</label>
			<input type="text" class="form-control" name="cliente_cidade" value="<?=$cliente_cidade?>" required>
		</div>
		<div class="col-2 col-md-1"> 
			<label>Estado:</label>
			<select type="text" name="cliente_estado" class="form-control" value="<?=$cliente_estado?>" required>
				<option name="cliente_estado" value="<?=$cliente_estado?>"> </option>
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			</select>
		</div>
		<div class="col-2 col-md-2"> 
			<label> Pais:</label>
			<input type="text" class="form-control" name="cliente_pais" value="<?=$cliente_pais?>" required>
		</div>
		<br>
		</div>
		
		

	<div class="row">
		<div class="col-md-6">
		<br>
			<h2>Formas de pagamento</h2>

			
			  <label><input type="radio" name="radio" value="1">Cartão</label>
			
			<hr>
			
			  <label><input type="radio" name="radio" value="2">Boleto</label>
			
		</div>
		<div class="col-md-6">
			<h1 class="card-title">
			<?php 
				$result = $obj_mysqli->query("SELECT `id`, `plano_descricao`, `plano_desc_v`, `plano_cota`, `plano_qtd_email`, `plano_valor` FROM `plano` where `plano_desc_v`= '$plano_desc_v'");
				while ($aux_query = $result->fetch_assoc()){ 
					echo "<small>R$</small>" .$aux_query['plano_valor']. "<small>/mês</small>";
					$vl = $aux_query['plano_valor'];
					echo"<h6>Valor do plano R$ ".$vl*12 ."0 /ano</h6>";
					echo "<br>";
					echo "<ul>";
					echo "<li>";
					echo " <b>" .$aux_query['plano_cota']. "Gb</b> Armazenamento</li>";
					echo "<li>";
					echo " <b>" .$aux_query['plano_qtd_email']. "</b> E-mails</li>";
					echo " <li>";
					echo "  <b>SSL</b> Certificado Let's Encrypt</li>";
					echo " </ul>";?>
					
				<?php } $v2 = v1*12; ?>
			</h1>
			</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-0">
			<input type="hidden" value="<?=$id?>" name="id">
			<input type="hidden" value="<?=@$v2?>" name="cliente_valor">
			<input type="hidden" value="<?=$plano_desc_v?>" name="plano_desc_v">
			<button name="submit" type="submit" class="btn btn-primary"><?=($id==-1)?"Concluir":"&nbsp;&nbsp;&nbsp;"."Salvar"."&nbsp;&nbsp;&nbsp"?></button>
		</div>
	</div>
	</div>
<br>
<br>
		</form>
	</div>	
</div>	
<br/>
<br>
<br>
<br>
<br>
	<?php
	echo 'Equipamento---------------> '. $cliente_equipamento."<br>";
	echo 'valor---------------> '. $cliente_valor."<br>";
	echo "plano atual: ".$plano_desc_v;
	?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- Modal -->
 
	
  </body>
</html>
